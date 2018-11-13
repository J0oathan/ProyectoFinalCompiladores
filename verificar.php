<?php 

//aqui del estado del que proviene
	$pasoPorVerificar=0;

	echo "<br>entro a verificar";
	echo "<br> en verificar vale au= $au  au2= $au2 y estadoActual vale .. $estadoActual<br>";
	echo "cadenita<br>";
	echo $cadenita[$linea];

		if($estadoActual==3)
		{
			$resultado[$au]='ENTERO';
			$lineas[$au3]=$linea;
			$opcion=2;
			include('Retroceso.php');


			
		}
		else if($estadoActual==1)
		{
			
			$resultado[$au]='IDENTIFICADOR';
			$lineas[$au3]=$linea;
			
			$tem=$cadenita[$linea];
			$tem2=substr($tem, 0, $caracterActual);
			
			include('verificarReservadass.php');					
		}

		else if($estadoActual==7)
		{
			$resultado[$au]='CARACTER';
			$lineas[$au3]=$linea;

			$opcion=2;
			include('Retroceso.php');
		}

		else if($estadoActual==9)

		{
			$resultado[$au]='SUMA';
			$lineas[$au3]=$linea;
			$opcion=2;
			include('Retroceso.php');
			
		}
		else if($estadoActual==11)
		{
			$resultado[$au]='RESTA';
			$lineas[$au3]=$linea;
			$opcion=2;
			include('Retroceso.php');
		}
		else if($estadoActual==13)
		{
			$resultado[$au]='MULTIPLICACION';
			$lineas[$au3]=$linea;
			$opcion=2;
			include('Retroceso.php');
			
		}
		else if($estadoActual==15)
		{
			$resultado[$au]='DIVISION';
			$lineas[$au3]=$linea;
			$opcion=2;
			include('Retroceso.php');
		}
		else if($estadoActual==17)
		{
			$resultado[$au]='MENOR';
			$lineas[$au3]=$linea;
			$opcion=2;
			include('Retroceso.php');
		}
		else if($estadoActual==20)
		{
			$resultado[$au]='MAYOR';
			$lineas[$au3]=$linea;
			$opcion=2;
			include('Retroceso.php');
		}
		
	
	

		
										//esto no le muevas a nada hermani
										//\\echo "<br>reality au= $au<br>";
										if($pasoPorVerificar==1)
										{	

											echo "<br>disminuyo 1<br>";
											$au--;
										}

										echo "<br>acabo verificar1  en verificar salir vale au= $au<br>";
										echo "<br>valor de res:";
										echo $resultado[$au];

										echo "<br>";
										if($resultado[$au]=='')
										{	
											//resgresa a como es
											include('verificar2.php');
										}
										if($pasoPorVerificar==1)
										{	

											echo "<br>aummento 1<br>";
											$au++;
										}
										$numeroDePasadas++;
 ?>