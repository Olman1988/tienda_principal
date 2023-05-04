<?php
session_start();

$_SESSION['cap_code'] = $ranStr;

// crea imágen tamaño X por Y
$captcha_imagen = imagecreate(107,30);

$color_fondo = imagecolorallocate ($captcha_imagen, 244, 244, 244);
$color_letras = imagecolorallocate ($captcha_imagen, 212, 208, 200);

imagefill($captcha_imagen, 0, 0, $color_fondo);

session_start();
$captcha_texto = $HTTP_SESSION_VARS["captcha_texto_session"];

// (imagen, tamaño, pos x, pos y, cadena aleatoria, color de letra) 6,5,6.4
imagechar($captcha_imagen, mt_rand(3, 15), 20, mt_rand(1, 15), $captcha_texto[0] ,$color_letras);
imagechar($captcha_imagen, mt_rand(3, 15), 40, mt_rand(1, 15), $captcha_texto[1] ,$color_letras);
imagechar($captcha_imagen, mt_rand(3, 15), 60, mt_rand(1, 15), $captcha_texto[2] ,$color_letras);
imagechar($captcha_imagen, mt_rand(3, 15), 80, mt_rand(1, 15), $captcha_texto[3] ,$color_letras);

var_dump($captcha_imagen);
header("Content-type: image/jpeg");
imagejpeg($captcha_imagen);
?>