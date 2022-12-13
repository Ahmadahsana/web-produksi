<div class="app-menu navbar-menu">
    <!-- LOGO -->
    <div class="navbar-brand-box">
        <!-- Dark Logo-->
        <a href="/dashboard" class="logo logo-dark">
            <span class="logo-sm">
                <img src="{{ url('assets/images/logo-sm.png') }}" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="{{ url('assets/images/logo-dark.png') }}" alt="" height="17">
            </span>
        </a>
        <!-- Light Logo-->
        <a href="/dashboard" class="logo logo-light">
            <span class="logo-sm">
                <img src="{{ url('assets/images/logo-sm.png') }}" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="{{ url('assets/images/logo-light.png') }}" alt="" height="17">
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
                {{-- <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarDashboards" data-bs-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="sidebarDashboards">
                        <i class="ri-dashboard-2-line"></i> <span data-key="t-dashboards">Dashboards</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarDashboards">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="dashboard-analytics.html" class="nav-link" data-key="t-analytics"> Analytics
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="dashboard-crm.html" class="nav-link" data-key="t-crm"> CRM </a>
                            </li>

                            <li class="nav-item">
                                <a href="dashboard-crypto.html" class="nav-link" data-key="t-crypto"> Crypto </a>
                            </li>
                            <li class="nav-item">
                                <a href="dashboard-projects.html" class="nav-link" data-key="t-projects"> Projects </a>
                            </li>
                        </ul>
                    </div>
                </li> <!-- end Dashboard Menu --> --}}


                <li class="nav-item">
                    <a class="nav-link menu-link {{ Request::is('dashboard') ? 'active' : '' }}" href="/dashboard">
                        <i class="ri-dashboard-fill"></i> <span data-key="t-landing">Dashboard</span>
                    </a>
                </li>


                @can('admin')
                <li class="nav-item">
                    <a class="nav-link menu-link {{ Request::is('sales*') ? 'active' : '' }}" href="/sales">
                        <i class="ri-team-fill"></i> <span data-key="t-landing">Sales</span>
                    </a>
                </li>
                @endcan

                @can('admin')
                <li class="menu-title"><span data-key="t-menu">Inventori</span></li>
                <li class="nav-item">
                    <a class="nav-link menu-link {{ Request::is('barang') ? 'active' : '' }}" href="/barang">
                        <i class="ri-store-2-fill"></i> <span data-key="t-landing">Barang</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link {{ Request::is('barang') ? 'active' : '' }}" href="/barang">
                        <i class="ri-store-2-fill"></i> <span data-key="t-landing">Mentahan</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link {{ Request::is('barang') ? 'active' : '' }}" href="/barang">
                        <i class="ri-store-2-fill"></i> <span data-key="t-landing">Jok / Aksesoris</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link {{ Request::is('barang') ? 'active' : '' }}" href="/barang">
                        <i class="ri-store-2-fill"></i> <span data-key="t-landing">Packing / bungkus</span>
                    </a>
                </li>
                @endcan

                <li class="menu-title"><span data-key="t-menu">Produksi</span></li>
                <li class="nav-item">
                    <a class="nav-link menu-link {{ Request::is('order') ? 'active' : '' }}" href="/order">
                        <i class="ri-shopping-cart-2-fill"></i> <span data-key="t-landing">Input order</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link {{ Request::is('list_permintaan') ? 'active' : '' }}"
                        href="/list_permintaan">
                        <i class="ri-chat-forward-fill"></i> <span data-key="t-landing">List permintaan</span>
                        <span class="badge badge-pill bg-danger" data-key="t-new">New</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link {{ Request::is('list_order') ? 'active' : '' }}" href="/list_order">
                        <i class="ri-chat-download-fill"></i> <span data-key="t-landing">List order</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link {{ Request::is('order_sales') ? 'active' : '' }}" href="/order_sales">
                        <i class="ri-contacts-fill"></i> <span data-key="t-landing">Order sales</span>
                    </a>
                </li>

            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->