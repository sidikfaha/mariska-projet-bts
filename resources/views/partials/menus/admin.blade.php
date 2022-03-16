<ul class="list-group menu">
    <li
        class="list-group-item list-group-item-action @if(str_contains(request()->route()->getName(), "home")) active @endif "
    >
        <a href="/">
            <i class="bi-house"></i>
            Dashboard
        </a>
    </li>
    <li
        class="list-group-item list-group-item-action @if(str_contains(request()->route()->getName(), "users")) active @endif "
    >
        <a href="{{ route('users')  }}">
            <i class="bi-person"></i>
            Utilisateurs
        </a>
    </li>
    <li class="list-group-item list-group-item-action @if(str_contains(request()->route()->getName(), "trans")) active @endif ">
        <a href="{{ route('trans') }}">
            <i class="bi-stickies"></i>
            Demandes
        </a>
    </li>
</ul>
