const canvas = document.getElementById('canvas');
const ctx = canvas.getContext('2d');

/* Inicializamos la imagen */
const image = new Image();
/* Ruta de la Imagen */
image.src = '../../public/Certificado.png';

$(document).ready(function(){
    // Llamando a la funcion getUrlParameter el dato de la url es curd_id
    var curd_id = getUrlParameter('curd_id');

    // Configuracion diploma en canva
    $.post("../../controllers/usuario.php?op=mostrar_curso_detalle", { curd_id : curd_id }, function (data) {
        data = JSON.parse(data);
        $('#cur_descripcion').html(data.cur_descripcion);

        /* Dimensionamos y seleccionamos imagen */
        ctx.drawImage(image, 0, 0, canvas.width, canvas.height);
        /* Definimos tamaño de la fuente */
        ctx.font = '37px Arial';
        ctx.textAlign = "center";
        ctx.textBaseline = 'middle';
        var x = canvas.width / 2;
        ctx.fillText(data.usu_nombre+' '+ data.usu_apellidop+' '+data.usu_apellidom, x, 340);

        ctx.font = '30px Arial';
        ctx.fillText(data.cur_nombre, x, 430);

        ctx.font = '18px Arial';
        ctx.fillText(data.inst_nombre+' '+ data.inst_apellidop+' '+data.inst_apellidom, x, 470);
        ctx.font = '15px Arial';
        ctx.fillText('Instructor', x, 490);

        ctx.font = '15px Arial';
        ctx.fillText('Fecha de Inicio : '+data.cur_fechaini+' / '+'Fecha de Finalización : '+data.cur_fechfin+'', x, 530);

    });

});

// Descargar en PNG
$(document).on("click","#btnPng", function(){
    let lblpng = document.createElement('a');
    lblpng.download = "certificado.png";
    lblpng.href = canvas.toDataURL();
    lblpng.click();
});

// Descargar en PDF
$(document).on("click","#btnPdf", function(){
    var imgData = canvas.toDataURL('image/png');
    var doc = new jsPDF('l', 'mm');
    doc.addImage(imgData, 'PNG', 30, 15);
    doc.save('certificado.pdf');
});

// Obtener datos de la url
var getUrlParameter = function getUrlParameter(sParam) {
    var sPageURL = decodeURIComponent(window.location.search.substring(1)),
        sURLVariables = sPageURL.split('&'),
        sParameterName,
        i;

    for (i = 0; i < sURLVariables.length; i++) {
        sParameterName = sURLVariables[i].split('=');

        if (sParameterName[0] === sParam) {
            return sParameterName[1] === undefined ? true : sParameterName[1];
        }
    }
};
