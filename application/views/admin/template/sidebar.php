<div class="app-main">
    <div class="app-sidebar sidebar-shadow">
        <div class="app-header__logo">
            <div class="logo-src"></div>
            <div class="header__pane ml-auto">
                <div>
                    <button type="button" class="hamburger close-sidebar-btn hamburger--elastic"
                        data-class="closed-sidebar">
                        <span class="hamburger-box">
                            <span class="hamburger-inner"></span>
                        </span>
                    </button>
                </div>
            </div>
        </div>
        <div class="app-header__mobile-menu">
            <div>
                <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                    <span class="hamburger-box">
                        <span class="hamburger-inner"></span>
                    </span>
                </button>
            </div>
        </div>
        <div class="app-header__menu">
            <span>
                <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                    <span class="btn-icon-wrapper">
                        <i class="fa fa-ellipsis-v fa-w-6"></i>
                    </span>
                </button>
            </span>
        </div>
        <div class="scrollbar-sidebar">
            <div class="app-sidebar__inner">
                <ul class="vertical-nav-menu">
                    <li class="app-sidebar__heading"></li>
                    <li>
                        <a href="<?=base_url('admin/dashboard')?>" class="mm-active">
                            <i class="metismenu-icon pe-7s-rocket"></i>
                            Dashboard
                        </a>
                    </li>
                    <li class="app-sidebar__heading">Puskesmas</li>
                    <li>
                        <a href="#">
                            <i class="metismenu-icon pe-7s-diamond"></i>
                            Puskesmas
                            <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                        </a>
                        <ul>
                            <li>
                                <a href="<?=base_url('admin/puskesmas')?>">
                                    <i class="metismenu-icon"></i>
                                    Dashboard
                                </a>
                            </li>
                            <li>
                                <a href="<?=base_url('admin/puskesmas/ibuHamil')?>">
                                    <i class="metismenu-icon"></i>
                                    Data Ibu Hamil
                                </a>
                            </li>
                            <li>
                                <a href="<?=base_url('admin/puskesmas/pemeriksaanIbuHamil')?>">
                                    <i class="metismenu-icon">
                                    </i>Data Pemeriksaan Ibu Hamil
                                </a>
                            </li>
                            <li>
                                <a href="<?=base_url('admin/puskesmas/pasienRujukan')?>">
                                    <i class="metismenu-icon">
                                    </i>Data Pasien Rujukan Ibu Hamil
                                </a>
                            </li>
                            <li>
                                <a href="<?=base_url('admin/puskesmas/dataPetugas')?>">
                                    <i class="metismenu-icon">
                                    </i>Data Petugas Puskesmas
                                </a>
                            </li>
                            <li>
                                <a href="<?=base_url('admin/puskesmas/laporanPuskesmas')?>">
                                    <i class="metismenu-icon">
                                    </i>Laporan Puskesmas
                                </a>
                            </li>

                        </ul>
                    </li>
                    <li class="app-sidebar__heading">Posyandu</li>
                    <li>
                        <a href="#">
                            <i class="metismenu-icon pe-7s-car"></i>
                            Posyandu
                            <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                        </a>
                        <ul>
                            <li>
                                <a href="<?=base_url('admin/posyandu')?>">
                                    <i class="metismenu-icon">
                                    </i>Dashboard
                                </a>
                            </li>
                            <li>
                                <a href="<?=base_url('admin/posyandu/jadwalPosyandu')?>">
                                    <i class="metismenu-icon">
                                    </i>Data Jadwal Posyandu
                                </a>
                            </li>
                            <li>
                                <a href="<?=base_url('admin/posyandu/wilayahPosyandu')?>">
                                    <i class="metismenu-icon">
                                    </i>Wilayah Posyandu
                                </a>
                            </li>
                            <li>
                                <a href="<?=base_url('admin/posyandu/dataPetugas')?>">
                                    <i class="metismenu-icon">
                                    </i>Data Petugas Posyandu
                                </a>
                            </li>
                            <li>
                                <a href="<?=base_url('admin/posyandu/daftarPasien')?>">
                                    <i class="metismenu-icon">
                                    </i>Pendaftaran Pasien Posyandu
                                </a>
                            </li>
                            <li>
                                <a href="<?=base_url('admin/posyandu/pencatatanMedis')?>">
                                    <i class="metismenu-icon">
                                    </i>Pencatatan Medis Posyandu
                                </a>
                            </li>

                            <li>
                                <a href="<?=base_url('admin/posyandu/pasienRujukan')?>">
                                    <i class="metismenu-icon">
                                    </i>Data Pasien Rujukan Posyandu
                                </a>
                            </li>
                            <li>
                                <a href="<?=base_url('admin/posyandu/laporan')?>">
                                    <i class="metismenu-icon">
                                    </i>Laporan Posyandu
                                </a>
                            </li>
                            <li>
                                <a href="<?=base_url('admin/posyandu/historyLaporan')?>">
                                    <i class="metismenu-icon">
                                    </i>History Laporan Posyandu
                                </a>
                            </li>


                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>
