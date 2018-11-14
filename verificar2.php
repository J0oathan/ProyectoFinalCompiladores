<?php  

//estado actual vale al estado en el que actualmente esta
$caracterActual--;
	echo "<br>entro a verificar 2";
	echo "<br> en verificar vale au= $au  au2= $au2 y estadoActual vale .. $estadoActual<br>"; 
	


if($estadoActual==19)
{
		$resultado[$au]='menorigual';
		$lineas[$au3]=$linea;
		$lexema[$au2]='<=';
		$opcion=1;
		include('Retroceso.php');
}

else if($estadoActual==22)
{
			$resultado[$au]='mayorigual';
			$lineas[$au3]=$linea;
			$lexema[$au2]='>=';
			$opcion=1;
			include('Retroceso.php');
}

else if($estadoActual==24)
{
			$resultado[$au]='igualigual';
			$lexema[$au2]='==';
			$lineas[$au3]=$linea;
			$opcion=1;
			include('Retroceso.php');
}

else if($estadoActual==26)
{
		$resultado[$au]='diferente';
		$lineas[$au3]=$linea;
		$lexema[$au2]='!=';
		$opcion=1;
		include('Retroceso.php');

}


$caracterActual++;

echo "salir de verificar2";
?>