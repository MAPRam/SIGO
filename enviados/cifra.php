<?php
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


function descifra($cadena, $llave)
{
   $result = '';
   $cadena = base64_decode($cadena);
   for($i=0; $i<strlen($cadena); $i++)
   {
      $char = substr($cadena, $i, 1);
      $llavechar = substr($llave, ($i % strlen($llave))-1, 1);
      $char = chr(ord($char)-ord($llavechar));
      $result.=$char;
   }

   return $result;
} 

?>
