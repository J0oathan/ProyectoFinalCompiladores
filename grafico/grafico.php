<?php 	

require('conexion.php');


	$selectCaracter="SELECT * FROM constantes WHERE tipo='ent'";

	$selectEnteros = "SELECT * FROM constantes WHERE tipo ='c'";
		
		$result=$con->query($selectCaracter);

		$result2=$con->query($selectEnteros);




 ?>


 <!DOCTYPE html>
 <html>
 <head>
 	<title></title>
 </head>
 <body>

 	 <table>
                        <thead>
                            <tr class="centro">

                              <td><b>lexema entero</b></td>
                               
                                
                               <!-- <td colspan="2">Modificar Usuarios</td>-->
                          
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
                            <tr class="centro">

                              <td><b>lexema caracter</b></td>
                               
                                
                               <!-- <td colspan="2">Modificar Usuarios</td>-->
                          
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
 
 </body>
 </html>