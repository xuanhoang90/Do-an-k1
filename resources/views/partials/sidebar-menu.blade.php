<div class="sidebar">
    <ul class="sidebar-menu">
        <li class="nav-item mT-30 actived">
            <a class="sidebar-link" href="">
                <span class="icon-holder">
                    <i class="c-blue-500 ti-home"></i>
                </span>
                <span class="title">Dashboard</span>
            </a>
        </li>
        @foreach ($routes as $route)
        <li class="nav-item">
            <a class="sidebar-link" href="{{ route('admin.' . $route['name'] . 'index') }}">
                <span class="icon-holder">
                    <i class="c-blue-500 ti-angle-right"></i>
                </span>
                <span class="title">{{ ucfirst(str_replace('-', ' ', $route['prefix'])) }}</span>
            </a>
        </li>
        @endforeach
    </ul>
</div>