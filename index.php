<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilos/style.css">
    <link rel="shortcut icon" href="imagens/logo.png" type="image/x-icon">
    <title>Papelaria Papelandia - Login</title>
    <style>
        #showpass, label {
            cursor: pointer;
        }
    </style>
</head>
<body>
    <header>
        <img src="imagens/logo.png" alt="logo" class="logo">
        <h2>Bem vindo ao sistema papelaria papelandia
            <br>
            Faça seu login para iniciar suas vendas!
        </h2>
    </header>
    <main>
        <div class="login">
            <form action="testLogin.php" method="post">
                <input type="text" name="user" id="usuario" placeholder="Digite seu nome de usuário:" required>
                <br>
                <input type="password" name="pass" id="senha" placeholder="Digite sua senha:" required>
                <br>
                <div class="mostrarsenha">
                    <input type="checkbox" name="show" id="showpass" onclick="Aparecer()">
                    <label for="showpass">Mostrar senha</label>
                </div>
                <a href="recuperarsenha.php" class="recuperar-senha">Esqueceu a senha?</a>
                <br>
                <input type="submit" name="submit" value="Entrar">
            </form>
            <a href="cadastro.php">Não tem cadastro? Clique aqui e cadastre-se já!</a>
        </div>
    </main>
</body>
    <script src="JS/main.js"></script>
</html>