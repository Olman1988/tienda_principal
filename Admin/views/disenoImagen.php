<?php
$fonts =  new lookandfeel();
$fonts = $fonts->get_google_fonts("all");
$url ="https://fonts.googleapis.com/css2?";
$cont=0;
foreach ( $fonts as $k => $v ) {
   $cont++;
   if($cont<870){
   $fontName=str_replace( ' ',"+",$v->family );
   $url.="family=".$fontName."&";
}

   }
              //  @import url('https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;900&family=Poppins:wght@400;500;600;700&family=Mukta:wght@200;400;500;700&family=Montserrat+Alternates:wght@200&family=Ubuntu:wght@400;500;700&family=Poiret+One:wght@400;500;700&display=swap');

?>
<style>
@import url('<?=$url?>display=swap');
.colorTitulo{
        padding: 10px!important;
    border: none !important;
    border-radius: 22px;
    background-color: #fff;
    color: #606975;
    font-family: "Maven Pro",Helvetica,Arial,sans-serif;
    font-size: 14px;
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
    height: 50px;
    width:50px;
}
    
</style>

<div class="container" style="overflow:hidden;width:90%;background:white;border-radius:15px;height:auto;margin-top:100px;padding:20px;">
    <h1>Diseño e Imagen</h1>
    <form id="formInfoDiseno" action="action">
        <?php
        if(isset($respuestaLAF['id'])){
             echo '<input type="hidden" name="action" value="modificar">';  
       
        echo '<input type="hidden" name="id" value="'.$respuestaLAF['id'].'">';
        } else{
          echo '<input type="hidden" name="action" value="insertar">';
        }
        ?>
    <div class="row">
        <h3>Titulos</h3>
       
     <div class="col-6">
        <div class="form-group">
            <label for="font">Fuente de Títulos</label>
            <select id="font" name="font"  class="form-control selectpicker show-tick">
                    <?php
                 $cont=0;  
             foreach ( $fonts as $k => $v ) {
                    
                 $cont++;
                 if($cont<700){
                if(isset($respuestaLAF['fuenteTitulo'])&&$v->family==$respuestaLAF['fuenteTitulo']){
                    
                   printf('<option selected style="font-family:'.$v->family.'" value="%s">%s</option>', $v->family, $v->family);
               } else {
                                      printf('<option style="font-family:'.$v->family.'" value="%s">%s</option>', $v->family, $v->family);

               }
               }
               }
               ?>
            </select>
            <span  class="text-danger" style="display:none;">Requerido.</span>
        </div>

</div>
        <div class="col-6">
         <div class="form-group">
            <label for="exampleColorInput" class="form-label">Color Titulos</label>
            <?php
            if(isset($respuestaLAF['colorPrincipal'])){
            ?>
            <input name="principalColor" type="color" class="form-control form-control-color colorTitulo" id="exampleColorInput" value="<?=$respuestaLAF['colorPrincipal']?>" title="Choose your color">
            <?php
            }else{
            ?>
                        <input name="principalColor" type="color" class="form-control form-control-color colorTitulo" id="exampleColorInput" title="Choose your color">

             <?php
            }
            ?>
        </div>

</div>
        <hr>
        <h3>Productos</h3>
        <div class="col-6">
        <div class="form-group">
            <label for="font">Fuente de Subtitulos de Productos</label>
            <select id="fontSub" name="fontSub"  class="form-control selectpicker show-tick">
                    <?php
               $cont=0; 
               foreach ( $fonts as $k => $v ) {
                    
                 $cont++;
                 if($cont<700){
                if(isset($respuestaLAF['fuenteSubTitulo'])&&$v->family==$respuestaLAF['fuenteSubTitulo']){
                    
                   printf('<option selected style="font-family:'.$v->family.'" value="%s">%s</option>', $v->family, $v->family);
               } else {
                                      printf('<option style="font-family:'.$v->family.'" value="%s">%s</option>', $v->family, $v->family);

               }
               }
               }
               ?>
            </select>
            <span  class="text-danger" style="display:none;">Requerido.</span>
        </div>

</div>
        <div class="col-6">
        <div class="form-group">
            <label for="exampleColorInput" class="form-label">Color Fuente Productos</label>
            <?php
            if(isset($respuestaLAF['colorSecundario'])){
            ?>
            <input name="secundaryColor" type="color" class="form-control form-control-color colorTitulo" id="exampleColorInput" value="<?=$respuestaLAF['colorSecundario']?>" title="Choose your color">
            <?php
            }else{
            ?>
                        <input name="secundaryColor" type="color" class="form-control form-control-color colorTitulo" id="exampleColorInput" title="Choose your color">

             <?php
            }
            ?>
        </div>

