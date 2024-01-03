<?php
    include('includes/menu.php'); 
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
                                        <h3 class="text-center">Registro de nuevo empleado</h3>
                                        <div class="form-group">
                                            <label for="nombre" class="form-label">Nombre *</label>
                                            <input type="text"  id="nombre" name="nombre" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="curp" class="form-label">Curp *</label>
                                            <input type="text"  id="curp" name="curp" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="fechaNac" class="form-label">Fecha Nacimiento:</label>
                                            <input type="date" name="fechaNac" id="fechaNac" max="2020-01-01" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="telefono" class="form-label">Telefono *</label>
                                            <input type="tel"  id="telefono" name="telefono" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="correo">Correo:</label><br>
                                            <input type="email" name="correo" id="correo" class="form-control" placeholder="">
                                        </div>
                                        <div class="form-group">
                                            <label for="tipo" class="form-label">Tipo:</label><br>
                                            <select id="tipo" name="tipo" class="form-control" value="maquina">
                                                <option value="mostrador" >Mostrador</option>
                                                <option value="repartidor">Repartidor</option>
                                                <option value="maquina">Maquina</option>
                                                <option value="cachadora">Cachadora</option>
                                            </select>
                                            <!--ESTE INPUT ES IMPORTANTES YA QUE EL ARCHIVO _functions.php HACE USO DE EL PARA PODER SABER QUE FUNCION EJECUTAR DENTRO DEL SWITCH-->
                                            <input type="hidden" name="accion" value="agregar_registro_empleado">
                                        </div>
                                         <br>

                                        <div class="mb-3">
                                            <input type="submit" value="Guardar" class="btn btn-success"  name="registrar">
                                            <a href="empleados.php" class="btn btn-danger">Cancelar</a>                                        
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
