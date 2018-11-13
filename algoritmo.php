<?php
		


    				echo "<br><font color='green'>linea numero $linea y salir vale $salir </font><br><";
  		while($salir!=0)
    		{		

    			/*if($caracteres[$caracterActual]=='')
    			{

    			}*/
    		
    			echo "<br><br> <u>y=$y y contadorAlfabeto=$ContadorAlfabeto</u><br>";
    			if(($y)!=($ContadorAlfabeto))
    				{								if($y==($ContadorAlfabeto-2))
			    											{
			    												echo "<br>entro a retroceso<br>";
			    												include('verificar.php');
			    											}
    					
    				 

    				
    				echo("<br><br>ME ENCUENTRO EN EL ESTADO= $estadoActual  <br>");
    				echo("--------------Bidimensional $estadoActual, $y= ");
    				echo $Bidimensional[$estadoActual][$y];
    							if(($estadoActual==0)&&($y==0))
    								{
    									$inicia=$caracterActual;
    								}
    				//echo("<br>QUE ES ESTO 1.((");
    				//echo $Bidimensional[0][1];
    				//echo "))";
    				echo "-------------------------<br>";
    				
    		
    						
    				if(($Bidimensional[$estadoActual][$y]!='-'))
    				{	
							//echo"<BR>forzado";
							//echo $Bidimensional[0][0];
							//echo"<BR>";
							//echo "<BR>EA -$estadoActual, AA -$AlfabetoActual-<BR>";
				    		echo"<br><br>Posible estado siguiente (";
				    		echo $Bidimensional[$estadoActual][$AlfabetoActual];
				    		echo ")<br>";
				    		//echo("<br><br>no es vacio y estamos en estado= (");
				    		//echo $Bidimensional[$estadoActual][$AlfabetoActual];
				    		//echo ")<br>";
				    	
    						

				    		for($i=0;$i<$ContadorEstadosFinales;$i++)
				    		{
				    		
				    			//echo "estado final(";
				    			//echo $EstadosFinales[$i];
				    			$GuardarEstado= $EstadosFinales[$i];
				    			//echo ")<br>";
				    			//echo "Estados finales ";
				    			//echo $EstadosFinales[$i];
				    			//echo " ";
				    			//echo $Bidimensional[$estadoActual][$AlfabetoActual];
				    			//echo "<br>";
				    			if($EstadosFinales[$i]==$Bidimensional[$estadoActual][$AlfabetoActual])
				    			{	
				    				echo"<br><br><font color='blue'>Estado final activado</font><br>";
				    				$NumDeEstadosFinalesEncontrados++;
				    				echo "<br>ESTADOS FINALES ENCONTRADOS $NumDeEstadosFinalesEncontrados<br>";
				    				if($NumDeEstadosFinalesEncontrados>1)
				    				{	
				    					//echo"<br> Au va diminuir ya queah pasado por mas de un estado final<br>";
				    					//$au--;
				    				}
				    				//echo "$y vale y contador alfabeto vale $ContadorAlfabeto<br>";
				    				$EstadoFinalActivado=1;
				    				$Bidimensional[$GuardarEstado][$ContadorAlfabeto-1];
				    				echo "<br>imprimir token<br>";
				    				echo $Bidimensional[$GuardarEstado][$ContadorAlfabeto-1];
				    				echo "<br>";


				    				echo "<br>?????????????????????????superAU$au<br>";
				    				echo "<font color='red'><br>GUARDANDO RESULTADO...<br></font>";
				    				//$resultado[$au]=$Bidimensional[$GuardarEstado][$ContadorAlfabeto-1];
				    					echo "<br>caracter actual";
				    					echo $caracteres[$caracterActual];
				    					echo "<br>";		


				    										if($caracteres[$caracterActual]=='')
			    											{
			    												echo "<br>es vacio<br>";
			    												include('verificar.php');
			    											}


				    				echo "<br>resultado vale:";
									echo $resultado[$au];
									echo "<br>";
									$noverificar=1;
									//$au++;
									
									





				    			}
				    		}
				    		if(($EstadoFinalActivado==1)&&($Aceptado==$ContadorCaracteres))
				    		{
				    			$salir=0;
				    			echo "verificar1<br>";
				    			include("verificar.php");
			    				echo("A1.- $Aceptation");
			    				//echo"<script type='text/javascript'>confirmar();</script>";
				    		}
				    		else
				    		{
				    				
    								//echo "<b>comparamos $caracteres[$caracterActual] != $Alfabeto[$AlfabetoActual]<b>";
				    				if($Alfabeto[$AlfabetoActual]==$caracteres[$caracterActual])
			    					{
			    							$Aceptado++;
			    						echo "<br><font color='red'>100.- alfabeto $Alfabeto[$AlfabetoActual] --iguales-- caracter $caracteres[$caracterActual] </font><br>";
			    						//echo("ACEPTADO ES $Aceptado ,CONTADOR $ContadorCaracteres ESTADO ACTICVO ES $EstadoFinalActivado");
			    						if($Aceptado>=$ContadorCaracteres&&$EstadoFinalActivado==1)
					    						{	
					    							echo "<br>numero de aceptacion es igual a contadro alfabeto<br>";

					    							$salir=0;
								    				echo("A2.- $Aceptation");
								    				if($noverificar!=1)
								    				{
								    				echo "verificar2";
					    							
					    							include("verificar.php");
					    							}
					    							else
					    							{
					    								
					    							}
								    				//echo"<script type='text/javascript'>confirmar();</script>";
					    						}
					    						else if ($Aceptado==$ContadorCaracteres&&$EstadoFinalActivado==0) 
					    						{
					    							echo "<br>NA1 $NoAceptation";
					    							echo "verificar3";
					    							include("verificar.php");
					    							$salir=0;
					    							//echo"<script type='text/javascript'>confirmar2();</script>";
					    						}
					    						else
					    						{	echo "<br>siguente estado<br>";
					    							$estadoActual=$Bidimensional[$estadoActual][$y];
			    									
			    									echo "<br>vamos al estado $estadoActual<br>";
			    									echo "<font color='red'>caracter $caracteres[$caracterActual] y albabeto = $Alfabeto[$AlfabetoActual]</font>";
			    											
			    									$caracterActual++;
			    									//\\$t=$caracteres[$caracterActual];


			    									//aqui en vez de if($t=='') iria una condicion para ver que hacer depnediendo  
			    									//del caracter que viene en el siguiente ciclo
			    									//porque estpy diciendo si siquiente en vacio ya verifica que tipo es
			    									//\\echo "<br> caracter predi: ";
			    									//\\echo $caracteres[$caracterActual];
			    									//\\echo "<br>";
			    									//letra no l para if()
			    									//digito si por si if(20)
			    									include('expresionRegular.php');
			    									if($continua!=1)
			    											{
			    												
			    												
			    												echo "<br>paso permiso de verificar<br>";
			    												include('verificar.php');

			    											}
			    										else{
			    													echo "continuar";
			    											}
			    									$y=0;
			    									$AlfabetoActual=0;
			    									//echo " <br>caracter $caracteres[$caracterActual] ==  $Alfabeto[$AlfabetoActual] albabeto";
			    									$EstadoFinalActivado=0;
			    									echo "<br>Estado final desactivado<br>salir vale $salir";

			    												    						

					    						}
			    						
			    					}
			    					else
			    					{
			    						echo "<br>caracter actual $caracterActual<br>";
										echo "<br><font color='red'>10.- css alfabeto $Alfabeto[$AlfabetoActual] !=  $caracteres[$caracterActual] </font><br>";
			    						echo "$Aceptado>=$ContadorCaracteres||$AlfabetoActual>$ContadorCaracteres";
					    						if($Aceptado>=$ContadorCaracteres||$AlfabetoActual>$ContadorAlfabeto)
					    						{
					    							//echo ".- Aceptados vale $Aceptado mayor a $ContadorAlfabeto<br>";
					    							//echo("super 4 $NoAceptation");

					    							$salir=0;
					    							//echo"<script type='text/javascript'>confirmar2();</script>";
					    						}
					    						else
					    						{
					    							$AlfabetoActual++;
					    							$y++;
					    							echo "<br>siguiente alfabeto<br>";	
					    							$EstadoFinalActivado=0;
			    									echo "<br>Estado final desactivado<br>";	



					    						}
			    						
				    				}
			    			}
				    		



    				}


    				else
    				{	
    					echo "es nulo<br>";
    					
    					$AlfabetoActual++;
    					$y++;
    					echo "alfabeto actual =$AlfabetoActual";

    					echo "<br>Aceptado $Aceptado Y CONTADRO CARACTERES $ContadorCaracteres ";
    					//$salir!=0;
							 			
							    					
    								echo "<font color='blue'>$Aceptado>=$ContadorCaracteres||$AlfabetoActual>$ContadorCaracteres</font>";
    							if($Aceptado>=$ContadorCaracteres/*||$AlfabetoActual>$Contador de carcateresacteres*/)
			    						{
			    							echo ".- Aceptados vale $Aceptado mayor a $ContadorAlfabeto<br>";
			    							echo("super 5 $NoAceptation");

			    								echo "verificar4<br>";
			    								if($caracteres[$caracterActual]=='')
			    											{
			    												echo "<br>es vacio<br>";
			    												include('verificar.php');
			    											}
			    							//echo"<script type='text/javascript'>confirmar2();</script>";

			    							$salir=0;
			    						}  					
    				}

    			}
    			else
    			{
    				echo(" super 6. .- ");
    					

    					//echo "<br>imprimir token $estadoActual y $AlfabetoActual<br>";
				    	//			echo $Bidimensional[$estadoActual][$AlfabetoActual-1];
    					//$resultado[$f]=$Bidimensional[$estadoActual][$AlfabetoActual-1];
    					//$f++;
    					echo "verificar5 <br>";
    					include("verificar.php");

 

													//echo"<script type='text/javascript'>confirmar2();</script>";
			    							$salir=0;
    			} 



    					/*if ($activarIncremento!=1) {
    						$au++;
    						
    					
    					}
    					$activarIncremento=1;*/
    		}
    	
 ?>