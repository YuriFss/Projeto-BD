<?php
    include("conexao.php");

    if(isset($_POST['submit'])) {

        $id = $_POST["ID"];
        $id = mysqli_real_escape_string($mysqli, $id);

        $query = "DELETE FROM compra WHERE idCompra = '$id'";

        if(mysqli_query($mysqli, $query)) {
            if(mysqli_affected_rows($mysqli) > 0) {
                echo "Compra deletada com sucesso.";
            } else {
                echo "Nenhuma compra encontrada com o ID especificado.";
            }
        } else {
            echo "Erro ao deletar compra: " . mysqli_error($mysqli);
        }
    }
?>
