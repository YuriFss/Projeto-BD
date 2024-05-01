<?php
include 'conexao.php';

$id = $_POST['ID'];
$nome = $_POST['nome'];
$quantidade = $_POST['quantidade'];
$valor = $_POST['valor'];
$categoria = $_POST['categoria'];

$sql = "UPDATE produto SET nome='$nome', quantidade='$quantidade', valor_unitario='$valor', categoria= '$categoria' WHERE idProduto=$id";

if ($mysqli->query($sql) === TRUE) {
    echo "Produto alterado com sucesso";
} else {
    echo "Erro ao alterar Produto: " . $mysqli->error;
}

$mysqli->close();
?>
