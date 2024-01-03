<?php
    include('includes/menu.php'); 
    $funcion = 'agregar_registro_producto';
    $cancelar = 'producto.php';
    $fechaActual= "20".str_replace("/","-", date('y/m/d'));


?>

    <!---------HEADER----------->
    <header class="encabezado">            
        <h1 class="titulo">agregar-producto</h1>
        <h1 class="fechaHead"><?php echo $fechaActual;?></h1>
        <div class="componentes-der">
            <a href="login.html"><i class="fa-solid fa-right-from-bracket">salir</i></a>
            
          <h2 id="menu-boton">&#9776;</h2>
        </div>
    </header>

    <!--DIFERENTES VENTANAS DEL SISTEMA-->
       <main>    

            <form  action="./includes/_functions.php" method="POST">
            <div id="login" >
                    <div class="container">
                        <div id="login-row" class="row justify-content-center align-items-center">
                            <div id="login-column" class="col-md-6">
                                <div id="login-box" class="col-md-12">
                                        <br>
                                        <br>
                                        <h3 class="text-center">Registro de nuevo Producto</h3>
                                        <div class="form-group">
                                            <label for="descripcion" class="form-label">Nombre producto</label>
                                            <input type="text" name="nombre" class="form-control" placeholder="Agrega nombre del producto" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="descripcion" class="form-label">Descripcion</label>
                                            <textarea  name="descripcion" rows="3" cols="33" class="form-control" placeholder="Agrega algo sobre el producto"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="precio" class="form-label">Precio del Producto $:</label>
                                            <input type="number" class="form-control" id="precio" name="precio" step="0.01" min="5.00"   placeholder="Precio del producto en pesos" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="precio" class="form-label">Comision Repartidor en tiendas $:</label>
                                            <input type="number" class="form-control" name="comision_tiendas" step="0.01" min="0.01"   placeholder="comision del repartidor en las tiendas" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="precio" class="form-label">Comision Repartidor en Casas $:</label>
                                            <input type="number" class="form-control" name="comision_casas" step="0.01" min="0.01"   placeholder="comision del repartidor en las Casas" required>
                                        </div>
                                        <div class="form-group">
                                            <!--ESTE INPUT ES IMPORTANTES YA QUE EL ARCHIVO _functions.php HACE USO DE EL PARA PODER SABER QUE FUNCION EJECUTAR DENTRO DEL SWITCH-->
                                            <input type="hidden" name="accion" value="<?php echo $funcion ;?>">
                                        </div>
                                         
                                        <div class="mb-3">
                                            <input type="submit" value="Guardar" class="btn btn-success"  name="registrar">
                                            <a href="<?php echo $cancelar;?>" class="btn btn-danger">Cancelar</a>                                        
                                        </div>

                                </div>
                            </div>
                        </div>
                    </div>
            </div>
            </form>
           
         </main>
<?php
    include('includes/pie.php'); 
?>      
