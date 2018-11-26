<?php 

session_start();
include 'conexion.php';
//$preanalisis=$_SESSION['preanalisis'];
//echo "PREANAL ".$preanalisis;
//include('analex.php');
echo "<a href='../cuerpo.php'>Ver ALGORITMO</a><br>";
$Tokens;//solo declaro la variable tokens
$TipoTokens;
$NumLinea;
$final=$_SESSION['variable4']; //en la posicion 0 guarde el numero de vueltas


$arrEnt=array();
$arrCar=array();
$aArrEnt=array();
$aArrCar=array();
$preanalisis2=array();

/*$NumTokens=$final/3;
echo "<b>numero de vueltas $final</b><br>";
echo "<b>numero de tokens $NumTokens</b><br>";
*/

//pasa la variables de session a los 3 arreglos
 for($i=0;$i<$final;$i++)
 {
 	$Tokens[$i]=$_SESSION['variable'][$i];
 	
 	$TipoTokens[$i]=$_SESSION['variable2'][$i];
 	
 	$NumLinea[$i]=$_SESSION['variable3'][$i];
 	
 }


//global $entonces, $programa,$constantes,$arreglos,$inicio,$fin,$ent,$id,$c,$coma,$llaveC,$llaveA,$si,$sino,$para,$escribe,$lee,$mod,$suma,$resta,$division,$multi,$puntoycoma,$diferente,$menor,$menorigual,$mayor,$mayorigual,$igualigual,$corcheteA,$corcheteC,$igual,$parA,$parC,$preanalisis2,$preanalisis;


$programa="programa";$constantes="constantes";$arreglos="arreglos";$inicio="inicio";$fin="fin";$ent="ent";$id="id";$c="c";$coma="coma";$llaveC="llaveC";$llaveA="llaveA";$si="si";$sino="sino";$para="para";$escribe="escribe";$lee="lee";$mod="mod";$suma="suma";$resta="resta";$division="division";$multi="multi";$puntoycoma="puntoycoma";$diferente="diferente";$menor="menor";$menorigual="menorigual";$mayor="mayor";$mayorigual="mayorigual";$igualigual="igualigual";$corcheteA="corcheteA";$corcheteC="corcheteC";$igual="igual";$parA="parA";$parC="parC"; $hasta="hasta";$paso="paso";$entonces="entonces";$hacer="hacer"; $punto="punto"; $length="length";
	
	$lexi="";
$titok="";
$contan2=-1;  //contador que dice qué número de token va
$c3=0;
global $preanalisis;

function analex($c3) 
{
	global $Tokens,$TipoTokens,$final;
	if ($c3<$final) {

		if($TipoTokens[$c3]=="Palabra reservada")
		{
			$preanalisis=$Tokens[$c3];
			//$preanalisis2=preanalisis2TokenId($c3);
		}
		else
		{
			$preanalisis=$TipoTokens[$c3];
			$preanalisis2=preanalisis2TokenId($c3);
		}

		return $preanalisis;
	}
	else
	{
		echo "<br>Fin de editor<br>";

	}

}


