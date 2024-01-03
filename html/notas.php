<?php
    include('includes/utilerias.php');
    include('includes/menu.php'); 
    $id_campo ='codigo_nota';
    $tabla = 'nota';
    $funcion = 'eliminar_registro_nota_2';
    $editar = 'editar-nota.php';
    $cancelar = 'notas.php';
    $fechaActual= "20".str_replace("/","-", date('y/m/d'));

    /*VARIABLES PARA VENTANA MODAL DE AGREGAR*/
    $funcion_agregar = 'agregar_registro_nota';
?>
    <!---------HEADER----------->
    <header class="encabezado">            
        <h1 class="titulo">NOTAS</h1>
        <div class="componentes-der">
            <a href="login.php"><i class="fa-solid fa-right-from-bracket">salir</i></a>
            
          <h2 id="menu-boton">&#9776;</h2>
        </div>
    </header>

<!--ESTRUCTURA DE LA VENTANA EMERGENTE DEL FORMULARIO PARA AGREGAR UN NUEVO REGISTRO-->
<div class="modal fade" id="create" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-ds-backdrop="static">
         <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable " role="document">
             <div class="modal-content">
                 <div class="modal-header">
                     <h3 class="modal-title" id="exampleModalLabel">Registro de Notas</h3>
                     <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" onclick="limpiarForm()"></button>
                 </div><!--fin modal-header-->
                 <div class="modal-body">
                   <form  action="./includes/_functions.php" method="POST" id="formul">
                         <div class="form-group">
                             <label for="descripcion" class="form-label">Descripcion *</label>
                             <textarea  name="descripcion"  id="descripcion" rows="5" cols="33" class="form-control" placeholder="agrega tu nota" required></textarea>
                         </div>
                         <div class="form-group">
                             <label for="fecha" class="form-label">Fecha:</label>
                             <input type="date" name="fecha" id="fecha" min="<?php echo "$fechaActual";?>" class="form-control" required>
                         </div>                         
                         <div class="form-group">
                             <!--ESTE INPUT ES IMPORTANTES YA QUE EL ARCHIVO _functions.php HACE USO DE EL PARA PODER SABER QUE FUNCION EJECUTAR DENTRO DEL SWITCH-->
                             <input type="hidden" name="accion" id="accion" value="<?php echo $funcion_agregar ;?>">
                         </div>
                         <br>
                 </div><!--fin modal-body-->
                 <div class="modal-footer">
                        <div class="mb-3">
                             <input type="submit" value="Guardar" class="btn btn-success btn-lg btn-add"  name="registrar" id="register">
                             <button type="button" class="btn btn-danger btn-lg" data-bs-dismiss="modal"  aria-label="Close" onclick="limpiarForm()">Cancelas</button>
                         </div>
                     </form>
                 </div><!--fin modal-footer-->
             </div>
         </div>
     </div>
    <!--VENTANA PRINCIPAL ESTATICA-->
       <main class="overflow-auto"> <!--la clase overflow-auto es para cuando tienes mas contenido de lo que puede abarcar la pantalla y te crea un scroll-->      
            <!--<div class="container is-fluid grid">-->
            <div id="content_main">
                <br>
                <div class="col-xs-12">
                        <h1>Lista de Notas</h1>
                        <br>
                        <div>
                        <button type="button" class="btn btn-success btn-lg " data-bs-toggle="modal" data-bs-target="#create"> <ion-icon name="document"></ion-icon> Nueva nota </button>                   
                        <button type="button" class="btn btn-success btn-lg" onclick="tableToExcel('tblDatos', 'W3C Example Table')" value=""><i class="fas fa-file-excel"></i> Excel</button>
                            <!--<a class="btn btn-success" href="<?php //echo "$agregar";?>"><ion-icon name="document"></ion-icon> Nueva Nota </a>-->
                        </div>
                </div>
            
                <!--BUSCADOR -->
                <!--<div class="container-fluid">
                    <form class="d-flex">
                        <input class="form-control me-2 light-table-filter" data-table="table_id" type="search" 
                        placeholder="Formato de busqueda YY-MM-DD" name="buscador" id="buscador" autofocus>                  
                        <hr>
                    </form>
                </div>-->
                <br>                 
                <!--TABLA DEL GRID-->
                <table class="table table-striped table-dark table_id" id="tblDatos" >
                <!--encabezado de la tabla-->
                <thead>    
                    <tr>
                    <th>Descripcion</th>
                    <th>Fecha</th>
                    <th>Acciones</th>
                    </tr>
                </thead>
                <!--cuerpo de la tabla donde se muestran los registros-->
                <tbody>
                    <?php
                        $conexion=conectar();             
                        $SQL="SELECT * FROM $tabla";
                        //$SQL="SELECT * FROM empleado where tipo = 'repartidor'";
                        $dato = mysqli_query($conexion, $SQL);

                         while($fila=mysqli_fetch_array($dato)){
                            $datos= $fila['codigo_nota']."||".
                                    $fila['descripcion']."||".
                                    $fila['fecha'];
                    ?>
                        <tr>                            
                        <td>NOTA_AGREGADA....................</td>
                        <td><?php echo $fila['fecha']; ?></td>
                        <td>
                            <a class="btn btn-warning" href="<?php echo $editar;?>?id=<?php echo $fila[$id_campo]?> "> <ion-icon name="create"></ion-icon> </a>
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