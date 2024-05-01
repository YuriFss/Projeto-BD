<?php
include 'conexao.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($mysqli->connect_error) {
        die("Connection failed: " . $mysqli->connect_error);
    }

    if (isset($_POST['idCliente'], $_POST['idVendedor'], $_POST['idProduto'], $_POST['Data'], $_POST['quantidade'], $_POST['pagamento'])) {

        $cliente = $_POST['idCliente'];
        $vendedor = $_POST['idVendedor'];
        $dia = $_POST['Data'];
        $quantidades = $_POST['quantidade'];
        $idprodutos = $_POST['idProduto'];
        echo "ID do Produto selecionado(s): ";
        print_r($_POST['idProduto']);
        $pagamento = $_POST['pagamento'];

        $query_compra = "INSERT INTO compra (idCliente, idVendedor, idProduto, dia, quantidade, pagamento) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt_compra = $mysqli->prepare($query_compra);
        $stmt_compra->bind_param("iiisis", $cliente, $vendedor, $idproduto, $dia, $quantidade, $pagamento);

        $query_estoque = "UPDATE produto SET quantidade = quantidade - ? WHERE idProduto = ?";
        $stmt_estoque = $mysqli->prepare($query_estoque);
        $stmt_estoque->bind_param("ii", $quantidade, $idproduto);

        $erro_estoque = false;

        foreach ($idprodutos as $key => $idproduto) {
            $quantidade = $quantidades[$key];

            $stmt_verificar_estoque = $mysqli->prepare("SELECT quantidade FROM produto WHERE idProduto = ?");
            $stmt_verificar_estoque->bind_param("i", $idproduto);
            $stmt_verificar_estoque->execute();
            $stmt_verificar_estoque->store_result();
            
            if ($stmt_verificar_estoque->num_rows > 0) {
                $stmt_verificar_estoque->bind_result($quantidade_em_estoque);
                $stmt_verificar_estoque->fetch();

                if ($quantidade > $quantidade_em_estoque) {
                    echo "Erro: Produto ID $idproduto não possui estoque suficiente. Estoque atual: $quantidade_em_estoque<br>";
                    $erro_estoque = true;
                }
            } else {
                echo "Erro: Produto ID $idproduto não encontrado no estoque.<br>";
                $erro_estoque = true;
            }

            $stmt_verificar_estoque->close();
        }

        if (!$erro_estoque) {
            foreach ($idprodutos as $key => $idproduto) {
                $quantidade = $quantidades[$key];

                $stmt_compra->bind_param("iiisis", $cliente, $vendedor, $idproduto, $dia, $quantidade, $pagamento);
                $stmt_compra->execute();

                $stmt_estoque->bind_param("ii", $quantidade, $idproduto);
                $stmt_estoque->execute();
            }
            
            echo "Compra efetuada com sucesso.";
        } else {
            echo "Erro ao efetuar a compra. Por favor, verifique o estoque.";
        }

        $stmt_compra->close();
        $stmt_estoque->close();
    } else {
        echo "Por favor, preencha todos os campos.";
    }

    $mysqli->close();
}
?>
