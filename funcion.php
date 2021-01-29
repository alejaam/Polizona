<?php
require_once 'db.php';
include_once 'header.php';
?>

	<div class='big-container'>

		<section>
			<?php
			if ($conexion) {
				echo "<table>";
				echo "<th> ID Empresa</th>";
				echo "<th> Tipo almacen</th>";
				echo "<th> Maximo</th>";

				while ($registro = mysqli_fetch_array($resultado)) {
					$result["ID_Empresa"] = $registro['idempresa'];
					$result["Tipo almacen"] = $registro['idtipoalmacen'];
					$result["Maximo"] = $registro['maximo'];
					$json['clasificador'][] = $result;

					echo "<tr>";
					echo "<td>" . $registro['idempresa'] . " </td>";
					echo "<td>" . $registro['idtipoalmacen'] . " </td>";
					echo "<td>" . $registro['maximo'] . " </td>";
					echo "</tr>";
					$i++;
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