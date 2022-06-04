<?php include_once "profesores.php" ;


// aqui todo lo pasamos en formato json y tambien lo decodificamos
class API{
    public static function getAll(){
        $profe = new Profesores();
        $profesores = array();
        $profesores["items"] = array();

        $row = $profe->getTeacher();
        foreach($row as $ro){
            $item = array(
                "id"=>$ro[0],
                "nombre"=>$ro[1],
                "apellido"=>$ro[2]
            );
            array_push( $profesores["items"],$item);
        }
        echo json_encode($profesores);

    }
    public static function getTeacherByID($id){
        $profe = new Profesores();
        $profesores = [];
        $profesores['Profesor'] = [];
        $row = $profe->getTeacherByID($id);
        foreach($row as $ro){
            $item = array(
                '$id'=>$ro[0],
                "nombre"=>$ro[1],
                "apellido"=>$ro[2]
            );
            array_push($profesores["Profesor"],$item);
        }
    }
    public static function insertTeacher($id,$nombre,$apellido){

    }
    public static function deleteTeacher($id){
        $bd = new BD();
    }
    public static function updateTeacher($id,$name,$last_name){
    }  
}

?>