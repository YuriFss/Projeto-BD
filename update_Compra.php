<?php
include 'conexao.php';

$id = $_POST['idCompra'];
$idCliente = $_POST['idCliente'];
$idVendedor = $_POST['idVendedor'];
$idProduto = $_POST['idProduto'];
$Dia = $_POST['Dia'];
$Total = $_POST['Total'];

$sql = "UPDATE compra SET idCliente='$idCliente', idVendedor='$idVendedor', idProduto='$idProduto', dia='$Dia', Total='$Total' WHERE idCompra=$id";

if ($mysqli->query($sql) === TRUE) {
    echo "Compra alterada com sucesso";
} else {
    echo "Erro ao alterar compra: " . $mysqli->error;
}

$mysqli->close();
?>
