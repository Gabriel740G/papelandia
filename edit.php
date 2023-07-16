<?php

    if(!empty($_GET['id'])) {
        include_once('config.php');

        $id = $_GET['id'];

        $sqlSelect = "SELECT * FROM vendas WHERE id=$id";

        $result = $conexao->query($sqlSelect);

        if($result->num_rows > 0) {
            while($user_data = mysqli_fetch_assoc($result)) {
                $quantidade = $user_data['quantidade'];
                $produto = $user_data['produto'];
                $valortotal = $user_data['valortotal'];
                $forma_pagamento = $user_data['forma_pagamento'];   
            } 
        } else {
            header('Location: historicovendas.php');
        }
    } else {
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
        h2 {
            transform: translateX(63%);
        }

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
        <h2>Edite os registros da venda</h2>
        <div class="registrar-venda">
            <form action="saveEdit.php" method="post">
                <input type="number" name="quantidade" id="quantidade" placeholder="Qual é a quantidade?" value="<?php echo $quantidade ?>" required>
                <br>
                <input type="text" name="produto" id="produto" placeholder="Qual é o produto?" value="<?php echo $produto ?>" required>
                <br>
                <input type="text" name="valortotal" id="valortotal" placeholder="Valor Total:" value="<?php echo $valortotal ?>" required>
                <br>
                <input type="text" name="_pagamento" id="formapag" placeholder="Qual foi a forma de pagamento?" value="<?php echo $forma_pagamento ?>" required><br>
                <input type="hidden" name="id" value="<?php echo $id?>">
                <input type="submit" name="update" value="Enviar">
            </form>
        </div>
    </main>
</body>
</html>