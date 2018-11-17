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



$NumTokens=$final/3;
echo "<b>numero de vueltas $final</b><br>";
echo "<b>numero de tokens $NumTokens</b><br>";


//pasa la variables de session a los 3 arreglos
 for($i=0;$i<$final;$i++)
 {
 	$Tokens[$i]=$_SESSION['variable'][$i];
 	
 	$TipoTokens[$i]=$_SESSION['variable2'][$i];
 	
 	$NumLinea[$i]=$_SESSION['variable3'][$i];
 	
 }


global $programa,$constantes,$arreglos,$inicio,$fin,$ent,$id,$c,$coma,$llaveC,$llaveA,$si,$sino,$para,$escribe,$lee,$mod,$suma,$resta,$division,$multi,$puntoycoma,$diferente,$menor,$menorigual,$mayor,$mayorigual,$igualigual,$corcheteA,$corcheteC,$igual,$parA,$parC,$preanalisis2,$preanalisis;


$programa="programa";$constantes="constantes";$arreglos="arreglos";$inicio="inicio";$fin="fin";$ent="ent";$id="id";$c="c";$coma="coma";$llaveC="llaveC";$llaveA="llaveA";$si="si";$sino="sino";$para="para";$escribe="escribe";$lee="lee";$mod="mod";$suma="suma";$resta="resta";$division="division";$multi="multi";$puntoycoma="puntoycoma";$diferente="diferente";$menor="menor";$menorigual="menorigual";$mayor="mayor";$mayorigual="mayorigual";$igualigual="igualigual";$corcheteA="corcheteA";$corcheteC="corcheteC";$igual="igual";$parA="parA";$parC="parC"; $hasta="hasta";$paso="paso";$entonces="entonces";$hacer="hacer";
	
	$lexi="";
$titok="";
$contan2=-1;  //contador que dice qué número de token va
$c3=0;
global $preanalisis2,$preanalisis;

function analex($c3) 
{
global $Tokens,$TipoTokens,$final;


//echo "<br>variable de if es: ";
//echo $Tokens[$c3];
//echo "<br>variable de else: ";
//echo "Variable en tipodeTokens";
//echo $TipoTokens[$c3];echo "<br>";
if ($c3<$final) {
	# code...

        if($TipoTokens[$c3]=="Palabra reservada")
     {
        //$preanalisis2=$lexi;
        $preanalisis=$Tokens[$c3];
     }
     else
     {
        //$preanalisis2=$titok;
      $preanalisis=$TipoTokens[$c3];
     }
     //echo "----------------->var c3: ".$c3;echo "<br>";
     //echo "TOKENS[] ->".$Tokens[$c3]."---";
          return $preanalisis;
          }
else
{
echo "Fin de editor";

}
          
}
     
