<html>
 <head>
 	<title>Exemple de lectura de dades a MySQL</title>
 	<meta charset="utf-8">
	<style>
		th { background-color:cyan;  }
	</style>
 </head>

 <body>
 	<h1>Exemple de lectura de dades a MySQL</h1>

 	<?php
		try {
                	$hostname = "localhost";
			$dbname = "world";
			$username = "El teu usuari";
			$pw = "La teva contraseña";
			$pdo = new PDO ("mysql:host=$hostname;dbname=$dbname","$username","$pw");

		} catch (PDOException $e){
			echo "Failed to get DB handle: ".$e->getMessage()."\n";
			exit;
		}

		$query = $pdo->prepare("SELECT DISTINCT Continent FROM country");
		$query->execute();

		if (isset($_POST['continentSelected'])) {
			$filter = "SELECT * FROM country where Continent = '".$_POST['continentSelected']."'";
			$queryContinent = $pdo->prepare($filter);
			$queryContinent->execute();

		}
 	?>


	<form method="post" action="filterWorld3.php">
	<select name="continentSelected" required>
	<?php

		echo "<option disabled selected value> -- Selecciona un continent -- </option>\n";

		foreach ( $query as $row ) {
			echo "<option value=\"".$row['Continent']."\">".$row['Continent']."</option>\n";
		}

		unset($query);

	?>
	</select>
	<input type="Submit" value="Buscar">
	</form>

	<?php

		if (isset($_POST['continentSelected'])) {

			$totalPopulation = 0;

			foreach ($queryContinent as $rowContinent) {
				$totalPopulation += $rowContinent['Population'];
			}


			$filter = "SELECT * FROM country where Continent = '".$_POST['continentSelected']."'";
			$queryContinent = $pdo->prepare($filter);
			$queryContinent->execute();

			echo "<table border=\"1\">";
			echo "<tr><td colspan=\"2\">Continent: ".$_POST['continentSelected']."</td></tr>";
			echo "<tr><td colspan=\"2\">Poblacio TOTAL: $totalPopulation </td></tr>";
			echo "<tr><th><strong>PAÏS</strong></th><th><strong>POBLACIO</strong></th></tr>";


			foreach ( $queryContinent as $rowContinent ) {
				echo "<tr><td>".$rowContinent['Name']."</td><td>".$rowContinent['Population']."</td></tr>\n";
			}

			echo "</table>";

			unset($queryContinent);
		}

		unset($pdo);

	?>




 </body>
</html>

