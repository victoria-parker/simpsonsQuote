<?php
function loguear($archivo,$modo,$mensaje){
    $date= new DateTime();
    $format=$date->format("Y-m-d H:i:s");
    $fp=fopen($archivo,$modo);
    fwrite($fp,"[".$format."]\t".$mensaje.PHP_EOL);
    fclose($fp);
}
