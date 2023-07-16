<?php

    if(!empty($_GET['id'])) {
        include_once('config.php');

        $id = $_GET['id'];

        $sqlSelect = "SELECT * FROM produtos WHERE id=$id";

        $result = $conexao->query($sqlSelect);

        if($result->num_rows > 0) {
            while($user_data = mysqli_fetch_assoc($result)) {
                $produto = $user_data['nome_produto'];
                $valorunitario = $user_data['valor_unitario'];
                $estoque = $user_data['estoque'];  
            } 
        } else {
            header('Location: produtosregistrados.php');
        }
    } else {
        header('Location: produtosregistrados.php');
    }

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilos/registroprodutos.css">
    <link rel="shortcut icon" href="imagens/logo.jpg" type="image/x-icon">
    <title>Papelaria Papelandia</title>
    <style>
        #estoque {
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
        <h2>Edite o registro do produto preenchendo o formulário abaixo</h2>
        <div class="cadastro-produtos">
            <form action="saveEdit2.php" method="post">
                <input type="text" name="nome_produto" id="produto" placeholder="Qual é o produto?" value="<?php echo $produto ?>" required>
                <br>
                <input type="text" name="valor_unitario" id="valoruni" placeholder="Valor do produto:" value="<?php echo $valorunitario ?>" required>
                <br>
                <input type="text" name="estoque" id="estoque" placeholder="Está disponível?:" value="<?php echo $estoque ?>" required>
                <br>
                <input type="hidden" name="id" value="<?php echo $id?>">
                <input type="submit" name="update" value="Enviar">
            </form>
        </div>
    </main>
</body>
</html>