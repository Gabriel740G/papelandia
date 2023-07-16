<?php

    if(isset($_POST['submit'])) {
        //print_r($_POST['user']);
        //print_r($_POST['pass']);
        //print_r($_POST['email']);

        include_once('config.php');

        $nome = $_POST['user'];
        $senha = $_POST['pass'];
        $email = $_POST['email'];

        $result = mysqli_query($conexao, "INSERT INTO usuarios(nome,senha,email) VALUES ('$nome','$senha','$email')");

        header('Location: index.php');
    }

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilos/cadastro.css">
    <link rel="shortcut icon" href="imagens/logo.jpg" type="image/x-icon">
    <title>Papelaria Papelandia - cadastre-se</title>
</head>
<body>
    <a href="index.php">
        <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-box-arrow-left" viewBox="0 0 16 16" id="sair">
            <path fill-rule="evenodd" d="M6 12.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 1-1 0v-2A1.5 1.5 0 0 1 6.5 2h8A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 5 12.5v-2a.5.5 0 0 1 1 0v2z"/>
            <path fill-rule="evenodd" d="M.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L1.707 7.5H10.5a.5.5 0 0 1 0 1H1.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3z"/>
          </svg>
    </a>
    <header>
        <img src="imagens/logo.jpg" alt="logo" class="logo">
        <h2>Cadastre-se preenchendo o formulário abaixo!</h2>
    </header>
    <div class="cadastro">
        <form action="cadastro.php" method="post">
            <input type="text" name="user" id="usuario" placeholder="Crie seu nome de usuário:" required>
            <br>
            <input type="text" name="pass" id="senha" placeholder="Crie sua senha:" required>
            <br>
            <input type="email" name="email" id="email" placeholder="Digite seu email:" required>
            <br>
            <input type="submit" name="submit" value="Cadastrar">
        </form>
    </div>
</body>
</html>