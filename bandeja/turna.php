<?php

      session_start();

      if($_SESSION['turnado'] != true)
      {
          header("Location: ../");
      }


  include '../conexion/conexion.php';

  $conexion = conex();
  $user = $_POST["id_destino"];
  $identificador = $_POST["id_mensaje"];
  $msnx = $_POST["mensaje"];

  $id = 'SELECT IF ( EXISTS ( SELECT id_mensaje FROM compartido WHERE id_mensaje= '.$identificador.'), 1, 0) as existe';
  $existe = mysqli_fetch_assoc($conexion->query($id));


  if($existe["existe"] == 0)
  {
    $ktimpo = date("Y-m-d H:i:s");
    $consulta = 'INSERT INTO compartido(id_mensaje, id_envia, user_1, mensaje_1, user_2, mensaje_2, user_3, mensaje_3, user_4, mensaje_4, user_5, mensaje_5, user_6, mensaje_6, user_7, mensaje_7, user_8, mensaje_8, user_9, mensaje_9, user_10, mensaje_10) VALUES('.$identificador.','.$_SESSION['id_usuario'].','.$user.',"'.$msnx.'",0,"",0,"",0,"",0,"",0,"",0,"",0,"",0,"",0,"")';
    $conexion->query($consulta);
  }
  else
  {
    $act = 'SELECT * FROM compartido where id_mensaje='. $identificador;
    $fila = mysqli_fetch_assoc($conexion->query($act));
    $tm = count($fila);
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

        if (($fila[$col] == $user)  )
        {
          $flag = 1;
        }

        if( ($fila[$col] == 0) && ($flag == 0) )
        {
          $actualiza = 'UPDATE compartido SET '.$col. '='.$user. ' , mensaje_' . $numbuser . '="' . $msnx . '" WHERE id_mensaje = ' . $identificador;
          $conexion->query($actualiza);
          $flag = 1;
          $act = 1;
          break;
        }
        else
        {
          $flag3 = 1;
        }
      }
    }
  }


  mysqli_close($conexion);
  echo json_encode($act);

 ?>
