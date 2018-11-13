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


/*echo "<br>imprimir lo que guardo<br><br>";
echo "en estados----$est <br>"; //estados
echo "en alfabeto----$alf <br>";  //alfabeto
echo "en estado inicial----$estI <br>";  //estado inicial
echo "en estado final----$estF <br>";		//estado final
echo "en transcisones$trans <br><br>";  //transiciones*/


//-----------------------------------
$ContadorEstadosFinales = count(explode(" ", $estF));
$ContadorEstadosFinales--;
/*echo "Contador de estados finales es $ContadorEstadosFinales <br> ";
echo "Estados finales separados: ";*/
$EstadosFinales = explode(" ", $estF);

for ($i = 0; $i < $ContadorEstadosFinales; $i++) 
{
    $EstadosFinales[$i];
    //echo ",";
}
//echo"<br>";


//-----------------------------------
$ContadorEstados = count(explode(" ", $est));
$ContadorEstados--;
//echo "Contador de estados es $ContadorEstados <br> ";
//echo "Estados: ";
$Estados = explode(" ", $est);

for ($i = 0; $i < $ContadorEstados; $i++) 
{
     $Estados[$i];
    //echo ",";
}

//------------------------------------------------------
$ContadorAlfabeto = count(explode(" ", $alf));
$ContadorAlfabeto--;
//echo "<br>Contador del alfabeto es $ContadorAlfabeto <br> ";
//echo "alfabeto";
$Alfabeto = explode(" ", $alf);


for ($i = 0; $i < $ContadorAlfabeto; $i++) //aqui separamos la cadena de alfabeto,para que cada caracter se guarde en su propia variable
{
     $Alfabeto[$i];
   // echo ",";
}

//-----------------------------------------------------
$ContadorTrasciones = count(explode(" ", $trans));
$ContadorTrasciones--;
//echo "<br>Contador de trascisioneses $ContadorTrasciones <br> ";
//echo "transciones";
$trascision = explode(" ", $trans);


for ($i = 0; $i <$ContadorTrasciones; $i++) 
{
     $trascision[$i];
    //echo ",";
}	

//DATOS PARA LAS TABLA
$Bidimensional;

						


 ?>