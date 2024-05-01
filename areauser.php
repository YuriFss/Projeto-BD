<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <title>Barzin - Página Inicial</title>

    <style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
        }

        .container {
            margin-top: 50px;
        }

        .btn-container {
            margin-top: 20px;
            text-align: center;
        }

        .btn-custom {
            width: 200px;
            margin-bottom: 10px;
        }

        h1 {
            text-align: center;
            color: #007bff;
            margin-bottom: 30px;
        }
    </style>
</head>
<body>
    <div class="container">
        <?php
        session_start();
        if(isset($_SESSION['login_user'])) {
            echo "<h1 class='card-title'>Bem-vindo, " . $_SESSION['login_user'] . "!</h1>";
        } else {
            header("Location: logincliente.html");
            exit();
        }
        ?>

        <div class="row justify-content-md-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h1 class="card-title">Área do Cliente</h1>
                        <div class="btn-container">
                            <button name="dadoscadastrais" onclick="window.location.href='dados_cadastrais.php'" class="btn btn-primary btn-custom">Dados Cadastrais</button>
                            <button name="historicocompra" onclick="window.location.href='historico_compra.php'" class="btn btn-primary btn-custom">Historico de Compra</button>
                            <button name="realizarcompra" onclick="redirect('compra_cliente.php')" class="btn btn-primary btn-custom">Realizar Compra</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function redirect(url){
            window.location.href = url;
        }
    </script>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
            crossorigin="anonymous"></script>
</body>
</html>
<!--
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
        integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13"
        crossorigin="anonymous"></script>
-->
</body>
</html>
