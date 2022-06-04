<?php 

include_once "db.php";

class Profesores extends BD
{
    
    public static function getTeacher(){
        $bd = new BD();
        return $bd->sentencia("select * from profesores");
    }
    public static function getTeacherByID($id){
        $bd = new BD();
        return $bd->sentencia("select * from profesores where idProfesor = $id");
    }
    public static function insertTeacher($id,$nombre,$apellido){
        $bd = new BD();
        $bd->ejecucion("insert into profesores values('$id','$nombre','$apellido')");
    }
    public static function deleteTeacher($id){
        $bd = new BD();
        $bd->ejecucion("delete from profesores where idProfesor = $id");
    }
    public static function updateTeacher($id,$name,$last_name){
        $bd = new BD();
        $bd->ejecucion("update profesores set nombre = $name, apellido = $last_name where idProfesor = $id");
    }
}
?>