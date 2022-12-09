<?php 
require_once 'db-connection.php';
    session_start();
    $user = $_SESSION['user'];
    if (! isset($_SESSION['password_verified'])) {
        header("Location:login.php");
    }

    if (isset($_POST['agendar'])) 
{ 

require 'vendor/autoload.php';

$token =  "GA221201133813";

$client = new GuzzleHttp\Client(['verify' => false ]);

$payload = array(

  "op" => "registermessage",

  "token_qr" => $token,

  "mensajes" => array(

	array("numero" => "5218442128264","mensaje" => "Se a generado una cita"),

	)

);

$res = $client->request('POST', 'https://script.google.com/macros/s/AKfycbyoBhxuklU5D3LTguTcYAS85klwFINHxxd-FroauC4CmFVvS0ua/exec', [

            'headers' => [

                'Content-Type'     => 'application/json',

                'Accept' => 'application/json'

            ], 'json' =>  $payload

        ]);

echo $res->getStatusCode()."<br>";

echo $res->getBody();
	$email=$_POST['email'];
  $nombre=$_POST['nombre'];
	$fecha=$_POST['fecha'];
	$hora=$_POST['hora'];
  $tipo=$_POST['tipo'];


		$sql = $cnnPDO->prepare("INSERT INTO citas
    (email,nombre, fecha, hora, tipo) 
    values (:email,:nombre, :fecha, :hora, :tipo)");
		
		$sql->bindParam(':email',$email);
    $sql->bindParam(':nombre',$nombre);
		$sql->bindParam(':fecha',$fecha);
		$sql->bindParam(':hora',$hora);
    $sql->bindParam(':tipo',$tipo);

    header("location:mis_citas.php");

		$sql->execute();
		unset($sql);
		unset($cnnPDO);
}
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.2/assets/css/docs.css" rel="stylesheet">
    <!-- BOOTSTRAP 4  -->
    <link rel="stylesheet" href="https://bootswatch.com/4/lux/bootstrap.min.css">
    <title>Agendar Cita</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"> </script>
<!-- Libreria de sweetalert -->
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <link rel="icon" href="data:;base64,iVBORw0KGgo=">


    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="css/citas.css">
    <link rel="stylesheet" type="text/css" href="css/styleP.css">

  </head>
  <body>

    <!-- Example Code -->
    
    <header class="header">

    <a href="index.php" class="logo"> <i class="fas fa-paw"></i>PET SHOP </a>

    <nav class="navbar">
        <a href="welcome.php">home</a>
        <a href="productos.php">Productos</a>
        <a href="citas.php">Agendar Cita</a>
        <a href="mis_citas.php">Mis Citas</a>
    </nav>

    <div class="icons">
        <div class="fas fa-bars" id="menu-btn"></div>
        <a class="fas fa-user" href="register.php"> <?php
                            echo $_SESSION['user']['nombre'];
                        ?></a>
        <a class="fas fa-power-off" id="login-btn" href="logout.php">Logout</a>
    </div>


</header>
<br><br><br>
<div  class="container my-12">
            <div  class="row">
                <div  class="col-sm-12 col-md-6 col-lg-6 col-xl-6 py-6 bg">
                    <section  id="streaming">
                        <div>
                        <div class="card">
                    <br>

                    <h2 style="background-color:#2890FF" class="card-header bg info-color  white-text text-center py-4" style=" color: #FAF9F9;">
                     <strong>Agenda Tu Cita!.</strong>
                     </h2>
                    <!--Card content-->
                    <div class="card-body px-lg-5">
                        <!--Formulario-->
                        <form  method="POST" id="login">
                            <h5>Correo Electronico</h5>
                            <input style="font-size: 20px;" class="form-control" type="email" value="<?php
                            echo $_SESSION['user']['email'];
                        ?>" placeholder="Correo electrónico" name="email">
                            <br>
                            <h5>Nombre De La Mascota</h5>
                            <input style="font-size: 20px;" class="form-control" type="text" placeholder="Nombre" name="nombre">
                            <br>
                            <h5>Dia Tu Cita</h5>
                            <input style="font-size: 20px;" class="form-control" type="date" name="fecha">
                            <br>
                            <h5>Hora Tu Cita</h5>
                            <input style="font-size: 20px;" class="form-control" type="time" name="hora">
                            <br>
                            <label style="font-size: 20px;" for="inputpassword4"> <h5 class="text-secondary">Servicio</h5></label>
                            <select style="font-size: 20px;" name="tipo" class="form-select">
                           <option selected>Selecciona Tu Servicio</option>
                           <option>Alojamiento De Perros</option>
                           <option>Alojamiento Para Gatos</option>
                           <option>Spa Y Aseo</option>
                           <option>Comida Saludable</option>
                           <option>Actividades De Ejercicio</option>
                           <option>Consulta Medica</option>
                          </select>
                            <button type="submit" id="enviar" name="agendar" class="btn btn-outline-dark">Registar</button>
                            <br>
                        </form>
                            </div>
                        </div>
                      </section>
                </div>
                <div   class="col-sm-12 col-md-6 col-lg-6 col-xl-6 py-6 bg" ><br><br><br>
                    <img style="width: 600px ; height: 500px ; padding-top:40px; " src="https://img.freepik.com/vector-premium/tienda-mascotas-cartel-gatos-lindos-fondo-amarillo_24877-12480.jpg" alt="">
                    
                </div>
            </div>
        </div>
</body>
</html>


