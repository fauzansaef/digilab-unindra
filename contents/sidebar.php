
<div class="page-sidebar-wrapper">
    <!--             BEGIN SIDEBAR -->
    <div class="page-sidebar navbar-collapse collapse">
        <!--        BEGIN SIDEBAR MENU -->
        <ul class="page-sidebar-menu  page-header-fixed " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200" style="padding-top: 20px">
            <!--                     DOC: To remove the sidebar toggler from the sidebar you just need to completely remove the below "sidebar-toggler-wrapper" LI element 
                                 BEGIN SIDEBAR TOGGLER BUTTON -->
            <li class="sidebar-toggler-wrapper hide">
                <div class="sidebar-toggler">
                    <span></span>
                </div>
            </li>

            <li class="nav-item ">
                <a href="/perpustakaan/" class="nav-link nav-toggle">
                    <i class="icon-home"></i>
                    <span class="title">Dashboard</span>
                </a>

            </li>
            <li class="heading">
                <h3 class="uppercase">Features</h3>
            </li>

            <li class="nav-item ">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="fa fa-database"></i>
                    <span class="title">Data Master</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu" <?php if($menu=='data_master'){echo 'style="display: block;"';}?>>
                    <li class="nav-item">
                        <a href="javascript:;" class="nav-link nav-toggle">
                            <i class="fa fa-book"></i>
                            <span class="title">Buku</span>
                            <span class="arrow"></span>
                        </a>
                        <ul class="sub-menu"  <?php if($page=='buku_view'){echo 'style="display: block;"';}?>>
                            <li class="nav-item  <?php if($page=='buku_view'){echo 'active open';}?>">
                                <a href="<?= BASE_URL ?>master/buku_view.php" class="nav-link ">
                                    <span class="title">Input Data Buku</span>
                                </a>
                            </li>

                        </ul>
                    </li>
					
					

                    <li class="nav-item  ">
                        <a href="javascript:;" class="nav-link nav-toggle">
                            <i class="fa fa-user"></i>
                            <span class="title">Anggota</span>
                            <span class="arrow"></span>
                        </a>
                        <ul class="sub-menu" <?php if($page=='anggota_view'){echo 'style="display: block;"';}?>>
                            <li class="nav-item <?php if($page=='anggota_view'){echo 'active open';}?>" >
                                <a href="<?= BASE_URL ?>master/anggota_view.php" class="nav-link ">
                                    <span class="title">Input Data Anggota</span>
                                </a>
                            </li>

                        </ul>
                    </li>

                </ul>
            </li>

            <li class="nav-item  ">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="fa fa-exchange"></i>
                    <span class="title">Transaksi</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu"  <?php if($menu=='data_transaksi'){echo 'style="display: block;"';}?>>


                    <li class="nav-item  ">
                        <a href="javascript:;" class="nav-link nav-toggle">
                            <i class="fa fa-arrow-right"></i>
                            <span class="title">Peminjaman</span>
                            <span class="arrow"></span>
                        </a>
                        <ul class="sub-menu" <?php if($submenu=='peminjaman'){echo 'style="display: block;"';}?>>
                            <li class="nav-item <?php if($page=='peminjaman_view'){echo 'active open';}?>">
                                <a href="<?= BASE_URL ?>transaksi/peminjaman_view.php" class="nav-link ">
                                    <span class="title">Input Peminjaman</span>
                                </a>
                            </li>
                            <li class="nav-item  <?php if($page=='laporan_peminjaman_view'){echo 'active open';}?>">
                                <a href="<?= BASE_URL ?>laporan/laporan_peminjaman_view.php" class="nav-link ">
                                    <span class="title">Laporan Peminjaman</span>
                                </a>
                            </li>
                        </ul>
                    </li>


                    <li class="nav-item  ">
                        <a href="javascript:;" class="nav-link nav-toggle">
                            <i class="fa fa-arrow-left"></i>
                            <span class="title">Pengembalian</span>
                            <span class="arrow"></span>
                        </a>
                        <ul class="sub-menu" <?php if($submenu=='pengembalian'){echo 'style="display: block;"';}?>>
						
						 <li class="nav-item  <?php if($page=='pengembalian_view'){echo 'active open';}?>">
                                <a href="<?= BASE_URL ?>transaksi/pengembalian_view.php" class="nav-link ">
                                    <span class="title">Input Pengembalian</span>
                                </a>
                         </li>
						 
                         <li class="nav-item <?php if($page=='laporan_pengembalian_view'){echo 'active open';}?> ">
                                <a href="<?= BASE_URL ?>laporan/laporan_pengembalian_view.php" class="nav-link ">
                                    <span class="title">Laporan Pengembalian</span>
                                </a>
                         </li>

                        </ul>
                    </li>

                </ul>
            </li>

			<li class="nav-item  ">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="fa fa-info"></i>
                    <span class="title">About Us</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu"  <?php if($menu=='aboutus'){echo 'style="display: block;"';}?>>
					  <li class="nav-item  ">
                        <a href="javascript:;" class="nav-link nav-toggle">
                            <i class="fa fa fa-list-alt"></i>
                            <span class="title">About Us</span>
                            <span class="arrow"></span>
                        </a>
                        <ul class="sub-menu"<?php if($submenu=='about_us'){echo 'style="display: block;"';}?>>
						 <li class="nav-item   <?php if($page=='about_us_view'){echo 'active open';}?> ">
                                <a href="<?= BASE_URL ?>aboutus/about_us.php" class="nav-link ">
                                    <span class="title">Penjelasan Aplikasi</span>
                                </a>
                            </li>
                           

                        </ul>
                    </li>

                </ul>
            </li>
        </ul>
        <!--                 END SIDEBAR MENU 
                         END SIDEBAR MENU -->
    </div>
    <!--             END SIDEBAR -->
</div>
