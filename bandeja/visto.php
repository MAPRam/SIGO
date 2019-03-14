<?php


      session_start();

      if($_SESSION['turnado'] != true)
      {
          header("Location: ../");
      }




    include "../conexion/conexion.php";
    $conexion = conex();
    $user = $_SESSION["id_usuario"];
    $identificador = $_POST["idmensaje"];

    $id = 'SELECT IF ( EXISTS ( SELECT id_usuario FROM visto WHERE id_mensaje= '.$identificador.'), 1, 0) as existe';

    $existe = mysqli_fetch_assoc($conexion->query($id));

    if ($existe["existe"] == 0)
    {
        $ktimpo = date("Y-m-d H:i:s");
        $consulta = 'INSERT INTO visto(id_usuario, numerovistas, id_usuarioturnado, mensaje_turnado, id_mensaje, tiempo) VALUES('.$user.',1,0,"",'.$identificador.' ,"'. $ktimpo.'")';

        $conexion->query($consulta);

    }
    else
    {
        $c1 = 'SELECT numerovistas, id_usuario  FROM visto WHERE id_mensaje='.$identificador;
        $nv = mysqli_fetch_assoc($conexion->query($c1));

        if (($nv["numerovistas"] == 1) && ($nv["id_usuario"] == $user))
        {

        }
        else
        {
            if (($nv["numerovistas"] == 1) && ($nv["id_usuario"] != $user))
            {
                $vista = $nv["numerovistas"] + 1;
                $update = 'UPDATE visto SET id_usuario='.$user.', numerovistas='.$vista.' WHERE id_mensaje='. $identificador;
                $conexion->query($update);
            }
            else
            {
                if (($nv["numerovistas"] == 2) && ($nv["id_usuario"] == $user))
                {

                }
            }
        }




        //echo json_encode($nv["numerovistas"]);
    }
    mysqli_close($conexion);

    echo json_encode('1');
    // SELECT IF ( EXISTS ( SELECT titulo_mensaje FROM mensajes WHERE id_mensaje_send= 0), 1, 0);



?>
