var usu_id = $('#usu_idx').val();

$(document).ready(function(){
    $.post("../../controllers/usuario.php?op=mostrar_datos_usuario", { usu_id : usu_id }, function (data) {
        data = JSON.parse(data);
        $('#usu_nombre').val(data.usu_nombre);
        $('#usu_apellidop').val(data.usu_apellidop);
        $('#usu_apellidom').val(data.usu_apellidom);
        $('#usu_correo').val(data.usu_correo);
        $('#usu_telefono').val(data.usu_telefono);
        $('#usu_password').val(data.usu_password);
        $('#usu_sexo').val(data.usu_sexo).trigger("change");
    });
});


$(document).on("click","#btnActualizar", function(){

    $.post("../../controllers/usuario.php?op=actualizar_perfil", { 
        usu_id : usu_id,
        usu_nombre : $('#usu_nombre').val(),
        usu_apellidop : $('#usu_apellidop').val(),
        usu_apellidom : $('#usu_apellidom').val(),
        usu_password : $('#usu_password').val(),
        usu_sexo : $('#usu_sexo').val(),
        usu_telefono : $('#usu_telefono').val()
     }, function (data) {
    });

    Swal.fire({
        title: 'Correcto!',
        text: 'Se actualizo Correctamente',
        icon: 'success',
        confirmButtonText: 'Aceptar'
    })
});