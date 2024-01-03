<?php
   include('includes/utilerias.php');
   include('includes/menu.php'); 

    $cancelar = 'notas.php';

    $id_ = $_GET['id'];

    $conexion = conectar();
    $consulta = "select * from nota where codigo_nota = $id_";
    $resultado = mysqli_query($conexion, $consulta);
    $nota = mysqli_fetch_assoc($resultado);
     
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
                                        <h3 class="text-center">Editar Nota</h3>

                                        <div class="form-group">
                                            <label for="descripcion" class="form-label">Descripcion *</label>
                                            <textarea  name="descripcion" rows="5" cols="33" class="form-control" placeholder="agrega tu nota" require><?php echo $nota['descripcion'];?></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="fecha" class="form-label">Fecha:</label>
                                            <input type="date" name="fecha" id="fecha" class="form-control" value="<?php echo $nota['fecha'];?>" required>
                                        </div>
                                        <div class="form-group">
                                            <!--ESTE INPUT ES IMPORTANTES YA QUE EL ARCHIVO _functions.php HACE USO DE EL PARA PODER SABER QUE FUNCION EJECUTAR DENTRO DEL SWITCH-->
                                            <input type="hidden" name="accion" value="editar_registro_nota">
                                            <input type="hidden" name="id" value="<?php echo $id_;?>">
                                        </div>
                                         <br>
                                        <div class="mb-3">
                                            <button type="submit" class="btn btn-success btn-lg" >Editar</button>
                                            <a href="<?php echo $cancelar;?>" class="btn btn-danger btn-lg">Cancelar</a>
                                        
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
