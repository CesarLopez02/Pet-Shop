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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.2/assets/css/docs.css" rel="stylesheet">
    <!-- BOOTSTRAP 4  -->
    <link rel="stylesheet" href="https://bootswatch.com/4/lux/bootstrap.min.css">
    <title>Mi Informacion</title>
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


    <title>Mis datos</title>
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
                        echo $user['nombre'];
                    ?></a>
    <a class="fas fa-power-off"  href="logout.php">Logout</a>
</div>


</header>
<br><br><br><br><br><br><br>
<div class="containerrs">
        <div class="row">
            <div class="col-3">
                <!-- Columna sin mostrar informacion -->
            </div>

            <div class="col-6">
                <div class="card">
                    <br>
                    <h2 style="background-color:#2890FF" class="card-header bg info-color  white-text text-center py-4" style=" color: #FAF9F9;">
                     <strong>Mis Datos!.</strong>
                     </h2>
                    <!--Card content-->
                    <div class="card-body px-lg-5">
                        <!--Formulario-->
                        <form action="" method="POST">
                            <h4>Nombre</h4>
                            <input style="font-size: 20px;" class="form-control" name="nombre"  value="<?php
                            echo $user['nombre'];?>">
                            <h4>Apellido</h4>
                            <input style="font-size: 20px;" class="form-control" name="apellido"  type="text"
                             value="<?php echo $user['apellido'];?>">
                             <h4>Celular</h4>
                            <input style="font-size: 20px;" class="form-control" name="celular" type="text"  value="<?php
                            echo $user['celular'];?>">
                            <h4>Correo Electronico</h4>
                            <input style="font-size: 20px;" class="form-control" name="email" type="email" value="<?php
                            echo $user['email'];?>">
                            <h4>contraseña</h4>
                            <input style="font-size: 20px;" class="form-control" name="pass" type="text"   value="<?php
                            echo $user['pass'];?>">
                                <button class="btn btn-primary" type="submit" name="validate">Actualizar</button>


                        </form>
                        <?php
# Inicia Código de EDITAR o MODIFICAR
require_once 'db-connection.php';
if (isset($_POST['validate'])) 
{  
	  $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $celular = $_POST['celular'];
    $email = $_POST['email'];
	  $pass = $_POST['pass'];
  
	
	
	if (!empty($nombre) && !empty($apellido) && !empty($celular) && !empty($email) && !empty($pass))
	{  
		$query = $cnnPDO->prepare(
			'UPDATE usuarios SET email = :email, nombre = :nombre, apellido = :apellido, celular = :celular, pass = :pass WHERE email = :email'
		);
		
		$query->bindParam(':nombre',$nombre);
    $query->bindParam(':apellido',$apellido);
    $query->bindParam(':celular', $celular);
    $query->bindParam(':email',$email);
		$query->bindParam(':pass',$pass);
    $user['nombre'] = $nombre;
    $user['apellido'] = $apellido;
    $user['celular'] = $celular;
    $user['email'] = $email;
    $user['pass'] = $pass;
    $_SESSION['user'] = $user;
		$query->execute();
		unset($query);
		unset($cnnPDO);
    header('location:welcome.php');
	}
}
# Termina Código de EDITAR o MODIFICAR
?>
                    </div>
                </div>
                <br>
                <br>
                <div class="col-3">
                    <!-- Columna sin mostrar informacion -->
                </div>
            </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
            integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"
            integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
            integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
        </script>
</body>

</html>

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
            integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"
            integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
            integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
        </script>
</body>

</html>