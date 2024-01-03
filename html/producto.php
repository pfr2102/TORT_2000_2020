<?php
    include('includes/utilerias.php');
    include('includes/menu.php'); 
    $id_campo ='id_producto';
    $tabla = 'producto';
    $funcion = 'eliminar_registro_producto';
    $cancelar = 'producto.php';
    $fechaActual= "20".str_replace("/","-", date('y/m/d'));

?>
    <!---------HEADER----------->
    <header class="encabezado">            
        <h1 class="titulo">PRODUCTOS</h1>
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
                     <h3 class="modal-title" id="exampleModalLabel">Registro de Productos</h3>
                     <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" onclick="limpiarForm()"></button>
                 </div><!--fin modal-header-->
                 <div class="modal-body">
                   <form  action="./includes/_functions.php" method="POST"  name="formul" id="formul">
                     <div class="form-group">
                         <label for="descripcion" class="form-label">Nombre producto</label>
                         <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Agrega nombre del producto" required>
                     </div>
                     <div class="form-group">
                         <label for="descripcion" class="form-label">Descripcion</label>
                         <textarea  name="descripcion" id="descripcion" rows="3" cols="33" class="form-control" onkeypress="noEnter()" placeholder="Agrega algo sobre el producto"></textarea>
                     </div>
                     <div class="form-group">
                         <label for="precio" class="form-label">Precio Para Casas $:</label>
                         <input type="number" class="form-control" id="precio_casa" name="precio_casa" step="0.01" min="0.00"   placeholder="Precio del producto en pesos" required>
                     </div>
                     <div class="form-group">
                         <label for="precio" class="form-label">Precio Para Tiendas $:</label>
                         <input type="number" class="form-control" id="precio_tienda" name="precio_tienda" step="0.01" min="0.00"   placeholder="Precio del producto en pesos" required>
                     </div>
                     <div class="form-group">
                         <label for="precio" class="form-label">Precio En Mostrador $:</label>
                         <input type="number" class="form-control" id="precio_local" name="precio_local" step="0.01" min="0.00"   placeholder="Precio del producto en pesos" required>
                     </div>
                     <div class="form-group">
                         <label for="precio" class="form-label">Comision Repartidor en tiendas $:</label>
                         <input type="number" class="form-control" name="comision_tiendas" id="comision_tiendas" step="0.01" min="0.00"   placeholder="comision del repartidor en las tiendas" required>
                     </div>
                     <div class="form-group">
                         <label for="precio" class="form-label">Comision Repartidor en Casas $:</label>
                         <input type="number" class="form-control" name="comision_casas" id="comision_casas" step="0.01" min="0.00"   placeholder="comision del repartidor en las Casas" required>
                     </div>
                     <div class="form-group">
                         <!--ESTE INPUT ES IMPORTANTES YA QUE EL ARCHIVO _functions.php HACE USO DE EL PARA PODER SABER QUE FUNCION EJECUTAR DENTRO DEL SWITCH-->
                         <input type="hidden" name="accion" id="accion" value="agregar_registro_producto">
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
                    document.formul.descripcion.defaultValue=d[2];
                    document.formul.precio_casa.value=d[3];
                    document.formul.precio_tienda.value=d[4];
                    document.formul.precio_local.value=d[5];
                    document.formul.comision_tiendas.value=d[6];
                    document.formul.comision_casas.value=d[7];
                    document.formul.accion.value='editar_registro_producto';
                    document.formul.id_.value=d[0];
                    document.formul.register.value='Editar';
            }
            function agregaForm(){
                document.formul.descripcion.defaultValue='';
                document.formul.accion.value='agregar_registro_producto';
                document.formul.register.value='Guardar';
            }
    </script>


    <!--DIFERENTES VENTANAS DEL SISTEMA-->
       <main class="overflow-auto">       
        <div id="content_main">
                <br>
                <div class="col-xs-12">
                        <h1>Lista de Productos</h1>
                    <br>
                    <div>
                        <button type="button" class="btn btn-success btn-lg " data-bs-toggle="modal" data-bs-target="#create" onclick="agregaForm()"> <ion-icon name="document"></ion-icon> Nuevo Producto </button>
                    </div>
                </div>
                <br>                         
                <!--TABLA DEL GRID-->
                <table class="table table-striped table-dark table_id" id="tblDatos" >
                <!--encabezado de la tabla-->
                <thead>    
                    <tr>
                    <th>Codigo</th>
                    <th>Nombre</th>
                    <th>Descripcion</th>
                    <th>P.V.P Casas</th>
                    <th>P.V.P Tiendas</th>
                    <th>P.V.P Mostrador</th>
                    <th>Com. tienda</th>
                    <th>Com. casas</th>
                    <th>Acciones</th>
                    </tr>
                </thead>
                <!--cuerpo de la tabla donde se muestran los registros-->
                <tbody>

                    <?php
                        $conexion=conectar();             
                        $SQL="SELECT * FROM $tabla WHERE status = 'ACTIVO' ";//status es el nombre del campo en la BD
                        //$SQL="SELECT * FROM empleado where tipo = 'repartidor'";
                        $dato = mysqli_query($conexion, $SQL);

                        if($dato -> num_rows >0){
                            while($fila=mysqli_fetch_array($dato)){
                              $datos = $fila['id_producto']."||". $fila['nombre']."||".$fila['descripcion']."||".
                              $fila['precio_casa']."||".$fila['precio_tienda']."||".$fila['precio_local']."||".$fila['comi_repartidor_tienda']."||".$fila['comi_repartidor_casa'];
                    ?>

                        <tr>
                            
                        <td><?php echo $fila['id_producto']; ?></td>
                        <td><?php echo $fila['nombre']; ?></td>
                        <td>........</td>
                        <td><?php echo $fila['precio_casa']; ?></td>
                        <td><?php echo $fila['precio_tienda']; ?></td>
                        <td><?php echo $fila['precio_local']; ?></td>
                        <td><?php echo $fila['comi_repartidor_tienda']; ?></td>
                        <td><?php echo $fila['comi_repartidor_casa']; ?></td>

                        <td>
                           <button class="btn btn-warning" onclick="editForm('<?php echo $datos;?>')"  data-bs-toggle="modal" data-bs-target="#create"><ion-icon name="create"></ion-icon></button>
                           <a class="btn btn-danger btn-del" href="includes/_functions.php?id=<?php echo $fila[$id_campo];?>&funcion=<?php echo $funcion;?>"><ion-icon name="trash"></ion-icon></a>                           
                        </td>
                        </tr>

                    <?php
                          }
                        }
                    ?>
                </tbody>
                </table>
            </div>
        </main>

<?php
    include('includes/pie.php'); 
?>