<?php 	

require('conexion.php');


	$selectCaracter="SELECT * FROM constantes WHERE tipo='ent'";
	$selectEnteros = "SELECT * FROM constantes WHERE tipo ='c'";


	$selectCaracterA= "SELECT * FROM arreglos WHERE tipo='c'";
	$selectEnterosA = "SELECT * FROM arreglos WHERE tipo ='ent'";
	$arreglos2 = "SELECT * FROM arreglos INNER JOIN valoresa ON arreglos.id_arreglo = valoresa.id_arreglo and arreglos.tipo = 'ent'";
	$arreglos = "SELECT * FROM arreglos INNER JOIN valoresa ON arreglos.id_arreglo = valoresa.id_arreglo and arreglos.tipo = 'c'";

		$result=$con->query($selectCaracter);
		$result2=$con->query($selectEnteros);
		$result3=$con->query($selectCaracterA);
		$result4=$con->query($arreglos2);
		$result5=$con->query($arreglos);
		$result6=$con->query($selectEnterosA);

 ?>


 <!DOCTYPE html>
 <html>
 <head>
 	<title></title>
 </head>
 <body>

 	 <table>
                        <thead>
                            <tr>
                            	<td><b>lexema entero</b></td>
                            </tr>
                            <tbody>
                            <?php while($row=$result->fetch_assoc()){ ?>
                            <tr>
                             	<td>
                                    <?php echo $row['lexema'];
                                    	  echo " = ";
                                          echo $row['valor'];
                                    ?>
                                </td>
							</tr>
                            <?php } ?>
                            </tbody>
                    </table>


                     <table>
                        <thead>
                            <tr>
                            	<td><b>lexema caracter</b></td>
                            </tr>
                            <tbody>
                            <?php while($row=$result2->fetch_assoc()){ ?>
                            <tr>
								<td>
                                    <?php echo $row['lexema'];
                                   		  echo " = ";
                                          echo "'".$row['valor']."'";?>
                                </td>
							</tr>
                            <?php } ?>
                            </tbody>
                    </table>

                   <h4>Arreglos caracter</h4>
                     <table border="5">
                            <tbody>
                            <?php
                           		while ($row2=mysqli_fetch_assoc($result3)) {
	                             $row3=$row2['lexema'];
	                             echo "<li>".$row3."</li>";?>
                            	<tr>
	                            <?php
	                             $ant = NULL;
	                             $act = NULL;
	                             $cont =0;
	                            	while($row=mysqli_fetch_assoc($result5)){ ?>
										<!--td-->
											<?php
											if ($cont == 1) {
												$act = $row['id_arreglo'];
												 if ($act == $ant ){

												 	echo "<td>'".$row['valor']."'</td>";
												 	$ant = $act;
											 	}
											 	else {
											 		echo "<tr><td>'".$row['valor']."'</td></tr>";
											 	}
											 
											 }else {
											 	$act = $row['id_arreglo'];
											 	echo "<td>'".$row['valor']."'</td>";
											 	$cont++;
											 	$ant = $act;
											 }
										 ?>
                            <?php } ?>
                            </tr>
                        <?php } ?>
                            </tbody>
                    </table>
                    


                    <h4>Arreglos enteros</h4>
                     <table border="5">
                            <tbody>
                            <?php
                           		while ($row2=mysqli_fetch_assoc($result6)) {
	                             $row3=$row2['lexema'];
	                             echo "<li>".$row3."</li>";?>
                            	<tr>
	                            <?php
	                             $ant = NULL;
	                             $act = NULL;
	                             $cont =0;
	                            	while($row=mysqli_fetch_assoc($result4)){ ?>
										<!--td-->
											<?php
											if ($cont == 1) {
												$act = $row['id_arreglo'];
												 if ($act == $ant ){
												 	echo "<td>".$row['valor']."</td>";
												 	$ant = $act;
											 	}
											 	else {
											 		echo "<tr><td>".$row['valor']."</td></tr>";
											 	}
											 
											 }else {
											 	$act = $row['id_arreglo'];
											 	echo "<td>".$row['valor']."</td>";
											 	$cont++;
											 	$ant = $act;
											 }
										 ?>
                            <?php } ?>
                            </tr>
                        <?php } ?>
                            </tbody>
                    </table>
 					
 					

 </body>
 </html>