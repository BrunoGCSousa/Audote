<!-- 
 nessa parte em php estamos vendo a configuração na primeira linha de código e então,
armazena o id do usuário logado pelo php,
 se sim na linha as linha do resultado irá rodar um código sql e vai verificar no banco
 basicamente uma verificação no banco para entender que o usuário fará em seguid
 O php vai verificar se a $_SESSION não está nulo, e ai vai selecionar o id que está configurado na sessão atual
 e colocará a tabela na variavel result (resultado), e então é usado uma variavel row (linha) para guardar as linhas da tabela
 caso o id esteja nulo, ele voltará para a página de cadastro -->

<?php

    if (!empty($_GET['search'])) {
        $data = $_GET['search'];
        $sql = "SELECT * FROM pets WHERE 
        nomePet LIKE '%$data%' OR
        tipoAnimal LIKE '%$data%' OR
        raca LIKE '%$data%' OR
        idadePet LIKE '%$data%' OR
        porte LIKE '%$data%' OR
        sexo LIKE '%$data%' OR
        descricao LIKE '%$data%'
        ORDER BY idPet DESC";
    } else {
        $sql = "SELECT * FROM pets";
    }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/34e911297d.js" crossorigin="anonymous"></script>
    <title>Index</title>
    <link rel="stylesheet" href="style-inicio.css">
    <link rel="stylesheet" href="src/style/audote.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" />
</head>

<body>

    <?php include('./secoes/nav.php') ?>

    <div class="boas-vindas">
        <h2>Bem vindo <strong>
                <?php echo $row["nome"]; ?>
            </strong></h2>
    </div>

    <div class="pets">
        <h2 class="h1 text-center my-5">Veja os nossos <strong>PETS</strong></h2>

        <form class="d-flex busca">
            <input class="pesquisar-input" type="search" placeholder="Pesquisar..." id="pesquisar">
            <div class="botao-pesquisar">
                <button type="submit" onclick="busca(event)"><i class="fa-solid fa-magnifying-glass"></i></button>
            </div>
        </form>
        <div class="lista-de-imagens row">

            <?php
            $stmt = $pdo->prepare($sql); // prepara o codigo sql
            $stmt->execute(); // executa e seleciona todos os dados da tabela pets
            
            while ($row = $stmt->fetch(PDO::FETCH_BOTH)) { // cria um loop que roda todos os dados da tabela e traz eles em formato de matriz
            
                echo "
                        <div class='pet col-xl-3 col-md-6' style=\"--imagem-fundo:url('$row[10]');\">
                        <div class='preto'></div>
                        <div class='descricao'>
                            <h2>$row[1]</h2>
                            <h3>$row[2] $row[6] | $row[3]</h3>
                            <div class='oculto'>
                                <h4>Idade: $row[4] anos <br>
                                    Tamanho: $row[5] <br>
                                    Sexo: $row[6]</h4>
                                    <p>$row[7]</p>
                                    <ul>
                                        <li>$row[8]</li>
                                        <li>$row[9]</li>
                                    </ul>
                                    <h4><a href='pet.php?idPet=$row[0]'>Adote já</a></h4>
                            </div>
                        </div>
                    </div>
                    ";

            }
            ?>
        </div>
    </div>


    <script>
        var search = document.getElementById('pesquisar');

        search.addEventListener("keydown", function (event) {
            if (event.key === "Enter") {
                searchData();
            }
        });

        function busca(event) {
            event.preventDefault();
            window.location = 'audote.php?search=' + search.value;
        }

    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="./src/js/app.js"></script>
</body>

</html>