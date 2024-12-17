<!-- Category Manager -->
<ul class="sidebar-menu scrollable pos-r">
    <li class="nav-item dropdown">
        <a class="dropdown-toggle" href="javascript:void(0);">
            <span class="icon-holder">
                <i class="c-orange-500 ti-layout-list-thumb"></i>
            </span>
            <span class="title">Category Manager</span>
            <span class="arrow">
                <i class="ti-angle-right"></i>
            </span>
        </a>
        <ul class="dropdown-menu">
            <li>
                <a class="sidebar-link" href="{{ route('admin.category.index') }}">
                    <i class="ti-view-list-alt"></i> Category
                </a>
            </li>
            <li>
                <a class="sidebar-link" href="{{ route('admin.lesson.index') }}">
                    <i class="ti-book"></i> Lesson
                </a>
            </li>
        </ul>
    </li>

    <!-- Social Manager -->
    <li class="nav-item dropdown">
        <a class="dropdown-toggle" href="javascript:void(0);">
            <span class="icon-holder">
                <i class="c-purple-500 ti-map"></i>
            </span>
            <span class="title">Social Manager</span>
            <span class="arrow">
                <i class="ti-angle-right"></i>
            </span>
        </a>
        <ul class="dropdown-menu">
            <li>
                <a href="{{ route('admin.social_post.index') }}">
                    <i class="ti-comment"></i> Social Post Comment
                </a>
            </li>
        </ul>
    </li>

    <!-- User Manager -->
    <li class="nav-item dropdown">
        <a class="dropdown-toggle" href="javascript:void(0);">
            <span class="icon-holder">
                <i class="c-red-500 ti-files"></i>
            </span>
            <span class="title">User Manager</span>
            <span class="arrow">
                <i class="ti-angle-right"></i>
            </span>
        </a>
        <ul class="dropdown-menu">
            <li>
                <a class="sidebar-link" href="{{ route('admin.user.index') }}">
                    <i class="ti-user"></i> Users
                </a>
            </li>
            <li>
                <a class="sidebar-link" href="{{ route('admin.level.index') }}">
                    <i class="ti-bar-chart-alt"></i> Levels
                </a>
            </li>
        </ul>
    </li>
</ul>