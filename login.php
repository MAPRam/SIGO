<?php

    $name = $_POST["usuario"];
    $password = $_POST["password"];

    if (($name == "") ||($password == ""))
    {
      echo'<script type="text/javascript">alert("Campos sin valores");
      window.location.href="index.php";
      </script>';
    }
    else
    {
      $conexion = new mysqli("localhost", "mensajes", "Frutyloop10!", "correspondencia");
      include 'enviados/val.php';

      $key = cifra($password, llave());
      //echo $key;

      $sql = 'SELECT * FROM usuario WHERE correo="' . $name . '" AND password="' . $key . '"';

      $result = $conexion->query($sql);

      if ($result->num_rows > 0)
      {
          $row = $result->fetch_array(MYSQLI_ASSOC);
      }
      if (($name == $row["correo"]) && $key == $row["password"] )
      {
          //session_name("turnados");
          session_start();

          // $cookiename = "turnado";
          //$cookievalue = md5(rand(0, time()));
          // $houractual = time();
          // $tfinal = $houractual + 10800;
          // $timesesion = $tfinal;
          // setcookie($cookiename, $cookievalue, $timesesion);
          //$_SESSION['sessionID'] = $cookievalue;
          $_SESSION['turnado'] = true;
          $_SESSION['usuario'] = $row["nombre"];
          $_SESSION['apellido_p'] = $row["apellido_p"];
          $_SESSION['puesto'] = $row["puesto"];
          $_SESSION['id_usuario'] = $row["id_usuario"];
          $_SESSION['tipo_usuario'] = $row["tipo_usuario"];
          $_SESSION['direccion'] = $row["direccion"];
          $_SESSION['user'] = $row["user"];
          //$_SESSION['start'] = time();
          //$_SESSION['expire'] = $_SESSION['start'] + (30 * 60);
          mysqli_close($conexion);
          header("Location: administrador/");
      }

      else
      {
          mysqli_close($conexion);
          echo'<script type="text/javascript">alert("Usuario o contraseña incorrectos, intenta otra vez");
          window.location.href="index.php";
          </script>';
      }
    }





?>
