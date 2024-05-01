<?php
include 'conexao.php';

$data_inicio = $_GET['data_inicio'];
$data_fim = $_GET['data_fim'];
$idVendedor = $_GET['idVendedor'];

$sql = "SELECT * FROM relatorio_compras_view WHERE dia BETWEEN '$data_inicio' AND '$data_fim'";

$result = $mysqli->query($sql);

if ($result->num_rows > 0) {
    echo "<h2>Relatório de Compras</h2>";
    echo "<p>Período: $data_inicio a $data_fim</p>";
    echo "<table border='1'>";
    echo "<tr><th>ID</th><th>Cliente</th><th>Vendedor</th><th>Produto</th><th>Data</th></tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>".$row["idCompra"]."</td>";
        echo "<td>".$row["idCliente"]."</td>";
        echo "<td>".$row["vendedor"]."</td>";
        echo "<td>".$row["idProduto"]."</td>";
        echo "<td>".$row["dia"]."</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "Nenhuma compra encontrada para o período especificado";
}

$mysqli->close();
?>