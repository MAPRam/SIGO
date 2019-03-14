<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="styles/estilo1.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>


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
                            <a class="dropdown-item bd-danger" href="buscador_admin.php" disabled>Buscador</a> <!-- MODIFICAR PARA QUE BUSQUE SOLAMENTE LO DE EL ADMINISTTRADOR  -->
                            <a class="dropdown-item bd-danger" href="rastrea.php" disabled>Compartidos</a> <!-- MODIFICAR PARA QUE RASTREE TOD O LO DE LA DIRECCIÓN -->
                          </div>
                        </div>
                        <!-- Notificaciones para eliminhar mensajes y y solicitudes de actualizaciones de prioridad (En coordinación) y solicitudes -->
                      &nbsp;
                        <div class="btn-group nav-item">
                          <button type="button" disabled style="font-size: 12px;" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            SOLICITUDES <span class="badge badge-warning">Working</span>
                          </button>
                          <div class="dropdown-menu">
                            <a class="dropdown-item" href="../enviar/">Enviar documento</a>
                            <a class="dropdown-item" href="../">Bandeja</a>
                            <a class="dropdown-item" href="../enviados/">Enviados</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item bd-danger" href="buscador_admin.php"Buscador</a>
                            <a class="dropdown-item bd-danger" href="rastrea.php">Compartidos</a>
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






    <div class="container-fluid py-2">



    <div class="d-flex bg-secondary"> <!-- justify-content-center h-100 -->
    <table class="table table-hover table-dark">
  <thead>
    <tr>
      <th scope="col" style="font-size: 12px;">CLAVE</th>
      <th scope="col" style="font-size: 12px;">ENVÍA</th>
      <th scope="col" style="font-size: 12px;">COMP 1</th>
      <th scope="col" style="font-size: 12px;">COMP 2</th>
      <th scope="col" style="font-size: 12px;">COMP 3</th>
      <th scope="col" style="font-size: 12px;">COMP 4</th>
      <th scope="col" style="font-size: 12px;">COMP 5</th>
      <th scope="col" style="font-size: 12px;">COMP 6</th>
      <th scope="col" style="font-size: 12px;">COMP 7</th>
      <th scope="col" style="font-size: 12px;">COMP 8</th>
      <th scope="col" style="font-size: 12px;">COMP 9</th>
      <th scope="col" style="font-size: 12px;">COMP 10</th>
  </thead>
  <tbody>


    <?php
        $conexion = new mysqli("localhost", "mensajes", "Frutyloop10!", "correspondencia");
        $id_usr = $_SESSION["id_usuario"];

        $qry = 'SELECT id_mensaje FROM compartido ORDER BY id_mensaje DESC';
        $datos = $conexion->query($qry);


        while( $idm = mysqli_fetch_assoc($datos))
        {
          //echo $idm["id_mensaje"];
          $res5 = 'SELECT * FROM compartido WHERE id_mensaje=' . $idm["id_mensaje"] . ' ORDER BY id_mensaje DESC';
          $d6 = mysqli_fetch_assoc($conexion->query($res5));
          $tm = count($d6);

          $cad = array();
          $cd1 = '<td style="font-size: 10px;">'.$idm["id_mensaje"].'</td>';

          $qr4 = 'SELECT nombre, apellido_p from usuario where id_usuario=' . $d6["id_envia"];
          $name = mysqli_fetch_assoc($conexion->query($qr4));

          $cd2 = '<td class=" alert alert-danger" style="font-size: 10px;"><strong>'.$name["nombre"].' '.$name["apellido_p"].'</strong></td>';

          array_push($cad, $cd1);
          array_push($cad, $cd2);

          $numbuser = 0;
          $flag = 0;
          $flag3 = 0;
          $act = 0;

          for ($l=0; $l < $tm ; $l++)
          {
            $col = "user_";

            if ((($l % 2) == 0) && ($l > 1))
            {
              $numbuser = $numbuser + 1;
              $col = $col . $numbuser;

              if($d6[$col] != 0)
              {

                $cons = 'SELECT nombre, apellido_p FROM usuario where id_usuario='.$d6[$col];
                $datosa = mysqli_fetch_assoc($conexion->query($cons));

                $cd = '<td class="bg-info" style="font-size: 10px;"> <strong>'.$datosa["nombre"].' '.$datosa["apellido_p"].'</strong></td>';
                array_push($cad, $cd);
              }
              else
              {
                $cd = '<td>&nbsp;</td>';
                array_push($cad, $cd );
              }
            }

          }

          $tm = 0;

          $numbuser = 0;
          $flag = 0;
          $flag3 = 0;
          $act = 0;

          echo '<tr> ';

          echo $cad[0];
          echo $cad[1];
          echo $cad[2];
          echo $cad[3];
          echo $cad[4];
          echo $cad[5];
          echo $cad[6];
          echo $cad[7];
          echo $cad[8];
          echo $cad[9];
          echo $cad[10];
          echo $cad[11];

          echo '</tr>';

          //print_r($cad);
          unset($cad);
          //echo "<br>";
        }


        mysqli_close($conexion);
    ?>



    </tbody>
    </table>


	</div>

                <!-- END CONTENT BLOCK-->


    </div>

    <?php include 'modal1.php'; ?>
    <?php include 'modal2.php'; ?>
    <script src="custom1.js"></script>
    <script src="custom.js"></script>


    <script>

        function visto(ident, enlace)
        {
            ident.disabled = true;
            datos = new FormData()

            var regex = /(\d+)/g;

            var idmensaje = ident.match(regex);

            datos.append("idmensaje", idmensaje[0]);

            fetch('visto.php',{
                method: 'POST',
                body: datos
            })
            .then( res => res.json())
            .then( data => {

            if (data === 'error')
            {
                alert("Error");
            }

            else
            {

                location.href = enlace;
                ident.disabled = false;
            }
            })

        }

    </script>



<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
</body>
</html>
