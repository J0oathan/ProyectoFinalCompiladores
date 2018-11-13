<?php


include('LectorTxtSinComentarios.php');
//echo "<br>";
//echo "<br>";
//DATOS PARA LAS TABLA
$filas =$ContadorEstados;
$columnas =$ContadorAlfabeto;
$texto = 0;
$grey = true;


//---------------------------------------------------------
//de tabla a lo otro


?>






<!DOCTYPE html>
<html>
<head>
	<title>Automatas</title>
   <link rel="stylesheet" type="text/css" href="MODAL.css">
</head>

<!--<script>
    function capturar()
    {
        // obtenemos e valor por el numero de elemento
        var porElementos=document.forms["form1"].elements[0].value;
        // Obtenemos el valor por el id
        var porId=document.getElementById("nombre").value;
        // Obtenemos el valor por el Nombre
        var porNombre=document.getElementsByName("nombre")[0].value;
        // Obtenemos el valor por el tipo de tag
        var porTagName=document.getElementsByTagName("input")[0].value;
        // Obtenemos el valor por el nombre de la clase
        var porClassName=document.getElementsByClassName("formulario")[0].value;
 
        document.getElementById("resultado").innerHTML=" \
            Por elementos: "+porElementos+" \
            <br>Por ID: "+porId+" \
            <br>Por Nombre: "+porNombre+" \
            <br>Por TagName: "+porTagName+" \
            <br>Por ClassName: "+porClassName;

            $.post("algoritmo.php", {porId}, function(data) {
                   //console.log(data);

                 $('#eli').html(data);
                 
                 })
    }
    </script>-->
<body background="codigo.jpg">

<div class="contenido">
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





echo "<br><h3>imprimir lo que guardo<br></h3><br>";
echo "Estados---- $est <br>"; //estados
echo "Alfabeto---- $alf <br>";  //alfabeto
echo "Estado inicial---- $estI <br>";  //estado inicial
echo "Estados finales---- $estF <br>";    //estado final

?>
</div>

<div  class="contenido2" align="center">
  <table border="0" align="center">
   <tr>
     
     <td>
       <table>
         <tr>
           <td style="padding:15px; ">
             .
           </td>
         </tr>
         <?php 
         for($aa=0;$aa<$ContadorEstados;$aa++)
           {
              echo"<tr >";
              echo " <td style='padding:15px;'><b>".$Estados[$aa]."</b></td>";
           }
         echo" </tr>";
        ?>
       </table>
     </td>
     <td>
                                           <!--sdsdsdssdsd-->
                                        <table border="0">
                                      <?php
                                      echo"<tr>";
                                        for($a=0;$a<$ContadorAlfabeto;$a++)
                                        echo"<th style=padding:15px;>".$Alfabeto[$a]."</th>"; 
                                      echo"</tr>";
                                     
                                     //Iniciamos el bucle de las filas
                                     for($t=0;$t<$ContadorEstados;$t++){
                                      echo "<tr>";
                                      //Iniciamos el bucle de las columnas
                                      for($y=0;$y<$ContadorAlfabeto;$y++){
                                       if($grey){
                                        //Pintamos el cuadro

                                            echo "<td style=padding:15px;>".$trascision[$texto]."</td>";
                                        //El próximo no será pintado
                                             $grey=false;
                                            $texto++;
                                        }
                                        else
                                        {


                                          //Dejamos cuadro en blanco
                                          echo "<td style=padding:15px;>".$trascision[$texto]."</td>";
                                          //El próximo será pintado
                                          $grey=true;
                                          $texto++;
                                        }
                                      }
                                       //Cerramos columna
                                       echo "</tr>";
                                      }
                                     ?>
                                     <!-- Cerramos tabla -->
                                     </table>
                                            <!--ssasasasas-->
     </td>
   </tr>

  </table>

	
 </div>
    <!--div para yasmin aqui  -->
     <div  class="contenido3" align="center">


     		<?php 
     			$Bidimensional;

							$cont = 0;
							for ($i = 0; $i < $ContadorEstados; $i++)
								{
									for ($j = 0; $j < $ContadorAlfabeto; $j++)
									{
							      
										      $cont++;
										      $Bidimensional [$i][$j] = $trascision[$cont-1];
													/*echo $Bidimensional[$i][$j];
										      echo "<br>";*/ 
										      if ($Bidimensional[$i][$j] != '-')
										       {
										         // echo "<script>console.log($ContadorEstados);</script>";
										         // echo "<script>console.log($ContadorAlfabeto);</script>";
										            echo "<li>d(".$Estados[$i].",".$Alfabeto[$j].") = ".$Bidimensional[$i][$j]."</li>";
										       }
									}
								}

	     		 ?>
	       

     </div>

     <!--<div align="center">
     	 <form id="form1">
        Nombre:<br><input type="text" name="nombre"  id="nombre" class="formulario">
 
    </form>
    <input type="button" value="obtener el nombre" onclick="capturar()">
    <div id="resultado"></div>
    <div id="eli">
    	
    </div>-->

   <!-- <div>
    	<form action="algoritmo.php" method="post">
    		 Nombre:<br><input type="text" name="id"  id="nombre" class="formulario">
    		 <button>enviar</button>
    		
    	</form>
    </div>-->


    <button class="button" onclick="document.getElementById('id01').style.display='block'">Insertar cadena</button>
     <br><br><br><br><br><br>

<!-- The Modal -->
<div id="id01" class="modal" align="center">
  <span onclick="document.getElementById('id01').style.display='none'" 
class="close" title="Close Modal">&times;</span>

  <!-- Modal Content -->
  <form class="modal-content animate" action="algoritmo.php" method="post">
   

    <div class="container"><br><br>
      <label for="uname"><h1><b>Cadena</b></h1></label><br>
      <input type="text" placeholder="iNSERTA CADENA AQUI" class="formulario" name="id" required><br><br>

     

      <button class="button2" type="submit">Probar suerte XD XD</button>
      
    </div>

  
  </form>
</div>

<script>
// Get the modal
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>


</body>
</html>