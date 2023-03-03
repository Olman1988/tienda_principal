<?php
?>
<div style="width:80%;margin-top:100px; min-width:320px;min-height:90vh;margin-bottom:100px;">
    <h2 class="text-center">Imagenes para <?=$_GET['Articulo']?></h2>
    <div class="col-lg-8 m-auto">

<div class="m-auto" id="myContent">
 
  <div class="" id="profile" style="padding-top:20px;">
      <button class="btn btn-primary"><a style="text-decoration: none;color:white;" href="<?=base_url?>/Admin/?seccion=images&&action=add-images&&Articulo=<?=$_GET['Articulo']?>&&id=<?=$_GET['id']?>">+Agregar</a></button>
      <table class="table" id='generalTable'>
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Imagen</th>
      <th scope="col">Producto o Servicio</th>
      <th scope="col">Acciones</th>
    </tr>
  </thead>
  <tbody>
      <?php
      
      $cont = 1;
      if(isset($respuestaImagen)&&count($respuestaImagen)>0){
          foreach ($respuestaImagen as $respuestaImagenValues) {
              
          
      ?>
       <tr class="table-active" style="">
       <td>#<?=$cont?></td>
       <td><img style='width:100px' src="<?=base_url?><?=$respuestaImagenValues['rutaImagen']?>" alt="alt"/></td>
      <th scope="row"><?=$_GET['Articulo']?></th>
     <td style="min-width:120px;" class="">
          <a href='<?=base_url?>/Admin/?seccion=images&&action=action-edit&&id=<?=$respuestaImagenValues['id']?>'><i class="fa-solid fa-pen-to-square" style="cursor:pointer;color:white;font-size:20px;" ></i></a>
          <i class="fa-solid fa-trash" style="cursor:pointer;color:white;font-size:20px; margin-left:10px;" onclick="eliminarImagen('<?=$respuestaImagenValues['id']?>')"></i>
      </td>
      
    </tr>
      <?php
      $cont++;
           }
      }
      ?>
   
  </tbody>
</table>
  
  </div>
  

    </div>
</div>
</div>    
<script>
function eliminarImagen(id){
       var parametros = {
        "idImagen": id,
        "action": "deleteImagen"
    };
    
    Swal.fire({
        title: '¿Desea desea eliminar esta promoción?',
        showCancelButton: true,
        denyButtonText: `Cancelar`,
    }).then((result) => {
        /* Read more about isConfirmed, isDenied below */
        if (result.isConfirmed) {

            $.ajax({
                url: "../controllers/articulosController.php",
                type: "POST",
                datatype: "html",
                data: parametros,
                success: function (response) {
                   console.log(response);
                    if (response.status) {
                        Swal.fire(response.msn, '', 'success');
                        window.setTimeout(function () {
                            window.location.href = "./?seccion=images&&id=<?=$_GET['id']?>&&Articulo=<?=$_GET['Articulo']?>"
                        }, 2000);
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: response.msn,
                            footer: '',

                        })
                    }
                }


            })//fin 

        } else if (result.isDenied) {
            Swal.fire('Changes are not saved', '', 'info')
        }
    })
}


</script>    

