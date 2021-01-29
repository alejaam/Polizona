<?php
include_once 'db.php';
if (isset($_POST)) {
    $action = $_POST['action'];
    switch ($action) {
        case 'indsutry':
            $queryIndustria = "SELECT * FROM empresa WHERE idindustria = $_POST[opciones]";
            $industria = mysqli_query($conexion, $queryIndustria);
            $industrias = array();
            $cont = 1;
            while ($row = mysqli_fetch_assoc($industria)) {
                // array_push($industrias, $row);
                $html .= '<tr>';
                $html .= '<td>' . $cont . '</td>';
                $html .= '<td>' . $row['idempresa'] . '</td>';
                $html .= '<td>' . $row['idindustria'] . '</td>';
                $html .= '<td>' . $row['mercado'] . '</td>';
                $html .= '</tr>';
                $cont++;
            }
            echo json_encode($html);
            break;
        case 'campos':
            $table_name = isset($_POST['tabla']) ? $_POST['tabla'] : 'embarque';
            $query_columns = 'SELECT COLUMN_NAME AS columna FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_SCHEMA = "polizona_125" AND TABLE_NAME ="' . $table_name . '"';
            $columns = mysqli_query($conexion, $query_columns);

            $columnas = array();
            while ($row = mysqli_fetch_assoc($columns)) {
                array_push($columnas, $row['columna']);
            }
            $html = '';
            foreach ($columnas as $columna) {
                $html .= '<option value =' . $columna . '>' . $columna . '</option>';
            }
            echo json_encode($html);
            break;
        case 'consulta':
            $query1 = isset($_POST['query1']) ? $_POST['query1'] : '';
            $query2 = isset($_POST['query2']) ? $_POST['query2'] : '';
            $campo1 = isset($_POST['campo1']) ? $_POST['campo1'] : '';
            $campo2 = isset($_POST['campo2']) ? $_POST['campo2'] : '';
            $proba1 = mysqli_query($conexion, $query1);
            $proba2 = mysqli_query($conexion, $query2);

            $tablaProba1 = '';
            $tablaProba2 = '';
            $cont1 = 0;
            $cont2 = 0;
            while ($row = mysqli_fetch_assoc($proba1)) {
                $cont1++;
                $tablaProba1 .= "<tr>
                                    <td>$cont1</td>
                                    <td>$row[$campo1]</td>
                                    <td>$row[probabilidad]</td>
                                </tr>";
            }
            while ($row = mysqli_fetch_assoc($proba2)) {
                $cont2++;
                $tablaProba2 .= "<tr>
                                    <td>$cont2</td>
                                    <td>$row[$campo1]</td>
                                    <td>$row[$campo2]</td>
                                    <td>$row[probabilidad]</td>
                                </tr>";
            }
            $tables = array();
            array_push($tables, trim($tablaProba1));
            array_push($tables, trim($tablaProba2));
            echo json_encode(array('table1' => $tablaProba1, 'table2' => $tablaProba2));
            break;
        default:
            # code...
            break;
    }
} else {
}