</div>
         <hr>
        <h3>Menú de Navegación</h3>
        <div class="col-4">
        <div class="form-group">
            <label for="font">Fuente de Menú de Navegación</label>
            <select id="navbarFont" name="navbarFont"  class="form-control selectpicker show-tick">
                    <?php
                 $cont=0;  
             foreach ( $fonts as $k => $v ) {
                    
                 $cont++;
                 if($cont<700){
                if(isset($respuestaLAF['fuenteNavbar'])&&$v->family==$respuestaLAF['fuenteNavbar']){
                    
                   printf('<option selected style="font-family:'.$v->family.'" value="%s">%s</option>', $v->family, $v->family);
               } else {
                                      printf('<option style="font-family:'.$v->family.'" value="%s">%s</option>', $v->family, $v->family);

               }
               }
               }
               ?>
            </select>
            <span  class="text-danger" style="display:none;">Requerido.</span>
        </div>

</div>
        <div class="col-2">
         <div class="form-group">
            <label for="exampleColorInput" class="form-label">Color de Fondo</label>
            <?php
            if(isset($respuestaLAF['colorNavbar'])){
            ?>
            <input name="navbarColor" type="color" class="form-control form-control-color colorTitulo" id="exampleColorInput" value="<?=$respuestaLAF['colorNavbar']?>" title="Choose your color">
            <?php
            }else{
            ?>
                        <input name="navbarColor" type="color" class="form-control form-control-color colorTitulo" id="exampleColorInput" title="Choose your color">

             <?php
            }
            ?>
        </div>

</div>
        <div class="col-2">
         <div class="form-group">
            <label for="exampleColorInput" class="form-label">Color de Fuente</label>
            <?php
            if(isset($respuestaLAF['colorFuenteNavbar'])){
            ?>
            <input name="navbarColorFont" type="color" class="form-control form-control-color colorTitulo" id="colorFuenteNavbar" value="<?=$respuestaLAF['colorFuenteNavbar']?>" title="Choose your color">
            <?php
            }else{
            ?>
                        <input name="colorFuenteNavbar" type="color" class="form-control form-control-color colorTitulo" id="colorFuenteNavbar" title="Choose your color">

             <?php
            }
            ?>
        </div>

</div>
        <div class="col-2">
         <div class="form-group">
            <label for="exampleColorInput" class="form-label">Color de Realse Fuente</label>
            <?php
            if(isset($respuestaLAF['colorHoverNavbar'])){
            ?>
            <input name="colorHoverNavbar" type="color" class="form-control form-control-color colorTitulo" id="colorHoverNavbar" value="<?=$respuestaLAF['colorHoverNavbar']?>" title="Choose your color">
            <?php
            }else{
            ?>
                        <input name="colorHoverNavbar" type="color" class="form-control form-control-color colorTitulo" id="colorHoverNavbar" title="Choose your color">

             <?php
            }
            ?>
        </div>

</div>
         <hr>
        <h3>Menú Lateral</h3>
        <div class="col-6">
        <div class="form-group">
            <label for="font">Fuente</label>
            <select id="sidebarFont" name="sidebarFont"  class="form-control selectpicker show-tick">
                    <?php
                 $cont=0;  
             foreach ( $fonts as $k => $v ) {
                    
                 $cont++;
                 if($cont<700){
                if(isset($respuestaLAF['fuenteSideBar'])&&$v->family==$respuestaLAF['fuenteSideBar']){
                    
                   printf('<option selected style="font-family:'.$v->family.'" value="%s">%s</option>', $v->family, $v->family);
               } else {
                                      printf('<option style="font-family:'.$v->family.'" value="%s">%s</option>', $v->family, $v->family);

               }
               }
               }
               ?>
            </select>
            <span  class="text-danger" style="display:none;">Requerido.</span>
        </div>

</div>
        <div class="col-3">
         <div class="form-group">
            <label for="exampleColorInput" class="form-label">Color de Fondo</label>
            <?php
            if(isset($respuestaLAF['colorSideBar'])){
            ?>
            <input name="colorSidebar" type="color" class="form-control form-control-color colorTitulo" id="exampleColorInput" value="<?=$respuestaLAF['colorSideBar']?>" title="Choose your color">
            <?php
            }else{
            ?>
                        <input name="colorSidebar" type="color" class="form-control form-control-color colorTitulo" id="exampleColorInput" title="Choose your color">

             <?php
            }
            ?>
        </div>

