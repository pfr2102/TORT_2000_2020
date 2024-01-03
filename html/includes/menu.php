<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>La Frontera</title>
    <link rel="shortcut icon" href="img/alexcgdesign.png" type="image/x-icon">
    <!--FUENTES-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat+Alternates:wght@500&family=Pacifico&family=Patua+One&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700,800&display=swap" rel="stylesheet"> 
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab&display=swap" rel="stylesheet">
    <!--SCRIPTS-->
    <script src="../js/menu.js" defer></script>     
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>  
    
    <!--CSS-->
    <link rel="stylesheet" href="../package/dist/sweetalert2.css">
    <!--css para las data table--> 
    <link rel="stylesheet" type="text/css" href="DataTables/datatables.min.css"/>
    <link rel="stylesheet" type="text/css" href="DataTables/DataTables-1.13.1/css/dataTables.bootstrap4.min.css"/>

    <!--css personales-->
    <link rel="stylesheet" href="../css/fiados.css">
    <link rel="stylesheet" href="../css/info.css">
    <link rel="stylesheet" href="../css/grid.css">
    <link rel="stylesheet" href="../css/index.css">    

</head>
<body>
    <!---------MENU----------->
    <nav id="menu">            
        <!--<input type="checkbox" name="" id="chk" >-->
      
       <div class="logo" id="logo1">
            <a href="">
                <img src="../img/logo.png" alt="">
                <div>
                    <h3>Tortilleria</h3>
                    <p>La Frontera</p>
                </div>
            </a>
        </div>
        
        <div class="item opcion">
                <a href="index.php" ><i class="fa-solid fa-house-user"></i><p>Home</p></a>
        </div>
        <div class="item opcion">
                <a href="info.php" ><i class="fa-solid fa-circle-info"></i><p>informacion</p></a>
        </div>
        <div class="item opcion">
                <a href=""><i class="fa-solid fa-desktop"></i><p>mostrador</p></a>
        </div>
        <div class="item opcion">
                <a href="tienda.php"><ion-icon name="storefront" class="fa-solid"></ion-icon><p> Tiendas</p></a>
        </div>
        <div class="item opcion">
                <a href="empleados.php"><i class="fa-solid fa-users"></i><p>Empleados</p></a>
        </div>
        <div class="item opcion">
            <a href="notas.php"><i class="fa-solid fa-note-sticky"></i><p>Notas</p></a>
        </div>
    <!--     <div class="item opcion">
            <a href="fiados.php"><i class="fa-solid fa-money-bill"></i><p>Deudores</p></a>
        </div> -->
        <div class="item opcion">
            <a href="#"><i class="fa-solid fa-database"></i><p>consultas</p></a>
        </div>
    </nav>
