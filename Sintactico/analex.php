
<?php
session_start();
echo "<a href='../cuerpo.php'>Ver ALGORITMO</a><br>";
$tokens;//solo declaro la variable tokens
$final=$_SESSION['variable'][0]; //en la posicion 0 guarde el numero de vueltas
$NumTokens=$final/3;
echo "<b>numero de vueltas $final</b><br>";
echo "<b>numero de tokens $NumTokens</b><br><br><br>";


//pasa la vaiable de session a al arreglo token
 for($i=1;$i<=$final;$i++)
 {
 	$tokens[$i]=$_SESSION['variable'][$i];
 }



  function analex($tokens,$final) 
     {
	      $yd=1;
	      $contador=0;//solo es para que de un salto de linea cada 3 pocisiones
	      for($s=1; $s<=$final; $s++)   
	        {
	          echo $tokens[$s];echo " ";
 			  $contador++;
				 		if($contador==3)
				 		{
				 			echo "<br>";
				 			$contador=0;
				 		}
	              $yd++;	             
	        }
	        
     }

     echo analex($tokens,$final);

?>
