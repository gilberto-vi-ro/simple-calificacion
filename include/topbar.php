<div class="top-navbar">
    <nav class="bg-primary navbar navbar-expand-md">
        <div class="container-fluid">

            <button type="button" id="sidebarCollapse" class="d-xl-block d-lg-block d-md-block d-sm-none d-none">
                <i class="fas fa-chevron-left"></i>
            </button>
            
            <a class="navbar-brand" href="#"><?=$titleTopbar?></a>
            
            <button class="d-inline-block d-md-none ml-auto more-button" type="button" data-toggle="collapse"
            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class=""><i class="fas fa-bars" style="font-size: 20px;"></i></span>
            </button>

            <div class="collapse navbar-collapse d-lg-block d-xl-block d-md-block d-sm-none d-none" id="navbarSupportedContent">
                <ul class="nav navbar-nav ml-auto">   
                    <li class="dropdown nav-item active">
                        <a href="#" class="nav-link" data-toggle="dropdown">
                            <i class="fas fa-user-circle" style="font-size: 25px;"></i>
                        <!-- <span class="notification">4</span> -->
                        </a>
                        <ul class="dropdown-menu">
                            <li class="">
                                <a href="#" class="color-1">
                                    <i class="fas fa-user-circle" style="font-size: 20px;padding:5px 10px 5px 0px;"></i><span style="position:relative;top:-3px"><?=$_SESSION["data_admin"]["nombre"]." ".$_SESSION["data_admin"]["apellido"]?></span>
                                </a>
                            </li>
                            <li  class="">
                                <a href="<?=BASE_URL?>login.php?logout" class="color-1">
                                    <i class="fas fa-sign-out-alt fa-rotate-180" style="font-size: 20px;padding:5px 0px 5px 10px;"></i><span style="position:relative;top:-3px">Cerrar sesion</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <!-- <li class="nav-item">
                        <a class="nav-link" href="#">
                        <i class="fas fa-user-circle" style="font-size: 25px;"></i>
                        </a>
                    </li> -->
                </ul>
            </div>
        </div>
    </nav>
</div>