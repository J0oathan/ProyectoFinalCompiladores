<?php 	

require('conexion.php');


	//$selectCaracter="SELECT * FROM constantes WHERE tipo='c'";
	//$selectEnteros = "SELECT * FROM constantes WHERE tipo ='c'";
	$selectEnteros="SELECT * FROM constantes t1 INNER JOIN constantesactual t2 ON t1.id_constante=t2.id_constante WHERE tipo ='ent'";
	$selectCaracter="SELECT * FROM constantes t1 INNER JOIN constantesactual t2 ON t1.id_constante=t2.id_constante WHERE tipo ='c'";


	$selectCaracterA= "SELECT * FROM arreglos WHERE tipo='c'";
	$selectEnterosA = "SELECT * FROM arreglos WHERE tipo ='ent'";


	$arreglos2 = "SELECT * FROM arreglos INNER JOIN valoresa ON arreglos.id_arreglo = valoresa.id_arreglo and arreglos.tipo = 'ent'";
	$arreglos = "SELECT * FROM arreglos INNER JOIN valoresa ON arreglos.id_arreglo = valoresa.id_arreglo and arreglos.tipo = 'c'";

	$idArreglosI="SELECT id_arreglo FROM arreglos WHERE tipo='ent'";
	$idArreglosC="SELECT id_arreglo FROM arreglos WHERE tipo='C'";

	$VerificaActConstante="SELECT * FROM constantes t1 INNER JOIN constantesactual t2 ON t1.id_constante=t2.id_constante";

		$result=$con->query($selectCaracter);
		$result2=$con->query($selectEnteros);
		$result3=$con->query($selectCaracterA);
		$result4=$con->query($selectEnterosA);
		$result5=$con->query($arreglos2);
		$result6=$con->query($arreglos);
		$result7=$con->query($idArreglosI);
		$result8=$con->query($idArreglosC);
		$result9=$con->query($VerificaActConstante);
		

 ?>




 <?php 

$NombreConsI=array(); 
$NombreConsC=array(); 

$ValorConstI=array();
$ValorConstC=array();


$NombreArregloC=array();
$NombreArregloI=array();

$ValorArrayI=array();
$ValorArrayC=array();

$GuardaIdAI=array();
$GuardaIdAC=array();

$ContadorAI=0;
$ContadorAC=0;
$q=0;
$w=0;

 ?>
 					
 					

<!DOCTYPE html>
<html>
<head>
	<title>Gráfico</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

	<LINK REL=StyleSheet HREF="style.css" TYPE="text/css" >
</head>
<body>

	<div class="container-fluid"> 
<section class="main row">
  <aside class="col-xs-3 col-sm-3  col-md-3  col-lg-3">
    <h5>Constantes enteros</h5>
	<?php 
		
		while($row=mysqli_fetch_assoc($result))
		{
			echo"
     	   

     	     <span class='badge badge-primary'>".$row['lexema']." = ".$row['valora']."</span>
     	     
     	    ";

     	    array_push($NombreConsI,$row['lexema']);
     	    array_push($ValorConstI,$row['valor']);
		 }
	?>             
  </aside>
  <aside class="col-xs-3 col-sm-3  col-md-3  col-lg-3">
   
	<h5>Constantes caracter</h5>
	<?php 
		
		while($row=mysqli_fetch_assoc($result2))
		{
			echo"
     	      <span class='badge badge-warning'>".$row['lexema']." = '".$row['valora']."'</span>
     	     
     	    ";
     	    array_push($NombreConsC,$row['lexema']);
     	    array_push($ValorConstC,$row['valor']);
		 }
	?>
               
  </aside>

   <aside class="col-xs-3 col-sm-3  col-md-3  col-lg-3">
   <h5>Arreglos caracter</h5>
	<?php 
		
		while($row=mysqli_fetch_assoc($result3))
		{
			echo"
     	      <span class='badge badge-success'>".$row['lexema']." =[ ]</span>
     	     
     	    ";

     	    array_push($NombreArregloC,$row['lexema']);
     	    $ContadorAC++;

 
		 }
	?>              
  </aside>

   <aside class="col-xs-3 col-sm-3  col-md-3  col-lg-3">
   	<h5>Arreglos enteros</h5>
	<?php 
		
		while($row=mysqli_fetch_assoc($result4))
		{
			echo"
     	      <span class='badge badge-primary'>".$row['lexema']." = ".$row['lexema']." =[ ]</span>
     	     
     	    ";

     	    array_push($NombreArregloI,$row['lexema']);
     	    $ContadorAI++;
		 }
	?>
	</aside>

  
