<ul class="sidebar-menu scrollable pos-r">
    @foreach ($routes as $routeGroup)
        <li class="nav-item dropdown">
            <a class="dropdown-toggle" href="javascript:void(0);">
                <span class="icon-holder">
                    <i class="c-orange-500 ti-layout-list-thumb"></i>
                </span>
                <span class="title">{{ $routeGroup['group'] }}</span>
                <span class="arrow">
                    <i class="ti-angle-right"></i>
                </span>
            </a>
            <ul class="dropdown-menu">
                @foreach ($routeGroup['items'] as $route)
                    <li>
                        <a class="sidebar-link" href="{{ route('admin.' . $route['name'] . 'index') }}">
                            {{ ucfirst(str_replace('-', ' ', $route['prefix'])) }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </li>
    @endforeach
</ul>