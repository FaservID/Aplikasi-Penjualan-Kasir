        <!-- Menu -->

        <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
            <div class="app-brand demo">
                <a href="index.html" class="app-brand-link">
                    <!-- <span class="app-brand-logo demo">
                
              </span> -->
                    <span class="app-brand-text demo menu-text fw-bolder ms-2">TokoKasur</span>
                </a>

                <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
                    <i class="bx bx-chevron-left bx-sm align-middle"></i>
                </a>
            </div>

            <div class="menu-inner-shadow"></div>



            @if(auth()->user()->type === "admin")

            <ul class="menu-inner py-1">
                <!-- Dashboard -->
                <li class="menu-item {{ request()->is('admin/home') ? 'active' : ''}}">
                    <a href="{{route('admin.home')}}" class="menu-link">
                        <i class="menu-icon tf-icons bx bx-home-circle"></i>
                        <div data-i18n="Analytics">Beranda</div>
                    </a>
                </li>

                <!-- Menu Utama -->
                <li class="menu-header small text-uppercase">
                    <span class="menu-header-text">Menu Utama</span>
                </li>
                <!-- Layouts -->

                <li class="menu-item {{ request()->is('admin/barang*') ? 'active open' : ''}} {{ request()->is('admin/kategori*') ? 'active open' : ''}}">
                    <a href="javascript:void(0);" class="menu-link menu-toggle">
                        <i class="menu-icon tf-icons bx bx-box"></i>
                        <div data-i18n="master">Master Barang</div>
                    </a>

                    <ul class="menu-sub ">
                        <li class="menu-item {{ request()->is('admin/barang*') ? 'active' : ''}}">
                            <a href="{{route('barang.index')}}" class="menu-link">
                                <div data-i18n="barang">barang</div>
                            </a>
                        </li>
                        <li class="menu-item {{ request()->is('admin/kategori*') ? 'active' : ''}}">
                            <a href="{{route('kategori.index')}}" class="menu-link">
                                <div data-i18n="kategori">kategori</div>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="menu-item">
                    <a href="javascript:void(0);" class="menu-link menu-toggle">
                        <i class="menu-icon tf-icons bx bx-mail-send"></i>
                        <div data-i18n="transaksi">Transaksi</div>
                    </a>

                    <ul class="menu-sub">
                        <li class="menu-item">
                            <a href="#" class="menu-link">
                                <div data-i18n="pesanan">Pesanan</div>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="#" class="menu-link">
                                <div data-i18n="history">History</div>
                            </a>
                        </li>
                    </ul>
                </li>

                {{-- <li class="menu-item">
                    <a href="javascript:void(0);" class="menu-link menu-toggle">
                        <i class="menu-icon tf-icons bx bx-book"></i>
                        <div data-i18n="buku agenda">Buku Agenda</div>
                    </a>

                    <ul class="menu-sub">
                        <li class="menu-item">
                            <a href="#" class="menu-link">
                                <div data-i18n="Surat Masuk">Surat Masuk</div>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="#" class="menu-link">
                                <div data-i18n="Surat Keluar">Surat Keluar</div>
                            </a>
                        </li>
                    </ul>
                </li> --}}

                <!-- END Menu Utama -->

                <!-- Menu Lainnya -->
                <li class="menu-header small text-uppercase">
                    <span class="menu-header-text">Menu Lainnya</span>
                </li>
                <li class="menu-item">
                    <a href="javascript:void(0);" class="menu-link menu-toggle">
                        <i class="menu-icon tf-icons bx bxs-report"></i>
                        <div data-i18n="laporan">Laporan</div>
                    </a>
                    <ul class="menu-sub">
                        <li class="menu-item">
                            <a href="#" class="menu-link">
                                <div data-i18n="laporan penjualan">Laporan Penjualan</div>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="#" class="menu-link">
                                <div data-i18n="laporan stock">Laporan Stock</div>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="menu-item">
                    <a href="#" class="menu-link">
                        <i class="menu-icon tf-icons bx bx-group"></i>
                        <div data-i18n="Analytics">Konsumen</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="#" class="menu-link">
                        <i class="menu-icon tf-icons bx bx-user-circle"></i>
                        <div data-i18n="Analytics">Profle</div>
                    </a>
                </li>
                <!-- END Menu Lainnya -->
            </ul>

            @endif


        </aside>
        <!-- / Menu -->
