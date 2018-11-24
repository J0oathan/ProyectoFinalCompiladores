<?php 	




session_start();
//$preanalisis=$_SESSION['preanalisis'];
//echo "PREANAL ".$preanalisis;
//include('analex.php');
echo "<a href='../cuerpo.php'>Ver ALGORITMO</a><br>";
$Tokens;//solo declaro la variable tokens
$TipoTokens;
$NumLinea;
$final=$_SESSION['variable4']; //en la posicion 0 guarde el numero de vueltas


$EnterosConst=array();
$Arreglos=array();
$ifs=array();

/*$NumTokens=$final/3;
echo "<b>numero de vueltas $final</b><br>";
echo "<b>numero de tokens $NumTokens</b><br>";
*/

		//pasa la variables de session a los 3 arreglos
		 for($i=0;$i<$final;$i++)
		 {
		 	echo $Tokens[$i]=$_SESSION['variable'][$i]; echo "  ";
		 	
		 	echo $TipoTokens[$i]=$_SESSION['variable2'][$i]; echo "  ";
		 	
		 	echo $NumLinea[$i]=$_SESSION['variable3'][$i]; echo "<br><br>";
		 	
		 }


		 echo "--------------------------------------------------------------------<br>";




		 for($i=0;$i<$final;$i++)
		 {	
		 	$Tokens[$i]=$_SESSION['variable'][$i]; 
		 	$TipoTokens[$i]=$_SESSION['variable2'][$i]; 
		 	$NumLinea[$i]=$_SESSION['variable3'][$i]; 


		 		
		 	if($TipoTokens[$i]=='id')
		 	{
		 		echo $Tokens[$i]; echo"="; echo $TipoTokens[$i];
		 		echo "<br>";

		 		

		 		//$resultado = array_unique($Tokens);
				//print_r($resultado);
		 	}

		 }
$Tokens = array_values(array_unique($Tokens));


		 	$final=count($Tokens);

		 	 for($i=0;$i<$final;$i++)
		 {
		 	echo $Tokens[$i]; 
		 	echo "<br>";
		 }

/*

		 	$Tokens = array_values(array_unique($Tokens));


		 	$final=count($Tokens);

		 	 for($i=0;$i<$final;$i++)
		 {
		 	echo $Tokens[$i]; 
		 	echo "<br>";
		 }*/





 ?>