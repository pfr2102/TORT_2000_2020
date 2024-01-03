<?php
    include('includes/utilerias.php');
    include('includes/menu.php'); 
    $fechaActual= "20".str_replace("/","-", date('y/m/d'));
    $fechainicio= $fechaActual;
    $fechaFin = $fechaActual;
    $fechaInicio= $fechaActual;
    $fechaFin = $fechaActual;
?>
    <!---------HEADER----------->
    <header class="encabezado">            
        <h1 class="titulo">CORTE DE CAJA</h1>
        <div class="componentes-der">
            <a href="login.php"><i class="fa-solid fa-right-from-bracket">salir</i></a>
            
          <h2 id="menu-boton">&#9776;</h2>
        </div>
    </header>

    <!--VENTANA PRINCIPAL ESTATICA-->
       <main class="overflow-auto"> <!--la clase overflow-auto es para cuando tienes mas contenido de lo que puede abarcar la pantalla y te crea un scroll-->      
            <!--<div class="container is-fluid grid">-->
            <div id="content_main">
                <br>
                <div class="col-xs-12">
                        <h1>Busqueda Por Rangos de Fechas</h1>
                </div>
                <br>
                <!--BUSCADOR CON PHP-->
                <div class="container-clearfix">
                <form class="d-flex">
                            <form action="" method="GET">
                             <br>
                             <button type="button" class="btn btn-success btn-lg" onclick="tableToExcel('reporte', 'W3C Example Table')" value=""><i class="fas fa-file-excel"></i> Excel</button>                             
                                <div class="form-control">
                                    <label for="fechaNac" class="form-label">Fecha inicio:</label>
                                    <input type="date" name="fechaInicio" id="fechaInicio" max="<?php echo $fechaActual;?>" class="form-control" required>
                                </div>
                                <div class="form-control">
                                    <label for="fechaNac" class="form-label">Fecha fin:</label>
                                    <input type="date" name="fechaFin" id="fechaFin" max="<?php echo $fechaActual;?>" class="form-control" required>
                                </div>
                                
                            <button class="btn btn-primary btn-lg" type="submit" name="enviar"> <b><ion-icon name="search-outline"></ion-icon> </b> </button>                             
                            </form>
                </div>
                <!--PARA EL BUSCADOR DE FECHAS QUE SE EJECUTA CON EL BOTON BUSCAR-->
                <?php
                   $conexion=conectar(); 
                    if(isset($_GET['enviar'])){
                        $fechaInicio = $_GET['fechaInicio'];
                        $fechaFin = $_GET['fechaFin'];                    
                     }
                ?>
                <br> 
                <div  id="reporte">
                     <H6>Reporte del <?php echo $fechaInicio;?>  al  <?php echo $fechaFin;?> </H6>
                     <br>
                    <!--------------------------------------------------------------TABLA CORTE DE TIENDAS----------------------------------------------------------------------------->
                        <h1 style="background:#D5D5D5; text-align:center; border-radius: 10px;">En Tiendas</h1>
                        <table class="table table-striped table-gray table_id" id="tblDatos_2" >
                        <thead>    
                            <tr>
                                <th>Nombre</th>
                                <th>PROD.</th>
                                <th>AM</th>
                                <th>PM</th>
                                <th>TOT</th>
                                <th>FRIAS</th>
                                <th>PAGO</th>
                            </tr>
                        </thead>
                        <!--cuerpo de la tabla donde se muestran los registros-->
                        <tbody>
                            <?php
                                $conexion=conectar2();             
                                $SQL="call corte_tienda('".$fechaInicio."', '".$fechaFin."');";    
                                $datos = mysqli_query($conexion, $SQL);

                            while($fila=mysqli_fetch_array($datos)){
                            ?>
                                <tr>                            
                                    <td><?php echo $fila['NOMBRE']?></td>
                                    <td><?php echo $fila['PROD']?></td>
                                    <td><?php echo $fila['AM']?></td>
                                    <td><?php echo $fila['PM']?></td>
                                    <td><?php echo $fila['TOT']?></td>
                                    <td><?php echo $fila['FRIAS']?></td>
                                    <td>
                                        <button class="btn btn-success btn-lg" href="#">$<?php echo $fila['PAGO']?> <ion-icon name="cash-outline"></ion-icon></button>
                                    </td>
                                </tr>
                            <?php
                                }
                            ?>                        
                        </tbody>
                        <tfoot>
                              <?php
                                    $conexion=conectar2();             
                                    $SQL="call corte_totales_tienda('".$fechaInicio."', '".$fechaFin."');";    
                                    $datos = mysqli_query($conexion, $SQL);
                                while($fila=mysqli_fetch_array($datos)){
                                ?>
                                    <tr>                            
                                        <th>TOTALES EN TIENDAS</th>
                                        <th colspan="3"><?php echo $fila['PROD']?></th>
                                        <th><?php echo $fila['SUM_TOT']?></th>
                                        <th><?php echo $fila['SUM_FRIAS']?></th>
                                        <th>
                                            <button class="btn btn-success btn-lg" href="#">$<?php echo $fila['SUM_PAGOS']?><ion-icon name="cash-outline"></ion-icon></button>
                                        </th>
                                    </tr>
                                <?php
                                    }
                                ?>
                        </tfoot>
                        </table>
                       <!--------------------------------------------------------------TABLA CORTE DE CASAS----------------------------------------------------------------------------->
                        <br>
                        <h1 style="background:#D5D5D5; text-align:center; border-radius: 10px;">En casas</h1>         
                        <table class="table table-striped table-gray table_id" id="tblDatos_1" >
                        <!--encabezado de la tabla-->
                        <thead>    
                            <tr>
                                <th>Nombre</th>
                                <th>PROD.</th>
                                <th>AM</th>
                                <th>PM</th>
                                <th>TOT</th>
                                <th>PAGO</th>
                            </tr>
                        </thead>
                        <!--cuerpo de la tabla donde se muestran los registros-->
                        <tbody>
                        <?php
                            $conexion=conectar2();             
                            $SQL="call corte_casa('".$fechaInicio."', '".$fechaFin."')";    
                            $datos = mysqli_query($conexion, $SQL);

                            while($fila=mysqli_fetch_array($datos)){
                            ?>
                                <tr>                            
                                    <td><?php echo $fila['NOMBRE']?></td>
                                    <td><?php echo $fila['PROD']?></td>
                                    <td><?php echo $fila['AM']?></td>
                                    <td><?php echo $fila['PM']?></td>
                                    <td><?php echo $fila['TOT']?></td>
                                    <td>
                                        <button class="btn btn-success btn-lg" href="#">$<?php echo $fila['PAGO']?> <ion-icon name="cash-outline"></ion-icon></button>
                                    </td>
                                </tr>
                            <?php
                                }
                            ?>                         
                        </tbody>
                        </table>
                        
                         <!--------------------------------------------------------------TABLA CORTE DE MOSTRADOR----------------------------------------------------------------------------->
                         <br>
                        <h1 style="background:#D5D5D5; text-align:center; border-radius: 10px;">En Mostrador</h1>         
                        <table class="table table-striped table-gray table_id" id="tblDatos_1" >
                        <!--encabezado de la tabla-->
                        <thead>    
                            <tr>
                                <th>Nombre</th>
                                <th>PROD.</th>
                                <th>AM</th>
                                <th>PM</th>
                                <th>TOT</th>
                                <th>PAGO</th>
                            </tr>
                        </thead>
                        <!--cuerpo de la tabla donde se muestran los registros-->
                        <tbody>
                        <?php
                            $conexion=conectar2();             
                            $SQL="call corte_mostrador('".$fechaInicio."', '".$fechaFin."')";    
                            $datos = mysqli_query($conexion, $SQL);

                            while($fila=mysqli_fetch_array($datos)){
                            ?>
                                <tr>                            
                                    <td><?php echo $fila['NOMBRE']?></td>
                                    <td><?php echo $fila['PROD']?></td>
                                    <td><?php echo $fila['AM']?></td>
                                    <td><?php echo $fila['PM']?></td>
                                    <td><?php echo $fila['TOT']?></td>
                                    <td>
                                        <button class="btn btn-success btn-lg" href="#">$<?php echo $fila['PAGO']?> <ion-icon name="cash-outline"></ion-icon></button>
                                    </td>
                                </tr>
                            <?php
                                }
                            ?>                         
                        </tbody>
                        </table>
                </div>
            </div>
        </main>
<?php
    include('includes/pie.php'); 
?>