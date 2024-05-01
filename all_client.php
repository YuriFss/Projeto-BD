<?php
include 'conexao.php';

$sql = "SELECT * FROM cliente";
$result = $mysqli->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "ID: " . $row["idCliente"]. " - Nome: " . $row["nome"]. " - CPF: " . $row["CPF"]. " - Telefone: " . $row["telefone"]."<br>";
    }
} else {
    echo "Nenhum cliente encontrado";
}

$mysqli->close();
?>