<?php
include 'conexao.php';

$sql = "SELECT * FROM produto";
$result = $mysqli->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "ID: " . $row["idProduto"]. " - Nome: " . $row["nome"]. " - Quantidade " . $row["quantidade"]. " - Valor Unitario: " . $row["valor_unitario"]. " - Categoria: " . $row["categoria"]."<br>";
    }
} else {
    echo "Nenhum Produto encontrado";
}

$mysqli->close();
?>