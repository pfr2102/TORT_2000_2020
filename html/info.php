<?php
    include('includes/menu.php'); 
?>

     <!---------HEADER----------->
     <header class="encabezado">            
        <h1 class="titulo">INFORMACION</h1>
        <div class="componentes-der">
            <a href="login.php"><i class="fa-solid fa-right-from-bracket">salir</i></a>
            
          <h2 id="menu-boton">&#9776;</h2>
        </div>
    </header>
    <!--DIFERENTES VENTANAS DEL SISTEMA-->
       <main>        
            <div class="contenedor" id="informacion">
                <div class="renglon-info">
                    <div class="renglon-titulo">
                        <h1>Mostrador</h1>
                        <img src="../img/notas.PNG" alt="">
                    </div>
                    <div class="renglon-documento">
                        <p>Contiene las acciones que se realizan al atender a los clientes en el mostrador.</p>
                        <button style="font-size:24px"><!--<i class="material-icons">reply</i> -->Ver manual de Usuario</button>
                    </div>
                </div>
                <div class="renglon-info">
                    <div class="renglon-titulo">
                        <h1>Empleados</h1>
                        <img src="../img/empleados.png" alt="">
                    </div>
                    <div class="renglon-documento">
                        <p>Permite llevar el control de los empleados de la tortilleria y consultar su información.</p>
                        <button style="font-size:24px"><!--<i class="material-icons">reply</i>--> Ver manual de Usuario</button>
                    </div>
                </div>
                <div class="renglon-info">
                    <div class="renglon-titulo">
                        <h1>Fiados</h1>
                        <img src="../img/fiados.PNG" alt="">
                    </div>
                    <div class="renglon-documento">
                        <p>Permite consultar y manejar las deudas de los clientes a la tortilleria</p>
                        <button style="font-size:24px"><!--<i class="material-icons">reply</i>--> Ver manual de Usuario</button>
                    </div>
                </div>
            </div>
       </main>

<?php
    include('includes/pie.php'); 
?>