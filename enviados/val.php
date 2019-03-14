<?php

  function llave()
  {
      $key = array('0' => 224,'1' => 210,'2' => 244,'3' => 244,'4' => 194,'5' => 224,'6' => 222,'7' => 216,'8' => 216 );
      $k = '';

      for ($i=0; $i < count($key) ; $i++)
      {
        $k = $k . chr($key[$i]/2);
      }

      return $k;
  }

  function cifra($cadena, $llave)
  {
     $result = '';
     for($i=0; $i<strlen($cadena); $i++)
     {
        $char = substr($cadena, $i, 1);
        $llavechar = substr($llave, ($i % strlen($llave))-1, 1);
        $char = chr(ord($char)+ord($llavechar));
        $result.=$char;
     }

     return base64_encode($result);
  }


?>
