<?php 
$programa="programa";$constantes="constantes";$arreglos="arreglos";$inicio="inicio";$fin="fin";$ent="ent";$id="id";$c="c";$coma=",";$llaveC=")";$llaveA="{";$si="si";$sino="sino";$para="para";$escribe="escribe";$lee="lee";$mod="mod";$suma="suma";$resta="resta";$division="division";$multi="multi";$puntoycoma=";";$diferente="diferente";$menor="menor";$menorigual="menorigual";$mayor="mayor";$mayorigual="mayorigual";$igualigual="igualigual";$corcheteA="[";$corcheteC="]";$igual="igual";$parA="(";$parC=")";
	function OP()
	{
		if($tokens[]==$mod)
		{
			emparejar($mod);
		}
		else if($tokens[]==$suma)
		{
			emparejar($suma);
		}
		else if($tokens[]==$resta)
		{	
			emparejar($resta);
		}
		else if($tokens[]==$division)
		{
			emparejar($division);
		}
		else if($token[]s==$multi)
		{
			emparejar($multi);
		}
		else
		{
			echo "<br>Error sintactico<br>";

		}
	}
	function OP1()
	{
		if($tokens[]==$ent||$tokens[]==$c)
		{
			CONSTANTE();
		}
		else if($tokens[]==$id)
		{
			emparejar($id);

			ARR();
		}
		else
		{
			echo "<br>Error sintactico<br>";

		}

	}
	function OP1()
	{
		if($tokens[]==$ent||$tokens[]==$c)
		{
			CONSTANTE();
		}
		else if($tokens[]==$id)
		{
			emparejar($id);

			ARR();
		}
		else
		{
			echo "<br>Error sintactico<br>";

		}
	}
	function LEE()
	{
		if($tokens[]==$lee)
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
			echo "<br>Error sintactico<br>";

		}

	}
	function ESCRIBE()
	{
		if($tokens[]==$escribe)
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
			echo "<br>Error sintactico<br>";

		}
	}
	function PARA()
	{
		if($tokens[]==$para)
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
			echo "<br>Error sintactico<br>";

		}	
	}
	function SI()
	{
		if($tokens[]==$si)
		{
			emparejar($si);
			emparejar($parA);
			CONDICION();
			emparejar($parC);
			emparejar($entonces);
			INST();
		}
	}
	function SINO()
	{
		if($tokens[]==$sino||$tokens[]==$fin)
		{
			emparejar($sino);
			INST();
		}
		else
		{
			echo "<br>Error sintactico<br>";

		}	
	}
	function P()
	{
		if($tokens[]==$programa)
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
			echo "<br>Error sintactico<br>";

		}
	}
	function DC()
	{
		if($tokens[]==$constantes)
		{
			emparejar($constantes);
			DC2();
		}
		else
		{
			echo "<br>Error sintactico<br>";

		}

	}
	function DA()
	{
		if($tokens[]==$arreglos)
		{	
			emparejar($arreglos);
			DA2();

		}
		else
		{
			echo "<br>Error sintactico<br>";

		}
	}
	function DC2()
	{
		if($tokens[]==$id)
		{
			emparejar($id);
			emparejar($igual);
			CONSTANTE();
			DC3();



		}

		else
		{
			echo "<br>Error sintactico<br>";

		}
	}
	function DA2()
	{
		if($tokens[]=$id)
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
			echo "<br>Error sintactico<br>";

		}
	}

	function CONSTANTE()
	{
		if($tokens[]==$ent)
		{
			emparejar($ent);

		}
		else if($tokens[]==$c)
		{
			emparejar($c);
		}
		else
		{
			echo "<br>Error sintactico<br>";

		}

	}
	function DC3()
	{
		if($tokens[]==$id)
		{
			DC2();
		}
		else
		{
			echo "<br>Error sintactico<br>";

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
			echo "<br>Error Sintactico<br>";
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
			echo "<br>Error Sintactico<br>";
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
			echo "<br>Error Sintactico<br>";
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
			echo "<br>Error Sintactico<br>";
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
				echo "<br>Error Sintactico<br>";
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
			echo "<br>Error Sintactico<br>";
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
			echo "<br>Error Sintactico<br>";
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
			echo "<br>Error Sintactico<br>";
			//errorSintactico($lexema,$ent,$id);
		}
	}

 ?>