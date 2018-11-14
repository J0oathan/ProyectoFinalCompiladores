<?php 
$programa="programa";$constantes="constantes";$arreglos="arreglos";$inicio="inicio";$fin="fin";$ent="ent";$id="id";$c="c";$coma=",";$llaveC=")";$llaveA="{";$si="si";$sino="sino";$para="para";$escribe="escribe";$lee="lee";$mod="mod";$suma="suma";$resta="resta";$division="division";$multi="multi";$puntoycoma=";";$diferente="diferente";$menor="menor";$menorigual="menorigual";$mayor="mayor";$mayorigual="mayorigual";$igualigual="igualigual";$corcheteA="[";$corcheteC="]";$igual="igual";$parA="(";$parC=")";
	function OP()
	{
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
			echo "<br>Error Sintactico ".$preanalisis." esperaba un operador<br>";
		}
	}
	function OP1()
	{
		if($preanalisis==$ent||$preanalisis==$c)
		{
			CONSTANTE();
		}
		else if($preanalisis==$id)
		{
			emparejar($id);

			ARR();
		}
		else
		{
			echo "<br>Error Sintactico ".$preanalisis." esperaba entero, caracter o id<br>";
		}

	}
	function OP1()
	{
		if($preanalisis==$ent||$preanalisis==$c)
		{
			CONSTANTE();
		}
		else if($preanalisis==$id)
		{
			emparejar($id);

			ARR();
		}
		else
		{
			echo "<br>Error Sintactico ".$preanalisis." esperaba entero, caracter o id<br>";
		}
	}
	function LEE()
	{
		if($preanalisis==$lee)
		{
			emparejar($lee);
			emparejar($parA);
			CONSTANTE();
			emparejar($parA);
			emparejar($puntoycoma);
			INST():

		}
		else
		{
			echo "<br>Error Sintactico ".$preanalisis." esperaba lee<br>";
		}

	}
	function ESCRIBE()
	{
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
			echo "<br>Error Sintactico ".$preanalisis." esperaba escribe<br>";
		}
	}
	function PARA()
	{
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
			INST()

		}
		else
		{
			echo "<br>Error Sintactico ".$preanalisis." esperaba para<br>";
		}	
	}
	function SI()
	{
		if($preanalisis==$si)
		{
			emparejar($si);
			emparejar($parA);
			CONDICION();
			emparejar($parC);
			emparejar($entonces);
			INST();
		}
		else
		{
			echo "<br>Error Sintactico ".$preanalisis." esperaba si<br>";
		}
	}
	function SINO()
	{
		if($preanalisis==$sino||$preanalisis==$fin)
		{
			emparejar($sino);
			INST();
		}
		else
		{
			echo "<br>Error Sintactico ".$preanalisis." esperaba sino o fin<br>";
		}	
	}
	function P()
	{
		if($preanalisis==$programa)
		{
			emparejar($programa);
			emparejar($id);
			DC();
			DA();
			emparejar($inicio);
			INST();
			emparejar($fin);
		}
		else
		{
			echo "<br>Error Sintactico ".$preanalisis." esperaba palabra programa<br>";
		}
	}
	function DC()
	{
		if($preanalisis==$constantes)
		{
			emparejar($constantes);
			DC2();
		}
		else
		{
			echo "<br>Error Sintactico ".$preanalisis." esperaba palabra constantes<br>";
		}
	}
	function DA()
	{
		if($preanalisis==$arreglos)
		{	
			emparejar($arreglos);
			DA2();

		}
		else
		{
			echo "<br>Error Sintactico ".$preanalisis." esperaba palabra arreglos<br>";
		}
	}
	function DC2()
	{
		if($preanalisis==$id)
		{
			emparejar($id);
			emparejar($igual);
			CONSTANTE();
			DC3();
		}
		else
		{
			echo "<br>Error Sintactico ".$preanalisis." esperaba un id<br>";
		}
	}
	function DA2()
	{
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
			echo "<br>Error Sintactico ".$preanalisis." esperaba un id<br>";
		}
	}

	function CONSTANTE()
	{
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
			echo "<br>Error Sintactico ".$preanalisis." esperaba un entero o caracter<br>";

		}

	}
	function DC3()
	{
		if($preanalisis==$id)
		{
			DC2();
		}
		else
		{
			echo "<br>Error Sintactico ".$preanalisis." esperaba un id<br>";

		}

	}
	function LIMIT(){
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
			echo "<br>Error Sintactico ".$preanalisis." esperaba un entero o id<br>";
			//errorSintactico($lexema,$ent,$id);
		}
	}
	function CONDICION(){
		if($preanalisis == $ent || $preanalisis == $c || $preanalisis == $id)
		{
			OP1(); SR(); OP1();
		}
		else
		{
			echo "<br>Error Sintactico ".$preanalisis." esperaba un entero, caracter o id<br>";
			//errorSintactico($lexema,$ent,$id);
		}
	}
	function INCDEC(){
		if($preanalisis == $suma || $preanalisis == $resta)
		{
			OID(); emparejar($ent);
		}
		else
		{
			echo "<br>Error Sintactico ".$preanalisis." esperaba + o -<br>";
			//errorSintactico($lexema,$ent,$id);
		}
	}
	function OID(){
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
			echo "<br>Error Sintactico ".$preanalisis." esperaba + o -<br>";
			//errorSintactico($lexema,$ent,$id);
		}
	}
	function SR(){
		switch ($preanalisis) {
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
				echo "<br>Error Sintactico ".$preanalisis." esperaba un simbolo relacional<br>";
			//errorSintactico($lexema,$ent,$id);
				break;
		}
	}
	function ARR(){
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
			echo "<br>Error Sintactico ".$preanalisis." esperaba un operador, un simbolo relacional, =, ;, (, [, <br>";
			//errorSintactico($lexema,$ent,$id);
		}
	}
	function LIMIT2(){
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
			echo "<br>Error Sintactico ".$preanalisis." esperaba un entero o identificador<br>";
			//errorSintactico($lexema,$ent,$id);
		}
	}
	function CONDICION2(){
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
			echo "<br>Error Sintactico ".$preanalisis." esperaba un operador o ]<br>";
			//errorSintactico($lexema,$ent,$id);
		}
	}

