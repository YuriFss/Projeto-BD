<?php
include 'conexao.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($mysqli->connect_error) {
        die("Connection failed: " . $mysqli->connect_error);
    }

    $nome = $_POST['nome'];
    $CPF = $_POST['CPF'];
    $telefone = $_POST['telefone'];
    $login = $_POST['login'];
    $senha = $_POST['password'];

    $sql = "INSERT INTO cliente (nome, CPF, telefone, login, password) VALUES ('$nome', '$CPF', '$telefone', '$login', '$senha')";

    if ($mysqli->query($sql) === TRUE) {
        echo "Registro criado com sucesso";
    } else {
        echo "Erro ao criar registro: " . $mysqli->error;
    }

    $mysqli->close();
}
?>