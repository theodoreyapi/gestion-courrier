<div class="app-menu navbar-menu">
    <div class="navbar-brand-box">
        <a href="#" class="logo logo-dark">
            <span class="logo-sm">
                <img src="{{ URL::asset('') }}assets/images/logo-sm.png" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="{{ URL::asset('') }}assets/images/logo-dark.png" alt="" height="17">
            </span>
        </a>
        <a href="#" class="logo logo-light">
            <span class="logo-sm">
                <img src="{{ URL::asset('') }}assets/images/logo-sm.png" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="{{ URL::asset('') }}assets/images/logo-light.png" alt="" height="17">
            </span>
        </a>
        <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover"
            id="vertical-hover">
            <i class="ri-record-circle-line"></i>
        </button>
    </div>

    <div id="scrollbar">
        <div class="container-fluid">

            <div id="two-column-menu">
            </div>
            <ul class="navbar-nav" id="navbar-nav">
                <li class="menu-title"><span data-key="t-menu">Menu</span></li>
                <li class="nav-item">
                    <a class="nav-link menu-link {{ Request::is('index') ? 'collapsed active' : '' }}"
                        href="#sidebarDashboards" data-bs-toggle="collapse" role="button" aria-expanded="false"
                        aria-controls="sidebarDashboards">
                        <i class="ri-dashboard-2-line"></i>
                        <span data-key="t-dashboards">Tableau de bord</span>
                    </a>
                    <div class="collapse menu-dropdown {{ Request::is('index') ? 'show' : '' }}" id="sidebarDashboards">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{ url('index') }}"
                                    class="nav-link {{ Request::is('index') ? 'active' : '' }}" data-key="t-projects">
                                    Tableau de bord </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="menu-title"><i class="ri-more-fill"></i> <span data-key="t-pages">Pages</span>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link {{ Request::is('courrier') ? 'active' : '' }}{{ Request::is('add-courrier') ? 'active' : '' }}"
                        href="{{ url('courrier') }}">
                        <i class="ri-honour-line"></i> <span data-key="t-widgets">Courriers</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="widgets.html">
                        <i class="ri-honour-line"></i> <span data-key="t-widgets">Département</span>
                    </a>
                </li>

                <li class="menu-title"><i class="ri-more-fill"></i> <span data-key="t-pages">Paramètres</span>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link" href="widgets.html">
                        <i class="ri-honour-line"></i> <span data-key="t-widgets">Paramètres</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="widgets.html">
                        <i class="ri-honour-line"></i> <span data-key="t-widgets">Utilisateurs</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>

    <div class="sidebar-background"></div>
</div>