function DA3()
{
	if ($preanalisis== "id") {
		DA2();
	}
	elseif ($preanalisis== "inicio") {
		//es cadena vacia
	}
	else {
		echo "Error sintactico ".$preanalisis."esperaba un identificador o inicio";
	}
}

function D()
{
	if ($preanalisis== "ent") {
		emparejar("ent"); D2();
	}
	elseif ($preanalisis== "c") {
		emparejar("c"); D3();
	}
	else {
		echo "Error sintactico".$preanalisis."esperaba un entero o caracter";
	}
}

function D2()
{
	if ($preanalisis== ",") {
		emparejar(","); emparejar("ent"); D2();
	}
	elseif ($preanalisis== "}") {
		//cadena vacia
	}
	else {
		echo "Error sintactico".$preanalisis."esperaba , o }";
	}
}

function D3()
{
	if ($preanalisis== ",") {
		emparejar(","); emparejar("c"); D3();
	}
	elseif ($preanalisis== "}") {
		//cadena vacia
	}
	else {
		echo "Error sintactico".$preanalisis."esperaba , o }";
	}
}

function INST()
{
	switch ($preanalisis) {
		case 'si':
			SI();
			break;
		case 'para':
			PARA();
			break;
		case 'escribe':
			ESCRIBE();
			break;
		case 'lee':
			LEE();
			break;
		case 'id':
			EXPR();
			break;
		case 'fin':
			//cadena vacia
			break;
		default:
			echo "Error sintactico".$preanalisis."esperaba si, para, escribe, lee, id o fin";
			break;
	}
}

function EXPR()
{
	if ($preanalisis== "id") {
		emparejar("id"); ARR(); emparejar("="); OP1(); EXPR2(); emparejar(";"); INST();
	}
	
	else {
		echo "Error sintactico".$preanalisis."esperaba un identificador";
	}
}

function EXPR2()
{
	if ($preanalisis== "suma" ||  $preanalisis== "resta" ||  $preanalisis== "division" ||  $preanalisis== "multi") {
		OP(); OP1();
	}
	elseif ($preanalisis== ";") {
		//cadena vacia
	}
	else {
		echo "Error sintactico".$preanalisis."esperaba: suma, resta, división, multiplicación o ; ";
	}
}

function emparejar($token)
{
	if ($token == $preanalisis) {
		$preanalisis = analex();
	}
	else{
		echo "Error sintáctico".$preanalisis." - ".$token;
	}
}



 ?>