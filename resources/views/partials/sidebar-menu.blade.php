<li class="nav-item dropdown">
    <a class="dropdown-toggle" href="javascript:void(0);">
        <span class="icon-holder">
            <i class="c-orange-500 ti-layout-list-thumb"></i>
        </span>
        <span class="title">Category Mananger</span>
        <span class="arrow">
            <i class="ti-angle-right"></i>
        </span>
    </a>
    <ul class="dropdown-menu">
        <li>
            <a class="sidebar-link" href="{{route('admin.category.index')}}">Category</a>
        </li>
        <li>
            <a class="sidebar-link" href="{{route('admin.lesson.index')}}">Lesson</a>
        </li>
    </ul>
</li>

<li class="nav-item dropdown">
    <a class="dropdown-toggle" href="javascript:void(0);">
        <span class="icon-holder">
            <i class="c-purple-500 ti-map"></i>
        </span>
        <span class="title">Social Mananger</span>
        <span class="arrow">
            <i class="ti-angle-right"></i>
        </span>
    </a>
    <ul class="dropdown-menu">
        <li>
            <a href="{{route('admin.socialpostcomment.index')}}">Social Post Comment</a>
        </li>
    </ul>
</li>

<li class="nav-item dropdown">
    <a class="dropdown-toggle" href="javascript:void(0);">
        <span class="icon-holder">
            <i class="c-red-500 ti-files"></i>
        </span>
        <span class="title">User Mananger</span>
        <span class="arrow">
            <i class="ti-angle-right"></i>
        </span>
    </a>
    <ul class="dropdown-menu">
        <li>
            <a class="sidebar-link" href="{{route('admin.user.index')}}">Blank</a>
        </li>
        <li>
            <a class="sidebar-link" href="{{route('admin.level.index')}}">Level</a>
        </li>
    </ul>
</li>