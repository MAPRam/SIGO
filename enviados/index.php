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
                            <a class="dropdown-item" href="">Enviados</a>
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




    <div class="container-fluid py-2">

              <?php

              include "../conexion/conexion.php";


                if (($_SESSION['tipo_usuario'] == 1) && ($_SESSION['puesto'] == 1))
                {
                    $conexion = conex();

                    $direc = 'SELECT * FROM  direccion';
                    echo '<form class="form-horizontal col-md-12" action="buscar.php" method="post"><div class="d-flex justify-content-centers">';

                    echo '<h5>Búsqueda:</h5> <select class="nombre" name="unidad">';
                    $datos = $conexion->query($direc);

                    while($row = mysqli_fetch_assoc($datos))
                    {
                      $option = '<option value='.$row["id_direccion"].'>'.$row["nombre_direccion"].'</option>';
                      echo $option;
                    }

                    echo '</select><button type="submit" class="btn btn-warning">Buscar</button>';
                    echo '</div> </form>';
                    mysqli_close($conexion);
                }

                echo "<br>"
              ?>

    <div class="d-flex bg-secondary"> <!-- justify-content-center h-100 -->




    <table class="table table-hover table-dark">
  <thead>
    <tr>
      <th scope="col" style="font-size: 12px;">CLAVE DE MENSAJE</th>
      <th scope="col" style="font-size: 12px;">DESTINATARIO</th>
      <th scope="col" style="font-size: 12px;">ASUNTO</th>
      <th scope="col" style="font-size: 12px;">FECHA ENVÍO</th>
      <th scope="col" style="font-size: 12px;">HORA</th>
      <th scope="col" style="font-size: 12px;">DOCUMENTO</th>
      <th scope="col" style="font-size: 12px;">ESTADO DE MENSAJE</th>
      <th scope="col" style="font-size: 12px;">MENSAJE RESPUESTA</th>
      <th scope="col" style="font-size: 12px;">RESPONDE</th>
      <th scope="col" style="font-size: 12px;">Operaciones</th>
      <th scope="col" style="font-size: 12px;">URG</th>
      <th scope="col" style="font-size: 12px;">VISTO</th>

    </tr>
  </thead>
  <tbody>
        <?php

            $id_usr = $_SESSION["id_usuario"];
            $qry = 'SELECT * FROM mensajes WHERE id_usuario_send="' . $id_usr . '" ORDER BY id_mensaje_send DESC';
            //include_once ("../modulos/conexion.php");
            $conexion = new mysqli("localhost", "mensajes", "Frutyloop10!", "correspondencia");

            $datos = $conexion->query($qry);
            //$info = $datos->fetch_assoc();


            while ($row = mysqli_fetch_assoc($datos))
            {
                $qry2 = 'SELECT nombre, apellido_p, apellido_m FROM usuario WHERE id_usuario="' . $row['id_usuario_get'] . '"';
                $datos2 = $conexion->query($qry2);
                $filtro = mysqli_fetch_assoc($datos2);

                $estado = "";
                $clase = "";
                $query = 'select * from visto where id_mensaje = ' . $row["id_mensaje_send"];
                $squery = mysqli_fetch_assoc($conexion->query($query));

                if($squery["id_mensaje"] != 0)
                {
                    $vistoc ='<td class="bg-success">'.$squery["tiempo"].'</td>';
                }
                else
                {
                    $vistoc ='<td class="">no visto</td>';


                }


                if ($row["prioridad"] == "Alta")
                {
                    $prioridad = '<td class="bg-danger"><strong>'.$row["prioridad"].'</strong></td>';
                }
                else
                {
                    if ($row["prioridad"] == "Media")
                    {
                        $prioridad = '<td class="bg-warning"><strong>'.$row["prioridad"].'</strong></td>';
                    }
                    else
                    {
                        if ($row["prioridad"] == "Baja")
                        {
                            $prioridad = '<td class="bg-info"><strong>'.$row["prioridad"].'</strong></td>';
                        }
                        else
                        {
                            $prioridad = '<td class="bg-secondary"><strong>NA</strong></td>';
                        }
                    }
                }


                if ($row['estado_respuesta'] == 0)
                {
                  $estado = "<span style='font-size: 12px;' id='estado".$row['id_mensaje_send']."'><button type='button' disabled>SIN RESPUESTA</button></span>";
                  $clase = "class=\"click\"";
                }
                else
                {
                  $estado = "<span style='font-size: 12px;' id='estado".$row['id_mensaje_send']."'><button><a href=\"../expedientes/".$row['enlace_respuesta']."\">CON RESPUESTA</a></button></span>";
                  $clase = "class=\"click\" style=\"background-color: #6D786C; \"";
                }



                echo "<tr data-valor=".$row['id_mensaje_send']." " . $clase .">
                    <td> <span style='font-size: 12px;' id=idmensaje".$row['id_mensaje_send'].">". $row['id_mensaje_send'] ."</span></td>
                    <td> <span style='font-size: 12px;' id=id_destino".$row['id_mensaje_send'].">".$filtro["nombre"]. " " .$filtro["apellido_p"]. " " .$filtro["apellido_m"]. "</span></td>
                    <td> <span style='font-size: 12px;' id=idtitulo".$row['id_mensaje_send'].">".$row['titulo_mensaje']."</span></td>
                    <td> <span style='font-size: 12px;' id=idfecha".$row['id_mensaje_send'].">".$row['fecha_enviado']."</span></td>
                    <td> <span style='font-size: 12px;' id=idhora".$row['id_mensaje_send'].">".$row['hora_enviado']."</span></td>
                    <td><a href=\"../expedientes/".$row['enlace_enviado']."\">Ver</a></p></td>
                    <td>".$estado."</td>
                    <td> <span style='font-size: 12px;' id=idmensjresponde".$row['id_mensaje_send'].">".$row['mensaje_respuesta']."</span></td>
                    <td> <span style='font-size: 12px;' id=idresponde".$row['id_mensaje_send'].">".$row['responde']."</span></td>
                    <td><button class='btn btn-danger btn-sm elimina' style='font-size:12px;' value=". $row["id_mensaje_send"] ."><strong>Eliminar</strong></button></td>
                    ".$prioridad." ".$vistoc."

                    </tr>";

                $qry2 = "";
                mysqli_free_result($datos2);
            }

            mysqli_close($conexion);

        ?>

    </tbody>
    </table>
	</div>
    </div>

    <?php include 'modal1.php'; ?>
    <script src="custom.js"></script>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
</body>
</html>