//echo "AQUI FUNCION ANAKE¡¡LEX:";
//echo analex($c3);
$preanalisis=analex($c3);
echo "<br>----------PREANALISIS2: ".$preanalisis;echo"<br>";



 echo "<BR>Imprimir haber si sirve<br>";
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
     }
     function P()
	{
		
		global $programa,$constantes,$arreglos,$inicio,$fin,$ent,$id,$c,$coma,$llaveC,$llaveA,$si,$sino,$para,$escribe,$lee,$mod,$suma,$resta,$division,$multi,$puntoycoma,$diferente,$menor,$menorigual,$mayor,$mayorigual,$igualigual,$corcheteA,$corcheteC,$igual,$parA,$parC,$preanalisis2,$preanalisis;
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
			echo "TERMINO DE RECORRER EL PROGRAMA";
		}
		else
		{
			echo "<br>->Error Sintactico ".$preanalisis." esperaba palabra programa<br>";
		}
	}
	function DC()
	{
		global $programa,$constantes,$arreglos,$inicio,$fin,$ent,$id,$c,$coma,$llaveC,$llaveA,$si,$sino,$para,$escribe,$lee,$mod,$suma,$resta,$division,$multi,$puntoycoma,$diferente,$menor,$menorigual,$mayor,$mayorigual,$igualigual,$corcheteA,$corcheteC,$igual,$parA,$parC,$preanalisis2,$preanalisis;
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
			echo "<br>->Error Sintactico ".$preanalisis." esperaba palabra constantes<br>";
		}
	}
	function DA()
	{
		global $programa,$constantes,$arreglos,$inicio,$fin,$ent,$id,$c,$coma,$llaveC,$llaveA,$si,$sino,$para,$escribe,$lee,$mod,$suma,$resta,$division,$multi,$puntoycoma,$diferente,$menor,$menorigual,$mayor,$mayorigual,$igualigual,$corcheteA,$corcheteC,$igual,$parA,$parC,$preanalisis2,$preanalisis;
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
			echo "<br>->Error Sintactico ".$preanalisis." esperaba palabra arreglos<br>";
		}
	}
	function DC2()
	{
		global $programa,$constantes,$arreglos,$inicio,$fin,$ent,$id,$c,$coma,$llaveC,$llaveA,$si,$sino,$para,$escribe,$lee,$mod,$suma,$resta,$division,$multi,$puntoycoma,$diferente,$menor,$menorigual,$mayor,$mayorigual,$igualigual,$corcheteA,$corcheteC,$igual,$parA,$parC,$preanalisis2,$preanalisis;
		if($preanalisis==$id)
		{
			emparejar($id);
			emparejar($igual);
			CONSTANTE();
			DC3();
		}
		else
		{
			echo "<br>->Error Sintactico ".$preanalisis." esperaba un id<br>";
		}
	}
	function DA2()
	{
		global $programa,$constantes,$arreglos,$inicio,$fin,$ent,$id,$c,$coma,$llaveC,$llaveA,$si,$sino,$para,$escribe,$lee,$mod,$suma,$resta,$division,$multi,$puntoycoma,$diferente,$menor,$menorigual,$mayor,$mayorigual,$igualigual,$corcheteA,$corcheteC,$igual,$parA,$parC,$preanalisis2,$preanalisis;
		if($preanalisis=$id)
		{
			emparejar($id);
			emparejar($igual);
			emparejar($llaveA);
			D();
			emparejar($llaveC);
			DA3();
		}
		else
		{
			echo "<br>->Error Sintactico ".$preanalisis." esperaba un id<br>";
		}
	}

	function CONSTANTE()
	{
		global $programa,$constantes,$arreglos,$inicio,$fin,$ent,$id,$c,$coma,$llaveC,$llaveA,$si,$sino,$para,$escribe,$lee,$mod,$suma,$resta,$division,$multi,$puntoycoma,$diferente,$menor,$menorigual,$mayor,$mayorigual,$igualigual,$corcheteA,$corcheteC,$igual,$parA,$parC,$preanalisis2,$preanalisis;
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
			echo "<br>->Error Sintactico ".$preanalisis." esperaba un entero o caracter<br>";

		}

	}
	function DC3()
	{
		global $programa,$constantes,$arreglos,$inicio,$fin,$ent,$id,$c,$coma,$llaveC,$llaveA,$si,$sino,$para,$escribe,$lee,$mod,$suma,$resta,$division,$multi,$puntoycoma,$diferente,$menor,$menorigual,$mayor,$mayorigual,$igualigual,$corcheteA,$corcheteC,$igual,$parA,$parC,$preanalisis2,$preanalisis;
		if($preanalisis==$id)
		{
			DC2();
		}
		else if($preanalisis==$arreglos || $preanalisis==$inicio)
		{}
		else
		{
			echo "<br>->Error Sintactico ".$preanalisis." esperaba un id<br>";
		}

	}
	function DA3()
	{
		global $programa,$constantes,$arreglos,$inicio,$fin,$ent,$id,$c,$coma,$llaveC,$llaveA,$si,$sino,$para,$escribe,$lee,$mod,$suma,$resta,$division,$multi,$puntoycoma,$diferente,$menor,$menorigual,$mayor,$mayorigual,$igualigual,$corcheteA,$corcheteC,$igual,$parA,$parC,$preanalisis2,$preanalisis;
		if ($preanalisis== $id) {
			DA2();
		}
		else if ($preanalisis== $inicio) {
			//es cadena vacia
		}
		else {
			echo "->Error sintactico ".$preanalisis."esperaba un identificador o inicio";
		}
	}

	function D()
	{
		global $programa,$constantes,$arreglos,$inicio,$fin,$ent,$id,$c,$coma,$llaveC,$llaveA,$si,$sino,$para,$escribe,$lee,$mod,$suma,$resta,$division,$multi,$puntoycoma,$diferente,$menor,$menorigual,$mayor,$mayorigual,$igualigual,$corcheteA,$corcheteC,$igual,$parA,$parC,$preanalisis2,$preanalisis;
		if ($preanalisis== $ent) {
			emparejar($ent); D2();
		}
		else if ($preanalisis== $c) {
			emparejar($c); D3();
		}
		else {
			echo "->Error sintactico".$preanalisis."esperaba un entero o caracter";
		}
	}

	function D2()
	{
		global $programa,$constantes,$arreglos,$inicio,$fin,$ent,$id,$c,$coma,$llaveC,$llaveA,$si,$sino,$para,$escribe,$lee,$mod,$suma,$resta,$division,$multi,$puntoycoma,$diferente,$menor,$menorigual,$mayor,$mayorigual,$igualigual,$corcheteA,$corcheteC,$igual,$parA,$parC,$preanalisis2,$preanalisis;
		if ($preanalisis== $coma) {
			emparejar($coma); emparejar($ent); D2();
		}
		else if ($preanalisis== $llaveC) {
			//cadena vacia
		}
		else {
			echo "->Error sintactico".$preanalisis."esperaba , o }";
		}
	}

	function D3()
	{
		global $programa,$constantes,$arreglos,$inicio,$fin,$ent,$id,$c,$coma,$llaveC,$llaveA,$si,$sino,$para,$escribe,$lee,$mod,$suma,$resta,$division,$multi,$puntoycoma,$diferente,$menor,$menorigual,$mayor,$mayorigual,$igualigual,$corcheteA,$corcheteC,$igual,$parA,$parC,$preanalisis2,$preanalisis;
		if ($preanalisis== $coma) {
			emparejar($coma); emparejar($c); D3();
		}
		else if ($preanalisis == $llaveC) {
			
		}
		else {
			echo "->Error sintactico El token de preanalisis es: ".$preanalisis."y eesperaba , o }";
		}
	}

	function INST()
	{
		global $programa,$constantes,$arreglos,$inicio,$fin,$ent,$id,$c,$coma,$llaveC,$llaveA,$si,$sino,$para,$escribe,$lee,$mod,$suma,$resta,$division,$multi,$puntoycoma,$diferente,$menor,$menorigual,$mayor,$mayorigual,$igualigual,$corcheteA,$corcheteC,$igual,$parA,$parC,$preanalisis2,$preanalisis;

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
		else if ($preanalisis == $fin) {
			
		}
		else   {
			echo "->Error sintactico".$preanalisis." Se esperaba si, para, escribe, lee, id o fin";
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
				echo "->Error sintactico".$preanalisis."esperaba si, para, escribe, lee, id o fin";
				break;
		}*/
	}

	function EXPR()
	{
		global $programa,$constantes,$arreglos,$inicio,$fin,$ent,$id,$c,$coma,$llaveC,$llaveA,$si,$sino,$para,$escribe,$lee,$mod,$suma,$resta,$division,$multi,$puntoycoma,$diferente,$menor,$menorigual,$mayor,$mayorigual,$igualigual,$corcheteA,$corcheteC,$igual,$parA,$parC,$preanalisis2,$preanalisis;
		if ($preanalisis== $id) {
			emparejar($id); ARR(); emparejar($igual); OP1(); EXPR2(); emparejar($puntoycoma); INST();
		}
		
		else {
			echo "->Error sintactico".$preanalisis."esperaba un identificador";
		}
	}

	function EXPR2()
	{
		global $programa,$constantes,$arreglos,$inicio,$fin,$ent,$id,$c,$coma,$llaveC,$llaveA,$si,$sino,$para,$escribe,$lee,$mod,$suma,$resta,$division,$multi,$puntoycoma,$diferente,$menor,$menorigual,$mayor,$mayorigual,$igualigual,$corcheteA,$corcheteC,$igual,$parA,$parC,$preanalisis2,$preanalisis;
		if ($preanalisis== $suma ||  $preanalisis== $resta ||  $preanalisis== $division ||  $preanalisis== $multi) {
			OP(); OP1();
		}
		elseif ($preanalisis== $puntoycoma) {
			//cadena vacia
		}
		else {
			echo "->Error sintactico".$preanalisis."esperaba: suma, resta, división, multiplicación o ; ";
		}
	}
	function OP()
	{
		global $programa,$constantes,$arreglos,$inicio,$fin,$ent,$id,$c,$coma,$llaveC,$llaveA,$si,$sino,$para,$escribe,$lee,$mod,$suma,$resta,$division,$multi,$puntoycoma,$diferente,$menor,$menorigual,$mayor,$mayorigual,$igualigual,$corcheteA,$corcheteC,$igual,$parA,$parC,$preanalisis2,$preanalisis;
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
			echo "<br>->Error Sintactico ".$preanalisis." esperaba un operador<br>";
		}
	}
	function OP1()
	{
		global $programa,$constantes,$arreglos,$inicio,$fin,$ent,$id,$c,$coma,$llaveC,$llaveA,$si,$sino,$para,$escribe,$lee,$mod,$suma,$resta,$division,$multi,$puntoycoma,$diferente,$menor,$menorigual,$mayor,$mayorigual,$igualigual,$corcheteA,$corcheteC,$igual,$parA,$parC,$preanalisis2,$preanalisis;
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
			echo "<br>->Error Sintactico ".$preanalisis." esperaba entero, caracter o id<br>";
		}

	}
	function LEE()
	{
		global $programa,$constantes,$arreglos,$inicio,$fin,$ent,$id,$c,$coma,$llaveC,$llaveA,$si,$sino,$para,$escribe,$lee,$mod,$suma,$resta,$division,$multi,$puntoycoma,$diferente,$menor,$menorigual,$mayor,$mayorigual,$igualigual,$corcheteA,$corcheteC,$igual,$parA,$parC,$preanalisis2,$preanalisis;
		if($preanalisis==$lee)
		{
			emparejar($lee);
			emparejar($parA);
			CONSTANTE();
			emparejar($parC);
			emparejar($puntoycoma);
			INST();
		}
		else
		{
			echo "<br>->Error Sintactico ".$preanalisis." esperaba lee<br>";
		}

	}
	function ESCRIBE()
	{
		global $programa,$constantes,$arreglos,$inicio,$fin,$ent,$id,$c,$coma,$llaveC,$llaveA,$si,$sino,$para,$escribe,$lee,$mod,$suma,$resta,$division,$multi,$puntoycoma,$diferente,$menor,$menorigual,$mayor,$mayorigual,$igualigual,$corcheteA,$corcheteC,$igual,$parA,$parC,$preanalisis2,$preanalisis;
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
			echo "<br>->Error Sintactico ".$preanalisis." esperaba escribe<br>";
		}
	}
	function PARA()
	{
		global $programa,$constantes,$arreglos,$inicio,$fin,$ent,$id,$c,$coma,$llaveC,$llaveA,$si,$sino,$para,$escribe,$lee,$mod,$suma,$resta,$division,$multi,$puntoycoma,$diferente,$menor,$menorigual,$mayor,$mayorigual,$igualigual,$corcheteA,$corcheteC,$igual,$parA,$parC,$preanalisis2,$preanalisis,$hasta,$paso,$hacer;
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
			echo "<br>->Error Sintactico ".$preanalisis." esperaba para<br>";
		}	
	}
	function SI()   /////xxx
	{
		global $programa,$constantes,$arreglos,$inicio,$fin,$ent,$id,$c,$coma,$llaveC,$llaveA,$si,$sino,$para,$escribe,$lee,$mod,$suma,$resta,$division,$multi,$puntoycoma,$diferente,$menor,$menorigual,$mayor,$mayorigual,$igualigual,$corcheteA,$corcheteC,$igual,$parA,$parC,$preanalisis2,$preanalisis,$entonces;
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
			echo "<br>->Error Sintactico ".$preanalisis." esperaba si<br>";
		}
	}
	function SINO() /////xxx
	{
		global $programa,$constantes,$arreglos,$inicio,$fin,$ent,$id,$c,$coma,$llaveC,$llaveA,$si,$sino,$para,$escribe,$lee,$mod,$suma,$resta,$division,$multi,$puntoycoma,$diferente,$menor,$menorigual,$mayor,$mayorigual,$igualigual,$corcheteA,$corcheteC,$igual,$parA,$parC,$preanalisis2,$preanalisis;
		if($preanalisis==$sino)
		{
			emparejar($sino);
			INST();
		}
		else if($preanalisis==$fin){
			echo "cadena vacia del SINO";
		}
		else
		{
			echo "<br>->Error Sintactico ".$preanalisis." esperaba sino o fin<br>";
		}	
	}
	function LIMIT()
	{
		global $programa,$constantes,$arreglos,$inicio,$fin,$ent,$id,$c,$coma,$llaveC,$llaveA,$si,$sino,$para,$escribe,$lee,$mod,$suma,$resta,$division,$multi,$puntoycoma,$diferente,$menor,$menorigual,$mayor,$mayorigual,$igualigual,$corcheteA,$corcheteC,$igual,$parA,$parC,$preanalisis2,$preanalisis;
		if($preanalisis == $ent)
		{
			emparejar($ent);
		}
		else if($preanalisis == $id)
		{
			emparejar($id);
		}
		else
		{
			echo "<br>->Error Sintactico ".$preanalisis." esperaba un entero o id<br>";
			//->ErrorSintactico($lexema,$ent,$id);
		}
	}
	function CONDICION()
	{
		global $programa,$constantes,$arreglos,$inicio,$fin,$ent,$id,$c,$coma,$llaveC,$llaveA,$si,$sino,$para,$escribe,$lee,$mod,$suma,$resta,$division,$multi,$puntoycoma,$diferente,$menor,$menorigual,$mayor,$mayorigual,$igualigual,$corcheteA,$corcheteC,$igual,$parA,$parC,$preanalisis2,$preanalisis;
		if($preanalisis == $ent || $preanalisis == $c || $preanalisis == $id)
		{
			OP1(); SR(); OP1();
		}
		else
		{
			echo "<br>->Error Sintactico ".$preanalisis." esperaba un entero, caracter o id<br>";
			//->ErrorSintactico($lexema,$ent,$id);
		}
	}
	function INCDEC(){
		global $programa,$constantes,$arreglos,$inicio,$fin,$ent,$id,$c,$coma,$llaveC,$llaveA,$si,$sino,$para,$escribe,$lee,$mod,$suma,$resta,$division,$multi,$puntoycoma,$diferente,$menor,$menorigual,$mayor,$mayorigual,$igualigual,$corcheteA,$corcheteC,$igual,$parA,$parC,$preanalisis2,$preanalisis;
		if($preanalisis == $suma || $preanalisis == $resta)
		{
			OID(); emparejar($ent);
		}
		else
		{
			echo "<br>->Error Sintactico ".$preanalisis." esperaba + o -<br>";
			//->ErrorSintactico($lexema,$ent,$id);
		}
	}
	function OID(){
		global $programa,$constantes,$arreglos,$inicio,$fin,$ent,$id,$c,$coma,$llaveC,$llaveA,$si,$sino,$para,$escribe,$lee,$mod,$suma,$resta,$division,$multi,$puntoycoma,$diferente,$menor,$menorigual,$mayor,$mayorigual,$igualigual,$corcheteA,$corcheteC,$igual,$parA,$parC,$preanalisis2,$preanalisis;
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
			echo "<br>->Error Sintactico ".$preanalisis." esperaba + o -<br>";
			//->ErrorSintactico($lexema,$ent,$id);
		}
	}
	function SR(){
		global $programa,$constantes,$arreglos,$inicio,$fin,$ent,$id,$c,$coma,$llaveC,$llaveA,$si,$sino,$para,$escribe,$lee,$mod,$suma,$resta,$division,$multi,$puntoycoma,$diferente,$menor,$menorigual,$mayor,$mayorigual,$igualigual,$corcheteA,$corcheteC,$igual,$parA,$parC,$preanalisis2,$preanalisis;
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
			echo "<br>->Error Sintactico ".$preanalisis." esperaba un simbolo relacional<br>";
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
				echo "<br>->Error Sintactico ".$preanalisis." esperaba un simbolo relacional<br>";
			//->ErrorSintactico($lexema,$ent,$id);
				break;
		}*/
	}
	function ARR(){
		global $programa,$constantes,$arreglos,$inicio,$fin,$ent,$id,$c,$coma,$llaveC,$llaveA,$si,$sino,$para,$escribe,$lee,$mod,$suma,$resta,$division,$multi,$puntoycoma,$diferente,$menor,$menorigual,$mayor,$mayorigual,$igualigual,$corcheteA,$corcheteC,$igual,$parA,$parC,$preanalisis2,$preanalisis;
		if($preanalisis == $corcheteA)
		{
			emparejar($corcheteA); LIMIT2(); emparejar($corcheteC);
		}
		else if($preanalisis == $igual || $preanalisis == $mod || $preanalisis == $suma || $preanalisis == $resta 
			|| $preanalisis == $division || $preanalisis == $multi || $preanalisis == $puntoycoma || $preanalisis == $parA || $preanalisis == $diferente || $preanalisis == $menor || $preanalisis == $mayor || $preanalisis == $menorigual || $preanalisis == $mayorigual || $preanalisis == $igualigual)
		{
			// Como produce epsilon NO se hace nada
		}
		else
		{
			echo "<br>->Error Sintactico ".$preanalisis." esperaba un operador, un simbolo relacional, =, ;, (, [, <br>";
			//->ErrorSintactico($lexema,$ent,$id);
		}
	}
	function LIMIT2(){
		global $programa,$constantes,$arreglos,$inicio,$fin,$ent,$id,$c,$coma,$llaveC,$llaveA,$si,$sino,$para,$escribe,$lee,$mod,$suma,$resta,$division,$multi,$puntoycoma,$diferente,$menor,$menorigual,$mayor,$mayorigual,$igualigual,$corcheteA,$corcheteC,$igual,$parA,$parC,$preanalisis2,$preanalisis;
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
			echo "<br>->Error Sintactico ".$preanalisis." esperaba un entero o identificador<br>";
			//->ErrorSintactico($lexema,$ent,$id);
		}
	}
	function CONDICION2(){
		global $programa,$constantes,$arreglos,$inicio,$fin,$ent,$id,$c,$coma,$llaveC,$llaveA,$si,$sino,$para,$escribe,$lee,$mod,$suma,$resta,$division,$multi,$puntoycoma,$diferente,$menor,$menorigual,$mayor,$mayorigual,$igualigual,$corcheteA,$corcheteC,$igual,$parA,$parC,$preanalisis2,$preanalisis;
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
			echo "<br>->Error Sintactico ".$preanalisis." esperaba un operador o ]<br>";
			//->ErrorSintactico($lexema,$ent,$id);
		}
	}
	function emparejar($tok)
	{

		global $preanalisis,$c3;
		if ($tok == $preanalisis) {
			$c3++;
			$preanalisis = analex($c3);

		}
		else{
			echo "->Error sintactico".$preanalisis." - ".$tok;
		}
	}
//emparejar($preanalisis);
	analex($c3);
	P();


 ?>