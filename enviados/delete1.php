<?php
  include "../conexion/conexion.php";
  include "cifra.php";
  $conexion = conex();
  $id_user = $_POST["user"];

  $query = 'SELECT id_usuario, password FROM usuario ORDER BY id_usuario desc'; // ORDER BY id_usuario DESC
  $psw = $conexion->query($query);
  //echo $query;

  while($psw1 = mysqli_fetch_assoc($psw))
  {
    $query9 = 'SELECT nombre from usuario where id_usuario=' . $psw1["id_usuario"];
    $res = mysqli_fetch_assoc($conexion->query($query9));

    $cadena_encriptada = cifra($psw1["password"], 'pizzapoll');
    $dato_importante = descifra($cadena_encriptada, 'pizzapoll');

    $up = 'UPDATE usuario SET password="'.$cadena_encriptada.'" WHERE id_usuario='.$psw1["id_usuario"];
    $conexion->query($up);
    echo $res["nombre"];
    echo " :: ";
    echo ($cadena_encriptada);
    echo " :: ";
    echo $dato_importante;
    //
    //echo ($dato_importante);
    echo "<br>";
  }

  mysqli_close($conexion);

?>
