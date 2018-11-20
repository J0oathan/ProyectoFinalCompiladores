<?php 

session_start();
//$preanalisis=$_SESSION['preanalisis'];
//echo "PREANAL ".$preanalisis;
//include('analex.php');
echo "<a href='../cuerpo.php'>Ver ALGORITMO</a><br>";
$Tokens;//solo declaro la variable tokens
$TipoTokens;
$NumLinea;
$final=$_SESSION['variable4']; //en la posicion 0 guarde el numero de vueltas

$asigVar=array();
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
echo "<br>----------PREANALISIS2--- linea 95:<br>";
print_r($preanalisis2);



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
		
		global $NumLinea, $c3,$entonces, $programa,$constantes,$arreglos,$inicio,$fin,$ent,$id,$c,$coma,$llaveC,$llaveA,$si,$sino,$para,$escribe,$lee,$mod,$suma,$resta,$division,$multi,$puntoycoma,$diferente,$menor,$menorigual,$mayor,$mayorigual,$igualigual,$corcheteA,$corcheteC,$igual,$parA,$parC,$preanalisis2,$preanalisis;
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
		global $NumLinea, $c3,$entonces, $programa,$constantes,$arreglos,$inicio,$fin,$ent,$id,$c,$coma,$llaveC,$llaveA,$si,$sino,$para,$escribe,$lee,$mod,$suma,$resta,$division,$multi,$puntoycoma,$diferente,$menor,$menorigual,$mayor,$mayorigual,$igualigual,$corcheteA,$corcheteC,$igual,$parA,$parC,$preanalisis2,$preanalisis;
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
		global $NumLinea, $c3,$entonces, $programa,$constantes,$arreglos,$inicio,$fin,$ent,$id,$c,$coma,$llaveC,$llaveA,$si,$sino,$para,$escribe,$lee,$mod,$suma,$resta,$division,$multi,$puntoycoma,$diferente,$menor,$menorigual,$mayor,$mayorigual,$igualigual,$corcheteA,$corcheteC,$igual,$parA,$parC,$preanalisis2,$preanalisis,$asigVar;
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
		global $NumLinea, $c3,$entonces, $programa,$constantes,$arreglos,$inicio,$fin,$ent,$id,$c,$coma,$llaveC,$llaveA,$si,$sino,$para,$escribe,$lee,$mod,$suma,$resta,$division,$multi,$puntoycoma,$diferente,$menor,$menorigual,$mayor,$mayorigual,$igualigual,$corcheteA,$corcheteC,$igual,$parA,$parC,$preanalisis2,$preanalisis,$Tokens,$asigVar;
		if($preanalisis==$id)
		{
			array_push($asigVar, $Tokens[$c3]);
			emparejar($id);
			emparejar($igual);
			CONSTANTE();
			DC3();
		}
		else
		{
			echo "<br>->Error Sintactico en la linea: ".$NumLinea[$c3]." token-> " .$preanalisis." esperaba un id<br>";
		}
	}
	function DA2()
	{
		global $NumLinea, $c3,$entonces, $programa,$constantes,$arreglos,$inicio,$fin,$ent,$id,$c,$coma,$llaveC,$llaveA,$si,$sino,$para,$escribe,$lee,$mod,$suma,$resta,$division,$multi,$puntoycoma,$diferente,$menor,$menorigual,$mayor,$mayorigual,$igualigual,$corcheteA,$corcheteC,$igual,$parA,$parC,$preanalisis2,$preanalisis,$asigVar,$preanalisis3,$Tokens;
		if($preanalisis=$id)
		{
			array_push($asigVar, $Tokens[$c3]);
			emparejar($id);
			emparejar($igual);
			emparejar($llaveA);
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
		global $NumLinea, $c3,$entonces, $programa,$constantes,$arreglos,$inicio,$fin,$ent,$id,$c,$coma,$llaveC,$llaveA,$si,$sino,$para,$escribe,$lee,$mod,$suma,$resta,$division,$multi,$puntoycoma,$diferente,$menor,$menorigual,$mayor,$mayorigual,$igualigual,$corcheteA,$corcheteC,$igual,$parA,$parC,$preanalisis2,$preanalisis;
		if($preanalisis==$ent)
		{
			emparejar($ent);

		}
		else if($preanalisis==$c)
		{
			emparejar($c);
		}
		else
		{
			echo "<br>->Error Sintactico en la linea: ".$NumLinea[$c3]." token-> " .$preanalisis." esperaba un entero o caracter<br>";

		}

	}
	function DC3()
	{
		global $NumLinea, $c3,$entonces, $programa,$constantes,$arreglos,$inicio,$fin,$ent,$id,$c,$coma,$llaveC,$llaveA,$si,$sino,$para,$escribe,$lee,$mod,$suma,$resta,$division,$multi,$puntoycoma,$diferente,$menor,$menorigual,$mayor,$mayorigual,$igualigual,$corcheteA,$corcheteC,$igual,$parA,$parC,$preanalisis2,$preanalisis;
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
		global $NumLinea, $c3,$entonces, $programa,$constantes,$arreglos,$inicio,$fin,$ent,$id,$c,$coma,$llaveC,$llaveA,$si,$sino,$para,$escribe,$lee,$mod,$suma,$resta,$division,$multi,$puntoycoma,$diferente,$menor,$menorigual,$mayor,$mayorigual,$igualigual,$corcheteA,$corcheteC,$igual,$parA,$parC,$preanalisis2,$preanalisis;
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
		global $NumLinea, $c3,$entonces, $programa,$constantes,$arreglos,$inicio,$fin,$ent,$id,$c,$coma,$llaveC,$llaveA,$si,$sino,$para,$escribe,$lee,$mod,$suma,$resta,$division,$multi,$puntoycoma,$diferente,$menor,$menorigual,$mayor,$mayorigual,$igualigual,$corcheteA,$corcheteC,$igual,$parA,$parC,$preanalisis2,$preanalisis;
		if ($preanalisis== $ent) {
			emparejar($ent); D2();
		}
		else if ($preanalisis== $c) {
			emparejar($c); D3();
		}
		else {
			echo "->Error semántico en la linea: ".$NumLinea[$c3]." token-> " .$preanalisis."esperaba un entero o caracter";
		}
	}

	function D2()
	{
		global $NumLinea, $c3,$entonces, $programa,$constantes,$arreglos,$inicio,$fin,$ent,$id,$c,$coma,$llaveC,$llaveA,$si,$sino,$para,$escribe,$lee,$mod,$suma,$resta,$division,$multi,$puntoycoma,$diferente,$menor,$menorigual,$mayor,$mayorigual,$igualigual,$corcheteA,$corcheteC,$igual,$parA,$parC,$preanalisis2,$preanalisis;
		if ($preanalisis== $coma) {
			emparejar($coma); emparejar($ent); D2();
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
		global $NumLinea, $c3,$entonces, $programa,$constantes,$arreglos,$inicio,$fin,$ent,$id,$c,$coma,$llaveC,$llaveA,$si,$sino,$para,$escribe,$lee,$mod,$suma,$resta,$division,$multi,$puntoycoma,$diferente,$menor,$menorigual,$mayor,$mayorigual,$igualigual,$corcheteA,$corcheteC,$igual,$parA,$parC,$preanalisis2,$preanalisis;
		if ($preanalisis== $coma) {
			emparejar($coma); emparejar($c); D3();
		}
		else if ($preanalisis == $llaveC) {
			
		}
		else {
			echo "->Error semántico El token de preanalisis es: ".$preanalisis."y eesperaba , o }";
		}
	}

	function INST()
	{
		global $NumLinea, $c3,$entonces, $programa,$constantes,$arreglos,$inicio,$fin,$ent,$id,$c,$coma,$llaveC,$llaveA,$si,$sino,$para,$escribe,$lee,$mod,$suma,$resta,$division,$multi,$puntoycoma,$diferente,$menor,$menorigual,$mayor,$mayorigual,$igualigual,$corcheteA,$corcheteC,$igual,$parA,$parC,$preanalisis2,$preanalisis;

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
		global $NumLinea, $c3,$entonces, $programa,$constantes,$arreglos,$inicio,$fin,$ent,$id,$c,$coma,$llaveC,$llaveA,$si,$sino,$para,$escribe,$lee,$mod,$suma,$resta,$division,$multi,$puntoycoma,$diferente,$menor,$menorigual,$mayor,$mayorigual,$igualigual,$corcheteA,$corcheteC,$igual,$parA,$parC,$preanalisis2,$preanalisis;
		if ($preanalisis== $id) {
			emparejar($id); ARR(); emparejar($igual); OP1(); EXPR2(); emparejar($puntoycoma); INST();
		}
		
		else {
			echo "->Error Sintactico en la linea: ".$NumLinea[$c3]." token-> " .$preanalisis."esperaba un identificador";
		}
	}

	function EXPR2()
	{
		global $NumLinea, $c3,$entonces, $programa,$constantes,$arreglos,$inicio,$fin,$ent,$id,$c,$coma,$llaveC,$llaveA,$si,$sino,$para,$escribe,$lee,$mod,$suma,$resta,$division,$multi,$puntoycoma,$diferente,$menor,$menorigual,$mayor,$mayorigual,$igualigual,$corcheteA,$corcheteC,$igual,$parA,$parC,$preanalisis2,$preanalisis;
		if ($preanalisis== $suma ||  $preanalisis== $resta ||  $preanalisis== $division ||  $preanalisis== $multi ||  $preanalisis== $mod) {
			OP(); OP1();
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
		global $NumLinea, $c3,$entonces, $programa,$constantes,$arreglos,$inicio,$fin,$ent,$id,$c,$coma,$llaveC,$llaveA,$si,$sino,$para,$escribe,$lee,$mod,$suma,$resta,$division,$multi,$puntoycoma,$diferente,$menor,$menorigual,$mayor,$mayorigual,$igualigual,$corcheteA,$corcheteC,$igual,$parA,$parC,$preanalisis2,$preanalisis;
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
		global $NumLinea, $c3,$entonces, $programa,$constantes,$arreglos,$inicio,$fin,$ent,$id,$c,$coma,$llaveC,$llaveA,$si,$sino,$para,$escribe,$lee,$mod,$suma,$resta,$division,$multi,$puntoycoma,$diferente,$menor,$menorigual,$mayor,$mayorigual,$igualigual,$corcheteA,$corcheteC,$igual,$parA,$parC,$preanalisis2,$preanalisis;
		if($preanalisis==$ent||$preanalisis==$c)
		{
			CONSTANTE();
		}
		else if($preanalisis==$id)
		{
			emparejar($id); ARR();
		}
		else
		{
			echo "<br>->Error Sintactico en la linea: ".$NumLinea[$c3]." token-> " .$preanalisis." esperaba entero, caracter o id<br>";
		}

	}
	function LEE()
	{
		global $NumLinea, $c3,$entonces, $programa,$constantes,$arreglos,$inicio,$fin,$ent,$id,$c,$coma,$llaveC,$llaveA,$si,$sino,$para,$escribe,$lee,$mod,$suma,$resta,$division,$multi,$puntoycoma,$diferente,$menor,$menorigual,$mayor,$mayorigual,$igualigual,$corcheteA,$corcheteC,$igual,$parA,$parC,$preanalisis2,$preanalisis;
		if($preanalisis==$lee)
		{
			emparejar($lee);
			emparejar($parA);
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
		global $NumLinea, $c3,$entonces, $programa,$constantes,$arreglos,$inicio,$fin,$ent,$id,$c,$coma,$llaveC,$llaveA,$si,$sino,$para,$escribe,$lee,$mod,$suma,$resta,$division,$multi,$puntoycoma,$diferente,$menor,$menorigual,$mayor,$mayorigual,$igualigual,$corcheteA,$corcheteC,$igual,$parA,$parC,$preanalisis2,$preanalisis;
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
		global $NumLinea, $c3,$entonces, $programa,$constantes,$arreglos,$inicio,$fin,$ent,$id,$c,$coma,$llaveC,$llaveA,$si,$sino,$para,$escribe,$lee,$mod,$suma,$resta,$division,$multi,$puntoycoma,$diferente,$menor,$menorigual,$mayor,$mayorigual,$igualigual,$corcheteA,$corcheteC,$igual,$parA,$parC,$preanalisis2,$preanalisis,$hasta,$paso,$hacer;
		if($preanalisis==$para)
		{
			emparejar($para);
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
		global $NumLinea, $c3,$programa,$constantes,$arreglos,$inicio,$fin,$ent,$id,$c,$coma,$llaveC,$llaveA,$si,$sino,$para,$escribe,$lee,$mod,$suma,$resta,$division,$multi,$puntoycoma,$diferente,$menor,$menorigual,$mayor,$mayorigual,$igualigual,$corcheteA,$corcheteC,$igual,$parA,$parC,$preanalisis2,$preanalisis,$entonces;
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
		global $NumLinea, $c3,$entonces, $programa,$constantes,$arreglos,$inicio,$fin,$ent,$id,$c,$coma,$llaveC,$llaveA,$si,$sino,$para,$escribe,$lee,$mod,$suma,$resta,$division,$multi,$puntoycoma,$diferente,$menor,$menorigual,$mayor,$mayorigual,$igualigual,$corcheteA,$corcheteC,$igual,$parA,$parC,$preanalisis2,$preanalisis;
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
		global $NumLinea, $c3,$entonces, $programa,$constantes,$arreglos,$inicio,$fin,$ent,$id,$c,$coma,$llaveC,$llaveA,$si,$sino,$para,$escribe,$lee,$mod,$suma,$resta,$division,$multi,$puntoycoma,$diferente,$menor,$menorigual,$mayor,$mayorigual,$igualigual,$corcheteA,$corcheteC,$igual,$parA,$parC,$preanalisis2,$preanalisis;
		if($preanalisis == $ent)
		{
			emparejar($ent);
		}
		else if($preanalisis == $id)
		{
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
		global $NumLinea, $c3,$entonces, $programa,$constantes,$arreglos,$inicio,$fin,$ent,$id,$c,$coma,$llaveC,$llaveA,$si,$sino,$para,$escribe,$lee,$mod,$suma,$resta,$division,$multi,$puntoycoma,$diferente,$menor,$menorigual,$mayor,$mayorigual,$igualigual,$corcheteA,$corcheteC,$igual,$parA,$parC,$preanalisis2,$preanalisis;
		if($preanalisis == $ent || $preanalisis == $c || $preanalisis == $id)
		{
			OP1(); SR(); OP1();
		}
		else
		{
			echo "<br>->Error Sintactico en la linea: ".$NumLinea[$c3]." token-> " .$preanalisis." esperaba un entero, caracter o id<br>";
			//->ErrorSintactico($lexema,$ent,$id);
		}
	}
	function INCDEC(){
		global $NumLinea, $c3,$entonces, $programa,$constantes,$arreglos,$inicio,$fin,$ent,$id,$c,$coma,$llaveC,$llaveA,$si,$sino,$para,$escribe,$lee,$mod,$suma,$resta,$division,$multi,$puntoycoma,$diferente,$menor,$menorigual,$mayor,$mayorigual,$igualigual,$corcheteA,$corcheteC,$igual,$parA,$parC,$preanalisis2,$preanalisis;
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
		global $NumLinea, $c3,$entonces, $programa,$constantes,$arreglos,$inicio,$fin,$ent,$id,$c,$coma,$llaveC,$llaveA,$si,$sino,$para,$escribe,$lee,$mod,$suma,$resta,$division,$multi,$puntoycoma,$diferente,$menor,$menorigual,$mayor,$mayorigual,$igualigual,$corcheteA,$corcheteC,$igual,$parA,$parC,$preanalisis2,$preanalisis;
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
		global $NumLinea, $c3,$entonces, $programa,$constantes,$arreglos,$inicio,$fin,$ent,$id,$c,$coma,$llaveC,$llaveA,$si,$sino,$para,$escribe,$lee,$mod,$suma,$resta,$division,$multi,$puntoycoma,$diferente,$menor,$menorigual,$mayor,$mayorigual,$igualigual,$corcheteA,$corcheteC,$igual,$parA,$parC,$preanalisis2,$preanalisis;
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
		/*switch ($preanalisis) {
			case $diferente:
				emparejar($diferente);
				break;
			case $menor:
				emparejar($menor);
				break;
			case $mayor:
				emparejar($mayor);
				break;
			case $mayorigual:
				emparejar($mayorigual);
				break;
			case $menorigual:
				emparejar($menorigual);
				break;
			case $igualigual:
				emparejar($igualigual);
				break;
			default:
				echo "<br>->Error Sintactico en la linea: ".$NumLinea[$c3]." token-> " .$preanalisis." esperaba un simbolo relacional<br>";
			//->ErrorSintactico($lexema,$ent,$id);
				break;
		}*/
	}
	function ARR(){
		global $punto, $NumLinea, $c3,$entonces, $programa,$constantes,$arreglos,$inicio,$fin,$ent,$id,$c,$coma,$llaveC,$llaveA,$si,$sino,$para,$escribe,$lee,$mod,$suma,$resta,$division,$multi,$puntoycoma,$diferente,$menor,$menorigual,$mayor,$mayorigual,$igualigual,$corcheteA,$corcheteC,$igual,$parA,$parC,$preanalisis2,$preanalisis, $length, $paso, $hasta;
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
		global $NumLinea, $c3,$entonces, $programa,$constantes,$arreglos,$inicio,$fin,$ent,$id,$c,$coma,$llaveC,$llaveA,$si,$sino,$para,$escribe,$lee,$mod,$suma,$resta,$division,$multi,$puntoycoma,$diferente,$menor,$menorigual,$mayor,$mayorigual,$igualigual,$corcheteA,$corcheteC,$igual,$parA,$parC,$preanalisis2,$preanalisis;
		if($preanalisis == $ent)
		{
			emparejar($ent); CONDICION2(); 
		}
		else if($preanalisis == $id)
		{
			emparejar($id); CONDICION2(); 
		}
		else
		{
			echo "<br>->Error Sintactico en la linea: ".$NumLinea[$c3]." token-> " .$preanalisis." esperaba un entero o identificador<br>";
			//->ErrorSintactico($lexema,$ent,$id);
		}
	}
	function CONDICION2(){
		global $NumLinea, $c3,$entonces, $programa,$constantes,$arreglos,$inicio,$fin,$ent,$id,$c,$coma,$llaveC,$llaveA,$si,$sino,$para,$escribe,$lee,$mod,$suma,$resta,$division,$multi,$puntoycoma,$diferente,$menor,$menorigual,$mayor,$mayorigual,$igualigual,$corcheteA,$corcheteC,$igual,$parA,$parC,$preanalisis2,$preanalisis;
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
//emparejar($preanalisis);
	analex($c3);
	P();
	print_r($asigVar);


 ?>