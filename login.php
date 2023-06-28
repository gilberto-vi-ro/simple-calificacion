<?php
    include_once "config.php"; 
    if (isset($_REQUEST['logout']))
    {
        session_start();
        session_destroy();
    }


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
        <link rel="stylesheet" href="css/login.css">
        
	
        <!--google material icon-->
        <!-- https://fontawesome.com/v5/search?o=r&m=free -->
        <link rel="stylesheet" type="text/css" href="css/plugins/ka-f.fontawesome.v5.15.4.free.min.css">
</head>
<body>
    <!-- Loader  -->
    <?php include_once "include/loader.php" ?>
    
    <?php
    if (isset($_GET["signup"])){
    ?>
        <div class="container-login">
                <div class="login">
                    <div class="text-center mt-3 mb-3">
                            <label for="" class="mb-3 title-login">PLANTEL CECYT 42</label>
                    </div>
                    <div class="user_card">
                        <div class="d-flex justify-content-center">
                            <div class="brand_logo_container">
                                <i class="fas fa-user brand_logo"></i>
                            
                            </div>
                        </div>
                        <div class="d-flex justify-content-center form_container">
                            <form id="formRegisterAdmin" action="?registerAdmin&signup" method="POST" onsubmit="registerAdmin(event)">
                                <div class="input-group mb-3">
                                    <div class="input-group-append">
                                        <span class="input-group-icon"><i class="fas fa-user"></i></span>
                                    </div>
                                    <input type="text" name="nombre" class="form-control login-input" value="" placeholder="Nombre" required>
                                </div>
                                <div class="input-group mb-2">
                                    <div class="input-group-append">
                                        <span class="input-group-icon"><i class="fas fa-user"></i></span>
                                    </div>
                                    <input type="text" name="apellido" class="form-control login-input" value="" placeholder="Apellido" required>
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-append">
                                        <span class="input-group-icon"><i class="fas fa-lock"></i></span>
                                    </div>
                                    <input type="text" name="usuario" class="form-control login-input" value="" placeholder="Usuario" required>
                                </div>
                                <div class="input-group mb-2">
                                    <div class="input-group-append">
                                        <span class="input-group-icon"><i class="fas fa-key"></i></span>
                                    </div>
                                    <input type="password" name="contrasena" class="form-control login-input" value="" placeholder="Contraseña" required>
                                </div>
                                <div class="form-group">
                                    <div class="custom-control text-right mb-5 mt-3">
                                        <a href="?" class="link-color ml-2">Login</a>
                                    </div>
                                    <!-- <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customControlInline">
                                        <label class="custom-control-label" for="customControlInline">Remember me</label>
                                    </div> -->
                                </div>
                                <div class="d-flex justify-content-center mt-3">
                                    <button type="submit" name="button" class="btn login_btn">Registrarse</button>
                                </div>
                            </form>
                        </div>
                
                        <!-- <div class="mt-4">
                            <div class="d-flex justify-content-center links">
                                Don't have an account? <a href="#" class="ml-2">Sign Up</a>
                            </div>
                            <div class="d-flex justify-content-center links">
                                <a href="#">Forgot your password?</a>
                            </div>
                        </div> -->
                    </div>
                </div>
        </div>
    <?php
    }else{
    ?>
        <div class="container-login">
                <div class="login">
                    <div class="text-center mt-3 mb-3">
                            <label for="" class="mb-3 title-login">PLANTEL CECYT 42</label>
                    </div>
                    <div class="user_card">
                        <div class="d-flex justify-content-center">
                            <div class="brand_logo_container">
                                <i class="fas fa-user brand_logo"></i>
                            
                            </div>
                        </div>
                        <div class="d-flex justify-content-center form_container">
                            <form id="formLogin" action="?login" method="POST" onsubmit="login(event)">
                                <div class="input-group mb-3">
                                    <div class="input-group-append">
                                        <span class="input-group-icon"><i class="fas fa-lock"></i></span>
                                    </div>
                                    <input type="text" name="usuario" class="form-control login-input" value="" placeholder="Usuario" required>
                                </div>
                                <div class="input-group mb-2">
                                    <div class="input-group-append">
                                        <span class="input-group-icon"><i class="fas fa-key"></i></span>
                                    </div>
                                    <input type="password" name="contrasena" class="form-control login-input" value="" placeholder="Contraseña" required>
                                </div>
                                <div class="form-group">
                                    <div class="custom-control text-right mb-5 mt-3">
                                        <a href="?signup" class="link-color ml-2">Registrarse</a>
                                    </div>
                                    <!-- <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customControlInline">
                                        <label class="custom-control-label" for="customControlInline">Remember me</label>
                                    </div> -->
                                </div>
                                <div class="d-flex justify-content-center mt-3">
                                    <button type="submit" name="button" class="btn login_btn">Acceder</button>
                                </div>
                            </form>
                        </div>
                
                        <!-- <div class="mt-4">
                            <div class="d-flex justify-content-center links">
                                Don't have an account? <a href="#" class="ml-2">Sign Up</a>
                            </div>
                            <div class="d-flex justify-content-center links">
                                <a href="#">Forgot your password?</a>
                            </div>
                        </div> -->
                    </div>
                </div>
        </div>
    <?php
    }
    ?>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Bootstrap JS -->
    <script>var BASE_URL="<?=BASE_URL?>";</script>
    <script src="js/plugins/jquery.min.3.3.1.js"></script>
    <script src="js/all.js"></script>

    <script>

        function registerAdmin(e){
            e.preventDefault();
            let form = new FormData(document.getElementById('formRegisterAdmin'));
            // form.append('addNewTask', 1 ); 
            let res = loadAjax(BASE_URL+"db/registerAdmin", "POST" , form);
            res = JSON.parse(res);
            alert(res.message);
            if(res.status=="success")
                window.location.href= BASE_URL+"login.php";
        }

        function login(e){
            e.preventDefault();
            let form = new FormData(document.getElementById('formLogin'));
            // form.append('addNewTask', 1 ); 
            let res = loadAjax(BASE_URL+"db/login", "POST" , form);
            res = JSON.parse(res);
            alert(res.message);
            if(res.status=="success")
                window.location.href= BASE_URL+"home.php";
        }
        
 
    </script>
</body>
</html>


