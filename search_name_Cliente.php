<?php
include 'conexao.php';

$nome = $_GET['nome'];

$sql = "SELECT * FROM cliente WHERE nome LIKE '%$nome%'";

$result = $mysqli->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "ID: " . $row["idCliente"]. " - Nome: " . $row["nome"]. " - CPF " . $row["CPF"]. " - Telefone: " . $row["telefone"]."<br>";
    }
} else {
    echo "Nenhum resultado encontrado";
}

$mysqli->close();
?>