<?php
session_start();
$moegliche_zeichen = "A B C D E F G H J K M N Q R T U V W X Y 2 3 4 5 7 8";
$kombinationen = explode(" ", $moegliche_zeichen);
shuffle ( $kombinationen );
$text = array_slice($kombinationen, 0, 5);
$SESSION['captcha-wert'] = $text;
Header ("Content-type: image/png");

$bild = imagecreate (400 ,400);
ImageColorAllocate ($bild, 255, 255, 255);
$text_farbe = ImageColorAllocate ($bild, 0, 0, 0);
for($i=0;$i<5;$i++){
  ImageString ($bild, 5, 25+$i*75, (25+$i*75), $text[$i], $text_farbe);
}

ImagePng ($bild);
?>