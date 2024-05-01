<?php
include 'conexao.php';

$nome = $_GET['nome'];

$sql = "SELECT * FROM produto WHERE nome LIKE '%$nome%'";

$result = $mysqli->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "ID: " . $row["idProduto"]. " - Nome: " . $row["nome"]. " - Quantidade " . $row["quantidade"]. " - Valor Unitario: " . $row["valor_unitario"]. " - Categoria: " . $row["categoria"]."<br>";
    }
} else {
    echo "Nenhum resultado encontrado";
}

$mysqli->close();
?>