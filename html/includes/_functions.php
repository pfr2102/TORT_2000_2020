<?php
include('utilerias.php');

//if(!isset($_POST['buscador'])){header("Location: empleados.php");}

//_db.php es un archivo que hace lo mismo que el metodo conectar() solo que dentro de un archivo para poder forzar la conexion
require_once ("_db.php");

//$pepe = $_GET['funcion'];
if(isset($_GET['funcion'])){

    switch ($_GET['funcion']) {
        case 'eliminar_registro_nota_2':
            eliminar_registro_nota_2();
         break;

        case 'eliminar_registro_empleado';
            eliminar_registro_empleado();
        break;

        case 'eliminar_registro_producto';
            eliminar_registro_producto();
        break; 

        case 'eliminar_registro_tienda';
            eliminar_registro_tienda();
        break;  
    }
}

// accion es el nombre de un input de tipo hidden el cual le damos un valor en el formulario para el switch case
if (isset($_POST['accion'])){ 
    switch ($_POST['accion']){
        //casos de registros
        //////////PARA LA TABLA DE EMPLEADOS////////////
        case 'agregar_registro_empleado':
            agregar_registro_empleado();
        break; 

        case 'editar_registro_empleado':
            editar_registro_empleado();
        break;         
       //////////PARA LA TABLA DE NOTA////////////
        case 'agregar_registro_nota':
            agregar_registro_nota();
        break; 

        case 'editar_registro_nota':
            editar_registro_nota();
        break; 

        case 'eliminar_registro_nota';
        eliminar_registro_nota();
        break;
       //////////PARA LA TABLA DE NOTA////////////
       case 'agregar_registro_producto':
        agregar_registro_producto();
        break; 

        case 'editar_registro_producto':
            editar_registro_producto();
        break; 
        //////////PARA LA TABLA DE TIENDA////////////
       case 'agregar_registro_tienda':
        agregar_registro_tienda();
        break; 

        case 'editar_registro_tienda':
            editar_registro_tienda();
        break;         

        case 'acceso_user';
            acceso_user();
        break;

	}

}



/////////////////////////////////////////////////////FUNCIONES PARA EMPLEADOS//////////////////////////////////////////////////////////////////
function editar_registro_empleado() {
		$conexion=conectar();
		extract($_POST);
		$sql="UPDATE empleado SET nombre = '$nombre', curp = '$curp', fechaNac = '$fechaNac',
		telefono ='$telefono', correo = '$correo', tipo = '$tipo' WHERE id_empleado = '$id' ";

		mysqli_query($conexion, $sql);

		header('Location: ../empleados.php');
}
/*-------------------------------------------------------------------*/
function eliminar_registro_empleado() {
    $conexion=conectar();
    //extract($_POST);
    $id = $_GET['id'];
    //$sql="DELETE FROM empleado WHERE id_empleado = '$id' ";
    $sql="UPDATE empleado SET status = 'INACTIVO' WHERE id_empleado = '$id' ";
    mysqli_query($conexion, $sql);
    header('Location: ../empleados.php');
}
/*-------------------------------------------------------------------*/
function agregar_registro_empleado(){
    $conexion=conectar();
    if(!$conexion){ redireccionarMsg('Error en la conexion','../agregar-empleado.php'); return; }
    //para cuando le de al boton de guardar del nuevo empleado
    if(isset($_POST['registrar'])){
    //validar() es una funcion de utilerias que elimina todos los caracteres que sean parte de una consulta o codigo html, ademas de quitar diagonales y espacios en blanco
       $nombre=validar($_POST['nombre']);
       $curp=validar($_POST['curp']);
       $fechaNac=validar($_POST['fechaNac']);
       $telefono=validar($_POST['telefono']);
       $correo=validar($_POST['correo']);
       $tipo=validar($_POST['tipo']);

       $sql="INSERT INTO empleado(nombre, curp, fechaNac, telefono, correo, tipo) values('$nombre','$curp','$fechaNac','$telefono','$correo','$tipo');";
       $resultado = mysqli_query($conexion, $sql);
       //para ver que se haya insertado correctamente
    if($resultado){redireccionarMsg2('Datos Guardados exitosamente', '../empleados.php',1);}
       else{redireccionarMsg2('error: ' . mysqli_error($conexion), '../empleados.php',4);}
       //cerramos la conexion
      mysqli_close($conexion);
    }
}

