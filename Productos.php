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
    <title>Productos</title>

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
     
    <h1 class="heading">Productos<span> Caninos</span> </h1>
    <div class="box-container">
    <?php 
                $query = $cnnPDO->prepare('SELECT * FROM users WHERE categoria="canino";');
                $query->execute();
                $contador=1;
                while($campo = $query->fetch())
                {
            ?> 
        <div class="box">
            <div class="icons">
                
            </div>
            <div class="image">
            <?php echo '' .
      '<img src = "data:image/png;base64,' . base64_encode($campo['image']) . '"/>'
      ;?>
            </div>
            <div class="content">
                <h3><?php echo $campo["producto"]; ?></h3>
                <div class="amount"><?php echo $campo["precio"]; ?></div>

            </div>
        </div>
        <?php 
                $contador = $contador + 1; 
                }
                ?>
    </div>
    </div>
</section>
<section class="shop" id="shop">

    <h1 class="heading"> Productos <span>Gatinos </span> </h1>

    <div class="box-container">
    <?php 
                $query = $cnnPDO->prepare('SELECT * FROM users WHERE categoria="gatino";');
                $query->execute();
                $contador=1;
                while($campo = $query->fetch())
                {
            ?> 
        <div class="box">
            <div class="icons">
                
            </div>
            <div class="image">
            <?php echo '' .
      '<img src = "data:image/png;base64,' . base64_encode($campo['image']) . '"/>'
      ;?>
            </div>
            <div class="content">
                <h3><?php echo $campo["producto"]; ?></h3>
                <div class="amount"><?php echo $campo["precio"]; ?></div>

            </div>
        </div>
        <?php 
                $contador = $contador + 1; 
                }
                ?>
    </div>
    </div>


</section>
<section class="shop" id="shop">

    <h1 class="heading"> Productos Para <span> Peces </span> </h1>

    <div class="box-container">
    <?php 
                $query = $cnnPDO->prepare('SELECT * FROM users WHERE categoria="peces";');
                $query->execute();
                $contador=1;
                while($campo = $query->fetch())
                {
            ?> 
        <div class="box">
            <div class="icons">
                
            </div>
            <div class="image">
            <?php echo '' .
      '<img src = "data:image/png;base64,' . base64_encode($campo['image']) . '"/>'
      ;?>
            </div>
            <div class="content">
                <h3><?php echo $campo["producto"]; ?></h3>
                <div class="amount"><?php echo $campo["precio"]; ?></div>

            </div>
        </div>
        <?php 
                $contador = $contador + 1; 
                }
                ?>
    </div>
    </div>


</section>
<section class="shop" id="shop">

    <h1 class="heading">Pet<span> Accesorios</span> </h1>

    <div class="box-container">
    <?php 
                $query = $cnnPDO->prepare('SELECT * FROM users WHERE categoria="accesorios";');
                $query->execute();
                $contador=1;
                while($campo = $query->fetch())
                {
            ?> 
        <div class="box">
            <div class="icons">
                
            </div>
            <div class="image">
            <?php echo '' .
      '<img src = "data:image/png;base64,' . base64_encode($campo['image']) . '"/>'
      ;?>
            </div>
            <div class="content">
                <h3><?php echo $campo["producto"]; ?></h3>
                <div class="amount"><?php echo $campo["precio"]; ?></div>

            </div>
        </div>
        <?php 
                $contador = $contador + 1; 
                }
                ?>
    </div>
    </div>


</section>

<!-- shop section ends -->

<section class="contact" id="contact">

    <div class="image">
        <img src="https://media.gq.com.mx/photos/5e405027cc71f90008dd2448/master/pass/personas-prefieren-perro-que-relacion-romantica.jpg" alt="">
    </div>

    <form action="https://formspree.io/f/mgeqqqwn"
    method="POST">
        <h3>contact us</h3>
        <input type="text" name="Nombre" placeholder="Nombre" class="box">
        <input type="email" name="Email" placeholder="Correo Electronico" class="box">
        <input type="tumber" name="Telefono" placeholder="Telefono" class="box">
        <textarea name="Mensaje" placeholder="Mensaje" id="" cols="30" rows="10"></textarea>
        <input type="submit" value="Enviar" class="btn">
    </form>

</section>

<section class="footer">

    <img src="image/top_wave.png" alt="">

    <div class="share">
        <a href="#" class="btn"> <i class="fab fa-facebook-f"></i> facebook </a>
        <a href="#" class="btn"> <i class="fab fa-twitter"></i> twitter </a>
        <a href="#" class="btn"> <i class="fab fa-instagram"></i> instagram </a>
        <a href="#" class="btn"> <i class="fab fa-linkedin"></i> linkedin </a>
        <a href="#" class="btn"> <i class="fab fa-pinterest"></i> pinterest </a>
    </div>

    <div class="credit"> created by <span> Cesar-Adrian-Jovani </span> | all rights reserved! </div>

</section>




















<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>