function preanalisis2TokenId($c3)
{
	global $Tokens,$TipoTokens,$final,$preanalisis2;
	if ($c3<$final) {

		if($TipoTokens[$c3]=="Palabra reservada")
		{
			//array_push($preanalisis2,$Tokens[$c3],$TipoTokens[$c3]);
			
		}
		else
		{

			array_push($preanalisis2,$Tokens[$c3],$TipoTokens[$c3]);
		}

		return  $preanalisis2;
	}
}

     
//echo "AQUI FUNCION ANAKE¡¡LEX:";
//echo analex($c3);
$preanalisis=analex($c3);
//$preanalisis2=preanalisis2TokenId($c3);




 /*echo "<BR>Imprimir haber si sirve<br>";
 for($i=0;$i<$final;$i++){
  //function cicloFor($contan2,$tokens,$TipoTokens,$NumLinea,$lexi,$titok){
     // for($i=$contan2;$i<$contan2+1;$i++)
     //{
     	echo "<br>Tokens: ";
     	echo $Tokens[$i];
     	echo "<br>TipoTokens: ";
     	echo $TipoTokens[$i];
     	echo "<br>NumLinea: ";
     	echo $NumLinea[$i];echo "<br><br>";
     }*/
     function P()
	{
		
		require('globales.php');
		//echo "<br>PREANAL: ".$preanalisis." y programa ".$programa;
		//echo "funcion P:".$preanalisis;
		if($preanalisis==$programa)
		{
			emparejar($programa);
			emparejar($id);
			DC();
			DA();
			emparejar($inicio);
			INST();
			emparejar($fin);
			echo "<br>TERMINO DE RECORRER EL PROGRAMA<br>";
		}
		else
		{
			echo "<br>->Error Sintactico en la linea: ".$NumLinea[$c3]." token-> " .$preanalisis." esperaba palabra programa<br>";
		}
	}
	function DC()
	{
		require('globales.php');
		if($preanalisis==$constantes)
		{
			emparejar($constantes);
			DC2();
		}
		else if($preanalisis==$arreglos || $preanalisis==$inicio)
		{

		}
		else
		{
			echo "<br>->Error Sintactico en la linea: ".$NumLinea[$c3]." token-> " .$preanalisis." esperaba palabra constantes<br>";
		}
	}
	function DA()
	{
		require('globales.php');
		if($preanalisis==$arreglos)
		{	
			emparejar($arreglos);
			DA2();
		}
		else if($preanalisis==$inicio)
		{

		}
		else
		{
			echo "<br>->Error Sintactico en la linea: ".$NumLinea[$c3]." token-> " .$preanalisis." esperaba palabra arreglos<br>";
		}
	}
	function DC2()
	{
		
		require('globales.php');
		if($preanalisis==$id)
		{
			//array_push($asigVar, $Tokens[$c3]);
			//echo "<br>vemos que hay  ";echo $asigVar[0]; echo " con ";echo $Tokens[0];
			//CompararAsigVarTokens($asigVar,$Tokens);
			$varCons=$Tokens[$c3];
			echo "DC2 varCons = ".$varCons;echo "  ->";
			emparejar($id);
			emparejar($igual);
			$varTipo=$preanalisis;
			tConstantes($varTipo,$varCons);
		
			CONSTANTE();
		
			DC3();
		}
		else
		{
			echo "<br>->Error Sintactico en la linea: ".$NumLinea[$c3]." token-> " .$preanalisis." esperaba un id<br>";
		}
	}
