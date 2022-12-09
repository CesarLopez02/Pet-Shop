<?php 
require_once 'db-connection.php';
    session_start();
    $user = $_SESSION['user'];

    if (! isset($_SESSION['password_verified'])) {
        header("Location:login.php");
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mis Citas</title>

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://getbootstrap.com/docs/5.2/assets/css/docs.css" rel="stylesheet">

    
    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/styleP.css">

</head>
<body>
    
<!-- header section starts  -->

<header class="header">

    <a href="welcome.php" class="logo"> <i class="fas fa-paw"></i>PET SHOP </a>

    <nav class="navbar">
        <a href="welcome.php">home</a>
        <a href="productos.php">Productos</a>
        <a href="citas.php">Agendar Cita</a>
        <a href="mis_citas.php">Mis Citas</a>
    </nav>

    <div class="icons">
        <div class="fas fa-bars" id="menu-btn"></div>
        
        <a class="fas fa-user" href="informacion.php"> <?php
                            echo $_SESSION['user']['nombre'];
                        ?></a>
        <a class="fas fa-power-off"  href="logout.php">Logout</a>
    </div>


</header>

<!-- header section ends -->

<!-- shop section starts  -->
<br><br>
<section class="shop" id="shop">
     
    <h1 class="heading">Mis<span> Citas</span> </h1>
    <div class="box-container">
    <?php 
    require_once("db-connection.php");

                // $emailU = $_SESSION['emailUser'];
                // $emailU = "patrickgarcia862@gmail.com";
                $emailU = $_SESSION['user']['email'];

                $query = $cnnPDO->prepare('SELECT * FROM citas WHERE email=:EMAIL');
                $query->bindParam(':EMAIL', $emailU);
                $query->execute();
                $contador=1;
                while($campo = $query->fetch())
                {
            ?> 
        <div class="box">
            <div class="icons">
                
            </div>
            <div class="image">
            <img src="https://img.freepik.com/vector-premium/personaje-dibujos-animados-doctor-perrito-amistoso_448933-91.jpg" alt="">
            </div>
            <div class="content">
                <h3>Nombre: <?php echo $campo["nombre"]; ?></h3>
                <h3>Servicio: <?php echo $campo["tipo"]; ?></h3>
                <h3>Fecha: <?php echo $campo["fecha"]; ?></h3>
                <h3>Hora: <?php echo $campo["hora"]; ?></h3>
                <div class="amount">Proceso: <?php echo $campo["proceso"]; ?></div>

            </div>
        </div>
        <?php 
                $contador = $contador + 1; 
                }
                ?>
    </div>
    </div>
</section>
</body>

