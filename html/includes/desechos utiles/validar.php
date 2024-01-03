<?php
    include('utilerias.php');
//hacemos la conexion a la BD
$conexion=conectar();
if(!$conexion){
    redireccionarMsg('Error en la conexion','../agregar-empleado.php');
    return;
}

//para cuando de al boton de guardar el nuevo empleado
if(isset($_POST['registrar'])){
//validar() es una funcion de utilerias que elimina todos los caracteres que sean parte de una consulta o codigo html, ademas de quitar diagonales y espacios en blanco
   $nombre=validar($_POST['nombre']);
   $curp=validar($_POST['curp']);
   $fechaNac=validar($_POST['fechaNac']);
   $telefono=validar($_POST['telefono']);
   $correo=validar($_POST['correo']);
   $tipo=validar($_POST['tipo']);

   if($nombre == '' || $curp == '' || $telefono == '' || $tipo == '' || $fechaNac == ''){
    redireccionarMsg('Informacion no valida Hacker mugroso cochino feo mendigo','../agregar-empleado.php');
    return;
   }


   $sql="insert into empleado(nombre, curp, fechaNac, telefono, correo, tipo) values('$nombre','$curp','$fechaNac','$telefono','$correo','$tipo');";

   $resultado = mysqli_query($conexion, $sql);
   //para ver que se haya insertado correctamente
   if($resultado){
    //mysqli_close($conexion);
        redireccionarMsg('Datos Guardados exitosamente', '../empleados.php');
   }else{
       redireccionarMsg('error: ' . mysqli_error($conexion), '../agregar-empleado.php');
   }
   //cerramos la conexion
  mysqli_close($conexion);

}


?>