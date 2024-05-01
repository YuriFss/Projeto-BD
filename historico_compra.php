<?php

session_start();
if(isset($_SESSION['login_user'])) {
    include 'conexao.php';

    $username = mysqli_real_escape_string($mysqli, $_SESSION['login_user']);

    $query = "SELECT idCliente FROM cliente WHERE nome = ?";
    $stmt_username = $mysqli->prepare($query);
    $stmt_username->bind_param("s", $username);
    $stmt_username->execute();
    $stmt_username->bind_result($idCliente);
    
    $stmt_username->fetch();
    $stmt_username->close();

    if (!$idCliente) {
        echo "Erro: Cliente não encontrado.";
        exit();
    }

    $sql = "SELECT cli.idCliente, cli.nome AS nome_cliente, cp.idCompra, cp.pagamento,
                p.idProduto, p.nome, p.valor_unitario 
            FROM cliente cli
            INNER JOIN compra cp ON cli.idCliente = cp.idCliente
            INNER JOIN produto p ON cp.idProduto = p.idProduto
            WHERE cli.idCliente = ?";

    $stmt = $mysqli->prepare($sql);

    if ($stmt === false) {
        echo "Erro na preparação da consulta SQL: " . $mysqli->error;
        exit();
    }

    $stmt->bind_param("i", $idCliente);

    $stmt->execute();

    $stmt->bind_result($idCliente, $nomeCliente, $idCompra, $pagamento, $idProduto, $nomeProduto, $valorUnitario);

    ?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Compras do Cliente</title>
        <style>
            table {
                border-collapse: collapse;
                width: 100%;
            }
            th, td {
                border: 1px solid #ddd;
                padding: 8px;
                text-align: left;
            }
            th {
                background-color: #f2f2f2;
            }
        </style>
    </head>
    <body>

    <h2>Compras do Cliente</h2>

    <table>
        <tr>
            <th>ID Cliente</th>
            <th>Nome Cliente</th>
            <th>ID Compra</th>
            <th>ID Produto</th>
            <th>Nome Produto</th>
            <th>Preço</th>
            <th>Pagamento</th>
        </tr>
        <?php
        while($stmt->fetch()) {
            echo "<tr>";
            echo "<td>".$idCliente."</td>";
            echo "<td>".$nomeCliente."</td>";
            echo "<td>".$idCompra."</td>";
            echo "<td>".$idProduto."</td>";
            echo "<td>".$nomeProduto."</td>";
            echo "<td>".$valorUnitario."</td>";
            echo "<td>".$pagamento."</td>";
            echo "</tr>";
        }if ($stmt->num_rows === 0) {
            echo "<tr><td colspan='6'>Nenhum resultado encontrado</td></tr>";
        }

        $stmt->close();
    } else {
        
    }
    ?>
</table>

</body>
</html>

