	<?php 

$c=0;
//$puntocoma=';';

		$file = fopen("Editar/ejemplo.txt", "r") or exit("archivo no encontrado xd!");

while(!feof($file))
{
//echo fgets($file). "<br />";
  
$array[$c]=fgets($file);

list($precadenita[$c], $der) = explode( "//", $array[$c]);
//echo $precadenita[$c];
echo "<br>Estamos en lector de editor<br>";
$cadenita[$c]=trim($precadenita[$c]);//borrar espacios
echo "__";
echo $cadenita[$c];



$cadenita[$c]=str_replace(array(' ','\t','\n'),'', $cadenita[$c]);

echo "-><br>";
echo $cadenita[$c];



	/*if(empty($cadenita[$c]))
	{
		echo "<br> esta vacia linea<br>";
		//$linea++;
		$salir=0;
	}*/
echo "__<br><br>";
$c++;
}
fclose($file);





//$cadenita=$cadenita.$puntocoma;
//echo "concatenada<br>";
//echo $cadenita;
//echo "<br>sin espcaios<br>";




	 ?>