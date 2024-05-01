<?php
include 'conexao.php';

$categoria = $_GET['categoria'];

$sql = "SELECT * FROM produto WHERE categoria LIKE '%$categoria%'";

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