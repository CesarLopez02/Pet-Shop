<?php 
    session_start();
    $user = $_SESSION['user'];
    if (! isset($_SESSION['password_verified'])) {
        header("Location:login.php");
    }

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pet Shop</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/welcome.css">

  </head>
<body>
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
<section class="home" id="home">

    <div class="content">
        <h3> <span>Hola!!</span> Bienvenido A Nuestra PET SHOP </h3>
        <a href="#about" class="btn">Comenzar</a>
    </div>

    <img src="image/bottom_wave.png" class="wave" alt="">

</section>

<!-- home section ends -->

<!-- about section starts  -->

<section class="about" id="about">

    <div class="image">
        <img src="image/about_img.png" alt="">
    </div>

    <div class="content">
        <h3>Distribuidor <span>Premium</span> De Alimento Para Mascotas</h3>
        <p>Creemos que todos los perros deben ser alimentados con productos de gran calidad, alimentos nutritivos que amen. Trabajamos para ofrecer productos que ayudarán a mantener a tu Mascota feliz y saludable.</p>
    </div>

</section>

<!-- about section ends -->

<!-- dog and cat food banner section starts -->

<div class="dog-food">

    <div class="image">
        <img src="image/pedi.png" alt="">
    </div>

    <div class="content">
        <h3> <span>PEDIGREE®</span>Croquetas Adulto Con Res Y Vegetales</h3>
        <a href="productos.php"> <img src="image/See_more.png" alt=""> </a>
    </div>

</div>

<div class="cat-food">

    <div class="content">
        <h3> <span>Whiskas</span> Alimento para Gatos Adultos Con Sabor Carne.</h3>
        <a href="productos.php"> <img src="image/pez.png" alt=""> </a>
    </div>

    <div class="image">
        <img src="image/Gato.png" alt="">
    </div>

</div>

<!-- dog and cat food banner section ends -->

<!-- shop section starts  -->

<section class="shop" id="shop">

    <h1 class="heading"> Nuestros <span> Productos </span> </h1>

    <div class="box-container">

        <div class="box">

            <div class="image">
                <img src="image/product_01.png" alt="">
            </div>
            <div class="content">
                <h3>PEDIGREE® High Protein</h3>
                <div class="amount"> $110.00 - $115.00 </div>
            </div>
        </div>

        <div class="box">

            <div class="image">
                <img src="image/product_02.png" alt="">
            </div>
            <div class="content">
                <h3>PEDIGREE® Balance Natural</h3>
                <div class="amount"> $115.00 - $120.00 </div>
            </div>
        </div>

        <div class="box">

            <div class="image">
                <img src="image/product_03.png" alt="">
            </div>
            <div class="content">
                <h3>PEDIGREE® Razas Pequeñas</h3>
                <div class="amount"> $100.00 - $105.00 </div>
            </div>
        </div>

        <div class="box">
            
            <div class="image">
                <img src="image/product_05.png" alt="">
            </div>
            <div class="content">
                <h3>WHISKAS® Souffle Salmon</h3>
                <div class="amount"> $130.00 - $135.00 </div>
            </div>
        </div>

        <div class="box">

            <div class="image">
                <img src="image/product_04.png" alt="">
            </div>
            <div class="content">
                <h3>WHISKAS® Souffle Carne</h3>
                <div class="amount"> $150.00 - $155.00 </div>
            </div>
        </div>

        <div class="box">

            <div class="image">
                <img src="image/product_06.png" alt="">
            </div>
            <div class="content">
                <h3>WHISKAS® Souffle Pescado</h3>
                <div class="amount"> $160.00 - $165.00 </div>
            </div>
        </div>
    </div>
    <center><a href="productos.php"  class="btn">Mas Productos</a></center>


</section>

<!-- shop section ends -->

<!-- services section starts  -->

