<!-- Start SideMenu Bar -->
<div class="sidebar" data-background-color="dark">
    <div class="sidebar-logo">
        <!-- Logo Header -->
        <div class="logo-header" data-background-color="dark">
            <a href="#" class="logo">
                <h1 style="color:white; margin-left:-13px;">Backend Task</h1>
            </a>
            
            <div class="nav-toggle">
                <button class="btn btn-toggle toggle-sidebar">
                    <i class="gg-menu-right"></i>
                </button>
                <button class="btn btn-toggle sidenav-toggler">
                    <i class="gg-menu-left"></i>
                </button>
            </div>
            <button class="topbar-toggler more">
                <i class="gg-more-vertical-alt"></i>
            </button>
        </div>
        <!-- End Logo Header -->
    </div>
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
            <ul class="nav nav-secondary">
                <li class="nav-item active">
                    <a href="{{ route('user.index') }}" class="collapsed" aria-expanded="false">
                        <i class="fas fa-home"></i>
                        <p>Home</p>
                        <!-- <span class="caret"></span> -->
                    </a>
                </li>
                <li class="nav-item">
                    <a class="collapsed" aria-expanded="false" href="{{ route('upload.index') }}">
                        <i class="fas fa-th-list"></i>
                        <p>Multiple File</p>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
<!-- End SideMenu Bar -->
