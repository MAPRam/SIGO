<?php
  include '../conexion/conexion.php';
  $id_usr = $_POST["iduser"]; //$_SESSION["id_usuario"];

  $querycomp = 'SELECT id_mensaje FROM compartido where user_1='.$id_usr .' or user_2='.$id_usr .' or user_3='.$id_usr .' or user_4='.$id_usr .' or user_5='.$id_usr .' or user_6='.$id_usr .' or
         user_7='.$id_usr .' or user_8='.$id_usr .' or user_9='.$id_usr .' or user_10='.$id_usr . ' ORDER BY id_mensaje DESC';

  $conexion = conex();
  $compartido = $conexion->query($querycomp);


  while ($row1 = mysqli_fetch_assoc($compartido))
  {

    $qry = 'SELECT * FROM mensajes WHERE id_mensaje_send='. $row1["id_mensaje"];
    $mensajes = $conexion->query($qry);
    $row = mysqli_fetch_assoc($mensajes);

    $adjunto = 'SELECT * from compartido where id_mensaje='. $row1["id_mensaje"];
    $adjunto2 = mysqli_fetch_assoc($conexion->query($adjunto));
    $tm = count($adjunto2);
    $mensaje_dir = '';

    $flg = 0;
    $numbuser = 0;
    $flag = 0
    $flag3 = 0;
    $act = 0;

    for ($l=0; $l < $tm ; $l++)
    {
      $col = "user_";

      if ((($l % 2) == 0) && ($l > 1))
      {
        $numbuser = $numbuser + 1;
        $col = $col . $numbuser;

        echo $adjunto2[$col];

      }
      }
    }


  //echo $querycomp;

  mysqli_close($conexion);


  //echo json_encode($idusr);
?>
