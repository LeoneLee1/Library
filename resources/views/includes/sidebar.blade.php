<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('dashboard') }}">
        <div class="sidebar-brand-icon rotate-n-15">
            {{-- <i class="fas fa-laugh-wink"></i> --}}
            <i class="fas fa-clipboard"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Library <sup>👋</sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ request()->is('admin') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('dashboard') }}">
            <i class="fas fa-fw fa-home"></i>
            <span>Dashboard</span></a>
    </li>
    <li
        class="nav-item 
    {{ request()->is('admin/user') ? 'active' : '' }}
    {{ request()->is('admin/user/create') ? 'active' : '' }}
    {{ request()->is('admin/user/edit/*') ? 'active' : '' }}
    {{ request()->is('admin/user/show/*') ? 'active' : '' }}
        ">
        <a class="nav-link" href="{{ route('user') }}">
            <i class="fas fa-fw fa-users"></i>
            <span>User</span></a>
    </li>
    <li
        class="nav-item 
    {{ request()->is('admin/book') ? 'active' : '' }}
    {{ request()->is('admin/book/create') ? 'active' : '' }}
    {{ request()->is('admin/book/edit/*') ? 'active' : '' }}
    {{ request()->is('admin/book/show/*') ? 'active' : '' }}
        ">
        <a class="nav-link" href="{{ route('book') }}">
            <i class="fas fa-fw fa-book"></i>
            <span>Book</span></a>
    </li>
    <li
        class="nav-item 
    {{ request()->is('admin/borrowing') ? 'active' : '' }}
    {{ request()->is('admin/borrowing/create') ? 'active' : '' }}
        ">
        <a class="nav-link" href="{{ route('borrowing') }}">
            <i class="fas fa-fw fa-clipboard"></i>
            <span>Borrowing</span></a>
    </li>
    <li
        class="nav-item 
    {{ request()->is('admin/review') ? 'active' : '' }}
    {{ request()->is('admin/review/create') ? 'active' : '' }}
    {{ request()->is('admin/review/edit/*') ? 'active' : '' }}
    {{ request()->is('admin/review/show/*') ? 'active' : '' }}
        ">
        <a class="nav-link" href="{{ route('review.admin') }}">
            <i class="fas fa-fw fa-eye"></i>
            <span>Review</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('logout') }}" onclick="return ConfirmLogout()">
            <i class="fas fa-fw fa-power-off"></i>
            <span>Logout</span></a>
    </li>
</ul>
