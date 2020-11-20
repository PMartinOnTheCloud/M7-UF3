<html>
 <head>
 	<title>Exemple de lectura de dades a MySQL</title>
 	<meta charset="utf-8">
 </head>

 <body>
 	<h1>Exemple de lectura de dades a MySQL</h1>

 	<?php

                $conn = mysqli_connect('localhost','El teu usuari','La teva contraseña');

                mysqli_select_db($conn, 'world');


		if (isset($_POST['CountryCodePost']) && isset($_POST['CityNamePost']) && isset($_POST['DistrictNamePost']) && isset($_POST['PopulationPost'])) {

			$consulta = "INSERT INTO city (Name,CountryCode,District,Population) VALUES ('".$_POST['CityNamePost']."','".$_POST['CountryCodePost']."','".$_POST['DistrictNamePost']."',".$_POST['PopulationPost'].")";

                        if (mysqli_query($conn, $consulta)) {

                                echo "<p style='color:green;'>Operacion realizada con exito<p>";

                        } else {

                                echo "<p style='color:red;'>Al carajo que te trajo</p>";
                        }

		}


 		$consulta = "SELECT Code,Name,Code2 FROM country;";


 		$resultat = mysqli_query($conn, $consulta);


 		if (!$resultat) {
     			$message  = 'Consulta invàlida: ' . mysqli_error($conn) . "\n";
     			$message .= 'Consulta realitzada: ' . $consulta;
     			die($message);
 		}
 	?>


	<form method="post" action="filterWorld2.php">
	<?php

 		while( $registre = mysqli_fetch_assoc($resultat) ) {

			echo "<input type=\"radio\" name=\"selectOption\" value=\"".$registre['Code']."\" id=\"".$registre['Code']."\" required>\t";
			echo "<label for=\"".$registre['Code']."\">".$registre['Name']."</label>\t";

			if ($registre['Code2'] != 'TP' && $registre['Code2'] != 'YU') {
				echo "<img src=\"https://www.countryflags.io/".strtolower($registre['Code2'])."/shiny/24.png\" /><br>\n";
			} else if ($registre['Code2'] == 'YU') {
				echo "<img style=\"width: 24px; height: 24px;\" src=\"./flags-not-in-API/yugoslavia.ico\" /><br>\n";
			} else {
				echo "<img src=\"https://www.countryflags.io/tl/shiny/24.png\" /><br>\n";
			}
 		}
 	?>
	<br><input type="Submit" value="Veure ciutats">
	</form>

	<h1>Insertar ciutats</h1>

	<form method="post" action="filterWorld.php">

	<select name="CountryCodePost" required>
	<?php

	echo "<option disabled selected value> -- Selecciona un paÃ¯s -- </option>";

	mysqli_data_seek($resultat, 0);

	while ($registre = mysqli_fetch_assoc($resultat)) {

		echo "<option value=\"".$registre['Code']."\">".$registre['Name']."</option>\n";
	}

	?>
	</select>

	<input type="text" name="CityNamePost" placeholder="Nom de la ciutat" required>
	<input type="text" name="DistrictNamePost" placeholder="Nom de la comunitat"required>
	<input type="number" name="PopulationPost" placeholder="Poblacio (en numeros)" required>
	<input type="Submit" value="Afegir ciutat">

	</form>

 </body>
</html>
