<?php 

echo "<br> estado actual fiu: ";
echo $estadoActual;
echo "<br>";
echo "<br> caracter predi: /";
echo $caracteres[$caracterActual];
echo "\<br>";
$re=0;
$continua=0;

//$expr="/[^dl=+-.()]/";

//for($re=0;$re<=($ContadorAlfabeto-2);$re++)
//{
		//echo $Bidimensional[$estadoActual][$re];
		//echo "<br>";
		//$ver=$Bidimensional[$estadoActual][$re];


		/*if($ver==$expr)
		{
			echo "<br>entro a diana<br>";
		}
		else
		{
			echo "<br>no entro a diana<br>";
		}*/
//}
		
		if($caracteres[$caracterActual]==' ')
				{
					$continua=1;
				}

		else if(($estadoActual==1)||($estadoActual==5)||($estadoActual==6))
		{
			if(($caracteres[$caracterActual]=='l')||($caracteres[$caracterActual]=='d'))
				{
					$continua=1;
					echo "<br>entro en 5<br>";
				}

		}
		else if($estadoActual==3)
		{
			if($caracteres[$caracterActual]=='d')
				{
					$continua=1;
				}

		}

		else if($estadoActual==23)
		{
			if($caracteres[$caracterActual]=='=')
				{
					$continua=1;
				}

		}
		else if($estadoActual==25)
		{
			if($caracteres[$caracterActual]=='!')
				{
					$continua=1;
				}

		}

		
	

 ?>