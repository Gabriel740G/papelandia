<?php
    session_start();
    include_once('config.php');
    if((!isset($_SESSION['user']) == true) and (!isset ($_SESSION['pass']) == true)) {
        unset($_SESSION['user']);
        unset($_SESSION['pass']);
        header('Location: index.php');
    }
    $logado = $_SESSION['user'];

    $sql = "SELECT * FROM usuarios ORDER BY id DESC";

    $result = $conexao->query($sql);

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilos/home.css">
    <link rel="shortcut icon" href="imagens/logo.jpg" type="image/x-icon">
    <title>Papelaria Papelandia - Home</title>
    <style>
        #versiculo {
        text-align: center;
        color: white;
        position: absolute;
        top: 76%;
        left: 22%;
        display: flex;
    }
    </style>
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
        <div id="data"></div>
        <div id="hora"></div>
        <a href="sair.php">
            <svg xmlns="http://www.w3.org/2000/svg" width="45" height="45" fill="currentColor" class="bi bi-box-arrow-right" viewBox="0 0 16 16" id="sair">
                <path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0v2z"/>
                <path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z"/>
              </svg>
        </a>
        <?php
         echo "<h1>
             Olá, Seja bem vindo $logado!
             <br>
             Como posso te ajudar hoje?
         </h1>";
        ?>
        
        <a href="https://web.whatsapp.com/" target="_blank" id="whatsapp">
            <svg xmlns="http://www.w3.org/2000/svg" width="45" height="45" fill="currentColor" class="bi bi-whatsapp" viewBox="0 0 16 16" id="whats">
                <path d="M13.601 2.326A7.854 7.854 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.933 7.933 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.898 7.898 0 0 0 13.6 2.326zM7.994 14.521a6.573 6.573 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.557 6.557 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592zm3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.729.729 0 0 0-.529.247c-.182.198-.691.677-.691 1.654 0 .977.71 1.916.81 2.049.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232z"/>
              </svg>
              <p class="textowhats">Clique aqui para acessar o Whatsapp!</p>
        </a>
        <a href="https://outlook.live.com/mail/0/" id="email" target="_blank">
            <svg xmlns="http://www.w3.org/2000/svg" width="45" height="45" fill="currentColor" class="bi bi-envelope-at" viewBox="0 0 16 16" id="icone-email">
                <path d="M2 2a2 2 0 0 0-2 2v8.01A2 2 0 0 0 2 14h5.5a.5.5 0 0 0 0-1H2a1 1 0 0 1-.966-.741l5.64-3.471L8 9.583l7-4.2V8.5a.5.5 0 0 0 1 0V4a2 2 0 0 0-2-2H2Zm3.708 6.208L1 11.105V5.383l4.708 2.825ZM1 4.217V4a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v.217l-7 4.2-7-4.2Z"/>
                <path d="M14.247 14.269c1.01 0 1.587-.857 1.587-2.025v-.21C15.834 10.43 14.64 9 12.52 9h-.035C10.42 9 9 10.36 9 12.432v.214C9 14.82 10.438 16 12.358 16h.044c.594 0 1.018-.074 1.237-.175v-.73c-.245.11-.673.18-1.18.18h-.044c-1.334 0-2.571-.788-2.571-2.655v-.157c0-1.657 1.058-2.724 2.64-2.724h.04c1.535 0 2.484 1.05 2.484 2.326v.118c0 .975-.324 1.39-.639 1.39-.232 0-.41-.148-.41-.42v-2.19h-.906v.569h-.03c-.084-.298-.368-.63-.954-.63-.778 0-1.259.555-1.259 1.4v.528c0 .892.49 1.434 1.26 1.434.471 0 .896-.227 1.014-.643h.043c.118.42.617.648 1.12.648Zm-2.453-1.588v-.227c0-.546.227-.791.573-.791.297 0 .572.192.572.708v.367c0 .573-.253.744-.564.744-.354 0-.581-.215-.581-.8Z"/>
              </svg>
            <p class="textoemail">Clique aqui para acessar o e-mail!</p>
        </a>
        <p id="versiculo">"Buscai ao Senhor enquanto se pode achar, invocai-o enquanto está perto."
            <br>
            Isaías 55:6-12
        </p>
    </main>
</body>
    <script src="JS/home.js"></script>
    <script>

window.onload = function () {
    // Array com versículos bíblicos
    var versiculos = [
        "Guarda com toda a diligência o teu coração, porque dele procedem as fontes da vida. <br> Provérbios 4:23",
        "Mas buscai primeiro o Seu reino e a Sua justiça, <br>e todas estas coisas vos serão acrescentadas”. <br>Mateus 6:33",
        "Buscai ao Senhor enquanto se pode achar, invocai-o enquanto está perto. <br>Isaías 55:6-12",
        "Porque Deus amou o mundo de tal maneira que deu o seu Filho unigênito, <br>para que todo aquele que nele crê não pereça, mas tenha a vida eterna. <br>João 3:16",
        "Confie no Senhor de todo o seu coração e não se apoie em seu próprio entendimento. <br> Provérbios 3:5",
        "Deleite-se no Senhor, e ele atenderá aos desejos do seu coração. <br>Salmos 37:4",
        "Não tenha medo, pois estou com você; não desanime, pois sou o seu Deus. <br>Eu o fortalecerei e o ajudarei; eu o segurarei com a minha mão direita. <br>Isaías 41:10",
        "O Senhor é o meu pastor; nada me faltará. <br>Salmos 23:1"
    ];

    var divVersiculo = document.getElementById("versiculo");

    function exibirVersiculoAleatorio() {
        
        var numeroAleatorio = Math.floor(Math.random() * versiculos.length);
        var versiculoAleatorio = versiculos[numeroAleatorio];

        divVersiculo.innerHTML = versiculoAleatorio;
    }

    exibirVersiculoAleatorio();

    setInterval(exibirVersiculoAleatorio, 10000);
};




    </script>
</html>