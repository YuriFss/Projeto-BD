<?php
include 'conexao.php';

$id = $_GET['ID'];

$sql = "SELECT * FROM compra WHERE idCompra LIKE '$id'";

$result = $mysqli->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "ID: " . $row["idCompra"]. " - IDCliente: " . $row["idCliente"]. " - IDvendedor: " . $row["idVendedor"]. " - IDProduto " . $row["idProduto"]. " - Data: " . $row["dia"]. " - Total: " . $row["Total"]."<br>";
    }
} else {
    echo "Nenhum resultado encontrado";
}

$mysqli->close();
?>