<section class="services" id="services">

    <h1 class="heading"> Nuestros <span>servicios</span> </h1>

    <div class="box-container">

        <div class="box">
            <i class="fas fa-dog"></i>
            <h3>Alojamiento De Perros</h3>
            <a href="citas.php" class="btn">Agendar</a>
        </div>

        <div class="box">
            <i class="fas fa-cat"></i>
            <h3>Alojamiento Para Gatos</h3>
            <a href="citas.php" class="btn">Agendar</a>
        </div>

        <div class="box">
            <i class="fas fa-bath"></i>
            <h3>Spa y aseo</h3>
            <a href="citas.php" class="btn">Agendar</a>
        </div>

        <div class="box">
            <i class="fas fa-drumstick-bite"></i>
            <h3>Comida saludable</h3>
            <a href="citas.php" class="btn">Agendar</a>
        </div>

        <div class="box">
            <i class="fas fa-baseball-ball"></i>
            <h3>Actividades De Ejercicio</h3>
            <a href="citas.php" class="btn">Agendar</a>
        </div>

        <div class="box">
            <i class="fas fa-heartbeat"></i>
            <h3>Consulta Medica</h3>
            <a href="citas.php" class="btn">Agendar</a>
        </div>

    </div>

</section>

<!-- services section ends -->

<!-- plan section starts  -->

<section class="plan" id="plan">

    <h1 class="heading"> Nuestros <span>Paquetes</span> </h1>

    <div class="box-container">

        <div class="box">
            <h3 class="title">pet care</h3>
            <h3 class="day"> 1 Día Basico </h3>
            <img style="height:100px ;width:100px; filter: brightness(1.1);mix-blend-mode: multiply;" src="https://w7.pngwing.com/pngs/440/948/png-transparent-dog-pattern-illustration-cute-dog-cartoon-dog-pictures-cartoon-dog.png" alt="">
            <div class="list">
                <p> Ejercicio De Mascotas <span class="fas fa-check"></span> </p>
                <p> Comida Para Mascota <span class="fas fa-check"></span> </p>
            </div>
            <div class="amount"><span>$</span>500</div>
            <a href="citas.php" class="btn"> Elegir Plan </a>
        </div>

        <div class="box">
            <h3 class="title">pet care</h3>
            <h3 class="day"> 10 Días Regular </h3>
            <img style="height:100px ;width:130px; filter: brightness(1.1);mix-blend-mode: multiply;" src="https://static.vecteezy.com/system/resources/previews/008/926/981/non_2x/cat-head-icon-kitten-head-clipart-isolated-on-white-background-free-vector.jpg" alt="">            <div class="list">
                <p> Cuarto De Mascotas <span class="fas fa-check"></span> </p>
                <p> Aseo De Mascotas<span class="fas fa-check"></span> </p>
                <p> Ejercicio De Mascotas <span class="fas fa-check"></span> </p>
                <p> Comida Para Mascota <span class="fas fa-check"></span> </p>
            </div>
            <div class="amount"><span>$</span>1000</div>
            <a href="citas.php" class="btn"> Elegir plan </a>
        </div>

        <div class="box">
            <h3 class="title">pet care</h3>
            <h3 class="day"> 30 Días Premium </h3>
            <img style="height:100px ;width:100px; filter: brightness(1.1);mix-blend-mode: multiply;" src="https://dbdzm869oupei.cloudfront.net/img/sticker/preview/51763.png" alt="">
            <div class="list">
                <p> Cuarto De Mascotas <span class="fas fa-check"></span> </p>
                <p> Aseo De Mascotas<span class="fas fa-check"></span> </p>
                <p> Ejercicio De Mascotas <span class="fas fa-check"></span> </p>
                <p> Comida Para Mascota <span class="fas fa-check"></span> </p>
                <p> Premio Para Mascotas <span class="fas fa-check"></span> </p>
                <p> Consulta Medica <span class="fas fa-check"></span> </p>
            </div>
            <div class="amount"><span>$</span>2000</div>
            <a href="citas.php" class="btn"> Elegir plan </a>
        </div>

    </div>

</section>

<!-- plan section ends -->

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
        <a href="whats.php" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i>Enviar Whatsapp</a>
    </div>

    <div class="credit"> created by <span> Cesar-Adrian-Jovani </span> | all rights reserved! </div>

</section>




















<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>
