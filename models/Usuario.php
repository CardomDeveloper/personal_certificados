<?php 

    class Usuario extends Conexion {

        // Funcion para login de acceso de Usuario
        public function login() {

            $conectar = parent::conectar();
            parent::set_names();

            if(isset($_POST['enviar'])) {
                $correo = $_POST['usu_correo'];
                $pass = $_POST['usu_password'];

                if(empty($correo) && empty($pass)) {
                    
                    // En caso esten vacios correo y contrasena devolver al index con mensaje 2
                    header("Location:" . Self::ruta() . "index.php?m=2");
                    exit();
                } else {
                    $sql = "SELECT * FROM tm_usuario WHERE usu_correo=? and usu_password=? and estado=1";
                    $stmt = $conectar->prepare($sql);
                    $stmt->bindValue(1, $correo);
                    $stmt->bindValue(2, $pass);
                    $stmt->execute();
                    $resultado = $stmt->fetch();

                    if(is_array($resultado) && count($resultado)>0) {
                        $_SESSION['usu_id'] = $resultado['usu_id'];
                        $_SESSION['usu_nombre'] = $resultado['usu_nombre'];
                        $_SESSION['usu_apellidop'] = $resultado['usu_apellidop'];
                        $_SESSION['usu_correo'] = $resultado['usu_correo'];
                        // Si todo esta correcto indexar en home
                        header("Location:" . Self::ruta() . "views/UsuarioHome/");

                    } else {
                        // En caso no coincidan el usuario o la contrasena mensaje 1
                        header("Location:" . Self::ruta() . "index.php?m=1");
                    }

                }
            }
        }

        // Mostrar todos los cursos en los cuales esta inscrito un usuario
        public function getCursosPorUsuario($usu_id) {
            $conectar = parent::conectar();
            parent::set_names();
            $sql = " SELECT                 
                td_curso_usuario.curd_id,
                tm_curso.cur_id,
                tm_curso.cur_nombre,
                tm_curso.cur_descripcion,
                tm_curso.cur_fechaini,
                tm_curso.cur_fechfin,
                tm_usuario.usu_id,
                tm_usuario.usu_nombre,
                tm_usuario.usu_apellidop,
                tm_usuario.usu_apellidom,
                tm_instructor.inst_id,
                tm_instructor.inst_nombre,
                tm_instructor.inst_apellidop,
                tm_instructor.inst_apellidom
                FROM td_curso_usuario INNER JOIN tm_curso ON td_curso_usuario.cur_id = tm_curso.cur_id
                INNER JOIN tm_usuario ON td_curso_usuario.usu_id = tm_usuario.usu_id
                INNER JOIN tm_instructor ON tm_curso.inst_id = tm_instructor.inst_id
                WHERE
                td_curso_usuario.usu_id = ?"
            ;   
            $sql = $conectar->prepare($sql); 
            $sql->bindValue(1,$usu_id);
            $sql->execute();
            return $resultado = $sql->fetchAll();
            
        }

        // Mostrar todos los cursos en los cuales esta inscrito un usuario
        public function getCursosPorUsuarioTopTen($usu_id) {
            $conectar = parent::conectar();
            parent::set_names();
            $sql = " SELECT                 
                td_curso_usuario.curd_id,
                tm_curso.cur_id,
                tm_curso.cur_nombre,
                tm_curso.cur_descripcion,
                tm_curso.cur_fechaini,
                tm_curso.cur_fechfin,
                tm_usuario.usu_id,
                tm_usuario.usu_nombre,
                tm_usuario.usu_apellidop,
                tm_usuario.usu_apellidom,
                tm_instructor.inst_id,
                tm_instructor.inst_nombre,
                tm_instructor.inst_apellidop,
                tm_instructor.inst_apellidom
                FROM td_curso_usuario INNER JOIN tm_curso ON td_curso_usuario.cur_id = tm_curso.cur_id
                INNER JOIN tm_usuario ON td_curso_usuario.usu_id = tm_usuario.usu_id
                INNER JOIN tm_instructor ON tm_curso.inst_id = tm_instructor.inst_id
                WHERE
                td_curso_usuario.usu_id = ?
                LIMIT 10"
            ;   
            $sql = $conectar->prepare($sql); 
            $sql->bindValue(1,$usu_id);
            $sql->execute();
            return $resultado = $sql->fetchAll();
            
        }

        // Mostrar datos de un curso por su id de detalle
        public function getCursoPorId($curd_id) {
            $conectar = parent::conectar();
            parent::set_names();
            $sql = " SELECT                 
                td_curso_usuario.curd_id,
                tm_curso.cur_id,
                tm_curso.cur_nombre,
                tm_curso.cur_descripcion,
                tm_curso.cur_fechaini,
                tm_curso.cur_fechfin,
                tm_usuario.usu_id,
                tm_usuario.usu_nombre,
                tm_usuario.usu_apellidop,
                tm_usuario.usu_apellidom,
                tm_instructor.inst_id,
                tm_instructor.inst_nombre,
                tm_instructor.inst_apellidop,
                tm_instructor.inst_apellidom
                FROM td_curso_usuario INNER JOIN tm_curso ON td_curso_usuario.cur_id = tm_curso.cur_id
                INNER JOIN tm_usuario ON td_curso_usuario.usu_id = tm_usuario.usu_id
                INNER JOIN tm_instructor ON tm_curso.inst_id = tm_instructor.inst_id
                WHERE
                td_curso_usuario.curd_id = ?"
            ;   
            $sql = $conectar->prepare($sql); 
            $sql->bindValue(1,$curd_id);
            $sql->execute();
            return $resultado = $sql->fetchAll();
            
        }

        // Cantidad de Cursos por Usuario
        public function getTotalCursosPorUsuario($usu_id) {
            $conectar = parent::conectar();
            parent::set_names();
            $sql = " SELECT COUNT(*) as total FROM td_curso_usuario WHERE usu_id = ?";
  
            $sql = $conectar->prepare($sql); 
            $sql->bindValue(1,$usu_id);
            $sql->execute();
            return $resultado = $sql->fetchAll();
        }

        // Mostrar los datos del usuario segun ID
        public function getUsuarioPorID($usu_id) {
            $conectar = parent::conectar();
            parent::set_names();
            $sql = " SELECT * FROM tm_usuario WHERE estado=1 AND usu_id=?";
            
            $sql = $conectar->prepare($sql); 
            $sql->bindValue(1,$usu_id);
            $sql->execute();
            return $resultado = $sql->fetchAll();
            
        }

        // Actualizar la informacion del perfil del usuario segun ID
        public function updateUsuarioPerfil($usu_id, $usu_nombre, $usu_apellidop, $usu_apellidom, $usu_password, $usu_sexo, $usu_telefono) {
            $conectar = parent::conectar();
            parent::set_names();
            $sql = " UPDATE tm_usuario
                SET
                    usu_nombre = ?,
                    usu_apellidop = ?,
                    usu_apellidom = ?,
                    usu_password = ?,
                    usu_sexo = ?,
                    usu_telefono = ?
                WHERE
                    usu_id = ?      
                ";
            
            $sql = $conectar->prepare($sql); 
            $sql->bindValue(1,$usu_nombre);
            $sql->bindValue(2,$usu_apellidop);
            $sql->bindValue(3,$usu_apellidom);
            $sql->bindValue(4,$usu_password);
            $sql->bindValue(5,$usu_sexo);
            $sql->bindValue(6,$usu_telefono);
            $sql->bindValue(7,$usu_id);
            $sql->execute();
            return $resultado = $sql->fetchAll();
            
        }


    }


?>