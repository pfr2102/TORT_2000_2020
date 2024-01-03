<?php
   include('includes/utilerias.php');
   include('includes/menu.php'); 
   //por el metodo _GET tomamos el valos de la variables que les declaramos un valor en el boton eliminar que es un hipervinculo
    $id_empleado = $_GET['id'];
    $funcion = $_GET['funcion'];
    $cancelar = $_GET['cancelar_'];
    
?>

    <!---------HEADER----------->
    <header class="encabezado">            
        <h1 class="titulo">Eliminar</h1>
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
            <div class="alert alert-danger text-center">    
                <p>¿Desea confirmar la eliminacion del registro?</p>
            </div>

            <div class="row">
                <div class="col-sm-6">
                    <form action="./includes/_functions.php" method="POST">
                        <input type="hidden" name="accion" value=<?php echo $funcion; ?>>
                        <input type="hidden" name="id" value="<?php echo $id_empleado; ?>">
                        <input type="submit" name="" value="Eliminar" class="btn btn-success">
                        <a href="<?php echo $cancelar;?>"  class="btn btn-danger">Canselar</a>
                    </form>
                </div>
            </div>

            
       </main>
<?php
    include('includes/pie.php'); 
?>      
