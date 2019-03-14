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
                            <a class="dropdown-item" href="">Bandeja</a>
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
      <div class="d-flex bg-secondary"> <!-- justify-content-center h-100 -->
    <table class="table table-hover table-secondary ">
    <thead>
    <tr>
      <th scope="col" style="font-size: 12px;">CLAVE DE MENSAJE</th>
      <th scope="col" style="font-size: 12px;">REMITENTE</th>
      <th scope="col" style="font-size: 12px;">TITULO DE MENSAJE</th>
      <th scope="col" style="font-size: 12px;">DESCRIPCIÓN</th>
      <th scope="col" style="font-size: 10px;">MENSAJE DIRECTO</th>
      <th scope="col" style="font-size: 12px;">FECHA ENVÍO</th>
      <th scope="col" style="font-size: 12px;">HORA</th>
      <th scope="col" style="font-size: 12px;">DOCUMENTO</th>
      <th scope="col" style="font-size: 12px;">ESTADO DE MENSAJE</th>
      <th scope="col" style="font-size: 12px;">OPERACIONES</th>
      <th scope="col" style="font-size: 12px;">RESPONDE</th>
      <th scope="col" style="font-size: 12px;">PRIORIDAD</th>
      <th scope="col" style="font-size: 12px;">ESTADO</th>
    </thead>
    <tbody>
        <?php
            $conexion = new mysqli("localhost", "mensajes", "Frutyloop10!", "correspondencia");
            $id_usr = $_SESSION["id_usuario"];

            $compar = 'SELECT id_mensaje FROM compartido where user_1='.$id_usr .' or user_2='.$id_usr .' or user_3='.$id_usr .' or user_4='.$id_usr .' or user_5='.$id_usr .' or user_6='.$id_usr .' or
                   user_7='.$id_usr .' or user_8='.$id_usr .' or user_9='.$id_usr .' or user_10='.$id_usr . ' ORDER BY id_mensaje DESC';

            $compart_mens = $conexion->query($compar);

            while ($row1 = mysqli_fetch_assoc($compart_mens))
            {
              $qry = 'SELECT * FROM mensajes WHERE id_mensaje_send="' . $row1["id_mensaje"] . '" ORDER BY id_mensaje_send DESC';
              $datos = $conexion->query($qry);
              $row = mysqli_fetch_assoc($datos);


              $q6 = 'SELECT * FROM compartido where id_mensaje=' . $row1["id_mensaje"];

              $msn = mysqli_fetch_assoc($conexion->query($q6));
              $tamrow = count($msn);
              $mensaje_dir = '';

              $flgmns = 0;
              $numbuser = 0;
              $flag = 0;
              $flag3 = 0;
              $act = 0;

              for ($l=0; $l < $tamrow ; $l++)
              {
                $col = "user_";

                if ((($l % 2) == 0) && ($l > 1))
                {
                  $numbuser = $numbuser + 1;
                  $col = $col . $numbuser;

                  if($msn[$col] == $id_usr)
                  {
                    $flgmns = 1;
                    $coord  = "mensaje_" . $numbuser;

                    $mensaje_dir = '<td class=" alert alert-danger"><span style="font-size: 10px;" id="mensaje_dir"'.$row["id_mensaje_send"].'">' . $msn[$coord] . '</span></td>';
                  }
                  else
                  {

                  }
                }
              }

              if ($flgmns == 0)
              {
                $mensaje_dir = '<td><span></span></td>';
              }

              $qry2 = 'SELECT nombre, apellido_p, apellido_m FROM usuario WHERE id_usuario="' . $row['id_usuario_send'] . '"';
              $datos2 = $conexion->query($qry2);
              $filtro = mysqli_fetch_assoc($datos2);
              $estado = "";
              $clase = "";

              $query = 'select * from visto where id_mensaje = ' . $row["id_mensaje_send"];
              $squery = mysqli_fetch_assoc($conexion->query($query));

              if($squery["id_mensaje"] != 0)
              {
                  $vistoc ='<td style="font-size: 10px;" class="bg-success">visto</td>';
              }
              else
              {
                  $vistoc ='<td style="font-size: 10px;" class=""></td>';
              }


              if ($row["prioridad"] == "Alta")
              {
                  $prioridad = '<td style="font-size: 10px;" class="bg-danger"><strong>'.$row["prioridad"].'</strong></td>';
              }
              else
              {
                  if ($row["prioridad"] == "Media")
                  {
                      $prioridad = '<td style="font-size: 10px;" class="bg-warning"><strong>'.$row["prioridad"].'</strong></td>';
                  }
                  else
                  {
                      if ($row["prioridad"] == "Baja")
                      {
                          $prioridad = '<td style="font-size: 10px;" class="bg-info"><strong>'.$row["prioridad"].'</strong></td>';
                      }
                      else
                      {
                          $prioridad = '<td style="font-size: 10px;" class="bg-secondary"><strong>No especifica</strong></td>';
                      }
                  }
              }


              if ($row['estado_respuesta'] == 0)
              {
                $estado = "<span style='font-size: 10px;' id='estado".$row['id_mensaje_send']."'><button type='button' disabled>SIN RESPUESTA</button></span>";
                $clase = "class=\"click\"";
              }
              else
              {
                $estado = "<span style='font-size: 10px;' id='estado".$row['id_mensaje_send']."'><button><a href=\"../expedientes/".$row['enlace_respuesta']."\">CON RESPUESTA</a></button></span>";
                $clase = "class=\" bg-secondary click\"";
              }

              echo "<tr data-valor=".$row['id_mensaje_send']." ". $clase .">
                  <td> <span style='font-size: 10px;' id='idmensaje".$row['id_mensaje_send']."'>".$row['id_mensaje_send']."</span></td>
                  <td> <span style='font-size: 10px;' id='id_remitente".$row['id_mensaje_send']."'>".$filtro["nombre"]. " " .$filtro["apellido_p"]. " " .$filtro["apellido_m"]. "</span></td>
                  <td> <span style='font-size: 10px;' id='titulo".$row['id_mensaje_send']."'>".$row['titulo_mensaje']."</span></td>
                  <td> <span style='font-size: 10px;' id='descripcion".$row['id_mensaje_send']."'>".$row['descripcion']."</span></td>
                   ".$mensaje_dir."
                  <td> <span style='font-size: 10px;' id='fecha".$row['id_mensaje_send']."'>".$row['fecha_enviado']."</span></td>
                  <td> <span style='font-size: 10px;' id='hora".$row['id_mensaje_send']."'>".$row['hora_enviado']."</span></td>
                  <td> <span style='font-size: 10px;' id='enlace".$row['id_mensaje_send']."'><button><a style=\"color: blue;\" id='enlace".$row['id_mensaje_send']."' onclick=\"visto(this.id, '../expedientes/".$row['enlace_enviado']."');\"  ><strong>Ver documento.</strong></a></button></span></td>
                  <td> ". $estado ."</td>
                  <td> <button class='btn btn-warning btn-sm responde' style='font-size: 8px;' value=".$row['id_mensaje_send']."><strong>RESPONDE</strong></button> <button class='btn btn-info btn-sm edit' style='font-size: 8px;' value=".$row['id_mensaje_send']."><strong>TURNAR</strong></button></td>
                  <td style='font-size: 10px;'>". $row["responde"] ."</td>
                  ".$prioridad." ".$vistoc."

              </tr>";

  //   href=\"../expedientes/".$row['enlace_enviado']."\"
              $prioridad = "";
              $qry2 = "";
              $flgmns = 0;
              mysqli_free_result($datos2);

            }

            mysqli_close($conexion);

        ?>
    </tbody>
    </table>
    </div>
                <!-- END CONTENT BLOCK-->
    </div>





    <div class="container-fluid py-2">
                          <!-- CONTENT BLOCK = TABLE NORMAL -->
    <div class="d-flex bg-secondary"> <!-- justify-content-center h-100 -->
    <table class="table table-hover table-dark">
  <thead>
    <tr>
      <th scope="col" style="font-size: 12px;">CLAVE DE MENSAJE</th>
      <th scope="col" style="font-size: 12px;">REMITENTE</th>
      <th scope="col" style="font-size: 12px;">TITULO DE MENSAJE</th>
      <th scope="col" style="font-size: 12px;">DESCRIPCIÓN</th>
      <th scope="col" style="font-size: 12px;">FECHA ENVÍO</th>
      <th scope="col" style="font-size: 12px;">HORA</th>
      <th scope="col" style="font-size: 12px;">DOCUMENTO</th>
      <th scope="col" style="font-size: 12px;">ESTADO DE MENSAJE</th>
      <th scope="col" style="font-size: 12px;">OPERACIONES</th>
      <th scope="col" style="font-size: 12px;">RESPONDE</th>
      <th scope="col" style="font-size: 12px;">PRIORIDAD</th>
      <th scope="col" style="font-size: 12px;">ESTADO</th>
  </thead>
  <tbody>
        <?php
            $conexion = new mysqli("localhost", "mensajes", "Frutyloop10!", "correspondencia");
            $id_usr = $_SESSION["id_usuario"];

            $qry = 'SELECT * FROM mensajes WHERE id_usuario_get="' . $id_usr . '" OR compartido="'. $id_usr . '" ORDER BY id_mensaje_send DESC';

            $datos = $conexion->query($qry);

            while ($row = mysqli_fetch_assoc($datos))
            {
                $qry2 = 'SELECT nombre, apellido_p, apellido_m FROM usuario WHERE id_usuario="' . $row['id_usuario_send'] . '"';
                $datos2 = $conexion->query($qry2);
                $filtro = mysqli_fetch_assoc($datos2);
                $estado = "";
                $clase = "";

                $query = 'select * from visto where id_mensaje = ' . $row["id_mensaje_send"];
                $squery = mysqli_fetch_assoc($conexion->query($query));

                if($squery["id_mensaje"] != 0)
                {
                    $vistoc ='<td class="bg-success">visto</td>';
                }
                else
                {
                    $vistoc ='<td class=""></td>';


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
                            $prioridad = '<td class="bg-secondary"><strong>No especifica</strong></td>';
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
                  $clase = "class=\" bg-secondary click\"";
                }

                echo "<tr data-valor=".$row['id_mensaje_send']." ". $clase .">
                    <td> <span style='font-size: 12px;' id='idmensaje".$row['id_mensaje_send']."'>".$row['id_mensaje_send']."</span></td>
                    <td> <span style='font-size: 12px;' id='id_remitente".$row['id_mensaje_send']."'>".$filtro["nombre"]. " " .$filtro["apellido_p"]. " " .$filtro["apellido_m"]. "</span></td>
                    <td> <span style='font-size: 12px;' id='titulo".$row['id_mensaje_send']."'>".$row['titulo_mensaje']."</span></td>
                    <td> <span style='font-size: 12px;' id='descripcion".$row['id_mensaje_send']."'>".$row['descripcion']."</span></td>
                    <td> <span style='font-size: 12px;' id='fecha".$row['id_mensaje_send']."'>".$row['fecha_enviado']."</span></td>
                    <td> <span style='font-size: 12px;' id='hora".$row['id_mensaje_send']."'>".$row['hora_enviado']."</span></td>
                    <td> <span style='font-size: 12px;' id='enlace".$row['id_mensaje_send']."'><button><a style=\"color: blue;\" id='enlace".$row['id_mensaje_send']."' onclick=\"visto(this.id, '../expedientes/".$row['enlace_enviado']."');\"  ><strong>Ver documento.</strong></a></button></span></td>
                    <td> ". $estado ."</td>
                    <td> <button class='btn btn-warning btn-sm responde' style='font-size: 8px;' value=".$row['id_mensaje_send']."><strong>RESPONDE</strong></button> <button class='btn btn-info btn-sm edit' style='font-size: 8px;' value=".$row['id_mensaje_send']."><strong>TURNAR</strong></button></td>
                    <td>". $row["responde"] ."</td>
                    ".$prioridad." ".$vistoc."

                </tr>";

//   href=\"../expedientes/".$row['enlace_enviado']."\"
                $prioridad = "";
                $qry2 = "";
                mysqli_free_result($datos2);
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


    <!--   <script src="js/funciones.js"></script>   -->

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
</body>
</html>
