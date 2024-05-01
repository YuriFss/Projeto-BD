<?php
include 'conexao.php';

$id = $_GET['id'];

$sql = "SELECT * FROM cliente WHERE id=$id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    echo "ID: " . $row["id"]. " - Nome: " . $row["nome"]. " - CPF " . $row["CPF"]. " - Telefone: " . $row["Telefone"]."<br>";
} else {
    echo "Cliente não encontrado";
}

$conn->close();
?>