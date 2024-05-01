<?php
    include("conexao.php");
    echo "Conexao feita";
    if(isset($_POST['submit'])) {
        echo "Formulario submetido";
        $login = $_POST["login"];
        $password = $_POST["password"];

        $login = stripcslashes($login);
        $password = stripcslashes($password);

        $login = mysqli_real_escape_string($mysqli, $login);
        $password = mysqli_real_escape_string($mysqli, $password);

        $query = mysqli_query($mysqli, "Select * from cliente where login = '$login' and password = '$password'");

        if (!$query) {
            echo "Erro na consulta: " . mysqli_error($mysqli);
        } else {
            echo "Consulta foi feita";
            $rows = mysqli_num_rows($query);
            if($rows == 1) {
                echo "<h2>Login Successfully</h2>";
                session_start();
                $_SESSION['login_user'] = $login;
                header("Location: areauser.php");
                exit();
            } else {
                echo "<h2>Login failed</h2>";
                header("Location: logincliente.html");
                exit();
            }
        }
    }
?>
