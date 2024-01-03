<?php
    include('includes/menu.php'); 
?>
        <!---------HEADER----------->
        <header class="encabezado">            
        <h1 class="titulo">AGREGAR-DEUDOR</h1>
        <div class="componentes-der">
            <a href="login.php"><i class="fa-solid fa-right-from-bracket">salir</i></a>
            
          <h2 id="menu-boton">&#9776;</h2>
        </div>
    </header>
    <!--DIFERENTES VENTANAS DEL SISTEMA-->
       <main>      
            <div class="contenedor" id="agregar-fiado">
                <div class="formulario">
                    <form action="#" method="">
                        <fieldset>
                        <legend>AGREGAR DEUDOR</legend>
                        <label for="nombre">Nombre</label>
                        <input required  type="text" id="nombre">
                        <br> <br>
                
                        <label for="kilos">Kilos</label>
                        <input type="number" name="" id="kilos">
                        <br> <br>

                        <label for="lugar">Lugar</label>
                        <input required  type="text" id="lugar">
                        <br> <br>

                        <label for="fecha">Fecha</label>
                        <input type="date" id="fecha">                    
                        <br> <br>
                        <input required type="submit" value="Agregar">
                        <input required type="reset">
                        <br>
                    </fieldset>
                    </form>
                </div>
       </main>
<?php
    include('includes/pie.php'); 
?>