<?php

$SERVIDOR='localhost';
$USUARIO='root';
$PASSWORD='';
$BD='tortilleria';

 $conexion = mysqli_connect($SERVIDOR, $USUARIO, $PASSWORD, $BD, 33085);

 if(!$conexion){
    echo "No se realizo la conexion a la basa de datos, el error fue:".
    mysqli_connect_error() ;
}

?>

