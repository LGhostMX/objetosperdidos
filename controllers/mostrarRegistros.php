<?php 
    include_once '../config/db_conn.php';

    class Registros extends DB{

        private $args;

        public function __construct(){
            parent::__construct();
        }

        public function getRegistro($args){
            $args = "%" . $args . "%";
            $query = $this->connect()->prepare('SELECT perdidas.id, objeto.nombre, objeto.descripcion, objeto.lugar, objeto.fecha_reporte, alumno.nombre AS nombre_alumno, perdidas.estado, alumno.foto FROM perdidas INNER JOIN objeto ON objeto.id = perdidas.objeto_id INNER JOIN alumno ON alumno.num_control = perdidas.alumno_num_control WHERE objeto.nombre LIKE :busqueda');
            $query->bindParam(':busqueda', $args);
            $query->execute();
            return $query->fetchAll(PDO::FETCH_ASSOC);
        }
        public function getRegistroEstado($args){
            $args = "%" . $args . "%";
            $query = $this->connect()->prepare('SELECT perdidas.id, objeto.nombre, objeto.descripcion, objeto.lugar, objeto.fecha_reporte, alumno.nombre AS nombre_alumno, perdidas.estado, alumno.foto FROM perdidas INNER JOIN objeto ON objeto.id = perdidas.objeto_id INNER JOIN alumno ON alumno.num_control = perdidas.alumno_num_control WHERE perdidas.estado LIKE :filtro');
            $query->bindParam(':filtro', $args);
            $query->execute();
            return $query->fetchAll(PDO::FETCH_ASSOC);
        }

        public function getRegistros() {
            $query = $this->connect()->prepare('SELECT perdidas.id, objeto.nombre, objeto.descripcion, objeto.lugar, objeto.fecha_reporte, alumno.nombre AS nombre_alumno, perdidas.estado, alumno.foto FROM perdidas INNER JOIN objeto ON objeto.id = perdidas.objeto_id INNER JOIN alumno ON alumno.num_control = perdidas.alumno_num_control');
            $query->execute();
            return $query->fetchAll(PDO::FETCH_ASSOC);
        }




    }


?>