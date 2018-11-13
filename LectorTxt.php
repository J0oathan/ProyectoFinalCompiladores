<?php 

      

	
   
$c=0;
$file = fopen("fuente.txt", "r") or exit("archivo no encontrado xd!");

while(!feof($file))
{
//echo fgets($file). "<br />";
  
$array[$c]=fgets($file);
$c++;
}
fclose($file);

list($est, $der) = explode( "//", $array[0]);
list($alf, $der) = explode( "//", $array[1]);
list($estI, $der) = explode( "//", $array[2]);
list($estF, $der) = explode( "//", $array[3]);
list($trans, $der) = explode( "//", $array[4]);



echo "<br>Imprimir lo que guardo<br> ";
echo "en estados----$est <br>"; //estados
echo "en alfabeto----$alf <br>";  //alfabeto
echo "en estado inicial----$estI <br>";  //estado inicial
echo "en estado final----$estF <br>";		//estado final
echo "en transcisones$trans <br><br>";  //transiciones


//-----------------------------------
$ContadorEstadosFinales = count(explode(" ", $estF));
$ContadorEstadosFinales--;
echo "Contador de estados finales es $ContadorEstadosFinales <br> ";
echo "Estados finales separados: ";
$EstadosFinales = explode(" ", $estF);

for ($i = 0; $i < $ContadorEstadosFinales; $i++) 
{
    echo $EstadosFinales[$i];
    echo ",";
   // $EstadosFinales[$i];
}
echo"<br>";


//-----------------------------------
$ContadorEstados = count(explode(" ", $est));
$ContadorEstados--;
echo "Contador de estados es $ContadorEstados <br> ";
echo "Estados: ";
$Estados = explode(" ", $est);

for ($i = 0; $i < $ContadorEstados; $i++) 
{
    echo $Estados[$i];
    echo ",";
    //$Estados[$i];
}

//------------------------------------------------------
$ContadorAlfabeto = count(explode(" ", $alf));
$ContadorAlfabeto--;
echo "<br>Contador del alfabeto es $ContadorAlfabeto <br> ";
echo "alfabeto";
$Alfabeto = explode(" ", $alf);


for ($i = 0; $i < $ContadorAlfabeto; $i++) //aqui separamos la cadena de alfabeto,para que cada caracter se guarde en su propia variable
{

	 //$Alfabeto[$i];
    echo $Alfabeto[$i];
   echo ",";
}

//-----------------------------------------------------
$ContadorTrasciones = count(explode(" ", $trans));
$ContadorTrasciones--;
echo "<br>Contador de trascisioneses $ContadorTrasciones <br> ";
echo "transciones";
$trascision = explode(" ", $trans);


for ($i = 0; $i <$ContadorTrasciones; $i++) 
{
    echo $trascision[$i];
    echo ",";
     //$trascision[$i];
}	
//\\echo "<br>";
//\\echo "<br>";
//DATOS PARA LAS TABLA
$Bidimensional;

							$cont = 0;
							for ($i = 0; $i < $ContadorEstados; $i++)
								{
									for ($j = 0; $j < $ContadorAlfabeto; $j++)
									{
							      
										      
										      $Bidimensional [$i][$j] = $trascision[$cont];
													/*echo $Bidimensional[$i][$j];
										      echo "<br>";*/ 
										      if ($Bidimensional[$i][$j] != '-')
										       {
										         // echo "<script>console.log($ContadorEstados);</script>";
										         // echo "<script>console.log($ContadorAlfabeto);</script>";
										            echo "<li>d(".$Estados[$i].",".$Alfabeto[$j].") = ".$Bidimensional[$i][$j]."</li>";
										       }
										       $cont++;
									}
								}


							/*	echo "<br>2<br>";
								$cont = 0;
							for ($i = 0; $i < $ContadorEstados; $i++)
								{
									for ($j = 0; $j < $ContadorAlfabeto; $j++)
									{
							      
										      
										      $Bidimensional [$i][$j] = $trascision[$cont];
													
										      
										         // echo "<script>console.log($ContadorEstados);</script>";
										         // echo "<script>console.log($ContadorAlfabeto);</script>";
										            echo "<li>d(".$i.",".$j.") = ".$Bidimensional[$i][$j]."</li>";
										       
										       $cont++;
									}
								}*/




 ?>