//QUERYS
/*
//select antes de insertar
$selectCons="SELECT * FROM constantes WHERE lexema='".$newLexema."'";
$selectARR ="SELECT * FROM arreglos WHERE lexema='".$newLexema."'";

//insertar en la tablas CONSTANTES, ARREGLOS
$insertCons="INSERT INTO constantes(lexema,tipo) VALUES ('".$lexema."','".$tipo."')";
$insertArr ="INSERT INTO arreglos(lexema,tipo) VALUES ('".$lexema."','".$tipo."')";

//insertar tabla VALORESARR
$updateArr ="INSERT INTO valoresA(id_arreglo,valor) VALUES ('".$id_arreglo."','".$valor."')";

//actualizar tabla CONSTANTES
$updateCons="UPDATE constantes SET valor='".$newValor."' WHERE lexema='".$lexema."'";
*/
	function tConstantes($varTipo,$varCons)
	{
		require('globales.php');
		require 'conexion.php';
		$sql = 'SELECT * FROM constantes WHERE lexema ="'.$varCons.'"';
		//$result=mysqli_query($con,$sql) or die("consulta fallida").mysqli_error($con);
		$result=$con->query($sql);
		$row=mysqli_fetch_assoc($result);
		$var=$row['lexema'];
		echo $var." variable";

		
		if($var==$varCons) //si se encuentran resultados
		{	
			echo "<br>no hacer push<br>";
			echo "<br>".$varCons."-->Car <br>";

			echo "<br>".$varTipo."-->cvrTipo<br>";
			echo "<br>Error Semántico. La variable ya ha sido declarada<br>";
			die();
		}
		else
		{
			echo "<br>hacer el push no son iguales<br>";
			echo "<br>".$varCons."-->Car<br>";
			echo "<br>".$varTipo."-->varTipo<br>";
			//$insertCons="INSERT INTO constantes(lexema,tipo) VALUES ('".$varCons."','".$varTipo."')";
			$sql = 'INSERT INTO constantes(lexema,tipo) VALUES ("'.$varCons.'","'.$varTipo.'")' ;
			//$result2=mysqli_query($con,$insertCons);
			$con->query($sql);
			
			

		}
		
	}
	function actCons($valor,$varCons)
	{

		include('conexion.php');

		require('globales.php');
		

		//echo "<br>valor es --$valor-- y varconss --$varCons-- <br>";
		$valor1 = str_replace("'", " ", $valor );
		$updateCons="UPDATE constantes SET valor='$valor1' WHERE lexema='$varCons' ";

		

		//echo "<br>$updateCons<br>";
		$con->query($updateCons);
		
		
	}
	function tArreglos($varTipo,$varCons)
	{
		require('globales.php');
		include('conexion.php');
		//$sql = 'SELECT * FROM constantes WHERE lexema ="'.$varCons.'"';
		$selectARR ="SELECT * FROM arreglos WHERE lexema='".$varCons."'";
		$result=$con->query($selectARR);
		$row=mysqli_fetch_assoc($result);
		$var=$row['lexema'];
		echo $var." variable";


		if($var==$varCons) //si se encuentran resultados
		{	
			echo "<br>no hacer push<br>";
			echo "<br>".$varCons."-->Car <br>";
			echo "<br>Error Semántico. La variable ya ha sido declarada<br>";
			die();
		}
		else
		{
			echo "<br>hacer el push no son iguales<br>";
			echo "<br>".$varCons."-->Car<br>";
			$insertArr ="INSERT INTO arreglos(lexema,tipo) VALUES ('".$varCons."','".$varTipo."')";
			$result=$con->query($insertArr);
		}
	}

	function AddD($valor,$varCons)
	{

		include('conexion.php');

		require('globales.php');

		$selectARR ="SELECT * FROM arreglos WHERE lexema='".$varCons."'";
		$result=$con->query($selectARR);
		$row=mysqli_fetch_assoc($result);
		$var=$row['id_arreglo'];
		echo $var." variable";
		//echo "<br>valor es --$valor-- y varconss --$varCons-- <br>";
		$valor1 = str_replace("'", " ", $valor );
		$updateArr ="INSERT INTO valoresa(id_arreglo,valor) VALUES ('".$var."','".$valor1."')";

		

		//echo "<br>$updateCons<br>";
		$con->query($updateArr);
		
		
	}

	function verificar($varCons)
	{
		require('globales.php');
		require 'conexion.php';
		$sql = 'SELECT * FROM constantes WHERE lexema ="'.$varCons.'"';
		$result=$con->query($sql);
		$row=mysqli_fetch_assoc($result);
		$var=$row['lexema'];
		$tipovar=$row['tipo'];

		echo "<br>".$varCons."variable varCons de la consulta constantes<br>";
		echo "<br>";
		echo $var." variable  var de la consulta constantes<br>";
		$selectARR ="SELECT * FROM arreglos WHERE lexema='".$varCons."'";
		$result2=$con->query($selectARR);
		$row2=mysqli_fetch_assoc($result2);
		$var2=$row2['lexema'];
		$tipovar2=$row2['tipo'];
		echo "<br>".$varCons."variable varCons de la consulta arreglos<br>";
		echo "<br>";
		echo $var2." variable  var2 de la consulta arreglos<br>";
		
		if($var==$varCons || $var2==$varCons) //si se encuentran resultados
		{	

			
			echo "<br>".$varCons."-->varCons if  <br>";
			echo "<br>".$var."-->var if  <br>";
			echo "<br>".$var2."-->var2 if  <br>";
			echo "<br>Ejecutar gráfico función a realizar <br>";
			
		}
		else{
			echo "<br>".$varCons."-->varcons  else <br>";
			echo "<br>".$var."-->var if  <br>";
			echo "<br>".$var2."-->var2 if  <br>";
			echo "<br>Error Semántico. La variable ".$varCons." no ha sido declarada en Verificar<br>";
			die();
		}

		
	}

/////////////verificar limit2

