             
     
<!DOCTYPE html>
<html>
<head>
	<title></title>

  <?php 
   echo "<META HTTP-EQUIV='REFRESH' CONTENT='1;URL=Sintactico/funciones.php'> </head> ";
   ?>
	


</head>
<body background="black">
compilando...	
  <?php 

  echo "<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>";
  echo "<a href='Sintactico/funciones.php'>pasar a analex</a>";
   error_reporting (0);  

  //esto solo es para ver cuantos ciclos dara dependieno las linea del editor del a web
$numDeCiclos=0;
$file = fopen("Editar/ejemplo.txt", "r") or exit("archivo no encontrado xd!");

while(!feof($file))
{
//echo fgets($file). "<br />";
  
$array100[$numDeCiclos]=fgets($file);
$numDeCiclos++;
}//utilizo este while para identificar cuantas vueltas dare dependiendo el numero de lineas del editor del usuario
fclose($file); //aqu termina
//\\echo "num de cliclos $numDeCiclos <br>";
$linea=0;
$au=0;
$au2=0;
$au3=0;
$au4=0;
$r=0;
  
  while ( $r<$numDeCiclos ) {
    $r++;
   
  
//aqui empieza lector de txt
include("LectorTxt.php");
//aqui termina lector


	
	
	$resultado[$ContadorEstadosFinales];
	$activarIncremento=0;

	echo "<br>*****************************************************<br>";
	
	include('LectorDeEditor.php');
  //\\echo "<br>estamos en la linea $linea<br>";
  echo "<br> la cadenita tiene <br>";
  echo $cadenita[0];
  echo "<br>";
  echo $cadenita[1];
  echo "<br>";
	$Id = $cadenita[$linea]; //obtengo los caracteres insertardo en el modal del index.php
	//echo "$Id<br>";


	//$ContadorCaracteres = count(explode(" ", $Id));
	$ContadorCaracteres=strlen($Id);
	$ContadorCaracteres=$ContadorCaracteres+1;//por alguna extraña razon cuenta dos de mas
	echo "<br><br>Contador de carcateres insertados<b>  es $ContadorCaracteres <br> ";

for ($i = 0; $i < $ContadorCaracteres; $i++) 
{	

	echo $caracteres[$i]=$Id[$i];
}

for ($i = 0; $i < $ContadorCaracteres; $i++) 
{	

	$variable=$caracteres[$i];
	//echo "imprimiendo variable: ".$variable.",";


 
    $letra="/[a-zA-Z]/";
    $numero="/[0-9]/";
    if (preg_match($letra,$variable))
     {
     
     // echo "<p>la variable es la LETRA ".$variable."</p>";
      $caracteres[$i]='l';

    }
    else if(preg_match($numero,$variable))
    {
     // echo "<p>la variable es el NUMERO ".$variable."</p>";
      $caracteres[$i]='d';
    }

    else
    {
    	$caracteres[$i]=$variable;
    }	
}

//echo "nueva cadena<br>";
//cadena trasformada
echo "<br>";
for ($i = 0; $i < $ContadorCaracteres; $i++) 
{	

	echo $caracteres[$i];
}


$NoAceptation="<br>Cadena no acepta<br>"; //messages para el modal
$Aceptation="<br>Cadena valida<br>";

$AlfabetoActual=0;
$cont=0;
$PocisionEstados=0;
$EstadoFinalActivado=0;
echo "<br><br>";
$caracterActual=0;
$tokens;

$g=0;
$gg=0;
$y=0;
$f=0;
$s=0;
$noverificar=0;
$salir=1;

	$numeroDePasadas=0;
					




    $estadoActual=$estI; //el estado actual comienzo en el estado inicial marcado en el txt
    $Aceptado=0; //bandera para ver cuando hay un encuentro de alfabeto con caracter insertado por el USER


    //-------------------------------
$a=0;
	$file = fopen("PalabrasR.txt", "r") or exit("archivo no encontrado xd!");

while(!feof($file))
{
//echo fgets($file). "<br />";

$array[$a]=fgets($file);
list($Reservadas[$a], $der) = explode( "//", $array[$a]);
 $a++;


}
fclose($file);


//\\echo "<br>contrador de linea de LectorDeEditor $c <br>";
$ContadorPR= count($Reservadas);
//\\echo "<br>Palabras reservadas aqui $ContadorPR<br>";

    $d=0;
    $banderaReservada=0;
     //\\echo "<br> badera vale $banderaReservada<br>";
   

		    echo $Reservadas[$linea];
		    for($d=0;$d<$ContadorPR;$d++)
		    {
		    	//if(in_array("begin",$Reservadas))
			    //if($Reservadas[$d]=="begin")
         //\\ echo "<br>comparamos ";
          //\\echo $Reservadas[$d];
          //\\echo " con ";
         //\\ echo $cadenita[$linea];
         //\\ echo "<br>";

            $var1 = TRIM($Reservadas[$d]);
            $var2 = $cadenita[$linea];
            if (strcasecmp($var1,$var2) === 0)
            {
               //\\ echo " <br>encontrado<br>";   

                        $banderaReservada=1;
                        
            }
            else {
              //\\echo "Los strings no coinciden";
            }


			}
			

  /*echo "<br>";

            for($aaa=0; $aaa<22; $aaa++)
          
            {
                echo "<br>";
                for($bbb=0; $bbb<10; $bbb++)
          
                {
                  echo "[$aaa][$bbb]=";
                  echo $Bidimensional[$aaa][$bbb];
                  echo "<br>";

                }
            }   */
					
						if($banderaReservada!=1)
						{
              $NumDeEstadosFinalesEncontrados=0;
						include("algoritmo.php");

						}
						else
						{
								echo "<br>Au en cuerpo vale $au y Au2 $au2 ";
								$resultado[$au]='Palabra reservada';
                echo $cadenita[$linea];
                echo "<br>";
                $lineas[$au3]=$linea;
                $lexema[$au2]=$cadenita[$linea];
                echo "<br><font color='pink'> au va aumnetar $au y $au2++; guardamos: </font><br>";
                echo $resultado[$au];
                 echo "<br>";
								$au++;
                $au2++;
                $au3++;
								//echo $resultado[0];
                $banderaReservada=0;

						}	

           

             $linea++;
            echo "<br><font color='blue'> Aumento liinea<br></font>";
            $final;
    		$final=$au;

        echo "<br>numero de vueltas $final<br>";

    		echo("<br><br><font color='yellow'> au vale $au y $au2 TERMINO los resultados son<br></font>");
        $au4=0;
        $lexema2= array();
        $resultado2= array();
        $lineas2= array();
    		for($s=0; $s<=$final; $s++)
    			
    		{
  
          // "<br> linea $s->";
    			   //echo $resultado[$s];
             if(empty($lexema[$s]) || empty($resultado[$s]))
             {
                
             }

             else
             {
              echo "< ";
              $lexema[$s] = strtolower( $lexema[$s]);
              array_push($lexema2, $lexema[$s]);
              echo $lexema[$s];
              echo ", ";
              $res[$s] = strtolower( $resultado[$s]);
              array_push($resultado2,$resultado[$s] );
              echo $resultado[$s];
              echo ", ";
              echo $lineas[$s]+1;
              echo ">";
                
              $GuardarLineas[$au4]=$lineas[$s]+1;
              $GuardarLineas[$s] = strtolower( $GuardarLineas[$s]);
              array_push($lineas2, $GuardarLineas[$au4]);
              echo "<br>";
              echo "<br>";
              echo "<br>";echo "<br>";echo "<br>";echo "<br>";             
              


              
             
              $au4++;

             }
             
    		}
        echo "<br> ";
        echo "Aqui se imprime el array lexema2<br>";
              print_r($lexema2);
              echo "<br> ";
        echo "Aqui se imprime el array resultado2<br>";
              print_r($resultado2);
              echo "<br> ";
        echo "Aqui se imprime el array lineas2<br>";
              print_r($lineas2);
        
    	 		
}//cierro aqui while

 //aqui guarda los tres arreglos en uno solo

