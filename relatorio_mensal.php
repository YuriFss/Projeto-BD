<?php

include 'conexao.php';

// Definindo o mês anterior
$mes_anterior = date("Y-m-d", strtotime("-1 month"));

// Consulta para obter o relatório mensal de compras de cada vendedor
$sql = "SELECT vendedor, SUM(preco) AS total_compras FROM compras WHERE data_compra >= '$mes_anterior' GROUP BY vendedor";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relatório Mensal de Compras por Vendedor</title>
</head>
<body>
    <h1>Relatório Mensal de Compras por Vendedor</h1>
    <table border="1">
        <tr>
            <th>Vendedor</th>
            <th>Total de Compras</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            // Output dos dados de cada vendedor
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>".$row['vendedor']."</td>";
                echo "<td>".$row['total_compras']."</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='2'>Nenhuma compra encontrada no último mês</td></tr>";
        }
        ?>
    </table>
</body>
</html>
