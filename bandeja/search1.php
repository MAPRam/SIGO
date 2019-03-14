<?php

  include '../conexion/conexion.php';
  $conexion = conex();

  $busca  = $_POST["s"];
  $query = "SELECT * FROM  mensajes where titulo_mensaje LIKE '".$busca."%' ORDER BY id_mensaje_send DESC";
  $res = $conexion->query($query);

  $dt = array();

  while ($rs = mysqli_fetch_assoc($res))
  {
    $dt1 = array('id' => $rs["id_mensaje_send"], 'envia' => $rs["id_usuario_send"], 'recibe' => $rs["id_usuario_get"], 'titulo' => $rs["titulo_mensaje"], 'descripcion' => $rs["descripcion"], 'fecha1' => $rs["fecha_enviado"], 'hora1' => $rs["hora_enviado"]
  , 'estado' => $rs["estado_respuesta"], 'enlace1' => $rs["enlace_enviado"], 'enlace2' => $rs["enlace_respuesta"], 'mensaje2' => $rs["mensaje_respuesta"], 'hora2' => $rs["hora_respuesta"], 'fecha2' => $rs["fecha_respuesta"], 'responde' => $rs["responde"], 'prioridad' => $rs["prioridad"]);

    array_push($dt, $dt1);
    //$dt = $dt . $dt1;
    unset($dt1);
  }

  echo json_encode($dt);
?>
