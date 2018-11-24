<?php
error_reporting(0);
$con = mysqli_connect("localhost", "root", "");
mysqli_select_db($con,"compiladores");


if ($con->connect_errno)
{
	echo "Fallo al conectar a MySQL: (" . $con->connect_errno . ") " . $con->connect_error;
	exit();
}
else
{

    echo 'conectado';

}
?>
