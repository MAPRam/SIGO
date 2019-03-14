<?php
  include '../conexion/conexion.php';
  $conexion = conex();
  $query = 'SELECT id_mensaje_send, id_usuario_get FROM  mensajes ORDER BY id_mensaje_send DESC LIMIT 2';
  $consulta = $conexion->query($query);

  $dt = array();

  while ($row = mysqli_fetch_assoc($consulta))
  {
    $query2 = 'SELECT nombre, apellido_p FROM usuario where id_usuario=' . $row["id_usuario_get"];
    $user = mysqli_fetch_assoc($conexion->query($query2));
    $nombre = $user["nombre"] . " " . $user["apellido_p"];

    $dt1 = array('id_m' => $row["id_mensaje_send"], 'name' => $nombre );
    array_push($dt, $dt1);
    unset($dt1);
    $nombre = '';
  }

  mysqli_close($conexion);
  echo json_encode($dt);


?>
