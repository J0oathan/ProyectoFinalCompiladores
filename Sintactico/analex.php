
<?php
session_start();
echo "<a href='../cuerpo.php'>Ver ALGORITMO</a><br>";
$Tokens;//solo declaro la variable tokens
$TipoTokens;
$NumLinea;
$final=$_SESSION['variable4']; //en la posicion 0 guarde el numero de vueltas



$NumTokens=$final/3;
echo "<b>numero de vueltas $final</b><br>";
echo "<b>numero de tokens $NumTokens</b><br>";


//pasa la variables de session a los 3 arreglos
 for($i=0;$i<$final;$i++)
 {
 	$Tokens[$i]=$_SESSION['variable'][$i];
 	
 	$TipoTokens[$i]=$_SESSION['variable2'][$i];
 	
 	$NumLinea[$i]=$_SESSION['variable3'][$i];
 	
 }

//imprime todo
 echo "<BR>Imprimir haber si sirve<br>";
  for($i=0;$i<$final;$i++)
 {
 	echo "<br>Tokens: ";
 	echo $Tokens[$i];
 	echo "<br>TipoTokens: ";
 	echo $TipoTokens[$i];
 	echo "<br>NumLinea: ";
 	echo $NumLinea[$i];echo "<br><br>";
 }


  function analex($final) 
     {
	      
	        
     }

    // echo analex($final);

?>
