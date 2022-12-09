<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <!-- BOOTSTRAP 4  -->
    <link rel="stylesheet" href="https://bootswatch.com/4/lux/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://getbootstrap.com/docs/5.2/assets/css/docs.css" rel="stylesheet">
    <!-- Libreria de jQuery -->
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"> </script>

  <!-- Libreria de sweetalert -->
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <link rel="icon" href="data:;base64,iVBORw0KGgo=">

  <link rel="stylesheet" href="css/styleP.css">




</head>
<body>
<header class="header">

    <a href="index.php" class="logo"> <i class="fas fa-paw"></i>PET SHOP </a>

    <nav class="navbar">
    </nav>

    <div class="icons">
        <div class="fas fa-bars" id="menu-btn"></div>
        <a class="fas fa-user" id="login-btn" href="login.php">Login</a>
    </div>


</header>
<br><br><br><br><br><br><br>

        <div  class="container my-12">
            <div  class="row">
                <div  class="col-sm-12 col-md-6 col-lg-6 col-xl-6 py-6 bg">
                    <section  id="streaming">
                        <div>
                          <center><div class="card">
                            <br>
                            <h2 style="background-color:#2890FF" class="card-header bg info-color  white-text text-center py-4" style=" color: #FAF9F9;">
                                <strong>Registrate!.</strong>
                            </h2>
                            <!--Card content-->
                            <div class="card-body px-lg-5">
                                <!--Formulario-->
                                <form  method="POST" id="register">
                                    <input style="font-size: 20px;" class="form-control" type="text" placeholder="Nombre" name="nombre" 
                                        id="nombre">
                                    <br>
                                    <input style="font-size: 20px;" class="form-control" type="text" placeholder="Apellidos" name="apellido"
                                        id="apellido">
                                    <br>
                                    <input style="font-size: 20px;" class="form-control" type="text" placeholder="Celular" name="celular" 
                                        id="celular">
                                    <br>
                                    <input style="font-size: 20px;" class="form-control" type="email" placeholder="Correo electrónico" name="email"
                                        id="email">
                                    <br>
                                    <input style="font-size: 20px;" class="form-control" type="password" placeholder="Contraseña" name="pass"
                                        id="contraseña">
                                    <br>
                                    <button type="button" id="enviar" name="enviar" class="btn btn-outline-dark">Registrar</button>
                                </form>
                            </div>
                        </div>
                      </section>
                </div>
                <div   class="col-sm-12 col-md-6 col-lg-6 col-xl-6 py-6 bg" >
                    <img style="width: 600px ; height: 500px ; padding-top:40px; " src="https://img.freepik.com/vector-premium/tienda-mascotas-cartel-gatos-lindos-fondo-amarillo_24877-12480.jpg" alt="">
                    
                </div>
            </div>
        </div>
</body>

</html>

<script type="text/javascript">
  $(document).ready(function(){
    $('#enviar').click(function(){
      var datos = $('#register').serialize();

      if ($('#nombre').val() == '') {
        swal ("¡Debe de Ingresar su Nombre! " , "" , "warning");
        return;
      }

      else if ($('#apellido').val() == '') {
        swal ("¡Debe de Ingresar sus apellidos! " , "" , "warning");
        return;
      }
      else if ($('#celular').val() == '') {
        swal ("¡Debe de Ingresar un número telefónico! " , "" , "warning");
        return;
      }
      else if ($('#email').val() == '') {
        swal ("¡Debe de Ingresar un email! " , "" , "warning");
        return;
      }
      else if ($('#contraseña').val() == '') {
        swal ("¡Debe de Ingresar una contraseña! " , "" , "warning");
        return;
      }
      $.ajax({
            type: "POST",
            url: "newUser.php",
            data: datos,
            success: function(response) {
                const { status, message } = response[0];
                if (status === 'SUCCESS') {
                    swal("¡Registro enviado! ", "¡Los datos fueron registrados!",
                    "success").then(function(){
            window.location="./login.php"
            })


                } else {
                    swal("¡Algo ha salido mal! ", message,
                    "error");
                }

            }

        });
        return false;

    });
});
</script>