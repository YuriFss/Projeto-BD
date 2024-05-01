<?php
include 'conexao.php';

$id = $_POST['ID'];
$nome = $_POST['nome'];
$CPF = $_POST['CPF'];
$telefone = $_POST['telefone'];
$login = $_POST['login'];
$senha = $_POST['password'];

$sql = "UPDATE cliente SET nome='$nome', CPF='$CPF', telefone='$telefone', login = '$login', password='$senha'  WHERE idCliente=$id";

if ($mysqli->query($sql) === TRUE) {
    echo "Cliente alterado com sucesso";
} else {
    echo "Erro ao alterar cliente: " . $mysqli->error;
}

$mysqli->close();
?>
