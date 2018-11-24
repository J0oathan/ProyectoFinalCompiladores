<?php
error_reporting(0);
$con = mysqli_connect("localhost", "root", "")or die("Erorr con mysqli_Connect");
mysqli_select_db($con,"compiladores")or die("Erorr seleccionar DB");

/*
if ($con->connect_errno)
{
	echo "Fallo al conectar a MySQL: (" . $con->connect_errno . ") " . $con->connect_error;
	exit();
}
else
{

    echo 'conectado';

}*/
?>
