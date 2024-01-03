<?php
    include('includes/utilerias.php');
    include('includes/menu.php'); 
    $id_campo ='id_tienda';
    $tabla = 'tienda';
    $funcion = 'eliminar_registro_tienda';
    $cancelar = 'tienda.php';
    $fechaActual= "20".str_replace("/","-", date('y/m/d'));

?>
    <!---------HEADER----------->
    <header class="encabezado">            
        <h1 class="titulo">TIENDAS</h1>
        <div class="componentes-der">
            <a href="login.php"><i class="fa-solid fa-right-from-bracket">salir</i></a>
            
          <h2 id="menu-boton">&#9776;</h2>
        </div>
    </header>


<!--ESTRUCTURA DE LA VENTANA EMERGENTE DEL FORMULARIO PARA AGREGAR UN NUEVO REGISTRO-->
    <div class="modal fade" id="create" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-ds-backdrop="static">
         <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
             <div class="modal-content">
                 <div class="modal-header">
                     <h3 class="modal-title" id="exampleModalLabel">Registro de Tienda</h3>
                     <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" onclick="limpiarForm()"></button>
                 </div><!--fin modal-header-->
                 <div class="modal-body">
                   <form  action="./includes/_functions.php" method="POST"  name="formul" id="formul">
                     <div class="form-group">
                         <label for="descripcion" class="form-label">Nombre de Tienda</label>
                         <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Agrega nombre de la Tienda" required>
                     </div>
                     <div class="form-group">
                         <label for="descripcion" class="form-label">Ubicacion</label>
                         <textarea  name="ubicacion" id="ubicacion" rows="3" cols="33" class="form-control" onkeypress="noEnter()" placeholder="Agrega alguna referencia del lugar"></textarea>
                     </div>
                     <div class="form-group">
                         <label for="propietario" class="form-label">Propietario:</label>
                         <input type="text" name="propietario" id="propietario" class="form-control" placeholder="Agrega nombre completo" required>
                     </div>
                     <div class="form-group">
                               <label for="telefono" class="form-label">Telefono *</label>
                               <input type="text" id="telefono" name="telefono" class="form-control" value="" maxlength="10" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;">  
                     </div>
              
                     <div class="form-group">
                         <!--ESTE INPUT ES IMPORTANTES YA QUE EL ARCHIVO _functions.php HACE USO DE EL PARA PODER SABER QUE FUNCION EJECUTAR DENTRO DEL SWITCH-->
                         <input type="hidden" name="accion" id="accion" value="agregar_registro_tienda">
                          <input type="hidden" name="id" id="id_" value="">
                     </div>
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
                    document.formul.ubicacion.defaultValue=d[2];
                    document.formul.propietario.value=d[3];
                    document.formul.telefono.value=d[4];
                    document.formul.accion.value='editar_registro_tienda';
                    document.formul.id_.value=d[0];
                    document.formul.register.value='Editar';
            }
            function agregaForm(){
                document.formul.accion.value='agregar_registro_tienda';
                document.formul.register.value='Guardar';
            }
    </script>


    <!--DIFERENTES VENTANAS DEL SISTEMA-->
       <main class="overflow-auto">       
            <div id="content_main">
                <br>
                <div class="col-xs-12">
                        <h1>Lista de Tiendas</h1>
                    <br>
                    <div>
                        <button type="button" class="btn btn-success btn-lg " data-bs-toggle="modal" data-bs-target="#create" onclick="agregaForm()"> <ion-icon name="storefront"></ion-icon> Nueva Tienda </button>
                    </div>
                </div>
                <br>                         
                <!--TABLA DEL GRID-->
                <table class="table table-striped table-dark table_id" id="tblDatos" >
                <!--encabezado de la tabla-->
                <thead>    
                    <tr>
                    <th>Nombre</th>
                    <th>Ubicacion</th>
                    <th>Propietario</th>
                    <th>Telefono</th>
                    <th>Acciones</th>
                    </tr>
                </thead>
                <!--cuerpo de la tabla donde se muestran los registros-->
                <tbody>

                    <?php
                        $conexion=conectar();             
                        $SQL="SELECT * FROM $tabla WHERE status = 'ACTIVO'  AND nombre NOT in ('CASA','MOSTRADOR') ";//status es el nombre del campo en la BD
                        //$SQL="SELECT * FROM empleado where tipo = 'repartidor'";
                        $dato = mysqli_query($conexion, $SQL);

                            while($fila=mysqli_fetch_array($dato)){
                              $datos = $fila['id_tienda']."||". $fila['nombre']."||".$fila['ubicacion']."||".
                              $fila['propietario']."||".$fila['telefono'];
                    ?>
                        <tr>                            
                        <td><?php echo $fila['nombre']; ?></td>
                        <td>..........</td>
                        <td><?php echo $fila['propietario']; ?></td>
                        <td><?php echo $fila['telefono']; ?></td>

                        <td>
                           <button class="btn btn-warning" onclick="editForm('<?php echo $datos;?>')"  data-bs-toggle="modal" data-bs-target="#create"><ion-icon name="create"></ion-icon></button>
                           <a class="btn btn-danger btn-del" href="includes/_functions.php?id=<?php echo $fila[$id_campo];?>&funcion=<?php echo $funcion;?>"><ion-icon name="trash"></ion-icon></a>

                        </td>
                        </tr>

                    <?php
                          }
                    ?>
                </tbody>
                </table>
            </div>
        </main>

<?php
    include('includes/pie.php'); 
?>