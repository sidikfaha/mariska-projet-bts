FROM node:alpine as build-node
ENV dir /app
WORKDIR ${dir}
COPY package.json package.json
RUN yarn install
COPY resources resources
COPY public public
COPY webpack.mix.js webpack.mix.js
RUN yarn prod

FROM php:cli-alpine
ENV dir /app
ENV PHP_MEMORY_LIMIT=512M
WORKDIR ${dir}
COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer
COPY --from=build-node ${dir} .
COPY --from=mlocati/php-extension-installer /usr/bin/install-php-extensions /usr/local/bin/
RUN install-php-extensions gd xdebug pdo_mysql uuid exif
COPY composer.json composer.json
COPY composer.lock composer.lock
RUN composer install

COPY . .
RUN mv .env.prod .env
RUN php artisan storage:link
CMD php artisan serve --host=0.0.0.0 --port=80