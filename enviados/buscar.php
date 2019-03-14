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
                        <button class="btn btn-outline-info navbar-btn" onclick="location.href='../bandeja/'">Bandeja</button>
                            <!--<a class="nav-link" href="../bandeja/">Bandeja</a>-->
                        </li>
                        &nbsp;
                        <li class="nav-item">
                            <button class="btn btn-info navbar-btn" onclick="location.href=''">Enviados</button>
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

      <form class="form-horizontal col-md-12" action="buscar.php" method="post">
        <div class="d-flex justify-content-centers">

            <h5>Búsqueda:</h5>
            <select class="nombre" name="unidad">
              <?php

              include "../conexion/conexion.php";

              $conexion = conex();

              $direc = 'SELECT * FROM  direccion';

              $datos = $conexion->query($direc);

              while($row1 = mysqli_fetch_assoc($datos))
              {
                $option = '<option value='.$row1["id_direccion"].'>'.$row1["nombre_direccion"].'</option>';
                echo $option;
              }



              ?>
            </select>
<button type="submit" class="btn btn-warning">Buscar</button>
 &nbsp;&nbsp;&nbsp;<strong><p>Filtro por: <?php

 $direc1 = 'SELECT nombre_direccion FROM direccion WHERE id_direccion='. $_POST["unidad"];
 $ident1 = mysqli_fetch_assoc($conexion->query($direc1));
 echo $ident1["nombre_direccion"];
  ?></p></strong>
</div>

<?php echo "<br>" ?>
</form>




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
        </tr>
      </thead>
      <tbody>

<?php

  $coord = $_POST["unidad"];

  $direc = 'SELECT nombre_direccion FROM direccion WHERE id_direccion='. $coord;
  $ident = mysqli_fetch_assoc($conexion->query($direc));



  $identusr = 'SELECT id_usuario from usuario where direccion="'.$ident["nombre_direccion"].'"';
  $data = $conexion->query($identusr);

  $usuarios = Array();

  while ($row2 = mysqli_fetch_assoc($data))
  {
    array_push($usuarios,$row2["id_usuario"]);
  }


  foreach ($usuarios as $key )
  {

    $mensaje = 'SELECT * FROM mensajes where id_usuario_get=' . $key . ' ORDER BY id_mensaje_send DESC';

    $mensajes = $conexion->query($mensaje);
      while ($row = mysqli_fetch_assoc($mensajes))
      {

        $qry2 = 'SELECT nombre, apellido_p, apellido_m FROM usuario WHERE id_usuario="' . $row['id_usuario_get'] . '"';
        $datos2 = $conexion->query($qry2);
        $filtro = mysqli_fetch_assoc($datos2);

        $estado = "";
        $clase = "";


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
            <td><button><a href=\"../expedientes/".$row['enlace_enviado']."\">Ver</a></button></p></td>
            <td>".$estado."</td>
            <td> <span style='font-size: 12px;' id=idmensjresponde".$row['id_mensaje_send'].">".$row['mensaje_respuesta']."</span></td>
            <td> <span style='font-size: 12px;' id=idresponde".$row['id_mensaje_send'].">".$row['responde']."</span></td>
            <td><button class='btn btn-danger btn-sm elimina' style='font-size:12px;' value=". $row["id_mensaje_send"] ."><strong>Eliminar</strong></button></td>
        </tr>";
        $qry2 = "";
        mysqli_free_result($datos2);
      }
      mysqli_close($conexion);
  }

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
