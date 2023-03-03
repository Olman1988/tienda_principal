<?php
?>
<!DOCTYPE HTML>
<html lang="es">

    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title> <?=$profile->name?></title>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <meta name="viewport" content="width=device-width,user scalable=no, initial-scale=1.0, maximun-scale=1.0">
  <meta name="description" content="Empresa lider en la gestión y operación de proyectos forestales, trámites legales, permisos forestales, permisos de corta de árboles">
    <meta name="description" content="Produciendo en armonía con el ambiente, le ofrecemos tranquilidad legal en sus proyectos forestales.">
    <meta name="keywords" content="Productos de Limpieza">

  <!--JQUERY-->
  <link rel="icon" href="<?php base_url2.$profile->logo?>">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <!--BOOSTRAP-->
  <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
 <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
<!--ANIMACIONES-->
   <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" rel="stylesheet">
 <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
 
  <!--ICONOS-->
  <script src="https://kit.fontawesome.com/b58e5dabf0.js" crossorigin="anonymous"></script>
  <!--CAROUSEL.css------------->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="" crossorigin="anonymous" />
  <script src="https://cdn.tiny.cloud/1/h73c5ldsik97mzba7fdcn3bq207u570fuix81a7ubjffwzz4/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>    
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.6.0/umd/popper.min.js" integrity="sha512-BmM0/BQlqh02wuK5Gz9yrbe7VyIVwOzD1o40yi1IsTjriX/NGF37NyXHfmFzIlMmoSIBXgqDiG1VNU6kB5dBbA==" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="" crossorigin="anonymous"></script>
  <script src="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css" ></script>
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js" ></script>

<!-- Include Unite Gallery core files -->

   <script type="text/javascript"> (function() { var css = document.createElement("link"); css.href = "https://use.fontawesome.com/releases/v5.9.0/css/all.css"; css.rel = "stylesheet"; css.type = "text/css"; document.getElementsByTagName("head")[0].appendChild(css); })(); </script>

  <!--ASSETS-->
  <link href="../assets/css/sb-admin-2.min2.css" rel="stylesheet" type="text/css"/>
  <script src="https://cdn.rawgit.com/rainabba/jquery-table2excel/1.1.0/dist/jquery.table2excel.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js" integrity="sha512-CNgIRecGo7nphbeZ04Sc13ka07paqdeTu0WR1IM4kNcpmBAUSHSQX0FslNhTDadL4O5SAGapGt4FodqL8My0mA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js" integrity="sha512-BNaRQnYJYiPSqHHDb58B0yaPfCu+Wgds8Gp/gU33kqBtgNS4tSPHuGibyoeqMV/TJlSKda6FXzoEyYGjTe+vXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="https://ckeditor.com/latest/ckeditor.js"></script> 
  <style>
      /*      PAra deshabilitar las notificaciones del editor de texto*/
      .tox-notifications-container{
          display: none !important;
      }

      body{
          background:whitesmoke;
      }
     
      .form-control {
    padding: 0 18px 3px;
    border: 1px solid #dbe2e8;
    border-radius: 22px;
    background-color: #fff;
    color: #606975;
    font-family: "Maven Pro",Helvetica,Arial,sans-serif;
    font-size: 14px;
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
    height:50px;
}
.form-group label {
    margin-bottom: 8px;
    padding-left: 18px;
    font-size: 13px;
    font-weight: 500;
    cursor: pointer;
}
.form-group {
    margin-bottom: 20px !important;
}

/**********File Inputs**********/
.container-input {
    padding: 5px 0;
    border-radius: 6px;
    width: 50%;
   
    margin-bottom: 20px;
}

.inputfile {
    width: 0.1px;
    height: 0.1px;
    opacity: 0;
    overflow: hidden;
    position: absolute;
    z-index: -1;
     border-radius: 10px;
}

.inputfile + label {
    max-width: 80%;
    font-size: 1.25rem;
    font-weight: 700;
    text-overflow: ellipsis;
    white-space: nowrap;
    cursor: pointer;
    display: inline-block;
    overflow: hidden;
    padding: 0.625rem 1.25rem;
    border-radius: 25px;
  
    
}

.inputfile + label svg {
    width: 1em;
    height: 1em;
    vertical-align: middle;
    fill: currentColor;
    margin-top: -0.25em;
    margin-right: 0.25em;
}

.iborrainputfile {
	font-size:12px; 
	font-weight:normal;
	font-family: 'Lato';
}

/* style 1 */

.inputfile-1 + label {
    
   
}

.inputfile-1:focus + label,
.inputfile-1.has-focus + label,
.inputfile-1 + label:hover {
   
}
.btn-outline-primary-2{
    padding:10px 15px 8px 15px;
    font-size:11px;
    border-radius:35px;
        border-color: #E4008D !important;
    background-color: #E4008D;
    color: white !important;
    letter-spacing: 1px;
    font-family: "Maven Pro","Helvetica","Arial","sans-serif";
        font-weight:600; 
}
.btn-outline-primary-2:hover{
    
    background-color: white !important;
    color: #E4008D ! important;
    
}
.mp-btn{
    min-height:20px !important;
    min-width:20px !important;
}
    
h3{
    font-size:25px;
    margin-top:20px;
}
.paginate_button{
    margin-left:20px;
}
.dataTables_length {
    margin-top:50px;
}
#generalTable_filter {
    float:right;
}
  </style>
  <body style="" onbeforeunload="abandonar()">