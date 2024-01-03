<?php
    include('includes/menu.php'); 
?>
<!---------HEADER----------->
    <header class="encabezado">            
        <h1 class="titulo">HOME</h1>
        <div class="componentes-der">
            <a href="login.php"><i class="fa-solid fa-right-from-bracket">salir</i></a>
            
          <h2 id="menu-boton">&#9776;</h2>
        </div>
    </header>
    <!--DIFERENTES VENTANAS DEL SISTEMA-->
       <main>      
            <section class="contenedorHome sobre-nosotros">
                <h2 class="titulo">Nuestro producto</h2>
                <div class="contenedor-sobre-nosotros">
                    <img src="../img/LOGO.jpg" alt="" class="imagen-about-us">
                    <div class="contenido-textos">
                        <h3><span>1</span>Los mejores productos</h3>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Deserunt veniam eius aspernatur ad
                            consequuntur aperiam minima sed dicta odit numquam sapiente quam eum, architecto animi pariatur,
                            velit doloribus laboriosam ut.</p>    
                            <h3><span>2</span>Los mejores productos</h3>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Deserunt veniam eius aspernatur ad
                            consequuntur aperiam minima sed dicta odit numquam sapiente quam eum, architecto animi pariatur,
                            velit doloribus laboriosam ut.</p>                     
                    </div>
                </div>
            </section>
            <section class="portafolio">
                <div class="contenedorHome">
                    <h2 class="titulo">DESDE EL AÑO 2000 OFRECIENDO EL MEJOR SERVICIO</h2>
                    <div class="galeria-port">

                        <div class="imagen-port">
                            <a href="empleados.php">
                                <img src="../img/user.svg" alt="">
                                <div class="hover-galeria">
                                    <p>Gestionar Usuarios</p>
                                </div>
                            </a>
                        </div>
                        <div class="imagen-port">
                            <a href="producto.php">
                                <img src="../img/producto.svg" alt="">
                                <div class="hover-galeria">
                                    <p>Gestionar Productos</p>
                                </div>
                            </a>
                        </div>
                        <div class="imagen-port">
                        <img src="../img/producto.svg" alt="">
                            <div class="hover-galeria">
                            <img src="../img/producto.svg" alt="">
                                <p>Gestionar Productos</p>
                            </div>
                        </div>
                        <div class="imagen-port">
                        <img src="../img/producto.svg" alt="">
                            <div class="hover-galeria">
                            <img src="../img/producto.svg" alt="">
                                <p>Gestionar Productos</p>
                            </div>
                        </div>                    
                    </div>
                </div>
            </section>           
       </main>

<?php
    include('includes/pie.php'); 
?>      
