<?php
    
    function redireccionarMsg($msg, $dir){
        echo '<div class="alert alert-danger text-center">';
        echo '      <h1 style="text-align: center">'.$msg.' </h1> ';
        echo '      <h4 style="text-align: center"> Redireccionado ... </h4>';
        echo '</div>';        
        header('refresh:1, url='.$dir);
    }


    //funcion para validar la informacion de un formulario
    function validar($texto){
        $texto = trim($texto);//le quita los espacios en blanco
        $texto = stripslashes($texto);//le quita las diagonales
        $texto = htmlspecialchars($texto);//elimina posibles codigos html
        return $texto;
    }
   //funcion para cuando se quiere ingresar a una ventan del administrador sin haber iniciado sesion
   function val_inicio_Sesion(){
    session_start();//para poder hacer tareas que tengan que ver con sesion
        if(!isset($_SESSION['usuario'])){
          redireccionarMsg('No has iniciado sesion','index.php');//por ejemplo esta funcion esta dentro de utilerias              
          die();
        }      
   }
   //funcion para al conexion a la BD
   function conectar(){
        DEFINE('SERVIDOR','localhost');
        DEFINE('USUARIO','root');
        DEFINE('PASSWORD','');
        DEFINE('BD','tortilleria');

        $resultado = mysqli_connect(SERVIDOR, USUARIO, PASSWORD, BD, 33085);
        return $resultado;
   }

function conectar2(){
    $resultado = mysqli_connect('localhost', 'root', '', 'tortilleria', 33085);
    return $resultado;
}

   /*
   function conectarF(){
    DEFINE('SERVIDOR','localhost');
    DEFINE('USUARIO','root');
    DEFINE('PASSWORD','');
    DEFINE('BD','frontera');

    $resultado = mysqli_connect(SERVIDOR, USUARIO, PASSWORD, BD, 33085);
    if(!$resultado){
        echo "No se realizo la conexion a la basa de datos, el error fue:".
        mysqli_connect_error() ;
    }
   }*/




//esta funcion es reutilizable para cualquier mensaje de alerta
   function redireccionarMsg2($msg, $dir, $tm){
    echo '
    <!DOCTYPE html>
    <html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>La Frontera</title>
        <link rel="shortcut icon" href="img/alexcgdesign.png" type="image/x-icon">
        <!--FUENTES-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link href="https://fonts.googleapis.com/css2?family=Montserrat+Alternates:wght@500&family=Pacifico&family=Patua+One&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700,800&display=swap" rel="stylesheet"> 
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab&display=swap" rel="stylesheet">
        <!--SCRIPTS-->
        <script src="../js/menu.js" defer></script>  
        <!--CSS-->
        <link rel="stylesheet" href="../../css/grid.css">
        <link rel="stylesheet" href="../../css/index.css">
    </head>
    <body>
        <!---------MENU----------->
        <nav id="menu">       
           <div class="logo" id="logo1">
                <a href="">
                    <img src="../../img/logo.png" alt="">
                    <div>
                        <h3>Tortilleria</h3>
                        <p>La Frontera</p>
                    </div>
                </a>
            </div>
            
            <div class="item opcion">
                    <a href="#" ><i class="fa-solid fa-house-user"></i><p>Home</p></a>
            </div>
            <div class="item opcion">
                    <a href="#" ><i class="fa-solid fa-circle-info"></i><p>informacion</p></a>
            </div>
            <div class="item opcion">
                    <a href="#"><i class="fa-solid fa-desktop"></i><p>mostrador</p></a>
            </div>
            <div class="item opcion">
                    <a href="#"><i class="fa-solid fa-users"></i><p>Empleados</p></a>
            </div>
            <div class="item opcion">
                <a href="#"><i class="fa-solid fa-note-sticky"></i><p>Notas</p></a>
            </div>
            <div class="item opcion">
                <a href="#"><i class="fa-solid fa-money-bill"></i><p>Deudores</p></a>
            </div>
            <div class="item opcion">
                <a href="#"><i class="fa-solid fa-database"></i><p>consultas</p></a>
            </div>
        </nav>
    ';
    echo '
     <!---------HEADER----------->
     <header class="encabezado">            
         <h1 class="titulo">Mensaje</h1>
         <div class="componentes-der">
             <a href="login.html"><i class="fa-solid fa-right-from-bracket">salir</i></a>
           <h2 id="menu-boton">&#9776;</h2>
         </div>
     </header>
     <!--DIFERENTES VENTANAS DEL SISTEMA-->
        <main>
             <div class="container mt-5">
             <div class="row">
             <div class="col-sm-6 offset-sm-3">
             <div class="alert alert-danger text-center" style="background: #8EB78F; color:#EDF6ED;">    
                 <h1>'.$msg.'</h1>
                 <p>Redireccionando...</p>
             </div>
             </div>
             </div>
             </div>

        </main>
    ';
    header('refresh:'.$tm.', url='.$dir);
    include('pie.php'); 
}

?>