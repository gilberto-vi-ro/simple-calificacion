<div class="body-overlay"></div>
<nav id="sidebar" class="">
    <div class="sidebar-header bg-t">
        <h3><img src="img/logo.jpeg" class="img-fluid" style="border-radius: 100%;"/><span class="color-1">PLANTEL CECYT 42</span></h3>
    </div>
    <ul class="list-unstyled components">
        <li  class="<?=$currentFile=="home.php"?"active":""?>">
            <a href="<?=BASE_URL?>home.php" class="dashboard"><i class="fas fa-home" style="font-size:20px;top:2px"></i><span>Inicio</span></a>
        </li>
        <!-- <li class="dropdown">
            <a href="#pageSubmenu7" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
            <i class="material-icons">content_copy</i><span>Pages</span></a>
            <ul class="collapse list-unstyled menu" id="pageSubmenu7">
                <li>
                    <a href="#">Page 1</a>
                </li>
                <li>
                    <a href="#">Page 2</a>
                </li>
                <li>
                    <a href="#">Page 3</a>
                </li>
            </ul>
        </li> -->
        <li class="<?=$currentFile=="subjects.php"?"active":""?>">
            <a href="<?=BASE_URL?>subjects.php"><i class="fas fa-book-reader"  style="font-size:20px;top:2px"></i><span>Asignaturas</span></a>
        </li>
        <li class="<?=$currentFile=="students.php"?"active":""?>">
            <a href="<?=BASE_URL?>students.php"><i class="fas fa-user-graduate"  style="font-size:20px;top:2px"></i><span>Alumnos</span></a>
        </li>
        <li  class="">
            <a href="<?=BASE_URL?>login.php?logout"><i class="fas fa-sign-out-alt fa-rotate-180" style="font-size:20px;top:2px;"></i><span>Cerrar sesion</span></a>
        </li>
    </ul>
</nav>

    