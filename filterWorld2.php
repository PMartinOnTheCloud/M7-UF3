<html>
 <head>
 	<title>Exemple de lectura de dades a MySQL</title>
 	<meta charset="utf-8">
 	<style>
 		body{
 		}
 		table,td {
 			border: 1px solid black;
 			border-spacing: 0px;
 		}
 	</style>
 </head>

 <body>
 	<h1>Exemple de lectura de dades a MySQL</h1>

 	<?php

		if (isset($_POST['selectOption'])) {

 		$conn = mysqli_connect('localhost','El teu usuari','La teva contraseña');


 		mysqli_select_db($conn, 'world');


		$countrycode = $_POST['selectOption'];
 		$consulta = "SELECT country.Name as CountryName,city.Name as CityName,city.District,city.Population FROM city inner join country on city.CountryCode=country.Code where city.CountryCode='".$_POST['selectOption']."';";


 		$resultat = mysqli_query($conn, $consulta);


 		if (!$resultat) {
     			$message  = 'Consulta invàlida: ' . mysqli_error($conn) . "\n";
     			$message .= 'Consulta realitzada: ' . $consulta;
     			die($message);
 		}
		}
 	?>


 	<table>
	<thead><td colspan="4" align="center" bgcolor="cyan">Llistat de ciutats</td></thead>

 	<?php


 		while( $registre = mysqli_fetch_assoc($resultat) )
 		{

 			echo "\t<tr>\n";

 			echo "\t\t<td>".$registre["CountryName"]."</td>\n";
 			echo "\t\t<td>".$registre["CityName"]."</td>\n";
 			echo "\t\t<td>".$registre["District"]."</td>\n";
 			echo "\t\t<td>".$registre["Population"]."</td>\n";

 			echo "\t</tr>\n";
 		}
 	?>

 	</table>
	<br>
	<a href="filterWorld.php">Tornar a la pagina principal</a>
 </body>
</html>