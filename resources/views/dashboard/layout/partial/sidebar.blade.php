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
                    <a class="nav-link menu-link {{ Request::is('dashboard*') ? 'active' : '' }}" href="/dashboard">
                        <i class="ri-dashboard-fill"></i> <span data-key="t-landing">Dashboard</span>
                    </a>
                </li>

                @can('admin')
                <li class="nav-item">
                    <a class="nav-link menu-link {{ Request::is('sales*') ? 'active' : '' }}" href="/sales">
                        <i class="ri-team-fill"></i> <span data-key="t-landing">Sales</span>
                    </a>
                </li>
                <li class="menu-title"><span data-key="t-menu">Inventori</span></li>
                <li class="nav-item">
                    <a class="nav-link menu-link {{ Request::is('barang*') ? 'active' : '' }}" href="/barang">
                        <i class="ri-store-2-fill"></i> <span data-key="t-landing">Barang</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link {{ Request::is('mentahan_barang*') ? 'active' : '' }}"
                        href="/mentahan_barang">
                        <i class="ri-inbox-archive-fill"></i> <span data-key="t-landing">Barang Mentahan</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link {{ Request::is('jok_aksesoris_barang*') ? 'active' :'' }}"
                        href="/jok_aksesoris_barang">
                        <i class="ri-stack-fill"></i> <span data-key="t-landing">Jok / Aksesoris</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link {{ Request::is('packing_barang*') ? 'active' : '' }}"
                        href="/packing_barang">
                        <i class="ri-file-lock-fill"></i> <span data-key="t-landing">Packing / bungkus</span>
                    </a>
                </li>

                <li class="menu-title"><span data-key="t-menu">Produksi</span></li>
                <li class="nav-item">
                    <a class="nav-link menu-link {{ Request::is('mentahan') ? 'active' : '' }}" href="/mentahan">
                        <i class="ri-file-download-fill"></i> <span data-key="t-landing">Mentahan</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link {{ Request::is('finishing*') ? 'active' : '' }}" href="/finishing">
                        <i class="ri-radio-2-fill"></i> <span data-key="t-landing">Finishing</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link {{ Request::is('jok*') ? 'active' : '' }}" href="/jok">
                        <i class="ri-radio-2-fill"></i> <span data-key="t-landing">Jok</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link {{ Request::is('packing*') ? 'active' : '' }}" href="/packing">
                        <i class="ri-radio-2-fill"></i> <span data-key="t-landing">Packing</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link {{ Request::is('pengiriman*') ? 'active' : '' }}" href="/pengiriman">
                        <i class="ri-radio-2-fill"></i> <span data-key="t-landing">pengiriman</span>
                    </a>
                </li>
                @endcan
                <li class="menu-title"><span data-key="t-menu">Order</span></li>
                @can('admin')
                <li class="nav-item">
                    <a class="nav-link menu-link {{ Request::is('list_permintaan*') ? 'active' : '' }}"
                        href="/list_permintaan">
                        <i class="ri-checkbox-circle-fill"></i> <span data-key="t-landing">List permintaan</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link {{ Request::is('list_order*') ? 'active' : '' }}" href="/list_order">
                        <i class="ri-chat-download-fill"></i> <span data-key="t-landing">List order</span>
                    </a>
                </li>
                @endcan
                @can('sales')
                <li class="nav-item">
                    <a class="nav-link menu-link {{ Request::is('order*') ? 'active' : '' }}" href="/order">
                        <i class="ri-add-box-fill"></i> <span data-key="t-landing">Input Order</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link {{ Request::is('riwayatOrder*') ? 'active' : '' }}"
                        href="/riwayatOrder">
                        <i class="ri-alarm-fill"></i> <span data-key="t-landing">Riwayat Order</span>
                    </a>
                </li>
                @endcan
                @can('admin')
                <li class="menu-title"><span data-key="t-menu">Vendor</span></li>
                <li class="nav-item">
                    <a class="nav-link menu-link {{ Request::is('vendor*') ? 'active' : '' }}" href="/vendor">
                        <i class="ri-account-pin-box-fill"></i> <span data-key="t-landing">Vendor</span>
                    </a>
                </li>
                @endcan
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->