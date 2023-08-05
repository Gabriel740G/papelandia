<?php
    session_start();
    
    if(isset($_POST['submit'])) {
        //print_r($_POST['user']);
        //print_r($_POST['pass']);
        //print_r($_POST['email']);

        include_once('config.php');

        $produto = $_POST['produto'];
        $valorunitario = $_POST['valoruni'];

        $result = mysqli_query($conexao, "INSERT INTO produtos(nome_produto,valor_unitario) VALUES ('$produto','$valorunitario')");

        header('Location: produtosregistrados.php');
    }

    if((!isset($_SESSION['user']) == true) and (!isset ($_SESSION['pass']) == true)) {
        unset($_SESSION['user']);
        unset($_SESSION['pass']);
        header('Location: index.php');
    }


?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilos/registroprodutos.css">
    <link rel="shortcut icon" href="imagens/logo.png" type="image/x-icon">
    <title>Papelaria Papelandia</title>
</head>
<body>
    <div class="menulateral">
        <img src="imagens/banner.jpeg" alt="banner" class="banner">
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
        <h2>Registre um novo produto preenchendo o formulário abaixo</h2>
        <div class="cadastro-produtos">
            <form action="registroprodutos.php" method="post">
                <input type="text" name="produto" id="produto" placeholder="Qual é o produto?" required>
                <br>
                <input type="text" name="valoruni" id="valoruni" placeholder="Valor do produto:" required>
                <br>
                <input type="submit" name="submit" value="Enviar">
            </form>
        </div>
    </main>
</body>
</html>