<?php
session_start();
include_once('config.php');

if(!empty($_GET['search'])) {
    $data = $_GET['search'];
    $sql = "SELECT * FROM vendas WHERE id LIKE '%$data%' or produto LIKE '%$data%' or data_hora LIKE '%$data%' ORDER BY id DESC";
} else {
    $sql = "SELECT * FROM vendas ORDER BY id DESC";
}
$result = $conexao->query($sql);


?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilos/historicovendas.css">
    <link rel="shortcut icon" href="imagens/logo.jpg" type="image/x-icon">
    <title>Papelaria Papelandia</title>
    <style>
        a > svg {
            padding: 10px;
        }

        .box-search {
            display: flex;
            justify-content: center;
            align-items: center;
            position: absolute;
            top: 11%;
            left: 20%;
            gap: 1%;
        }

        #pesquisar {
            padding: 10px;
            width: 22em;
        }

        #botao-search {
            padding: 8px;
            width: 40px;
            height: 39px;
            cursor: pointer;
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
        <div class="box-search">
            <input type="search" name="search" id="pesquisar" placeholder="Pesquisar">
            <button id="botao-search" onclick="searchData()">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
            </svg>
            </button>
        </div>
        <div class="m-5">
        <table class="table">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Quantidade</th>
                <th scope="col">Produto</th>
                <th scope="col">Valor Total</th>
                <th scope="col">Forma de Pagamento</th>
                <th scope="col">Data e Hora</th>
                <th scope="col">...</th>
                </tr>
            </thead>
            <tbody>
                <?php
                   while($user_data = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>".$user_data['id']."</td>";
                        echo "<td>".$user_data['quantidade']."</td>";
                        echo "<td>".$user_data['produto']."</td>";
                        echo "<td>".$user_data['valortotal']."</td>";
                        echo "<td>".$user_data['forma_pagamento']."</td>";
                        echo "<td>".$user_data['data_hora']."</td>";
                        echo "<td>
                            <a class='editar' href='edit.php?id=$user_data[id]'>
                            <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil' viewBox='0 0 16 16'>
                            <path d='M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z'/>
                            </svg>
                            </a>
                            <a class='excluir' href='delete.php?id=$user_data[id]'>
                            <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash-fill'viewBox='0 0 16 16'>
                            <path d='M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z'/>
                            </svg>
                            </a>
                        </td>";
                        echo "</tr>";
                   }
                ?>
            </tbody>
            </table>
        </div>
    </main>
</body>
<script>
    var search = document.getElementById('pesquisar')

    search.addEventListener("keydown", function(event) {
        if(event.key === "Enter") {
            searchData()
        }
    })

    function searchData() {
        window.location = 'historicovendas.php?search='+search.value
    }
</script>
</html>