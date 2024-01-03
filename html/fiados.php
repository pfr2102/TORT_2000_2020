<?php
    include('includes/menu.php'); 
?>

    <!---------HEADER----------->
    <header class="encabezado">            
        <h1 class="titulo">DEUDORES</h1>
        <div class="componentes-der">
            <a href="login.php"><i class="fa-solid fa-right-from-bracket">salir</i></a>
            
          <h2 id="menu-boton">&#9776;</h2>
        </div>
    </header>
    <!--DIFERENTES VENTANAS DEL SISTEMA-->
       <main>   
            <div class="contenedor" id="fiados">
                <div class="div-buscar">
                    <i class="fa-solid fa-magnifying-glass fa-lg"></i>
                    <input type="text" name="buscar" id="buscar" placeholder="Buscar Fiado">
                </div>
                <table border="1" class="tabla-fiados">
                    <tr><th>Nombre</th><th>Kilos</th><th>Lugar</th><th>Fecha</th></tr>
                    <tr><td>Rodrigo</td><td>2</td><td>Repartidor Hermenegildo</td><td>15/03/1995</td></tr>
                    <tr><td>Maria</td><td>27</td><td>Mostrador</td><td>24/04/1990</td></tr>
                    <tr><td>Marco</td><td>5</td><td>Repartidor Marco</td><td>13/08/2002</td></tr>
                    <tr><td>Guillermo</td><td>1</td><td>Mostrador</td><td>02/02/2002</td></tr>
                </table>
                    <div class="div-botones">
                        <a href="agregar-fiado.html">Agregar</a> <a href="#">Eliminar</a> <a href="#">Editar</a>
                    </div>
                </div>
       </main>
       
<?php
    include('includes/pie.php'); 
?>