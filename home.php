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
            <?php $titleTopbar="Inicio"; include_once "include/topbar.php"; ?>
                
            <div class="main-content">
                
                <div>
                    <img src="img/bg/cecyt42.jpeg" alt="" style="width: 100%;">
                </div>
                <!-- Footer -->
                <?php include_once "include/footer.php" ?>

                
            </div>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Bootstrap JS -->
    <script src="js/plugins/jquery.min.3.3.1.js"></script>
    <script src="js/plugins/bootstrap.min.js"></script>
  
  
    <script type="text/javascript">
        $(document).ready(function () {
                $('#sidebarCollapse').on('click', function () {
                    $('#sidebar').toggleClass('active');
                    $('#content').toggleClass('active');
                });
                
                    $('.more-button,.body-overlay').on('click', function () {
                    $('#sidebar,.body-overlay').toggleClass('show-nav');
                });
                
            });

    </script>

</body>
</html>


