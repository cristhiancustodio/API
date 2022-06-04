<?php 

    include_once "api_profesore.php";
    include_once "profesores.php";
    switch($_SERVER['REQUEST_METHOD']){
        case 'GET':
            if(isset($_GET['id'])){
                API::getTeacherByID($_GET['id']);
            }
            else{
                API::getAll();
            }
            break;
        case 'POST':
            $datos = json_decode(file_get_contents('php://input'));
            if($datos != null ){
                if(API::insertTeacher($datos->idProfesor,$datos->nombre,$datos->apellido)){
                    echo "Se inserto los datos";
                    // mostrara response_code(200) = OK
                }
                else{
                    // si no se inserta enviamos el error
                    http_response_code(400);
                }
            }
            else{
                http_response_code(405);
            }
            break;
        case 'PUT':
            $datos = json_decode(file_get_contents('php://input'));
            if($datos != null){
                if ( API::updateTeacher($datos->idProfesor, $datos->nombre, $datos->apellido)){
                    echo "Se actualizo correctamente";
                }
                else{
                    http_response_code(400);
                }
            }
            else{
                http_response_code(405);
            }
            break;
        case 'DELETE':
            if ( isset($_GET['id'])){
                if ( API::deleteTeacher($_GET['id'])){
                    echo "Eliminado correctamente";
                }
                else{
                    http_response_code(400);
                }
            }
            else{
                http_response_code(405);
            }
            break;
        default:
        http_response_code(405);
        break;
    }
?>