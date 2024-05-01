<?php
    include("conexao.php");

    if(isset($_POST['submit'])) {

        $id = $_POST["ID"];
        $id = mysqli_real_escape_string($mysqli, $id);

        $query = "DELETE FROM produto WHERE idProduto = '$id'";

        if(mysqli_query($mysqli, $query)) {
            if(mysqli_affected_rows($mysqli) > 0) {
                echo "produto deletado com sucesso.";
            } else {
                echo "Nenhuma produto encontrado com o ID especificado.";
            }
        } else {
            echo "Erro ao deletar produto: " . mysqli_error($mysqli);
        }
    }
?>
