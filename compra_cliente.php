<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <title>Barzin - Criar Compra</title>

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
            echo "<h1 class='card-title'>Usuario: " . $_SESSION['login_user'] . "!</h1>";
        } else {
            header("Location: logincliente.html");
            exit();
        }
        ?>
        <div class="row justify-content-md-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <h1 class="card-title">Criar Compra</h1>
                        <form name="deletionform" action="create_Compra_cliente.php" method="POST">
                            <div class="mb-3">
                                <label for="exampleInputidCliente" class="form-label">ID Cliente</label>
                                <input type="text" class="form-control" name="idCliente">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputidVendedor" class="form-label">ID Vendedor</label>
                                <input type="text" class="form-control" name="idVendedor">
                            </div>
                            <div id="product_fields">
                                <div class="product_field">
                                    <div class="mb-3">
                                        <label for="exampleInputidProduto" class="form-label">ID Produto</label>
                                        <select class="form-control" name="idProduto[]" multiple>
                                        <?php
                                        include 'conexao.php';
                                        
                                        $sql = "SELECT idProduto, nome FROM produto";
                                
                                        $result = $mysqli->query($sql);
                                
                                        if ($result->num_rows > 0) {
                                            while ($row = $result->fetch_assoc()) {
                                                echo '<option value="' . $row['idProduto'] . '">' . $row['nome'] . '</option>';
                                            }
                                        } else {
                                            echo '<option value="">Nenhum produto disponível</option>';
                                        }
                                
                                        $mysqli->close();
                                        ?>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputQuantidade" class="form-label">Quantidade</label>
                                        <input type="number" class="form-control" name="quantidade[]" min="1">
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <button type="button" class="btn btn-success btn-sm" id="add_product">Adicionar Produto</button>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputData" class="form-label">Data</label>
                                <input type="date" class="form-control" name="Data">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputData" class="form-label">Pagamento</label>
                                <input type="text" class="form-control" name="pagamento">
                            </div>
                            <button name="submit" class="btn btn-primary btn-custom">Criar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
        integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13"
        crossorigin="anonymous"></script>
    -->

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            document.getElementById('add_product').addEventListener('click', function () {
                var productField = document.querySelector('.product_field').cloneNode(true);
                document.getElementById('product_fields').appendChild(productField);
            });
        });
    </script>
</body>

</html>
