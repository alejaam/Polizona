<?php
include_once 'db.php';
include_once 'header.php';

// $query = "select idempresa, idtipoalmacen, maximo from almacen;";
$query = "SELECT idembarque, idalmacen, unidades, costoembarque FROM embarque WHERE idempresa='125'";
$embarque = mysqli_query($conexion, $query);

?>
<div class='big-container'>

	<section>
		<?PHP

		if ($conexion) {
			echo "<table>";
			echo "<th> ID Embarque</th>";
			echo "<th> ID Almacen</th>";
			echo "<th> Unidades</th>";
			echo "<th> Costo Embarque</th>";

			while ($registro = mysqli_fetch_array($embarque)) {
				$result["ID Embarque"] = $registro['idembarque'];
				$result["ID Almacen"] = $registro['idalmacen'];
				$result["Unidades"] = $registro['unidades'];
				$result["Costo Embarque"] = $registro['costoembarque'];

				$json['Clasificador'][] = $result;

				echo "<tr>";
				echo "<td>" . $registro['idembarque'] . " </td>";
				echo "<td>" . $registro['idalmacen'] . " </td>";
				echo "<td>" . $registro['unidades'] . " </td>";
				echo "<td>" . $registro['costoembarque'] . " </td>";

				echo "</tr>";
			}

			echo "</table>";

			// Mostrar los datos como JSON
			echo "<br><br><h3>Informacion en JSON</h3>";
			echo json_encode($json, JSON_NUMERIC_CHECK);


			mysqli_close($conexion);
		} else {
			echo "Fallo de Conexion";
		}

		?>


	</section>
</div>
</body>

</html>