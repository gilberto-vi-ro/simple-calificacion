<?php 
    include_once "config.php"; 
    session_start(); if (!$_SESSION['data_admin']) header("Location: ".BASE_URL."login.php");
    
    $currentFile = basename(__FILE__);
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
        <title>CECYT 42</title>
	    <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="css/plugins/bootstrap.min.css">
	    <!----css3---->
        <link rel="stylesheet" href="css/plugins/custom.css">
		<!-- Styles-->
        <link rel="stylesheet" href="css/color.css">
        <link rel="stylesheet" href="css/style.css">
	
        <!--google material icon-->
        <!-- https://fontawesome.com/v5/search?o=r&m=free -->
        <link rel="stylesheet" type="text/css" href="css/plugins/ka-f.fontawesome.v5.15.4.free.min.css">
</head>
<body>
    <!-- Loader  -->
    <?php include_once "include/loader.php" ?>
  
    <div class="wrapper">

        <!-- Sidebar  -->
        <?php include_once "include/sidebar.php" ?>
        <!-- Page Content  -->
        <div id="content">
            
            <!-- Topbar  -->
            <?php $titleTopbar="Calficaciones del alumno"; include_once "include/topbar.php"; ?>
                
            <div class="main-content">
                <div class="" style="overflow: auto;"> 
                    <div class="row content-bg no-wrap" style="min-width: 770px;">
                        <div class="col-4 p-0">
                            <div class="card" style="height:535px">
                                <div class="row-flex card-title">
                                    <p class="">Nombre del alumno</p>
                                    <i class="fas fa-plus-circle" style="font-size: 20px;cursor:pointer" data-toggle="modal" data-target="#modalAddAlumno"></i>
                                </div>
                                <div id="cardContentAlumnos" class="card-content">
                                    <!-- <div class="sl-item active">
                                        <div class="sl-content">
                                            <p>
                                                <i class="fas fa-user-graduate"  style="margin-right: 5px;"></i>
                                                John has finished his task hgh
                                            </p>
                                            <p>6 semestre grupo A</p>
                                        </div>
                                        <div class="sl-edit">
                                            <i class="fas fa-edit" data-toggle="modal" data-target="#modalEditAlumno"></i>
                                            <i class="fas fa-trash-alt" data-toggle="modal" data-target="#modalDeleteAlumno"></i>
                                        </div>
                                    </div> -->
                                </div>
                            </div>
                        </div>

                        <div class="col-4 p-0">
                            <div class="card" style="height:535px">
                                <div class="row-flex card-title">
                                    <p class="">Asignatura</p>
                                    <i class="fas fa-plus-circle" style="font-size: 20px;cursor:pointer" data-toggle="modal" data-target="#modalAddAsignaturaCalificacion" onclick="findSubjectsQualification()"></i>
                                </div>
                                <div id="cardContentAsignaturas" class="card-content">
                                    <!-- <div class="sl-item">
                                        <div class="sl-content">
                                            <p>
                                                <i class="fas fa-book-open" style="margin-right: 5px;"></i>
                                                John has finished his task
                                            </p>
                                        </div>
                                        <div class="sl-edit">
                                            <i class="fas fa-edit" data-toggle="modal" data-target="#modalEditAsignaturaCalificacion"></i>
                                            <i class="fas fa-trash-alt" data-toggle="modal" data-target="#modalDeleteAsignaturaCalificacion"></i>
                                        </div>
                                    </div> -->
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-4 p-0">
                            <div class="card" style="height:535px">
                                <div class="row-flex card-title">
                                    <p class="">Calficacion</p>
                                </div>
                                <div id="cardContentCalificaciones" class="card-content">
                                    <!-- <div class="sl-item">
                                        <div class="sl-content">
                                            <p>
                                                <i class="fas fa-check-circle" style="margin-right: 5px;"></i>
                                                10
                                            </p>
                                        </div>
                                    </div> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Footer -->
                <?php include_once "include/footer.php" ?>
                
                <!-- modalAddStudent -->
                <?php include_once "include/students/modalAddStudent.php" ?>
                <!-- modalAddSubjectsQualification -->
                <?php include_once "include/students/modalAddSubjectsQualification.php" ?>
                <!-- modalEditStudent -->
                <?php include_once "include/students/modalEditStudent.php" ?>
                <!-- modalEditSubjectsQualification -->
                <?php include_once "include/students/modalEditSubjectsQualification.php" ?>
                <!-- modalDeleteStudent -->
                <?php include_once "include/students/modalDeleteStudent.php" ?>
                <!-- modalDeleteSubjectsQualification -->
                <?php include_once "include/students/modalDeleteSubjectsQualification.php" ?>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Bootstrap JS -->
    <script>var BASE_URL="<?=BASE_URL?>";</script>
    <script src="js/plugins/jquery.min.3.3.1.js"></script>
    <script src="js/plugins/bootstrap.min.js"></script>
    <script src="js/all.js"></script>
    <script src="js/students.js"></script>

</body>
</html>


