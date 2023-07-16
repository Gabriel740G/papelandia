<?php

    if(isset($_POST['submit'])) {
        //print_r($_POST['user']);
        //print_r($_POST['pass']);
        //print_r($_POST['email']);

        include_once('config.php');

        $quantidade = $_POST['quantidade'];
        $produto = $_POST['produto'];
        $valortotal = $_POST['valortotal'];
        $formaspagamento = $_POST['tipo_pagamento'];

        $result = mysqli_query($conexao, "INSERT INTO vendas(quantidade,produto,valortotal,forma_pagamento) VALUES ('$quantidade','$produto','$valortotal','$formaspagamento')");

        header('Location: historicovendas.php');
    }

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilos/registrovendas.css">
    <link rel="shortcut icon" href="imagens/logo.jpg" type="image/x-icon">
    <title>Papelaria Papelandia</title>
    <style>
        #formapag {
            padding: 10px;
            width: 300px;
            border-radius: 15px;
            margin-bottom: 30px;
        }
    </style>
</head>
<body>
    <div class="menulateral">
        <img src="imagens/banner.jpg" alt="banner" class="banner">
        <nav>
            <ul>
                <li><a href="home.php">Início</a></li>
                <li>
                    <details>
                        <summary>Vendas</summary>
                        <a href="historicovendas.php">Histórico de Vendas</a>
                        <br>
                        <a href="registrovendas.php">Registrar Vendas</a>
                    </details>
                </li>
                <li>
                    <details>
                        <summary>Produtos</summary>
                        <a href="produtosregistrados.php">Produtos Registrados</a>
                        <br>
                        <a href="registroprodutos.php">Registrar Produtos</a>
                    </details>
                </li>
            </ul>
        </nav>
    </div>
    <main>
        <h2>Registre uma nova venda preenchendo os dados do formulário</h2>
        <div class="registrar-venda">
            <form action="registrovendas.php" method="post">
                <input type="number" name="quantidade" id="quantidade" placeholder="Qual é a quantidade?" required>
                <br>
                <input type="text" name="produto" id="produto" placeholder="Qual é o produto?" required>
                <br>
                <input type="text" name="valortotal" id="valortotal" placeholder="Valor Total:" required>
                <br>
                <input type="text" name="tipo_pagamento" id="formapag" placeholder="Qual foi a forma de pagamento?">
                <br>
                <input type="submit" name="submit" value="Enviar">
            </form>
        </div>
    </main>
</body>
</html>