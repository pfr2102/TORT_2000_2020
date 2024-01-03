<?php
   include('includes/utilerias.php');
   include('includes/menu.php'); 

    $id_empleado = $_GET['id'];
//echo "<h1>$id_empleado</h1>";

    $conexion = conectar();
    $consulta = "select * from empleado where id_empleado = $id_empleado";
    $resultado = mysqli_query($conexion, $consulta);
    $empleado = mysqli_fetch_assoc($resultado);
     
?>

    <!---------HEADER----------->
    <header class="encabezado">            
        <h1 class="titulo">agregar-empleado</h1>
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
                                        <h3 class="text-center">Editar empleado</h3>
                                        <div class="form-group">
                                            <label for="nombre" class="form-label">Nombre *</label>
                                            <input type="text"  id="nombre" name="nombre" class="form-control" value="<?php echo $empleado['nombre']; ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="curp" class="form-label">Curp *</label>
                                            <input type="text"  id="curp" name="curp" class="form-control" value="<?php echo $empleado['curp']; ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="fechaNac" class="form-label">Fecha Nacimiento:</label>
                                            <input type="date" name="fechaNac" value="<?php echo $empleado['fechaNac'];?>" id="fechaNac" max="2020-01-01" class="form-control" value="<?php echo $usuario['fechaNac']; ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="telefono" class="form-label">Telefono *</label>
                                            <input type="tel"  id="telefono" name="telefono" class="form-control" value="<?php echo $empleado['telefono']; ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="correo" class="form-label">Correo:</label><br>
                                            <input type="email" name="correo" id="correo" class="form-control" placeholder="" value="<?php echo $empleado['correo']; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="tipo" class="form-label">Tipo:</label><br>
                                            <select id="tipo" name="tipo" class="form-control">
                                                <option value="mostrador" <?php if($empleado['tipo'] == 'mostrador'){echo "selected";}?>>Mostrador</option>
                                                <option value="repartidor" <?php if($empleado['tipo'] == 'repartidor'){echo "selected";}?>>Repartidor</option>
                                                <option value="maquina" <?php if($empleado['tipo'] == 'maquina'){echo "selected";}?>>Maquina</option>
                                                <option value="cachadora" <?php if($empleado['tipo'] == 'cachadora'){echo "selected";}?>>Cachadora</option>
                                            </select>
                                            <!--ESTOS INPUTS SON IMPORTANTES YA QUE EL ARCHIVO _functions.php HACE USO DE ELLOS PARA PODER SABER QUE FUNCION EJECUTAR DENTRO DEL SWITCH-->
                                            <input type="hidden" name="accion" value="editar_registro_empleado">
                                            <input type="hidden" name="id" value="<?php echo $id_empleado;?>">
                                            
                                        </div>
                                         <br>

                                        <div class="mb-3">
                                            <button type="submit" class="btn btn-success btn-lg" >Editar</button>
                                            <a href="empleados.php" class="btn btn-danger btn-lg">Cancelar</a>
                                        
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
