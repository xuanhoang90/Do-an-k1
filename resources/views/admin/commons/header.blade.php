<div class="header navbar">
  <div class="header-container">
    <ul class="nav-left">
      <li>
        <a id='sidebar-toggle' class="sidebar-toggle" href="javascript:void(0);">
          <i class="ti-menu"></i>
        </a>
      </li>

      <li class="search-input active">
        <form method="GET" action="./index">
          <input class="form-control" name="q" type="text" value="{{ request()->query('q') }}" placeholder="Search...">
          <button type="submit" style="display: none">Search</button>
        </form>
      </li>
    </ul>

    <ul class="nav-right">
      <li class="dropdown">
        <a href="" class="dropdown-toggle no-after peers fxw-nw ai-c lh-1" id="dropdownMenuLink"
          data-bs-toggle="dropdown" aria-expanded="false">
          <div class="peer mR-10">
            <img class="w-2r bdrs-50p" width="35" height="35" style="object-fit: cover"
              src="{{ auth()->user()->profile?->avatar ? asset('storage/' . auth()->user()->profile?->avatar) : 'https://randomuser.me/api/portraits/men/10.jpg' }}"
              alt="">
          </div>
          <div class="peer">
            <span class="fsz-sm c-grey-900">{{ auth()->user()->name }}</span>
          </div>
        </a>
        <ul class="dropdown-menu fsz-sm" aria-labelledby="dropdownMenuLink">

          <li>
            <a href="{{ route('admin.user.edit', auth()->user()->id) }}" class="d-b td-n pY-5 bgcH-grey-100 c-grey-700">
              <i class="ti-user mR-10"></i>
              <span>Profile</span>
            </a>
          </li>

          <li>
            <a href="{{ route('admin.post.index') }}"
              class="d-b td-n pY-5 bgcH-grey-100 c-grey-700 position-relative">
              <i class="ti-bell mR-10"></i>
              <span>Notifications</span>
            </a>
          </li>

      

          <li role="separator" class="divider"></li>
          <li>
            <a href="{{ route('admin.logout') }}" class="d-b td-n pY-5 bgcH-grey-100 c-grey-700">
              <i class="ti-power-off mR-10"></i>
              <span>Logout</span>
            </a>
          </li>
        </ul>
      </li>
    </ul>
  </div>
</div>