<?php
    include('includes/menu.php'); 
    $cancelar = 'notas.php';
    $funcion = 'agregar_registro_nota';
    $fechaActual= "20".str_replace("/","-", date('y/m/d'));

?>

    <!---------HEADER----------->
    <header class="encabezado">            
        <h1 class="titulo">agregar-nota</h1>
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
                                        <h3 class="text-center">Registro de nueva Nota</h3>
                                        <div class="form-group">
                                            <label for="descripcion" class="form-label">Descripcion *</label>
                                            <textarea  name="descripcion" rows="5" cols="33" class="form-control" placeholder="agrega tu nota" required></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="fecha" class="form-label">Fecha:</label>
                                            <input type="date" name="fecha" id="fecha" min="<?php echo "$fechaActual";?>" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <!--ESTE INPUT ES IMPORTANTES YA QUE EL ARCHIVO _functions.php HACE USO DE EL PARA PODER SABER QUE FUNCION EJECUTAR DENTRO DEL SWITCH-->
                                            <input type="hidden" name="accion" value="<?php echo $funcion ;?>">
                                        </div>
                                         <br>
                                         
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