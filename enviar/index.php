<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="styles/estilo1.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.2/css/bootstrap-select.min.css">
    <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.2/js/i18n/defaults-*.min.js"></script>-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.2/js/bootstrap-select.min.js"></script>

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
                            <a class="dropdown-item" href="">Enviar documento</a>
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
                            <a class="dropdown-item" href="">Bandeja</a>
                            <a class="dropdown-item" href="../enviados/">Enviados</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item bd-danger" href="buscador_admin.php" disabled>Buscador</a>
                            <a class="dropdown-item bd-danger" href="rastrea.php" disabled>Compartidos</a>
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

    <div class="container py-5">


      <div class="col-5 bg-success">
        <p id="historial">

        </p>
      </div>


      <div class="mt-3 col-5" id="respuesta">

      </div>


    <div class="row justify-content-center bg-light py-3">
       <p class="lead"><strong>Envío de correspondencia</strong></p>
    </div>
    <div class="row justify-content-center bg-light" style="border-style:solid; border:5px;">

        <div class="row justify-content-center py-3">
            <form class="form-horizontal col-md-12" role="form" id="formulario" name="formulario" enctype="multipart/form-data">
            <div class="form-inline row">
                <label for="destinatario">Destinatario &nbsp;&nbsp;</label>
                <select class="form-control" style="width: 500px;"  name="destinatario" id="destinatario">

                <?php
                        include "../conexion/conexion.php";

                        $conexion = conex();
                        $idactual = $_SESSION['tipo_usuario'];
                        $nombre = $_SESSION['usuario'];

                        if ($idactual == 1)
                        {
                            $query = 'SELECT id_usuario, nombre , apellido_p, direccion FROM usuario WHERE NOT nombre="'. $nombre .'" AND puesto="1"';
                        }
                        else
                        {
                            $query = 'SELECT id_usuario, nombre, apellido_p, direccion FROM usuario WHERE NOT nombre="'. $nombre .'" AND tipo_usuario="'. $idactual .'"';
                        }

                        $datos = $conexion->query($query);

                        while ($row = mysqli_fetch_assoc($datos))
                        {
                            $option = '<option id="' . $row["id_usuario"] . '"  >' . $row["nombre"] ." " . $row["apellido_p"] . ' (' . $row["direccion"] . ') ' . '</option>';
                            echo($option);
                            //echo($row["direccion"]);

                        }

                        //$query2 = "SELECT MAX(id_mensaje_send) as maximo FROM mensajes";
                        //$datos2 = $conexion->query($query2);
                        //$datos3 = mysqli_fetch_assoc($datos2);
                        //$datos3["maximo"] = $datos3["maximo"] + 1;
                        //echo($datos3["maximo"]);
                        //mysqli_free_result($datos);
                        //mysqli_free_result($datos3);


                        mysqli_close($conexion);


                    ?>
                </select>
              </div>
              <div class="row form-inline py-2">
              <label for="titulo">Urgencia&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </label>
                    <select class="form-control" style="width: 500px; " name="prioridad" id="prioridad" >

                    <option value="Baja" id="Baja">Prioridad Baja</option>
                    <option value="Media" id="Media">Prioridad Media</option>
                    <option value="Alta" id="Alta">Prioridad Alta</option>

                    </select>
              </div>

                <div class="row form-inline py-2">
                  <label for="titulo">Titulo &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </label>
                  <input type="text" class="form-control" style="width: 500px;" id="titulo" name="titulo" onkeyup="cuenta2('titulo');" maxlength="50" placeholder="Escribe el titulo del mensaje" required>
                  &nbsp;&nbsp;&nbsp;
                  <div id="counter2">
                  <span class="badge badge-success" id="tm2">50</span>
                  </div>
                </div>

                <div class="row form-inline py-2">
                  <label for="descripcion">Descripción &nbsp;&nbsp;&nbsp; </label>
                  <textarea class="form-control z-depth-1" id="describe" name="describe" rows="4" style="width: 500px; height: 150px; resize: none;" onkeyup="cuenta('describe');" maxlength="200" placeholder="Describe el mensaje" required></textarea>
                  &nbsp;&nbsp;&nbsp;
                  <div id="counter">
                  <span class="badge badge-success" id="tm">200</span>
                  </div>


                </div>

                <div class="row form-inline mb-5">
                    <label for="archivo">Archivo &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                    <div style="width: 500px;">
                        <input type="file" name="archivo" id="archivo" accept="application/pdf" required>
                        <!--<label class="custom-file-label" for="inputGroupFile02">Elije el documento a enviar</label>-->
                    </div>
                </div>

                        <div class="row float-right mb-5">
                            <button type="submit" class="btn btn-success" id="submit">Enviar</button>
                        </div>
            </form>
        </div>
	</div>
    </div>


    <script>
        function cuenta(ide)
    {
        var resp =  document.getElementById("tm");
        var texto = document.getElementById(ide).value;
        var counter = document.getElementById("counter");
        console.log(texto);

        var tam = texto.length;
        var tam2 = 200 - tam;

        if (tam2 == 50)
        {
            counter.innerHTML = '<div id="counter"><span class="badge badge-warning" id="tm">50</span></div>';
        }
        if (tam2 == 51)
        {
            counter.innerHTML = '<div id="counter"><span class="badge badge-success" id="tm">51</span></div>';

        }
        if (tam2 == 10)
        {
            counter.innerHTML = '<div id="counter"><span class="badge badge-danger" id="tm">10</span></div>';
        }
        if (tam2 == 11)
        {
            counter.innerHTML = '<div id="counter"><span class="badge badge-warning" id="tm">11</span></div>';

        }


        resp.innerHTML = tam2;
    }

    function cuenta2(ide)
    {
        var resp =  document.getElementById("tm2");
        var texto = document.getElementById(ide).value;
        var counter = document.getElementById("counter2");

        console.log(texto);

        var tam = texto.length;
        var tam2 = 50 - tam;
        if (tam2 == 20)
        {
            counter.innerHTML = '<div id="counter2"><span class="badge badge-warning" id="tm2">20</span></div>';
        }
        if (tam2 == 21)
        {
            counter.innerHTML = '<div id="counter2"><span class="badge badge-success" id="tm2">21</span></div>';

        }
        if (tam2 == 5)
        {
            counter.innerHTML = '<div id="counter2"><span class="badge badge-danger" id="tm2">5</span></div>';
        }
        if (tam2 == 6)
        {
            counter.innerHTML = '<div id="counter2"><span class="badge badge-warning" id="tm2">6</span></div>';

        }

        resp.innerHTML = tam2;
    }
    </script>




    <script>

      var hist = setInterval(historia, 2000);

      function historia()
      {
        var q1 = 1;
        var datos = new FormData();
        datos.append("q", q1);

        fetch('hist.php',{
              method: 'POST',
              body: datos
        })

        .then( res => res.json())
        .then( data => {

        if (data === 'error')
        {
          alert("ERROR");
        }
        else
        {

          var respuesta = "&Uacute;ltimo registro: <strong>" + data['0']["id_m"] + "</strong> Para: <strong>" + data['0']["name"] + "</strong> <br>";
          var respuesta2 = "Anterior registro: <strong>" + data['1']["id_m"] + "</strong> Para: <strong>" + data['1']["name"] + "</strong>";
          //var d = new Date();
          document.getElementById("historial").innerHTML = respuesta + respuesta2;
        }
      })
      }



    </script>



<script src="app.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
</body>
</html>
