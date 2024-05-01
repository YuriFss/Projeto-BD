<?php
include 'conexao.php';

$id = $_GET['id'];

$sql = "SELECT * FROM compra WHERE id=$id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    echo "ID: " . $row["idCompra"]. " - IDCliente: " . $row["idCliente"]. " - IDvendedor: " . $row["idVendedor"]. " - IDProduto " . $row["idProduto"]. " - Data: " . $row["Data"]. " - Total: " . $row["Total"]."<br>";
} else {
    echo "Compra não encontrada";
}

$conn->close();
?>