function verificarlim2($varCons)
	{
		require('globales.php');
		require 'conexion.php';
		$sql = 'SELECT * FROM constantes WHERE lexema ="'.$varCons.'"';
		$result=$con->query($sql);
		$row=mysqli_fetch_assoc($result);
		$var=$row['lexema'];
		$tipovar=$row['tipo'];

		echo "<br>".$varCons."variable varCons de la consulta constantes<br>";
		echo "<br>";
		echo $var." variable  var de la consulta constantes<br>";
		$selectARR ="SELECT * FROM arreglos WHERE lexema='".$varCons."'";
		$result2=$con->query($selectARR);
		$row2=mysqli_fetch_assoc($result2);
		$var2=$row2['lexema'];
		$tipovar2=$row2['tipo'];
		echo "<br>".$varCons."variable varCons de la consulta arreglos<br>";
		echo "<br>";
		echo $var2." variable  var2 de la consulta arreglos<br>";
		
		if(($var==$varCons && $tipovar==$ent) || ($var2==$varCons && $tipovar==$ent)) //si se encuentran resultados
		{	

			
			echo "<br>".$varCons."-->varCons if  <br>";
			echo "<br>".$var."-->var if  <br>";
			echo "<br>".$var2."-->var2 if  <br>";
			echo "<br>Ejecutar gráfico función a realizar <br>";
			
		}
		else{
			echo "<br>".$varCons."-->varcons  else <br>";
			echo "<br>".$var."-->var if  <br>";
			echo "<br>".$var2."-->var2 if  <br>";
			echo "<br>Error Semántico. La variable ".$varCons." no ha sido declarada en Verificar o no es entero<br>";
			die();
		}

		
	}
	///////////////////Verificar EXPR
	function verificarExpr($varCons)
	{
		require('globales.php');
		require 'conexion.php';
		///VAlores de VarCons///
		$sql = 'SELECT * FROM constantes WHERE lexema ="'.$varCons.'"';
		$result=$con->query($sql);
		$row=mysqli_fetch_assoc($result);
		$var=$row['lexema'];
		$tipovar=$row['tipo'];

		echo "<br>".$varCons."variable varCons de la consulta constantes<br>";
		echo "<br>";
		echo $var." variable  var de la consulta constantes<br>";
		echo "<br>";
		echo $tipovar." variable tipovar de la consulta constantes<br>";


		$selectARR ="SELECT * FROM arreglos WHERE lexema='".$varCons."'";
		$result2=$con->query($selectARR);
		$row2=mysqli_fetch_assoc($result2);
		$var2=$row2['lexema'];
		$tipovar2=$row2['tipo'];
		echo "<br>".$varCons."variable varCons de la consulta arreglos<br>";
		echo "<br>";
		echo $var2." variable  var2 de la consulta arreglos<br>";
			echo "<br>";
		echo $tipovar2." variable tipovar2 de la consulta arreglos<br>";

		///VAlores de varExpr///
		$selectvarExp='SELECT * FROM constantes WHERE lexema ="'.$varExpr.'"';
		$result3=$con->query($selectvarExp);
		$row3=mysqli_fetch_assoc($result3);
		$tipovarE=$row3['tipo'];
		echo "<br>";
		echo $tipovarE." variable tipovarE de la consulta constantes<br>";

		$selectExpARR ="SELECT * FROM arreglos WHERE lexema='".$varExpr."'";
		$result4=$con->query($selectExpARR);
		$row4=mysqli_fetch_assoc($result4);
		$tipovarE2=$row4['tipo'];
		echo "<br>";
		echo $tipovarE2." variable  tipovarE2 de la consulta arreglos<br>";

		
		if(($tipovar==$tipovarE) || ( $tipovar==$tipovarE2) || ( $tipovar2==$tipovarE)|| ($tipovar2==$tipovarE2) ) //si se encuentran resultados
		{	

			
			echo "<br>".$varCons."-->varCons if  <br>";
			echo "<br>".$varExpr."-->varCons if  <br>";
			echo "<br>Ejecutar gráfico función a realizar <br>";
			
		}
		else{
			echo "<br>".$varCons."-->varcons  else <br>";
			
			echo "<br>".$varExpr."-->varCons if  <br>";
			echo "<br>Error Semántico. La variable ".$varCons." no ha sido declarada o no es del mismo tipo que ".$varExpr."en Verificar<br>";
			die();
		}

		
	}

