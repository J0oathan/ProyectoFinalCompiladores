<?php 

echo "holiiiiiiiiiiiiiiiii contador $ContadorPR";


$bandera=0;
	 					for($d=0;$d<$ContadorPR;$d++)
		    			{
					    	
					         echo "<br>comparamos ";
					          echo $Reservadas[$d];
					          echo " con ";
					          echo $tem2;
					          echo "<br>";
					            $var1 = TRIM($Reservadas[$d]);
					            echo "<br>var uno vale $var1<br>";
					            
					           if (strcasecmp($var1,$tem2) === 0)
					            {
					                $lexema[$au3]=$tem2;   
					                $resultado[$au]='Palabra reservada';
					                echo "<br><font color='pink'> au va aumnetar $au y $au2 guardamos:  </font><br>";
					           		echo $resultado[$au];
					                echo "<br>";

					                     $au++;
										$au2++;
										$au3++;
									
										$salir=0;
										$estadoActual=0;
										$AlfabetoActual=0;
										$y=0;
										$bandera=1;
								
					            }
					            
        				}

        				if($bandera==0)
        				{
        					echo "<br>No encontri palabra resrevada--";
									$opcion=2;
									include('Retroceso.php');	
        				}

        			
							//$caracterActual++;//solo para ver si el siguiente caracter no es vacio
							//echo "<br> el que sigue: ";
							//eho $caracteres[$caracterActual];
							echo "<br>";
							echo "<br>--";
							echo $caracteres[$caracterActual];
							echo "--";
							if($caracterActual==$ContadorCaracteres)
							 {
							    echo "<br> acabo limite<br>";
							    $salir=0;
							    
							 }
							 else if($caracteres[$caracterActual]==''||$caracteres[$caracterActual]==' ')
							 {
							 	$caracterActual++;
							 	echo "<br> avanza a la siguiente<br>";
							 	$salir=1;
							 	$estadoActual=0;
							 	$AlfabetoActual=0;
							 	$y=0;
							 } 
							 else
							 {
							 	echo "<br> no es vacio..";

							 	$salir=1;
							 	$estadoActual=0;
							 	$AlfabetoActual=0;
							 	echo "<br> estadoActual $estadoActual salir =$salir<br>";
							 	$y=0;
							 	echo "<br>";
							 }
							 //$caracterActual--;



 ?>