</section>

</div>



		
		<?php 
			while($row=mysqli_fetch_assoc($result5))
			{ 
				//echo "<td>".$row['valor']."</td>";
				array_push($ValorArrayI,$row['valor']);
			}
		?>
	
		<?php 
			while($row=mysqli_fetch_assoc($result6))
			{ 
				//echo "<td>".$row['valor']."</td>";
				array_push($ValorArrayC,$row['valor']);
				
			}
		?>


		<?php 
			while($row=mysqli_fetch_assoc($result7))
			{ 
				//echo "<td>".$row['valor']."</td>";
				array_push($GuardaIdAI,$row['id_arreglo']);				
			}
		?>

		<?php 
			while($row=mysqli_fetch_assoc($result8))
			{ 
				//echo "<td>".$row['valor']."</td>";
				array_push($GuardaIdAC,$row['id_arreglo']);				
			}
		?>


			
	

		<?php /*
		while($row=mysqli_fetch_assoc($result)){
		echo"<table>
   		     <tr>
     	     <td>".$row['lexema']."</td>
     	      <td>".$row['valor']."</td>
   		     </tr>
		     </table>";
		 }*/
		?>


<!-- AQUI VA IMPRIMIR LOS ARREGLOS -->
<br><br>
<?php 

echo "<h5>Arreglos enteros <span class='badge badge-secondary'>$ContadorAI</span></h5>";
//echo "<br> contador $ContadorAI y q vale $q <br>";
while($q<$ContadorAI){
$A="SELECT * FROM arreglos t1 INNER JOIN valoresa t2 ON t1.id_arreglo=".$GuardaIdAI[$q]." AND t2.id_arreglo=".$GuardaIdAI[$q]."";
//echo "<br>$A";
$inner1=$con->query($A);
 ?>


<div class="row">

	<div class="col-xs-1 col-sm-1  col-md-1  col-lg-1">  
		<?php echo $NombreArregloI[$q] ?>
	</div>
	<div class="col-xs-10 col-sm-10  col-md-10  col-lg-10">
	
	<table border="1">
		<?php ?> 
		<tr>
			<?php 
			while($row=mysqli_fetch_assoc($inner1))
			{ 
				echo "<td>".$row['valor']."</td>";
				
			}
			 ?>
		</tr>	
	</table>
	</div>
	<div class="col-xs-1 col-sm-1  col-md-1  col-lg-1">   
	</div>
</div>
<?php $q++; } ?>


<?php 

echo "<h5>Arreglos caracteres <span class='badge badge-secondary'>$ContadorAC</span></h5>";
//echo "<br> contador $ContadorAI y q vale $q <br>";
while($w<$ContadorAC){
$A="SELECT * FROM arreglos t1 INNER JOIN valoresa t2 ON t1.id_arreglo=".$GuardaIdAC[$w]." AND t2.id_arreglo=".$GuardaIdAC[$w]."";
//echo "<br>$A";
$inner1=$con->query($A);
 ?>


<div class="row">

	<div class="col-xs-1 col-sm-1  col-md-1  col-lg-1">   
		<?php echo $NombreArregloC[$w] ?>
	</div>
	<div class="col-xs-10 col-sm-10  col-md-10  col-lg-10">
	
	<table border="1">
		<?php ?> 
		<tr>
			<?php 
			while($row=mysqli_fetch_assoc($inner1))
			{ 
				echo "<td>".$row['valor']."</td>";
				
			}
			 ?>
		</tr>	
	</table>
	</div>
	<div class="col-xs-1 col-sm-1  col-md-1  col-lg-1">   
	</div>
</div>
<?php $w++; } ?>










<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
</body>
</html>