<?php
// Llamamos al archivo de conexion.php
  require_once ('../../config/conexion.php');

  if(isset($_SESSION['usu_id'])) {   
  
?>
<!DOCTYPE html>
<html lang="en">
<head>

  <?php require_once ('../html/MainHead.php'); ?>

  <title>Colegio Ana::Perfil</title>

</head>

<body>

  <!-- Menu -->
  <?php require_once ('../html/MainMenu.php'); ?>

  <!-- Header -->
  <?php require_once ('../html/MainHeader.php'); ?>

  <!-- ########## START: MAIN PANEL ########## -->
  <div class="br-mainpanel">
    <div class="br-pageheader pd-y-15 pd-l-20">
      <nav class="breadcrumb pd-0 mg-0 tx-12">
        <a class="breadcrumb-item" href="#">Perfil</a>
      </nav>
    </div><!-- br-pageheader -->
    <div class="pd-x-20 pd-sm-x-30 pd-t-20 pd-sm-t-30">
      <h4 class="tx-gray-800 mg-b-5">Perfil</h4>
      <p class="mg-b-0">Pantalla Perfil</p>
    </div>

    <div class="br-pagebody">

      <div class="br-section-wrapper">

        <h6 class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-b-10">Perfil</h6>
        <p class="mg-b-30 tx-gray-600">Actualize sus datos</p>

        <div class="form-layout form-layout-1">
          <div class="row mg-b-25">
            <div class="col-lg-4">
              <div class="form-group">
                <label class="form-control-label">Nombre: <span class="tx-danger">*</span></label>
                <input class="form-control" type="text" name="usu_nombre" id="usu_nombre" placeholder="Nombre" required>
              </div>
            </div><!-- col-4 -->
            <div class="col-lg-4">
              <div class="form-group">
                <label class="form-control-label">Apellido Paterno: <span class="tx-danger">*</span></label>
                <input class="form-control" type="text" name="usu_apellidop" id="usu_apellidop" placeholder="Primer Apellido">
              </div>
            </div><!-- col-4 -->
            <div class="col-lg-4">
              <div class="form-group">
                <label class="form-control-label">Apellido Materno: <span class="tx-danger">*</span></label>
                <input class="form-control" type="text" name="usu_apellidom" id="usu_apellidom" placeholder="Segundo Apellido">
              </div>
            </div><!-- col-4 -->
            <div class="col-lg-6">
              <div class="form-group mg-b-10-force">
                <label class="form-control-label">Correo Electronico: <span class="tx-danger">*</span></label>
                <input class="form-control" type="text" name="usu_correo" id="usu_correo" placeholder="Ingrese Correo" readonly>
              </div>
            </div><!-- col-6 -->

            <div class="col-lg-4">
              <div class="form-group">
                <label class="form-control-label">Contraseña: <span class="tx-danger">*</span></label>
                <input class="form-control" type="text" name="usu_password" id="usu_password" placeholder="Ingrese Contraseña">
              </div>
            </div><!-- col-4 -->

            <div class="col-lg-6">
              <div class="form-group mg-b-10-force">
                <label class="form-control-label">Sexo: <span class="tx-danger">*</span></label>
                <select class="form-control select2" name="usu_sexo" id="usu_sexo" data-placeholder="Seleccione">
                  <option value="M">Masculino</option>
                  <option value="F">Femenino</option>
                </select>
              </div>
            </div><!-- col-6 -->

            <div class="col-lg-6">
              <div class="form-group">
                <label class="form-control-label">Telefono: <span class="tx-danger">*</span></label>
                <input class="form-control" type="text" name="usu_telefono" id="usu_telefono" placeholder="Ingrese Telefono">
              </div>
            </div><!-- col-4 -->

            <div class="form-layout-footer">
              <button class="btn btn-info" id="btnActualizar">Actualizar</button>
            </div><!-- form-layout-footer -->

          </div><!-- br-section-wrapper -->
        </div><!-- br-pagebody -->
      </div>
    </div>
  </div><!-- br-mainpanel -->
  <!-- ########## END: MAIN PANEL ########## -->

  <?php require_once ('../html/MainJs.php'); ?>
  <script src="../../public/lib/select2/js/select2.min.js"></script>
  <script src="usuarioperfil.js"></script>
</body>
</html>

<?php
  } else {
    // Si no a iniciado sesion se redirecconara a la ventana principal Login
    header("Location:" . Conexion::ruta() . "views/404/");
  }
?>