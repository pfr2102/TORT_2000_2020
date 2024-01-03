<?php
    include('includes/utilerias.php');
    include('includes/menu.php'); 
?>
    <!---------HEADER----------->
    <header class="encabezado">            
        <h1 class="titulo">EMPLEADOS</h1>
        <div class="componentes-der">
            <a href="login.php"><i class="fa-solid fa-right-from-bracket">salir</i></a>
            
          <h2 id="menu-boton">&#9776;</h2>
        </div>
    </header>


<!---------------------------------------------------------------------------------------------------------------------------------------------------------------------------->
<!--ESTRUCTURA DE LA VENTANA EMERGENTE DEL FORMULARIO PARA AGREGAR UN NUEVO REGISTRO-->
<div class="modal fade" id="create" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-ds-backdrop="static">
         <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
             <div class="modal-content">

                 <div class="modal-header">
                     <h3 class="modal-title" id="exampleModalLabel">Registro Empleado</h3>
                     <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" onclick="limpiarForm()"></button>
                 </div><!--fin modal-header-->

                 <div class="modal-body">
                   <form  action="./includes/_functions.php" method="POST" id="formul" name="formul">
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
                               <input type="text" id="telefono" name="telefono" class="form-control" value="" maxlength="10" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" required>  
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
                               <!--ESTOS INPUT ES IMPORTANTES YA QUE EL ARCHIVO _functions.php HACE USO DE EL PARA PODER SABER QUE FUNCION EJECUTAR DENTRO DEL SWITCH-->
                               <input type="hidden" name="accion" id="accion" value="agregar_registro_empleado">
                               <input type="hidden" name="id" id="id_" value="">
                           </div>
                            <br>
                 </div><!--fin modal-body-->

                 <div class="modal-footer">
                        <div class="mb-3">
                            <input type="submit" value="Guardar" class="btn btn-success btn-lg" name="registrar" id="register">
                            <button type="button" class="btn btn-danger btn-lg" data-bs-dismiss="modal"  aria-label="Close" onclick="limpiarForm()">Cancelas</button>                                 
                        </div>
                     </form>
                 </div><!--fin modal-footer-->

             </div>
         </div>
     </div>
     <!--SCRIPT PARA VENTANA MODAL DE EDITAR Y AGREGAR-->
    <script>
            function editForm(datos){
                    //alert(datos);      
                    d=datos.split("||");
                    //alert(d[0]);                    
                    document.formul.nombre.value=d[1];
                    document.formul.curp.value=d[2];
                    document.formul.fechaNac.value=d[3];
                    document.formul.telefono.value=d[4];
                    document.formul.correo.value=d[5];
                    document.formul.tipo.value=d[6];
                    document.formul.accion.value='editar_registro_empleado';
                    document.formul.id_.value=d[0];
                    document.formul.register.value='Editar';
            }
            function agregaForm(){
                document.formul.accion.value='agregar_registro_empleado';
                document.formul.register.value='Guardar';
            }
    </script>
<!---------------------------------------------------------------------------------------------------------------------------------------------------------------------------->

    <!--VENTANA PRINCIPAL ESTATICA-->
       <main class="overflow-auto">       
            <!--<div class="container is-fluid grid" id="content_main">-->
            <div id="content_main">
                <br>
                <div class="col-xs-12">
                        <h1>Lista de Empleados</h1>
                    <br>
                        <div>
                           <button type="button" class="btn btn-success btn-lg" onclick="tableToExcel('tblDatos', 'W3C Example Table')" value=""><i class="fas fa-file-excel"></i> Excel</button>                          
                        </div>
                </div>                                
      
                <br>
                <!--TABLA DEL GRID-->
                <table class="table table-striped table-dark table_id" id="tblDatos" >
                <!--encabezado de la tabla-->
                <thead>    
                    <tr>
                    <th>ID</th>
                    <th>FECHA</th>
                    <th>Fecha nacimiento</th>
                    <th>Telefono</th>
                    <th>Correo</th>
                    <th>Tipo</th>
                    <th>Acciones</th>
                    </tr>
                </thead>
                <!--cuerpo de la tabla donde se muestran los registros-->
                <tbody>
                    <?php
                        $conexion=conectar();             
                        $SQL="SELECT * FROM empleado WHERE status= 'ACTIVO'";
                        //$SQL="SELECT * FROM empleado where tipo = 'repartidor'";
                        $dato = mysqli_query($conexion, $SQL);
                        if($dato -> num_rows >0){
                            while($fila=mysqli_fetch_array($dato)){
                             $datos = $fila['id_empleado']."||". $fila['nombre']."||".$fila['curp']."||".$fila['fechaNac']."||".$fila['telefono']."||".$fila['correo']."||".$fila['tipo'];
                    ?>
                        <tr>
                        <td><?php echo $fila['nombre']; ?></td>
                        <td><?php echo $fila['curp']; ?></td>
                        <td><?php echo $fila['fechaNac']; ?></td>
                        <td><?php echo $fila['telefono']; ?></td>
                        <td><?php echo $fila['correo']; ?></td>
                        <td><?php echo $fila['tipo']; ?></td>
                        <td>
                            <button class="btn btn-warning" onclick="editForm('<?php echo $datos;?>')"  data-bs-toggle="modal" data-bs-target="#create"><ion-icon name="create"></ion-icon></button>
                            <a class="btn btn-danger btn-del" href="includes/_functions.php?id=<?php echo $fila['id_empleado'];?>&funcion=eliminar_registro_empleado"><ion-icon name="trash"></ion-icon></a>
                        </td>
                        </tr>

                    <?php
                          }
                        }
                    ?>
                </tbody>
                </table>
                <!--<div id="paginador" class=""></div>-->            
            </div>
        </main>
<?php
    include('includes/pie.php'); 
?>