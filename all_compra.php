<?php
include 'conexao.php';

$sql = "SELECT * FROM compra";
$result = $mysqli->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "ID: " . $row["idCompra"]. " - IDCliente: " . $row["idCliente"]. " - IDvendedor: " . $row["idVendedor"]. " - IDProduto " . $row["idProduto"]. " - Data: " . $row["dia"]. " - Total: " . $row["Total"]."<br>";
    }
} else {
    echo "Nenhuma compra encontrada";
}

$mysqli->close();
?>