////verificar expresión tipo ent o caracter

	function verificarExprEnt($varCons)

	{
		require('globales.php');
		require 'conexion.php';
		///VAlores de VarCons///
		
		///VAlores de varExpr///
		$selectvarExp='SELECT * FROM constantes WHERE lexema ="'.$varExpr.'"';
		$result3=$con->query($selectvarExp);
		$row3=mysqli_fetch_assoc($result3);
		$tipovarE=$row3['tipo'];
		echo "<br>";
		echo $tipovarE." variable tipovarE de la consulta constantes<br>";

		$selectExpARR ="SELECT * FROM arreglos WHERE lexema='".$varExpr."'";
		$result4=$con->query($selectExpARR);
		$row4=mysqli_fetch_assoc($result4);
		$tipovarE2=$row4['tipo'];
		echo "<br>";
		echo $tipovarE2." variable  tipovarE2 de la consulta arreglos<br>";

		
		if($tipovarE==$ent || $tipovarE2==$ent) //si se encuentran resultados
		{	

			
			echo "<br>".$varExpr."-->varExpr if  <br>";
			echo "<br>".$tipovarE."-->tipovarE if  <br>";
			echo "<br>Ejecutar gráfico función a realizar <br>";
			
		}
		else{
			echo "<br>".$varExpr."-->varExpr else  <br>";
			echo "<br>".$tipovarE."-->tipovarE else  <br>";
			echo "<br>Error Semántico. La variable ".$varCons." es de tipo entero y ".$varExpr." no lo es en VerificarExprEnt<br>";
			die();
		}
		
	}

	function verificarExprCar($varCons)
	{
		$varCons1 = str_replace("'", " ", $varCons );
		require('globales.php');
		require 'conexion.php';

		///VAlores de varExpr///
		$selectvarExp='SELECT * FROM constantes WHERE lexema ="'.$varExpr.'"';
		$result3=$con->query($selectvarExp);
		$row3=mysqli_fetch_assoc($result3);
		$tipovarE=$row3['tipo'];
		echo "<br>";
		echo $tipovarE." variable tipovarE de la consulta constantes<br>";

		$selectExpARR ="SELECT * FROM arreglos WHERE lexema='".$varExpr."'";
		$result4=$con->query($selectExpARR);
		$row4=mysqli_fetch_assoc($result4);
		$tipovarE2=$row4['tipo'];
		echo "<br>";
		echo $tipovarE2." variable  tipovarE2 de la consulta arreglos<br>";

		
		if($tipovarE==$c || $tipovarE2==$c) //si se encuentran resultados
		{	

			
			
			echo "<br>".$varExpr."-->varExpr if  <br>";
			echo "<br>".$tipovarE."-->tipovarE if  <br>";
			echo "<br>Ejecutar gráfico función a realizar <br>";
			
		}
		else{
			echo "<br>".$varExpr."-->varExpr else  <br>";
			echo "<br>".$tipovarE."-->tipovarE else  <br>";
			echo "<br>Error Semántico. La variable ".$varCons." es de tipo caracter y ".$varExpr." no lo es en VerificarExprCar<br>";
			die();
		}
	}





	/*function ArrConsEnt($arrEnt,$varCons)
	{
		require('globales.php');


		$ciclo=count($arrEnt);
		echo "<br> numero de elementos en el arreglo vale $ciclo<br>";
		if(empty($arrEnt))
		{
			echo "<br>esta vacio asignamos el token es -";
			echo $varCons;
			echo "-<br>";
			array_push($arrEnt, $varCons);
		}
		else
		{

				if(in_array($varCons, $arrEnt))
				{	
					echo "<br>no hacer push<br>";
					echo "<br>".$varCons."-->Car <br>";
				}
				else
				{
					echo "<br>hacer el push no son iguales<br>";
					echo "<br>".$varCons."-->Car<br>";
					array_push($arrEnt, $varCons);
				}
		}	

		echo "<br><b><font color='green'>salio del ciclo</font></b><br>";	
		

	}*/

	function DA2()
	{
		require('globales.php');
		if($preanalisis=$id)
		{
			//array_push($asigVar, $Tokens[$c3]);
			//CompararAsigVarTokens($asigVar,$Tokens);
			$varCons=$Tokens[$c3];
			echo $varCons;
			emparejar($id);
			emparejar($igual);
			emparejar($llaveA);
			$varTipo=$preanalisis;
			tArreglos($varTipo,$varCons);
			D();
			emparejar($llaveC);
			DA3();
		}
		else
		{
			echo "<br>->Error Sintactico en la linea: ".$NumLinea[$c3]." token-> " .$preanalisis." esperaba un id<br>";
		}
	}

	function CONSTANTE()
	{

		//echo "entro a constantes";
		require('globales.php');
		if($preanalisis==$ent)
		{
			
			//ArrConsEnt($varCons,$arrEnt);
			$valor=$Tokens[$c3];
			emparejar($ent);
			actCons($valor,$varCons);

		}
		else if($preanalisis==$c)
		{	
			$valor=$Tokens[$c3];
			
			//ArrConsCar($varCons,$arrCar);
			emparejar($c);
			actCons($Tokens[$c3],$varCons);
		}
		else
		{
			echo "<br>->Error Sintactico en la linea: ".$NumLinea[$c3]." token-> " .$preanalisis." esperaba un entero o caracter<br>";

		}

		

	}
	function CONSTANTE2()
	{

		//echo "entro a constantes";
		require('globales.php');
		if($preanalisis==$ent)
		{
			
			//ArrConsEnt($varCons,$arrEnt);

			$valor=$Tokens[$c3];
			$varCons=$Tokens[$c3];
			verificarExprEnt($varCons);
			emparejar($ent);
			

		}
		else if($preanalisis==$c)
		{	
			$valor=$Tokens[$c3];
			$varCons=$Tokens[$c3];
			verificarExprCar($varCons);

			//ArrConsCar($varCons,$arrCar);
			emparejar($c);
			
		}
		else
		{
			echo "<br>->Error Sintactico en la linea: ".$NumLinea[$c3]." token-> " .$preanalisis." esperaba un entero o caracter<br>";

		}

		

	}
	function DC3()
	{
		require('globales.php');
		if($preanalisis==$id)
		{
			DC2();
		}
		else if($preanalisis==$arreglos || $preanalisis==$inicio)
		{}
		else
		{
			echo "<br>->Error Sintactico en la linea: ".$NumLinea[$c3]." token-> " .$preanalisis." esperaba un id<br>";
		}

	}
	function DA3()
	{
		require('globales.php');
		if ($preanalisis== $id) {
			DA2();
		}
		else if ($preanalisis== $inicio) {
			//es cadena vacia
		}
		else {
			echo "->Error semántico en la linea: ".$NumLinea[$c3]." token-> " .$preanalisis."esperaba un identificador o inicio";
		}
	}

	function D()
	{
		require('globales.php');

		if ($preanalisis== $ent) {

			$valor=$Tokens[$c3];
			AddD($valor,$varCons);
			emparejar($ent); D2();
		}
		else if ($preanalisis== $c) {
			$valor=$Tokens[$c3];
			AddD($valor,$varCons);
			emparejar($c); D3();
		}
		else {
			echo "->Error semántico en la linea: ".$NumLinea[$c3]." token-> " .$preanalisis."esperaba un entero o caracter";
		}
	}

	function D2()
	{
		require('globales.php');
		if ($preanalisis== $coma) {
			emparejar($coma); $valor=$Tokens[$c3];
			AddD($valor,$varCons);emparejar($ent); D2();
		}
		else if ($preanalisis== $llaveC) {
			//cadena vacia
		}
		else {
			echo "->Error semántico en la linea: ".$NumLinea[$c3]." token-> " .$preanalisis."esperaba , o }";
		}
	}

	function D3()
	{
		require('globales.php');
		if ($preanalisis== $coma) {
			emparejar($coma); $valor=$Tokens[$c3];
			AddD($valor,$varCons);emparejar($c); D3();
		}
		else if ($preanalisis == $llaveC) {
			
		}
		else {
			echo "->Error semántico El token de preanalisis es: ".$preanalisis."y eesperaba , o }";
		}
	}

	function INST()
	{
		require('globales.php');

		if ($preanalisis == $si) {
			SI();
		}
		else if ($preanalisis == $para) {
			PARA();
		}
		else if ($preanalisis == $escribe) {
			ESCRIBE();
		}
		else if ($preanalisis == $lee) {
			LEE();
		}
		else if ($preanalisis == $id) {
			EXPR();
		}
		else if ($preanalisis == $sino) {
			SINO();
		}
		else if ($preanalisis == $fin) {
			
		}
		else   {
			echo "->Error Sintactico en la linea: ".$NumLinea[$c3]." token-> " .$preanalisis." Se esperaba si, para, escribe, lee, id o fin";
		}
		/*switch ($preanalisis) {
			case $si:
				SI();
				break;
			case $para:
				PARA();
				break;
			case $escribe:
				ESCRIBE();
				break;
			case $lee:
				LEE();
				break;
			case $id:
				EXPR();
				break;
			case $fin:
				//cadena vacia
				break;
			default:
				echo "->Error Sintactico en la linea: ".$NumLinea[$c3]." token-> " .$preanalisis."esperaba si, para, escribe, lee, id o fin";
				break;
		}*/
	}

	function EXPR()
	{
		require('globales.php');

		if ($preanalisis== $id) {
			//CompararAsigVarTokens($asigVar,$Tokens);
			$varCons=$Tokens[$c3];
			$varExpr= $Tokens[$c3];
			verificar($varCons);
			emparejar($id); ARR(); emparejar($igual); OP2(); EXPR2(); emparejar($puntoycoma); INST();
		}
		
		else {
			echo "->Error Sintactico en la linea: ".$NumLinea[$c3]." token-> " .$preanalisis."esperaba un identificador";
		}
	}

	function EXPR2()
	{
		require('globales.php'); 
		
		if ($preanalisis== $suma ||  $preanalisis== $resta ||  $preanalisis== $division ||  $preanalisis== $multi ||  $preanalisis== $mod) {
			
			OP();   OP2();
		}
		elseif ($preanalisis== $puntoycoma) {
			//cadena vacia
		}
		else {
			echo "->Error Sintactico en la linea: ".$NumLinea[$c3]." token-> " .$preanalisis."esperaba: suma, resta, división, multiplicación o ; ";
		}
	}
	function OP()
	{
		require('globales.php');

		if($preanalisis==$mod)
		{
			emparejar($mod);
		}
		else if($preanalisis==$suma)
		{
			emparejar($suma);
		}
		else if($preanalisis==$resta)
		{	
			emparejar($resta);
		}
		else if($preanalisis==$division)
		{
			emparejar($division);
		}
		else if($preanalisis==$multi)
		{
			emparejar($multi);
		}
		else
		{
			echo "<br>->Error Sintactico en la linea: ".$NumLinea[$c3]." token-> " .$preanalisis." esperaba un operador<br>";
		}
	}
	function OP1()
	{
			require('globales.php');

		if($preanalisis==$ent||$preanalisis==$c)
		{
			CONSTANTE();
		}
		else if($preanalisis==$id)
		{
			$varCons=$Tokens[$c3];
			verificar($varCons);
			emparejar($id); ARR();
		}
		else
		{
			echo "<br>->Error Sintactico en la linea: ".$NumLinea[$c3]." token-> " .$preanalisis." esperaba entero, caracter o id<br>";
		}

	}

	function OP2()
	{
			require('globales.php');

		if($preanalisis==$ent||$preanalisis==$c)
		{
			CONSTANTE2();
		}
		else if($preanalisis==$id)
		{
			$varCons=$Tokens[$c3];

			verificarExpr($varCons);//verificar exp
			emparejar($id); ARR();
		}
		else
		{
			echo "<br>->Error Sintactico en la linea: ".$NumLinea[$c3]." token-> " .$preanalisis." esperaba entero, caracter o id<br>";
		}

	}
	function LEE()
	{
		require('globales.php'); 

		if($preanalisis==$lee)
		{

			emparejar($lee);
			emparejar($parA);
			$varCons=$Tokens[$c3];
			verificar($varCons);
			emparejar($id);
			emparejar($parC);
			emparejar($puntoycoma);
			INST();
		}
		else
		{
			echo "<br>->Error Sintactico en la linea: ".$NumLinea[$c3]." token-> " .$preanalisis." esperaba lee<br>";
		}

	}
	function ESCRIBE()
	{
		require('globales.php'); 

		if($preanalisis==$escribe)
		{
			emparejar($escribe);
			emparejar($parA);
			OP1();
			emparejar($parC);
			emparejar($puntoycoma);
			INST();
		}
		else
		{
			echo "<br>->Error Sintactico en la linea: ".$NumLinea[$c3]." token-> " .$preanalisis." esperaba escribe<br>";
		}
	}
	function PARA()
	{
		require('globales.php'); 

		if($preanalisis==$para)
		{
			emparejar($para);
			$varCons=$Tokens[$c3];
			verificar($varCons);
			emparejar($id);
			emparejar($igual);
			LIMIT();
			emparejar($hasta);
			LIMIT();
			emparejar($paso);
			INCDEC();
			emparejar($hacer);
			INST();
			emparejar($fin);
			INST();
		}
		else
		{
			echo "<br>->Error Sintactico en la linea: ".$NumLinea[$c3]." token-> " .$preanalisis." esperaba para<br>";
		}	
	}
	function SI()   /////xxx
	{
		require('globales.php');

		if($preanalisis==$si)
		{
			emparejar($si);
			emparejar($parA);
			CONDICION();
			emparejar($parC);
			emparejar($entonces);
			INST();
			SINO();
			emparejar($fin);
			INST();
		}
		else
		{
			echo "<br>->Error Sintactico en la linea: ".$NumLinea[$c3]." token-> " .$preanalisis." esperaba si<br>";
		}
	}
	function SINO() /////xxx
	{
		require('globales.php');

		if($preanalisis==$sino)
		{
			emparejar($sino);
			INST();
		}
		else if($preanalisis==$fin){
		}
		else
		{
			echo "<br>->Error Sintactico en la linea: ".$NumLinea[$c3]." token-> " .$preanalisis." esperaba sino o fin<br>";
		}	
	}
	function LIMIT()
	{
		require('globales.php'); 

		if($preanalisis == $ent)
		{
			emparejar($ent);
		}
		else if($preanalisis == $id)
		{
			$varCons=$Tokens[$c3];
			verificarlim2($varCons);
			emparejar($id);
			ARR();
		}
		else
		{
			echo "<br>->Error Sintactico en la linea: ".$NumLinea[$c3]." token-> " .$preanalisis." esperaba un entero o id<br>";
			//->ErrorSintactico($lexema,$ent,$id);
		}
	}
	function CONDICION()
	{
		require('globales.php');

		if($preanalisis == $ent || $preanalisis == $c || $preanalisis == $id)
		{
			$varExpr= $Tokens[$c3];
			OP2(); SR(); OP2();
		}
		else
		{
			echo "<br>->Error Sintactico en la linea: ".$NumLinea[$c3]." token-> " .$preanalisis." esperaba un entero, caracter o id<br>";
			//->ErrorSintactico($lexema,$ent,$id);
		}
	}
	function INCDEC(){
		require('globales.php'); 

		if($preanalisis == $suma || $preanalisis == $resta)
		{
			OID(); emparejar($ent);
		}
		else
		{
			echo "<br>->Error Sintactico en la linea: ".$NumLinea[$c3]." token-> " .$preanalisis." esperaba + o -<br>";
			//->ErrorSintactico($lexema,$ent,$id);
		}
	}
	function OID(){
		 
		 require('globales.php');
		if($preanalisis == $suma)
		{
			emparejar($suma);
		}
		else if($preanalisis == $resta)
		{
			emparejar($resta);
		}
		else
		{
			echo "<br>->Error Sintactico en la linea: ".$NumLinea[$c3]." token-> " .$preanalisis." esperaba + o -<br>";
			//->ErrorSintactico($lexema,$ent,$id);
		}
	}
	function SR(){
		require('globales.php');
		if ($preanalisis == $diferente) {
			emparejar($diferente);
		}
		else if ($preanalisis == $menor) {
			emparejar($menor);
		}
		else if ($preanalisis == $mayor) {
			emparejar($mayor);
		}
		else if ($preanalisis == $mayorigual) {
			emparejar($mayorigual);
		}
		else if ($preanalisis == $menorigual) {
			emparejar($menorigual);
		}
		else if ($preanalisis == $igualigual) {
			emparejar($igualigual);
		}
		else   {
			echo "<br>->Error Sintactico en la linea: ".$NumLinea[$c3]." token-> " .$preanalisis." esperaba un simbolo relacional<br>";
		}
		
	}
	function ARR(){
		

			require('globales.php');

		if($preanalisis == $corcheteA)
		{
			emparejar($corcheteA); LIMIT2(); emparejar($corcheteC);
		}
		else if ($preanalisis == $punto) {
			emparejar($punto);
			emparejar($length);	
			EXPR2();
		}
		else if($preanalisis == $igual || $preanalisis == $mod || $preanalisis == $suma || $preanalisis == $resta 
			|| $preanalisis == $division || $preanalisis == $multi || $preanalisis == $puntoycoma || $preanalisis == $parC || $preanalisis == $diferente || $preanalisis == $menor || $preanalisis == $mayor || $preanalisis == $menorigual || $preanalisis == $mayorigual || $preanalisis == $igualigual || $preanalisis == $paso || $preanalisis == $hasta || $preanalisis == $corcheteC )
		{
			// Como produce epsilon NO se hace nada
		}
		else
		{
			echo "<br>->Error Sintactico en la linea: ".$NumLinea[$c3]." token-> " .$preanalisis." esperaba un operador, un simbolo relacional, =, ;, (, [, <br>";
			//->ErrorSintactico($lexema,$ent,$id);
		}
	}
	function LIMIT2(){

			require('globales.php');


		if($preanalisis == $ent)
		{
			emparejar($ent); CONDICION2(); 
		}
		else if($preanalisis == $id)
		{
			$varCons=$Tokens[$c3];
			verificarlim2($varCons);
			emparejar($id); CONDICION2(); 
		}
		else
		{
			echo "<br>->Error Sintactico en la linea: ".$NumLinea[$c3]." token-> " .$preanalisis." esperaba un entero o identificador<br>";
			//->ErrorSintactico($lexema,$ent,$id);
		}
	}
	function CONDICION2(){
			require('globales.php');

		if($preanalisis == $mod || $preanalisis == $suma || $preanalisis == $resta || $preanalisis == $division || $preanalisis == $multi)
		{
			OP(); LIMIT();
		}
		else if($preanalisis == $corcheteC)
		{
			//como produce epsilon no se hace nada 
		}
		else
		{
			echo "<br>->Error Sintactico en la linea: ".$NumLinea[$c3]." token-> " .$preanalisis." esperaba un operador o ]<br>";
			//->ErrorSintactico($lexema,$ent,$id);
		}
	}
	function emparejar($tok)
	{



		global $NumLinea, $preanalisis,$c3;
		if ($tok == $preanalisis) {
			$c3++;
			$preanalisis = analex($c3);
				

		}
		else{
			echo "->Error Sintactico en la linea: ".$NumLinea[$c3]." token-> " .$preanalisis." - ".$tok;
		}
		
	}

	//funcion que va a vaciar la DB
	function TRUNCDB()
	{
		require 'conexion.php';
		//esto debe llevar rel query pero no se como jajaja

		$sql='SET FOREIGN_KEY_CHECKS=0';
		$sql1='TRUNCATE TABLE constantes';
		$sql2='TRUNCATE TABLE arreglos';
		$sql3='TRUNCATE TABLE valoresa';
		$sql4='SET FOREIGN_KEY_CHECKS=1';

		$result=$con->query($sql);
		$result1=$con->query($sql1);
		$result2=$con->query($sql2);
		$result3=$con->query($sql3);
		$result4=$con->query($sql4);
						
	}

//emparejar($preanalisis);
	//llamar función que hago truncate all a la DB
	TRUNCDB();
	analex($c3);
	P();



 ?>