</div>
         <div class="col-3">
         <div class="form-group">
            <label for="exampleColorInput" class="form-label">Color de Fuente</label>
            <?php
            if(isset($respuestaLAF['colorFuenteSidebar'])){
            ?>
            <input name="colorFuenteSidebar" type="color" class="form-control form-control-color colorTitulo" id="exampleColorInput" value="<?=$respuestaLAF['colorFuenteSidebar']?>" title="Choose your color">
            <?php
            }else{
            ?>
                        <input name="colorSidebar" type="color" class="form-control form-control-color colorTitulo" id="exampleColorInput" title="Choose your color">

             <?php
            }
            ?>
        </div>

</div>
         <hr>
        <h3>Botones</h3>
        <div class="col-6">
        <div class="form-group">
            <label for="font">Fuente de Botones</label>
            <select id="buttonFont" name="buttonFont"  class="form-control selectpicker show-tick">
                    <?php
                 $cont=0;  
             foreach ( $fonts as $k => $v ) {
                    
                 $cont++;
                 if($cont<700){
                if(isset($respuestaLAF['fuenteBotones'])&&$v->family==$respuestaLAF['fuenteBotones']){
                    
                   printf('<option selected style="font-family:'.$v->family.'" value="%s">%s</option>', $v->family, $v->family);
               } else {
                                      printf('<option style="font-family:'.$v->family.'" value="%s">%s</option>', $v->family, $v->family);

               }
               }
               }
               ?>
            </select>
            <span  class="text-danger" style="display:none;">Requerido.</span>
        </div>

</div>
        <div class="col-6">
         <div class="form-group">
            <label for="exampleColorInput" class="form-label">Color de Botones</label>
            <?php
            if(isset($respuestaLAF['colorBotones'])){
            ?>
            <input name="buttonColor" type="color" class="form-control form-control-color colorTitulo" id="exampleColorInput" value="<?=$respuestaLAF['colorBotones']?>" title="Choose your color">
            <?php
            }else{
            ?>
                        <input name="buttonColor" type="color" class="form-control form-control-color colorTitulo" id="exampleColorInput" title="Choose your color">

             <?php
            }
            ?>
        </div>

</div>
         <hr>
        <h3>Pie de Página</h3>
        <div class="col-4">
         <div class="form-group">
            <label for="exampleColorInput" class="form-label">Color de Fondo</label>
            <?php
            if(isset($respuestaLAF['colorFooter'])){
            ?>
            <input name="footerColor" type="color" class="form-control form-control-color colorTitulo" id="exampleColorInput" value="<?=$respuestaLAF['colorFooter']?>" title="Choose your color">
            <?php
            }else{
            ?>
                        <input name="footerColor" type="color" class="form-control form-control-color colorTitulo" id="exampleColorInput" title="Choose your color">

             <?php
            }
            ?>
        </div>

</div>
        <div class="col-4">
         <div class="form-group">
            <label for="exampleColorInput" class="form-label">Color de Texto</label>
            <?php
            if(isset($respuestaLAF['footerTextoColor'])){
            ?>
            <input name="footerTextoColor" type="color" class="form-control form-control-color colorTitulo" id="exampleColorInput" value="<?=$respuestaLAF['footerTextoColor']?>" title="Choose your color">
            <?php
            }else{
            ?>
                        <input name="footerTextoColor" type="color" class="form-control form-control-color colorTitulo" id="exampleColorInput" title="Choose your color">

             <?php
            }
            ?>
        </div>

</div>
        <div class="col-4">
         <div class="form-group">
            <label for="exampleColorInput" class="form-label">Color de Título</label>
            <?php
            if(isset($respuestaLAF['footerTituloColor'])){
            ?>
            <input name="footerTituloColor" type="color" class="form-control form-control-color colorTitulo" id="exampleColorInput" value="<?=$respuestaLAF['footerTituloColor']?>" title="Choose your color">
            <?php
            }else{
            ?>
                        <input name="footerTituloColor" type="color" class="form-control form-control-color colorTitulo" id="exampleColorInput" title="Choose your color">

             <?php
            }
            ?>
        </div>

</div>
        
        <button style="width:100px;" type="submit" class="btn btn-primary m-auto mt-3">Guardar</button>
</div>
    </form>
    </div>
   <script>
$( "#formInfoDiseno" ).on( "submit", function( event ) {
  event.preventDefault();
  
  $.ajax({
    type : 'POST',
    url : '../controllers/lookandfeelController.php',
    data : $('#formInfoDiseno').serialize(),
   success:function(dat){
            if(dat!=false){
          Swal.fire({
                                                   icon: 'success',
                                                   title: 'Éxito',
                                                   text: 'Información guardada con éxito'

                                                 });
               
               window.setTimeout(function () {
                            window.location.href = "./?seccion=lookandfeel"
                        }, 2000);
            } else {
                Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Datos incorrectos, intente nuevamente'
              
              })
            }
        } 
})
});
</script>