/////////////////////////////////////////////////////FUNCIONES PARA NOTAS//////////////////////////////////////////////////////////////////
function editar_registro_nota() {
    $conexion=conectar();
    extract($_POST);    
    $sql="UPDATE nota SET descripcion = '$descripcion', fecha = '$fecha' WHERE codigo_nota = '$id' ";
    mysqli_query($conexion, $sql);

    header('Location: ../notas.php');
}
/*-------------------------------------------------------------------*/
function eliminar_registro_nota() {
    $conexion=conectar();
    extract($_POST);
    $sql="DELETE FROM nota WHERE codigo_nota = '$id' ";
    mysqli_query($conexion, $sql);
    header('Location: ../notas.php');
}

function eliminar_registro_nota_2() {
    $conexion=conectar();
    $id = $_GET['id'];
    $sql="DELETE FROM nota WHERE codigo_nota = '$id' ";
    
    mysqli_query($conexion, $sql);
    header('Location: ../notas.php');
    }
/*-------------------------------------------------------------------*/
function agregar_registro_nota(){
    $conexion=conectar();
    if(!$conexion){ redireccionarMsg('Error en la conexion','../notas.php'); return; }
    //para cuando de al boton de guardar el nuevo empleado
    if(isset($_POST['registrar'])){
    //validar() es una funcion de utilerias que elimina todos los caracteres que sean parte de una consulta o codigo html, ademas de quitar diagonales y espacios en blanco
    $descripcion=validar($_POST['descripcion']);
    $fecha=validar($_POST['fecha']);

    //validacion para que no se repitan fechas
    $sql="select * from nota where fecha = '$fecha'";
    $resultado = mysqli_query($conexion, $sql);
    if($resultado -> num_rows >0){ redireccionarMsg2('No puedes crear varias notas para una misma fecha', '../notas.php',4); return;}

    //en caso de no ser repetida insertamos la nueva nota
    $sql="insert into nota(descripcion, fecha) values('$descripcion','$fecha');";
    $resultado = mysqli_query($conexion, $sql);
    //para ver que se haya insertado correctamente
    if($resultado){
        redireccionarMsg2('Datos Guardados exitosamente', '../notas.php',1);
        //header('refresh:0, url="../notas.php"');        
    }
    else{redireccionarMsg2('error: ' . mysqli_error($conexion), '../notas.php',2);}
    //cerramos la conexion
    mysqli_close($conexion);
    }
}

