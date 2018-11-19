<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Editor</title>
</head>

<body>
<?php
$fn = "ejemplo.txt";

if (isset($_POST['content']))
{
    $content = stripslashes($_POST['content']);
    $fp = fopen($fn,"w") or die ("Error al abrir el archivo");
    fputs($fp,$content);
    fclose($fp) or die ("Error al cerrar el archivo");
}
?>
<div style="width:440px; text-align: center; margin: auto; background-color: #F0F0F0; border: 1px solid #B3B9D5; border-color: #B3B9D5; padding: 15px; font-family: Verdana, Arial, Helvetica, sans-serif; color: #717CB0; font-size: 14px;">

<form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="post">
<textarea rows="32" cols="1">01 02 03 04 05 06 07 08 09 10 11 12 13 14 15 16 17 18 19 20 21 22 23 24 25 26 27 28 29 30 31 32</textarea>	
<textarea rows="32" cols="50" name="content"><?php readfile($fn); ?></textarea>
<br />
<br />
<input type="submit" style="font-family:Arial;font-size:10pt;width:200px;height:30px;
background:#777777;color:#fff444;cursor:pointer;"value="  Guardar"> 

<input type="reset" style="font-family:Arial;font-size:10pt;width:200px;height:30px;
background:red;color:#fff444;cursor:pointer;"value="  Borrar"> 
<br>

&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<a href="../cuerpo.php" target="algoritmo"><img src="../run.png" width="100" height="100"  ALIGN="middle"></a><br>
 
</form>
<br />

</div>
</body>
</html>
