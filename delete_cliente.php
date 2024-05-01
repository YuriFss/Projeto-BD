<?php
    include("conexao.php");

    if(isset($_POST['submit'])) {

        $id = $_POST["ID"];
        $id = mysqli_real_escape_string($mysqli, $id);

        $query = "DELETE FROM cliente WHERE idCliente = '$id'";

        if(mysqli_query($mysqli, $query)) {
            if(mysqli_affected_rows($mysqli) > 0) {
                echo "Cliente deletado com sucesso.";
            } else {
                echo "Nenhuma cliente encontrado com o ID especificado.";
            }
        } else {
            echo "Erro ao deletar cliente: " . mysqli_error($mysqli);
        }
    }
?>
