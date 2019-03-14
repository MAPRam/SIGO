<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="styles/estilo1.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
	<title>Gestión de correspondencia</title>

</head>
<body class="background">

  <?php
        session_start();

        if($_SESSION['turnado'] == true)
        {
            header("Location: administrador/");
        }

    ?>

    <div class="container py-5">
    <div class="d-flex justify-content-center h-100">
		<div class="card">
			<div class="card-header">
				<h3>Iniciar Sesión</h3>
			</div>
			<div class="card-body py-5">
				<form action="login.php" method="post">
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-user-tie"></i></span>
						</div>
						<input type="text" class="form-control" name="usuario" id="usuario" placeholder="Correo" required>

					</div>
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-key"></i></span>
						</div>
						<input type="password" name="password" id="password" class="form-control" placeholder="Contraseña" required>
					</div>


						<input type="submit" value="Login" class="btn btn-primary float-right">

				</form>

			</div>

			<div class="card-footer">
				<div class="d-flex justify-content-center links">
					¿No tienes un perfil?<a href="registro/"> Registrar usuario</a>
				</div>
				<div class="d-flex justify-content-center padding-5">
					<a href="" data-toggle="modal" data-target="#exampleModalCenter">¿Olvidaste tu cuenta o contraseña?</a>

				</div>
        <img class="img-fluid" width="200px" height="350px" src="images/Logo.png">
			</div>
		</div>
	</div>
    </div>


<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header bg-warning">
        <h5 class="modal-title" id="exampleModalCenterTitle">¿QUIERES RECUPERAR TU CUENTA O CONTRASE&Ntilde;A?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body bg-light">
					<!-- <form action="mail/correos_2.php" method="post">
							<label for="">Ingrese su correo para recuperar contrase&ntilde;a </label>
							<input type="mail" name="correo" required>
							<button type="submit">Recuperar</button>
					</form>  <br> -->

        Para recuperar su correo o contraseña marque a el <br> telefono: 1719-3000 Ext:1215 <br><br>O envie una correo con el asunto RESTABLECER CONTRASEÑA al correo: <a href="mailto:someone@example.com"
				> correspondencia.culturacdmx@gmail.com
				 </a>

      </div>
      <div class="modal-footer bg-warning">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Aceptar</button>
      </div>
    </div>
  </div>
</div>



<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
</body>
</html>
