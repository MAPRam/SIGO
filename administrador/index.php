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

        if($_SESSION['turnado'] != true)
        {
            header("Location: ../");
        }

    ?>

    <div class="container-fluid py-3">
    <div class="container-fluid">

            <nav class="navbar navbar-expand-lg " style="background-color: rgb(37,39,35);"> <!-- navbar-dark bg-dark -->

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                      <div class="navbar-nav mr-auto">
                        <div class="nav-item">
                          <img class="img-fluid" width="150px" height="250px" src="images/Logo.png">
                        </div>
                        <div class="btn-group nav-item">
                          <button type="button" style="font-size: 12px;" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            OPCIONES
                          </button>
                          <div class="dropdown-menu">
                            <a class="dropdown-item" href="../enviar/">Enviar documento</a>
                            <a class="dropdown-item" href="../bandeja/">Bandeja</a>
                            <a class="dropdown-item" href="../enviados/">Enviados</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item bd-danger" href="../bandeja/buscador_admin.php" disabled>Buscador</a> <!-- MODIFICAR PARA QUE BUSQUE SOLAMENTE LO DE EL ADMINISTTRADOR  -->
                            <a class="dropdown-item bd-danger" href="../bandeja/rastrea.php" disabled>Compartidos</a> <!-- MODIFICAR PARA QUE RASTREE TOD O LO DE LA DIRECCIÓN -->
                          </div>
                        </div>
                        <!-- Notificaciones para eliminhar mensajes y y solicitudes de actualizaciones de prioridad (En coordinación) y solicitudes -->
                      &nbsp;
                        <div class="btn-group nav-item">
                          <button type="button" disabled style="font-size: 12px;" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            SOLICITUDES <span class="badge badge-warning">Locked</span>
                          </button>
                          <div class="dropdown-menu">
                            <a class="dropdown-item" href="../enviar/">Enviar documento</a>
                            <a class="dropdown-item" href="../bandeja/">Bandeja</a>
                            <a class="dropdown-item" href="../enviados/">Enviados</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item bd-danger" href="../bandeja/buscador_admin.php" disabled>Buscador</a>
                            <a class="dropdown-item bd-danger" href="../bandeja/rastrea.php" disabled>Compartidos</a>
                          </div>
                        </div>


                        &nbsp;
                          <div class="btn-group nav-item">
                            <button type="button" disabled style="font-size: 12px;" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              COORR COORDINACIÓN <span class="badge badge-warning">Locked</span>
                            </button>
                            <div class="dropdown-menu">
                              <a class="dropdown-item" href="../enviar/">Enviar documento</a>
                              <a class="dropdown-item" href="">Bandeja</a>
                              <a class="dropdown-item" href="../enviados/">Enviados</a>
                              <div class="dropdown-divider"></div>
                              <a class="dropdown-item bd-danger" href="buscador_admin.php" disabled>Buscador</a> <!-- BUSCADOR PÓR COORDINACIÓN -->
                              <a class="dropdown-item bd-danger" href="rastrea.php" disabled>Compartidos</a> <!-- COMPARTIDOS POR COORDINACIÓJN -->
                            </div>
                          </div>


                          <!-- REHACER  LAS RUTAS DEPENDIENDO DELL LUGAR DONDE ESTÉ PARADO EL USUARIO (IDE A LOCA QUE NO CREO QUE SE PUEDA ) -->

                      </div>
                      <p style="color:  rgb(37,39,35); font-size:  4px;"  id="idusuairo"><?php echo($_SESSION['id_usuario']);?> &nbsp;</p> <!-- IDENTIFICADOR PARA LA PETICIÓN DINÁMICA DE DATOS -->

                      <p style="color: white;">Bienvenido: &nbsp; </p>
                      <strong><p style="color: white;" id="nombreusuario"><?php echo($_SESSION["usuario"]);?> &nbsp;</p></strong>
                      <strong><p style="color: white;" id="apellidousuario"><?php echo($_SESSION["apellido_p"]);?> &nbsp;&nbsp;&nbsp;</p></strong>
                      <button class="btn btn-outline-warning" onclick="location.href='../logout.php'">Salir</button>
                    </nav>
                    </div>


        </div>
    </div>

    </div>

    <div class="container ">

      <!--aqui son los cuadros  -->
      <div class="card-deck">
        

  <div id="carta" class="card bg-light text-center mb-3">
  <div class="card-header">

  </div>
    <div class="card-body">
      <a class="card-title" href="../enviar/" style="color: navy; font-size:30px;">Enviar documento.</a>
      <p class="">Enviar correspondencia a coordinadores o JUD, dependiendo del perfil</p>

    </div>
    <div class="card-footer text-muted">
  <a class="btn btn-primary" style="color: white;" onclick="enviar();">Enviar</a>
  </div>

  </div>




  <div id="carta" class="card bg-light text-center mb-3">
  <div class="card-header">
  </div>
    <div class="card-body">
      <a class="" href="../bandeja/" style="color: navy; font-size:30px;">Bandeja.</a>
      <p class="">Revisar nueva correspondencia</p>

    </div>
    <div class="card-footer text-muted">
    <a  class="btn btn-primary" style="color: white;" onclick="band();">Ir a bandeja</a>
    </div>

  </div>

  <div id="carta" class="card bg-light text-center mb-3">

  <div class="card-header">
  </div>
    <div class="card-body">
      <a class="card-title" href="../enviados/" style="color: navy; font-size:30px;">Enviados</a>
      <p class="card-text">Consultar o eliminar correspondencia enviada</p>

    </div>

    <div class="card-footer text-muted">
      <a  class="btn btn-primary" style="color: white;" onclick="enviados();">Ir a correspondencia</a>


  </div>
</div>

    <!--

    <div class="d-flex justify-content-center h-100 bg-secondary">

    </div>

  -->


  <script>

        function band()
        {
            location.href="../bandeja/";
        }

        function enviar()
        {

            location.href="../enviar/";
        }

        function enviados()
        {
            location.href="../enviados";
        }

  </script>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
</body>
</html>
