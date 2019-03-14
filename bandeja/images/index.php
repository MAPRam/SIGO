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

        if ($_SESSION['loggedin'] != true)
        {
            header("Location: ../");
        }
    ?>

    <div class="container-fluid py-3">
    <div class="container-fluid">
            <nav class="navbar navbar-expand-lg " style="background-color: rgb(37,39,35);"> <!-- navbar-dark bg-dark -->
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                      <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <img class="img-fluid" width="150px" height="250px" src="images/Logo.png">
                        </li>
                        <li class="nav-item">
                        <button class="btn btn-outline-info navbar-btn" onclick="location.href='../enviar/'">Enviar documento</button>
                            <!--<a class="nav-link" href="../enviar/">Enviar documento</a>-->
                        </li>
                        &nbsp;
                        <li class="nav-item">
                        <button class="btn btn-info navbar-btn" onclick="location.href=''">Bandeja</button>
                            <!--<a class="nav-link" href="../bandeja/">Bandeja</a>-->
                        </li>
                        &nbsp;
                        <li class="nav-item">
                            <button class="btn btn-outline-info navbar-btn" onclick="location.href='../enviados/'">Enviados</button>
                            <!--<a class="nav-link" href="../enviados/">Enviados</a>-->
                        </li>


                            <!--<a class="nav-link" href="../bandeja/">Bandeja</a>-->

                        &nbsp;
                        &nbsp;
                      </ul>
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
                   user_7='.$id_usr .' or user_8='.$id_usr .' or user_9='.$id_usr .' or user_10='.$id_usr;

            $compart_mens = $conexion->query($compar);

            while ($row1 = mysqli_fetch_assoc($compart_mens))
            {
              $qry = 'SELECT * FROM mensajes WHERE id_mensaje_send="' . $row1["id_mensaje"] . '" ORDER BY id_mensaje_send DESC';
              $datos = $conexion->query($qry);
              $row = mysqli_fetch_assoc($datos);

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
