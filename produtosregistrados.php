<?php
session_start();
include_once('config.php');

if(!empty($_GET['search'])) {
    $data = $_GET['search'];
    $sql = "SELECT * FROM produtos WHERE id LIKE '%$data%' or nome_produto LIKE '%$data%' or estoque LIKE '%$data%' ORDER BY id ASC";
} else {
    $sql = "SELECT * FROM produtos ORDER BY id ASC";
}
$result = $conexao->query($sql);

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilos/produtosregistrados.css">
    <link rel="stylesheet" href="estilos/media-screen.css" media="print">
    <link rel="shortcut icon" href="imagens/logo.jpg" type="image/x-icon">
    <title>Papelaria Papelandia</title>
    <style>
        table {
        width: 70%;
        border-collapse: collapse;
        position: absolute;
        top: 20%;
        left: 20%;
        }
        
        th, td {
            padding: 8px;
            text-align: center;
            border-bottom: 1px solid #ddd;
        }
        
        th {
            background-color: #424242;
            color: white;
        }
        
        tr:hover {
        background-color: #f5f5f5;
        }

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

        #botao-imprimir {
            padding: 10px;
            height: 45px;
            width: 53px;
            cursor: pointer;
            position: absolute;
            top: 9%;
            left: 86%;
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
    <div class="print">
        <button id="botao-imprimir" onclick="imprimirConteudo()">
        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-printer" viewBox="0 0 16 16">
        <path d="M2.5 8a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1z"/>
        <path d="M5 1a2 2 0 0 0-2 2v2H2a2 2 0 0 0-2 2v3a2 2 0 0 0 2 2h1v1a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2v-1h1a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-1V3a2 2 0 0 0-2-2H5zM4 3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1v2H4V3zm1 5a2 2 0 0 0-2 2v1H2a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-1v-1a2 2 0 0 0-2-2H5zm7 2v3a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1z"/>
        </svg>
        </button>
    </div>
    <table class="table">
            <thead>
                <tr>
                <th scope="col" class="id">#</th>
                <th scope="col">Produto</th>
                <th scope="col">Valor Unitário</th>
                <th scope="col">Estoque</th>
                <th scope="col" class="acoes">...</th>
                </tr>
            </thead>
            <tbody>
                <?php
                   while($user_data = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>".$user_data['id']."</td>";
                        echo "<td>".$user_data['nome_produto']."</td>";
                        echo "<td>".$user_data['valor_unitario']."</td>";
                        echo "<td>".$user_data['estoque']."</td>";
                        echo "<td>
                            <a class='editar' href='edit2.php?id=$user_data[id]'>
                            <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil' viewBox='0 0 16 16'>
                            <path d='M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z'/>
                            </svg>
                            </a>
                            <a class='excluir' href='delete2.php?id=$user_data[id]'>
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
        window.location = 'produtosregistrados.php?search='+search.value
    }

    function imprimirConteudo() {
        window.print();
    }
</script>
</html>