/*$superfinal=$final*3;
$g=1;

    while($gg<=$final)
    {

        $tokens[$g]=$lexema[$gg];
        $g++;
        $tokens[$g]=$resultado[$gg];
        $g++;
        $tokens[$g]=$GuardarLineas[$gg];
        $g++;
        $gg++;


    }*/


   /*  echo "<br>imprime lineas<br>";
  for($m=$contaLinea;$m<$superfinal;$m++)
  {
    echo "<br>$m ";
    echo $GuardarLineas[$m];
    echo "<br>";
  }
*/
   

   /* echo "<br>Imprimir tokens<br>";
    
    for($g=1;$g<=$superfinal;$g++)
    {

      echo "<br> $g:  ";
      echo $tokens[$g];
      echo "<br>";
    }*/

//$tokens[0]=$superfinal;

/*echo "Hecho por Yaz y Diana";
    function analex($tokens,$superfinal)    {
      $yd=1;
      for($s=0; $s<=$superfinal; $s++)   
        {
          echo "<br>";
              //echo "Elemento $s".$tokens[$s];
              echo "Elemento". $s. $tokens[$s];
              $yd++;

             
        }
        //return $final;
    }
    
    echo analex($tokens,$superfinal);*/




    session_start();
    
     $_SESSION['variable']=$lexema2;
     $_SESSION['variable2']=$resultado2;
     $_SESSION['variable3']=$lineas2;
     $_SESSION['variable4']=count($lexema2);


      ?>
      <br><br>

      
</body>
</html>

