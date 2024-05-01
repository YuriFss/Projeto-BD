<?php
session_start();
if(isset($_SESSION['login_user'])) {

    include("conexao.php");

    $username = mysqli_real_escape_string($mysqli, $_SESSION['login_user']);

    $query = "SELECT * FROM cliente WHERE login = '$username'";
    $result = mysqli_query($mysqli, $query);

    if($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        echo "<h1>Informações Cadastrais de " . $row['login'] . "</h1>";
        echo "<p>Nome: " . $row['nome'] . "</p>";
        echo "<p>Telefone: " . $row['telefone'] . "</p>";
        echo "<p>CPF " . $row['CPF'] . "</p>";
        echo "<p>login: " . $row['login'] . "</p>";
    } else {
        echo "Erro ao buscar informações do usuário.";
    }

    mysqli_free_result($result);

    mysqli_close($mysqli);
} else {
    header("Location: logincliente.html");
    exit();
}
?>
