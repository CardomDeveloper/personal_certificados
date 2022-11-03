<?php 

    // Inicializando la sesion usuario
    session_start();

    //Iniciamos Clase Conectar
    class Conexion {

        protected $dbh;

        // Funcion protegida de la cadena de Conexion
        protected function conectar() {
            try {
                // Cadena de Conexion
                $conectar = $this->dbh = new PDO("mysql:host=localhost;dbname=personal_certificados", "root", "");
                return $conectar;
            } catch (Exception $e) {
                echo 'Falló la conexión: ' . $e->getMessage();
                die();
            }
        }

        // Para impedir que tengamos problemas con las ñ o tildes(CARACTERES ESPECIALES)
        public function set_names() {
            return $this->dbh->query("SET NAMES 'utf8'");
        }


        // Ruta Principal del Proyecto
        public static function ruta() {
            return "http://localhost/personal_CertificadoDiplomas/";
        }
    }




?>