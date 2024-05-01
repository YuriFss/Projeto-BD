<?php
    include("conexao.php");
    echo "Conexao feita teste";
    if(isset($_POST['submit'])) {
        echo "Formulario submetido";
        $login = $_POST["login"];
        $password = $_POST["password"];

        $login = stripslashes($login);
        $password = stripslashes($password);

        $login = mysqli_real_escape_string($mysqli, $login);
        $password = mysqli_real_escape_string($mysqli, $password);

        $query = "SELECT * FROM vendedor WHERE login = '$login' AND password = '$password'";
        $result = mysqli_query($mysqli, $query);

        if (!$result) {
            die("Erro na consulta: " . mysqli_error($mysqli));
        }
        
        $rows = mysqli_num_rows($result);
        if($rows == 1) {
            echo "<h2>Login Successfully</h2>";
            header("Location: areavendedor.html");
            exit();
        } else {
            echo "<h2>Login failed</h2>";
            header("Location: loginvendedor.html");
            exit();
        }
    }
?>