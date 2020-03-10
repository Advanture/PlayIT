<nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-sm-3 col-md-2 mr-0"><img src="{{ asset('logo.png') }}" width="100 px"></a>
    <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
            <form method="post" action="{{ route('logout') }}" id="admin-logout-form">
                @csrf
                <a class="nav-link" href="#"
                   onclick="document.getElementById('admin-logout-form').submit();"
                >Выход из системы</a>
            </form>

        </li>
    </ul>
</nav>