/////////////////////////////////////////////////////FUNCIONES PARA PRODUCTOS//////////////////////////////////////////////////////////////////
function editar_registro_producto() {
    $conexion=conectar();
    extract($_POST);
    $sql="UPDATE producto SET nombre ='$nombre',descripcion='$descripcion',precio_casa='$precio_casa',precio_tienda='$precio_tienda',precio_local='$precio_local',
    comi_repartidor_tienda='$comision_tiendas',comi_repartidor_casa='$comision_casas' WHERE id_producto = '$id';";
    $resultado = mysqli_query($conexion, $sql);
    
    if(!$resultado){redireccionarMsg2('error: ' . mysqli_error($conexion), '../producto.php',2);}
    //cerramos la conexion
    mysqli_close($conexion);

    header('Location: ../producto.php');
}
/*-------------------------------------------------------------------*/
function eliminar_registro_producto() {
    $conexion=conectar();
    //extract($_POST);
    $id = $_GET['id'];
    //$sql="DELETE FROM producto WHERE id_producto = '$id' ";
    $sql="UPDATE producto SET status = 'INACTIVO' WHERE id_producto = '$id' ";
    mysqli_query($conexion, $sql);
    //cerramos la conexion
    mysqli_close($conexion);
    header('Location: ../producto.php');
}
/*-------------------------------------------------------------------*/
function agregar_registro_producto(){
    $conexion=conectar();
    if(!$conexion){
        redireccionarMsg('Error en la conexion','../producto.php');
        return;
    }
    //para cuando de al boton de guardar el nuevo empleado
    if(isset($_POST['registrar'])){
    //validar() es una funcion de utilerias que elimina todos los caracteres que sean parte de una consulta o codigo html, ademas de quitar diagonales y espacios en blanco
    $nombre=validar($_POST['nombre']);
    $descripcion=validar($_POST['descripcion']);
    $precio_casa=validar($_POST['precio_casa']);
    $precio_tienda=validar($_POST['precio_tienda']);
    $precio_local=validar($_POST['precio_local']);
    $comi_repa_tienda=validar($_POST['comision_tiendas']);
    $comi_repa_casa=validar($_POST['comision_casas']);

    $sql="INSERT INTO producto(nombre, descripcion, precio_casa, precio_tienda, precio_local, comi_repartidor_tienda, comi_repartidor_casa) VALUES('$nombre','$descripcion','$precio_casa','$precio_tienda','$precio_local','$comi_repa_tienda','$comi_repa_casa');";
    $resultado = mysqli_query($conexion, $sql);
    //para ver que se haya insertado correctamente
    if($resultado){redireccionarMsg2('Datos Guardados exitosamente', '../producto.php',1);}
    else{redireccionarMsg2('error: ' . mysqli_error($conexion),  '../producto.php',4);}
    //cerramos la conexion
    mysqli_close($conexion);
    }
}

/////////////////////////////////////////////////////FUNCIONES PARA TIENDAS//////////////////////////////////////////////////////////////////
function editar_registro_tienda() {
    $conexion=conectar();
    extract($_POST);
    $sql="UPDATE tienda SET nombre ='$nombre',ubicacion='$ubicacion', propietario='$propietario', telefono='$telefono' WHERE id_tienda = '$id';";
    $resultado = mysqli_query($conexion, $sql);
    
    if(!$resultado){redireccionarMsg2('error: ' . mysqli_error($conexion), '../tienda.php',2);}
    //cerramos la conexion
    mysqli_close($conexion);
    header('Location: ../tienda.php');
}
/*-------------------------------------------------------------------*/
function eliminar_registro_tienda() {
    $conexion=conectar();
    //extract($_POST);
    $id = $_GET['id'];
    //$sql="DELETE FROM producto WHERE id_producto = '$id' ";
    $sql="UPDATE tienda SET status = 'INACTIVO' WHERE id_tienda = '$id' ";
    mysqli_query($conexion, $sql);
    //cerramos la conexion
    mysqli_close($conexion);
    header('Location: ../tienda.php');
}
/*-------------------------------------------------------------------*/
function agregar_registro_tienda(){
    $conexion=conectar();
    if(!$conexion){
        redireccionarMsg('Error en la conexion','../tienda.php');
        return;
    }

    //para cuando de al boton de guardar el nuevo empleado
    if(isset($_POST['registrar'])){
    //validar() es una funcion de utilerias que elimina todos los caracteres que sean parte de una consulta o codigo html, ademas de quitar diagonales y espacios en blanco
    $nombre=validar($_POST['nombre']);
    $ubicacion=validar($_POST['ubicacion']);
    $propietario=validar($_POST['propietario']);
    $telefono=validar($_POST['telefono']);

    $sql="INSERT INTO tienda (nombre, ubicacion, propietario, telefono) VALUES('$nombre','$ubicacion','$propietario','$telefono');";
    $resultado = mysqli_query($conexion, $sql);
    //para ver que se haya insertado correctamente
    if($resultado){redireccionarMsg2('Datos Guardados exitosamente', '../tienda.php',1);}
    else{redireccionarMsg2('error: ' . mysqli_error($conexion),  '../tienda.php',4);}
    //cerramos la conexion
    mysqli_close($conexion);
    }
}
?>