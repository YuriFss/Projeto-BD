<?php
include 'conexao.php';

$sql = "CALL check_low_quantity_products()";

$result = $mysqli->query($sql);

if ($result === false) {
    echo "Error executing stored procedure: " . $mysqli->error;
} else {
    echo "<h2>Produtos com Quantidade Baixa</h2>";
    echo "<table border='1'>";
    echo "<tr><th>ID</th><th>Nome Produto</th><th>Quantidade</th></tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["idProduto"] . "</td>";
        echo "<td>" . $row["nome"] . "</td>";
        echo "<td>" . $row["quantidade"] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
}

$mysqli->close();
?>