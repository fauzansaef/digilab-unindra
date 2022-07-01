<div class="page-header navbar navbar-fixed-top">
    <!--                 BEGIN HEADER INNER -->
    <div class="page-header-inner ">
        <!--                     BEGIN LOGO -->
        <div class="page-logo">
            <a href="/perpustakaan/">
                <img src="../assets/layouts/layout/img/logo-digilib.png" alt="logo" class="logo-default" style="margin-top: -50px; width:150px;height:150px;"> </a>
            <div class="menu-toggler sidebar-toggler">
                <span></span>
            </div>
        </div>
        <!--                     END LOGO 
                             BEGIN RESPONSIVE MENU TOGGLER -->
        <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse">
            <span></span>
        </a>
        <!--                     END RESPONSIVE MENU TOGGLER 
                             BEGIN TOP NAVIGATION MENU -->
        <div class="top-menu">
            <ul class="nav navbar-nav pull-right">
                <li class="dropdown dropdown-user">
                    <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                        <img alt="" class="img-circle" />
                        <span class="username username-hide-on-mobile" id = "username" ">

						<?php echo "" . $_SESSION["username"] . "";?>
						</span>
                        <i class="fa fa-angle-down"></i>
						<?php echo '<input hidden type="text" id=sessionIdPetugas readonly value="'.$_SESSION['id_petugas'].'"></input>'; ?>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-default">
                        
                        <li>
                            <a href="<?= BASE_URL ?>/logout.php">
                                <i class="icon-logout"></i> Log Out </a>
                        </li>
                    </ul>
                </li>
        </div>
<!--        END TOP NAVIGATION MENU -->
    </div>
<!--    END HEADER INNER -->
</div>

