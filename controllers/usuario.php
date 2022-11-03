<?php
    // Llamando a cadena de conexion
    require_once('../config/conexion.php');
    // Llamando al modelo Usuario
    require_once('../models/Usuario.php');
    // Instanceando la clase Usuario
    $usuario = new Usuario();

    // Opcion de solicitud de controller
    switch ($_GET["op"]) {
        // MicroServicio para mostrar el listado de cursos de un usuario
        case 'listar_cursos':
            $datos = $usuario->getCursosPorUsuario($_POST['usu_id']);
            $data = Array();
            foreach($datos as $row) {
                $sub_array = array();
                $sub_array[] = $row["cur_nombre"];
                $sub_array[] = $row["cur_fechaini"];
                $sub_array[] = $row["cur_fechfin"];
                $sub_array[] = $row["inst_nombre"] . " " . $row["inst_apellidop"];
                $sub_array[] = '<button type="button" onClick="certificado('. $row["curd_id"] . ');" id="' . $row["curd_id"]. '" class="btn btn-outline-primary btn-icon"><div><i class="fa fa-id-card-o" aria-hidden="true"></i></div></button>';
                $data[] = $sub_array;
            }

            $results = array(
                "sEcho"=>1,
                "iTotalRecords"=>count($data),
                "iTotalDisplayRecords"=>count($data),
                "aaData"=>$data
            );
            echo json_encode($results);
        break;

        // Microservicio para mostrar informacion del certificado con el curd_id
        case 'mostrar_curso_detalle':
            $datos = $usuario->getCursoPorId($_POST['curd_id']);
            if(is_array($datos)==true && count($datos)<>0) {
                foreach($datos as $row) {
                    $output["curd_id"] = $row["curd_id"];
                    $output["cur_id"] = $row["cur_id"];
                    $output["cur_nombre"] = $row["cur_nombre"];
                    $output["cur_descripcion"] = $row["cur_descripcion"];
                    $output["cur_fechaini"] = $row["cur_fechaini"];
                    $output["cur_fechfin"] = $row["cur_fechfin"];
                    $output["usu_id"] = $row["usu_id"];
                    $output["usu_nombre"] = $row["usu_nombre"];
                    $output["usu_apellidop"] = $row["usu_apellidop"];
                    $output["usu_apellidom"] = $row["usu_apellidom"];
                    $output["inst_id"] = $row["inst_id"];   
                    $output["inst_nombre"] = $row["inst_nombre"];
                    $output["inst_apellidop"] = $row["inst_apellidop"];
                    $output["inst_apellidom"] = $row["inst_apellidom"];
                }
                echo json_encode($output);
            }
        break;

        // Total de cursos por usuario el dashboard resumen
        case 'total':
            $datos = $usuario->getTotalCursosPorUsuario($_POST['usu_id']);
            if(is_array($datos)==true && count($datos)>0) {
                foreach($datos as $row) {
                    $output["total"] = $row["total"];
                }
                echo json_encode($output);
            }
        break;

        // MicroServicio para mostrar el listado de cursos de un usuario
        case 'listar_cursos_topten':
            $datos = $usuario->getCursosPorUsuarioTopTen($_POST['usu_id']);
            $data = Array();
            foreach($datos as $row) {
                $sub_array = array();
                $sub_array[] = $row["cur_nombre"];
                $sub_array[] = $row["cur_fechaini"];
                $sub_array[] = $row["cur_fechfin"];
                $sub_array[] = $row["inst_nombre"] . " " . $row["inst_apellidop"];
                $sub_array[] = '<button type="button" onClick="certificado('. $row["curd_id"] . ');" id="' . $row["curd_id"]. '" class="btn btn-outline-primary btn-icon"><div><i class="fa fa-id-card-o" aria-hidden="true"></i></div></button>';
                $data[] = $sub_array;
            }

            $results = array(
                "sEcho"=>1,
                "iTotalRecords"=>count($data),
                "iTotalDisplayRecords"=>count($data),
                "aaData"=>$data
            );
            echo json_encode($results);
        break;

        // Mostrar informacion del usuario en la vista perfil
        case 'mostrar_datos_usuario':
            $datos = $usuario->getUsuarioPorID($_POST['usu_id']);
            if(is_array($datos)==true && count($datos)<>0) {
                foreach($datos as $row) {

                    $output["usu_id"] = $row["usu_id"];
                    $output["usu_nombre"] = $row["usu_nombre"];
                    $output["usu_apellidop"] = $row["usu_apellidop"];
                    $output["usu_apellidom"] = $row["usu_apellidom"];
                    $output["usu_correo"] = $row["usu_correo"];
                    $output["usu_sexo"] = $row["usu_sexo"];
                    $output["usu_password"] = $row["usu_password"];
                    $output["usu_telefono"] = $row["usu_telefono"];

                }
                echo json_encode($output);
            }
        break;

        // Actualizar datos de perfil
        case 'actualizar_perfil':
            $datos = $usuario->updateUsuarioPerfil(
                $_POST['usu_id'],
                $_POST['usu_nombre'],
                $_POST['usu_apellidop'],
                $_POST['usu_apellidom'],
                $_POST['usu_password'],
                $_POST['usu_sexo'],
                $_POST['usu_telefono']       
            );

        break;

      
    }

?>

