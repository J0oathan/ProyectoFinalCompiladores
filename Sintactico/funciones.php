<?php 

//SI ES NO TERMINAL LLAMAMOS A LA FUNCION
//SI ES TERMINAL SOLO emparejamos
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

 ?>