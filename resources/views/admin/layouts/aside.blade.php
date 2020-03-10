<nav class="col-md-2 col-sm-12 bg-light sidebar">
    <div class="sidebar-sticky" style="margin-top: 30px;">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link active" href="#">
                    <span><img src="{{ asset('images/home.png') }}"></span>
                    Домой <span class="sr-only">(current)</span>
                </a>
            </li>
            @can('smm.access')
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.smm.news.index') }}">
                        <span><img src="{{ asset('images/smm.png') }}" alt=""></span>
                        СММ
                    </a>
                </li>
            @endcan
            @can('moder.access')
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.moder.index') }}">
                        <span><img src="{{ asset('images/moderator.png') }}" alt=""></span>
                        Модератор
                    </a>
                </li>
            @endcan
            @can('manager.access')
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.manager.index') }}">
                        <span><img src="{{ asset('images/admin.png') }}" alt=""></span>
                        Администратор
                    </a>
                </li>
            @endcan
        </ul>
    </div>
</nav>