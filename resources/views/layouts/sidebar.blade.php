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

                <li class="menu-item {{ request()->is('admin/barang*') ? 'active open' : ''}} {{ request()->is('admin/kategori*') ? 'active open' : ''}} {{ request()->is('admin/stock*') ? 'active open' : ''}}">
                    <a href="javascript:void(0);" class="menu-link menu-toggle">
                        <i class="menu-icon tf-icons bx bx-box"></i>
                        <div data-i18n="master">Master Barang</div>
                    </a>

                    <ul class="menu-sub ">
                        <li class="menu-item {{ request()->is('admin/barang*') ? 'active' : ''}}">
                            <a href="{{route('barang.index')}}" class="menu-link">
                                <div data-i18n="barang">Barang</div>
                            </a>
                        </li>
                        <li class="menu-item {{ request()->is('admin/kategori*') ? 'active' : ''}}">
                            <a href="{{route('kategori.index')}}" class="menu-link">
                                <div data-i18n="kategori">Kategori</div>
                            </a>
                        </li>
                        <li class="menu-item {{ request()->is('admin/stock*') ? 'active' : ''}}">
                            <a href="{{route('stock.index')}}" class="menu-link">
                                <div data-i18n="stock">Stock</div>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="menu-item {{ request()->is('admin/pesanan*') ? 'active open' : ''}} {{ request()->is('admin/riwayat-pesanan*') ? 'active open' : ''}} ">
                    <a href="javascript:void(0);" class="menu-link menu-toggle">
                        <i class="menu-icon tf-icons bx bx-mail-send"></i>
                        <div data-i18n="transaksi">Transaksi</div>
                    </a>

                    <ul class="menu-sub">
                        <li class="menu-item {{ request()->is('admin/pesanan*') ? 'active' : ''}}">
                            <a href="{{route('pesanan.index')}}" class="menu-link">
                                <div data-i18n="pesanan">Pesanan</div>
                            </a>
                        </li>
                        <li class="menu-item {{ request()->is('admin/pembayaran*') ? 'active' : ''}}">
                            <a href="{{route('pembayaran.index')}}" class="menu-link">
                                <div data-i18n="pembayaran">Pembayaran</div>
                            </a>
                        </li>
                        <li class="menu-item {{ request()->is('admin/riwayat-pesanan') ? 'active' : ''}}">
                            <a href="{{route('admin.pesanan.history')}}" class="menu-link">
                                <div data-i18n="history">History</div>
                            </a>
                        </li>
                    </ul>
                </li>


                <!-- Menu Lainnya -->
                <li class="menu-header small text-uppercase">
                    <span class="menu-header-text">Menu Lainnya</span>
                </li>


                <li class="menu-item">
                    <a href="{{route('konsumen.index')}}" class="menu-link">
                        <i class="menu-icon tf-icons bx bx-group"></i>
                        <div data-i18n="Analytics">Konsumen</div>
                    </a>
                </li>
                <!-- END Menu Lainnya -->
            </ul>

            @elseif(auth()->user()->type === "pimpinan")
            <ul class="menu-inner py-1">
                <li class="menu-header small text-uppercase">
                    <span class="menu-header-text">Menu Utama</span>
                </li>
                <li class="menu-item {{ request()->is('pimpinan/laporan*') ? 'active open' : ''}}">
                    <a href="javascript:void(0);" class="menu-link menu-toggle">
                        <i class="menu-icon tf-icons bx bxs-report"></i>
                        <div data-i18n="laporan">Laporan</div>
                    </a>
                    <ul class="menu-sub">
                        <li class="menu-item {{ request()->is('pimpinan/laporan/stock') ? 'active' : ''}}">
                            <a href="{{route('pimpinan.pesanan.laporan_stock')}}" class="menu-link">
                                <div data-i18n="laporan penjualan">Laporan Stock</div>
                            </a>
                        </li>
                        <li class="menu-item {{ request()->is('pimpinan/laporan/transaksi') ? 'active' : ''}}">
                            <a href="{{route('pimpinan.pesanan.laporan_transaksi')}}" class="menu-link">
                                <div data-i18n="laporan stock">Laporan Transaksi</div>
                            </a>
                        </li>
                        <li class="menu-item {{ request()->is('pimpinan/laporan/jurnal-umum') ? 'active' : ''}}">
                            <a href="{{route('pimpinan.pesanan.jurnal-umum')}}" class="menu-link">
                                <div data-i18n="Jurnal Umum">Jurnal Umum</div>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
            @endif


        </aside>
        <!-- / Menu -->
