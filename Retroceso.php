<?php 


				echo "<br><font color='pink'> au va aumnetar es switch $au y $au2  guardamos:  </font><br>";
					           		echo $resultado[$au];
					                echo "<br>";



	switch ($opcion) {
		case 1:				
							$au++;
							$au2++;
							$au3++;
							
							$salir=0;

							$caracterActual++;//solo para ver si el siguiente caracter no es vacio
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
							
							$caracterActual--;
		break;

		case 2:				$pasoPorVerificar=1;
							echo $resultado[$au];
							echo "<br>yon aqui inicia $inicia aqui acaba $caracterActual <br>pre ";
							echo $cadenita[$linea]; 
							echo "<br>";
							$tem=$cadenita[$linea];
							
							$tem2='';	
							$termina=$caracterActual;

							for($www=$inicia;$www<$termina;$www++)
							{	
								echo "## ";
								echo $tem[$www];
								echo "<br>";
								$tem2.=$tem[$www];

							}
							//$tem2=substr($tem, $inicia,$termina);
							echo "  aqui pos ";
							echo $tem2;
									
								 					for($d=0;$d<$ContadorPR;$d++)
									    			{
												    	
												         echo "<br>comparamos ";
												          echo $Reservadas[$d];
												          echo " con ";
												          echo $tem2;
												          echo "<br>";
												            $var1 = TRIM($Reservadas[$d]);
												           // echo "<br>var uno vale $var1<br>";
												            
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

							$lexema[$au2]=$tem2;
							
							
							$au++;
							$au2++;
							$au3++;
							
							echo "<br>stwch 2<br>";
							//$lexema[$au2]=$cadenita[$linea];

							

							echo "<br>normal::";
							echo $caracteres[$caracterActual];
							echo "::<br>";
							//$caracterActual++;//solo para ver si el siguiente caracter no es vacio
							//echo "<br> el que sigue: ";
							//echo $caracteres[$caracterActual];
							//echo "<br>";
							if($caracterActual==$ContadorCaracteres)
							 {
							    echo "<br> acabo limite<br>";
							    $salir=0;
							    
							 }
							 else if($caracteres[$caracterActual]==' ')
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
							
						


						
						/*echo $caracteres[$caracterActual];
					if($caracteres[$caracterActual]=='')
					 {
					    echo "<br>es vacio<br>";
					    $salir=0;
					    
					 }
					 $caracterActual++;*/
		break;
		
		
	}
 ?>