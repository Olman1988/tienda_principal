<?php
$desc = isset($_GET['desc'])?$_GET['desc']:'';
?>
<div style="width:80%;margin-top:100px; min-width:320px;min-height:90vh;margin-bottom:100px;">
    <h2 class="text-center">Grupos de atributos asociados a <?=$desc?></h2>
    <div class="col-lg-8 m-auto">

<div class="m-auto" id="myContent">
 
  <div class="" id="profile" style="padding-top:20px;">
      <table class="table" id='generalTable'>
  <thead>
    <tr>
      <th scope="col">Grupo de Atributos</th>
      <th scope="col">Acciones</th>
    </tr>
  </thead>
  <tbody>
      <?php
      if(isset($respAttribute)&&count($respAttribute)>0){
          foreach ($respAttribute as $respAttributeValues) {
      ?>
       <tr class="table-active" style="">
      <th scope="row"><?=$respAttributeValues['nombre']?></th>
      <td><a class='delete-link'  href='<?=base_url?>Admin/?seccion=attributesGroup&&action=desasociate-product&&idGroup=<?=$respAttributeValues['id']?>&&cod=<?=$_GET['id']?>&&description=<?=isset($_GET['desc'])&&$_GET['desc']!=''?$_GET['desc']:''?>'><i class="fa-solid fa-circle-minus" style="cursor:pointer;color:#BF2200;font-size:20px; margin-left:10px;"></i></a></td>
    </tr>
      <?php
           }
      }
      ?>
   
  </tbody>
</table>
  
  </div>
  

    </div>
</div>
    
    <div class='container mx-auto'>
        <div class='mx-auto' style='width:80%;min-width:320px;'>
            <hr style='background:gray'>
        <h3>Asociar Grupo</h3>
        <form id="formAsociate" action="./?seccion=attributesGroup&&action=asociate-product-add" method="POST" enctype="multipart/form-data">
        <div class="col-12">
            <input type='hidden' value='<?=$_GET['id']?>' name='cod'>
            <input type='hidden' value='<?=$_GET['desc']?>' name='description'>
                    <div class="form-group">
                        <label for="categoria">Lista de Grupos</label>
                            <select id="attribute" name="attribute" class="form-control selectpicker show-tick">
                                 <option  style="border-radius:15px;" value='-1'>Seleccione</option>

                               <?php
                                     foreach ($respAllAtributes as $respAllAtributesValue) {
                               ?>
                                 <option class='optionCategory'  style="border-radius:15px;" value="<?=$respAllAtributesValue['id']?>"><?=$respAllAtributesValue['nombre']?></option>
                               <?php
                               
                                     }
                               ?>
                                 </select>

                    </div>
                </div>
        <input class="btn btn-primary mt-4" type="submit" value="Asociar">
        </form>
    </div>
    </div>
    <script>
    $(".delete-link").click(
            function(event){
               event.preventDefault();
               Swal.fire({
        title: '¿Desea desea eliminar esta asociación?',
        showCancelButton: true,
        denyButtonText: `Cancelar`,
    }).then((result) => {
        /* Read more about isConfirmed, isDenied below */
        if (result.isConfirmed) {
             var href = $(this).attr('href');
             
             window.location.href = href
            console.log(href);
        } else if (result.isDenied) {
            Swal.fire('Cambio no realizado', '', 'info')
        }
    })
            });
            $(document).ready( function () {

    $('#generalTable').DataTable({
        paging: true,
        ordering: true,
        info: true,
    });
} );
    </script>
    
    