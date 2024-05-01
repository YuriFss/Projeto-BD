<?php
include 'conexao.php';

$id = $_GET['id'];

$sql = "SELECT * FROM produto WHERE id=$id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    echo "ID: " . $row["idProduto"]. " - Nome: " . $row["nome"]. " - Quantidade " . $row["quantidade"]. " - Valor Unitario: " . $row["valor_unitario"]. " - Categoria: " . $row["categoria"]."<br>";
} else {
    echo "produto não encontrado";
}

$conn->close();
?>