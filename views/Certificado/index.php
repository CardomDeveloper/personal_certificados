<!DOCTYPE html>
<html lang="en" class="pos-relative">

<head>

    <?php require_once('../html/MainHead.php'); ?>

    <title>Certificado</title>

</head>

<body class="pos-relative">

    <div class="ht-100v d-flex align-items-center justify-content-center">
        <div class="wd-lg-70p wd-xl-50p tx-center pd-x-40">
            <h1 class="tx-100 tx-xs-140 tx-normal tx-inverse tx-roboto mg-b-0">

            <canvas id="canvas" width="900px" height="650px" class="img-fluid" alt="Responsive image"></canvas>

            <!-- <img src="../../public/Certificado.png" class="img-fluid mg-b-30" alt="Responsive image"> -->

            </h1>
    
            <p class="tx-16 text-justify" id="cur_descripcion">

            </p>

                
            <div class="form-layout-footer">
              <button class="btn btn-outline-success" id="btnPng"><i class="fa fa-picture-pdf-o mg-r-10" aria-hidden="true"></i> PNG</button>
              <button class="btn btn-outline-danger" id="btnPdf"><i class="fa fa-file-o mg-r-10" aria-hidden="true"></i> PDF</button>
            </div><!-- form-layout-footer -->

        </div>
    </div><!-- ht-100v -->

    <?php require_once('../html/MainJs.php'); ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.4/jspdf.min.js"></script>
    <script src="certificado.js"></script>

</body>

</html>