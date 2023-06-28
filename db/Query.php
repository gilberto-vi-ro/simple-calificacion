<?php 
    require "../config.php";
    require "DB.php";

    class Query extends DB{

        public function index($p=null)
        {
            echo "Saludos desde Query->index($p)";
        }
    
        public function getAsignaturas()
        {
            $asignaturas = $this->setFetch(PDO::FETCH_ASSOC)->show("asignaturas","*","ORDER BY id_asignatura DESC")->response;
            if ($asignaturas)
                $this->responseJson("success","Datos procesados",$asignaturas);
            else 
                $this->responseJson("failed","Ocurrio un error al mostrar los datos");
        }

        public function addAsignatura(){
            $colAsignatura["asignatura"] = $_REQUEST["asignatura"] ;
			$asignatura = $this->insert("asignaturas",$colAsignatura)->response;
            if ($asignatura)
                $this->responseJson("success","Datos agregados",$asignatura);
            else 
                $this->responseJson("failed","Ocurrio un error al agregar");
        }

        public function editAsignatura(){
            $colAsignatura["asignatura"] = $_REQUEST["asignatura"] ;
			$asignatura = $this->update("asignaturas",$colAsignatura,"id_asignatura=".$_REQUEST["id_asignatura"])->response;
            if ($asignatura)
                $this->responseJson("success","Datos actualizados",$asignatura);
            else 
                $this->responseJson("failed","Ocurrio un error al actualizar");
        }

        public function deleteAsignatura($id){
           
			$asignatura = $this->delete("asignaturas","id_asignatura=".$id)->response;
            if ($asignatura)
                $this->responseJson("success","Datos eliminados",$asignatura);
            else 
                $this->responseJson("failed","Ocurrio un error al eliminar");
        }

        public function getAlumnos()
        {
            $alumnos = $this->setFetch(PDO::FETCH_ASSOC)->show("alumnos","*","ORDER BY id_alumno DESC")->response;
            if ($alumnos)
                $this->responseJson("success","Datos procesados",$alumnos);
            else 
                $this->responseJson("failed","Ocurrio un error al al mostrar los datos");
        }

        public function addAlumno(){
            $colAlumno["apellido"] = $_REQUEST["apellido"] ;
            $colAlumno["nombre"] = $_REQUEST["nombre"] ;
            $colAlumno["grupo"] = $_REQUEST["grupo"] ;
            $colAlumno["semestre"] = $_REQUEST["semestre"] ;

			$alumno = $this->insert("alumnos",$colAlumno)->response;
            if ($alumno)
                $this->responseJson("success","Datos agregados",$alumno);
            else 
                $this->responseJson("failed","Ocurrio un error al agregar");
        }

        public function editAlumno(){
            $colAlumno["apellido"] = $_REQUEST["apellido"] ;
            $colAlumno["nombre"] = $_REQUEST["nombre"] ;
            $colAlumno["grupo"] = $_REQUEST["grupo"] ;
            $colAlumno["semestre"] = $_REQUEST["semestre"] ;

			$alumno = $this->update("alumnos",$colAlumno,"id_alumno=".$_REQUEST["id_alumno"])->response;
            if ($alumno)
                $this->responseJson("success","Datos actualizados",$alumno);
            else 
                $this->responseJson("failed","Ocurrio un error al actualizar");
        }

        public function deleteAlumno($id){
           
			$alumno = $this->delete("alumnos","id_alumno=".$id)->response;
            if ($alumno)
                $this->responseJson("success","Datos eliminados",$alumno);
            else 
                $this->responseJson("failed","Ocurrio un error al eliminar");
        }

        public function getAsignaturasCalificacion($id)
        {
            $this->prepare("select * FROM alumnos
                INNER JOIN calificaciones
                INNER JOIN  asignaturas
                on
                alumnos.id_alumno = calificaciones.id_alumno AND 
                calificaciones.id_asignatura = asignaturas.id_asignatura
                WHERE alumnos.id_alumno =".$id);
            $this->execute();
            $alumnoAsignaturas = $this->fetchAll(PDO::FETCH_ASSOC);
            if ($alumnoAsignaturas)
                $this->responseJson("success","Datos procesados",$alumnoAsignaturas);
            else 
                $this->responseJson("failed","Ocurrio un error al al mostrar los datos");
        }

        public function addAsignaturaCalificacion(){
            $colAlumno["calificacion"] = $_REQUEST["calificacion"] ;
            $colAlumno["id_alumno"] = $_REQUEST["id_alumno"] ;
            $colAlumno["id_asignatura"] = $_REQUEST["id_asignatura"] ;
          
			$alumno = $this->insert("calificaciones",$colAlumno)->response;
            if ($alumno)
                $this->responseJson("success","Datos agregados",$alumno);
            else 
                $this->responseJson("failed","Ocurrio un error al agregar");
        }

        public function editAsignaturaCalificacion(){
            $colAlumno["calificacion"] = $_REQUEST["calificacion"] ;
            $colAlumno["id_alumno"] = $_REQUEST["id_alumno"] ;
            $colAlumno["id_asignatura"] = $_REQUEST["id_asignatura"] ;

			$alumno = $this->update("calificaciones",$colAlumno,"id_calificacion=".$_REQUEST["id_calificacion"])->response;
            if ($alumno)
                $this->responseJson("success","Datos actualizados",$alumno);
            else 
                $this->responseJson("failed","Ocurrio un error al actualizar");
        }

        public function deleteAsignaturaCalificacion($id){
           
			$alumno = $this->delete("calificaciones","id_calificacion=".$id)->response;
            if ($alumno)
                $this->responseJson("success","Datos eliminados",$alumno);
            else 
                $this->responseJson("failed","Ocurrio un error al eliminar");
        }


        public function login(){
            try {
    
                $this->prepare("SELECT * FROM administradores WHERE usuario=? ");
                $this->bindParam(1,$_REQUEST['usuario']);
                $this->execute();
             
                $myData=$this->fetch(PDO::FETCH_ASSOC);
               
                if (isset($myData['usuario']) && $myData['usuario'] === $_REQUEST['usuario']){
                    if ( !password_verify(  $_POST['contrasena'], $myData['contrasena']) )
                        return $this->responseJson("failed","La contraseña no es correcta.");
                    # if user and paswword is true(init  session) 
                    session_start();
                    $_SESSION['data_admin']= $myData;
                    return $this->responseJson("success","Login exitoso.");
                }
                else
                    return $this->responseJson("failed","El usuario no existe.");
            } catch (PDOException $e) {
                return $this->responseJson("failed",$e->getMessage());
            }
        }
    
        
        public function registerAdmin(){
            try {
    
                $_REQUEST['contrasena'] = password_hash( $_REQUEST['contrasena'], PASSWORD_DEFAULT );
    
                $dataAdmin['usuario'] = $_REQUEST['usuario'];
                /*=====================exists admin=========================*/
                if( $this->existsData("administradores",$dataAdmin)->response )
                    return $this->responseJson("failed","El usuario ya existe.");
                /*=====================insert admin=========================*/
                $dataAdmin["apellido"] = $_REQUEST['apellido'];
                $dataAdmin["nombre"]  = $_REQUEST['nombre'];
                $dataAdmin["usuario"]  = $_REQUEST['usuario'];
                $dataAdmin["contrasena"]  = $_REQUEST['contrasena'];
            
                $response = $this->insert("administradores",$dataAdmin)->response;
                if ($response)
                    return $this->responseJson("success","Registro exitoso.");
                else 
                    return $this->responseJson("failed","Ocurrio un error al registrar.");
    
            } catch (PDOException $e) {
                return $this->responseJson("failed",$e->getMessage());
            }
        }

        private function responseJson($status="",$message="",$data=[]){

            return print (json_encode([
                "status" => $status,
                "message" => $message,
                "data"=> $data
            ]));
        }
    }



     /* Obtener la url */
    $getUrl = null; $class="Query"; $method = "index"; $params = [];
    $getUrl = explode("/", filter_var(rtrim(isset($_GET["url"])?$_GET["url"]:$method, "/"), FILTER_SANITIZE_URL));
    $method = $getUrl[0];
    if(!method_exists($class , $method) ){echo "El metodo no existe";exit();}
    if (isset($getUrl[1])) {
        unset($getUrl[0]);
        $params = array_values($getUrl);
    } 
    call_user_func_array([new $class, $method ], $params);

