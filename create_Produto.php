<?php
        include 'conexao.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($mysqli->connect_error) {
        die("Connection failed: " . $mysqli->connect_error);
    }

    $nome = $_POST['nome'];
    $quantidade = $_POST['quantidade'];
    $valor = $_POST['valor'];
    $categoria = $_POST['categoria'];
    $sql = "INSERT INTO produto (nome, quantidade, valor_unitario, categoria) VALUES ('$nome', '$quantidade', '$valor', '$categoria')";

    if ($mysqli->query($sql) === TRUE) {
        echo "Registro criado com sucesso";
    } else {
        echo "Erro ao criar registro: " . $mysqli->error;
    }

    $mysqli->close();
}
?>