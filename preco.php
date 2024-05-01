<?php
include 'conexao.php';

if(isset($_GET['submit'])) {
    $min_price = $_GET['min_preco'];
    $max_price = $_GET['max_preco'];

    $sql = "SELECT * FROM produto WHERE valor_unitario BETWEEN $min_price AND $max_price";

    $result = $mysqli->query($sql);

    if ($result->num_rows > 0) {
        echo "<h2>Produtos na Faixa de Preço</h2>";
        echo "<table border='1'>";
        echo "<tr><th>ID</th><th>Nome do Produto</th><th>Valor</th></tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["idProduto"] . "</td>";
            echo "<td>" . $row["nome"] . "</td>";
            echo "<td>" . $row["valor_unitario"] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "Nenhum produto encontrado na faixa de preço especificada.";
    }
} else {
    echo "O formulário não foi enviado.";
}

$mysqli->close();
?>
