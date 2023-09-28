<?php
include('config.php');
// inclui a configuração do banco de dados do arquivo config.php

?>
<!DOCTYPE html>
<html lang="en" class="audote-root">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/34e911297d.js" crossorigin="anonymous"></script>
    <title>Index</title>
    <link rel="stylesheet" href="style-inicio.css">
    <link rel="stylesheet" href="src/style/pet.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="src/style/pgprincipal.css" />
</head>

<body>

    <?php include('./secoes/nav.php') ?>

    <?php

    $idPet = $_GET['idPet']; // pega o idPet de outra página com o método get
    if (isset($_SESSION["id"])) {

        $idUsuario = $_SESSION["id"];
        
        $stmtUsuario = $pdo->prepare("SELECT * FROM `usuarios` WHERE id = $idUsuario;");
        $stmtUsuario->execute(); 
        $rowUsuario = $stmtUsuario->fetch(PDO::FETCH_BOTH); 
    } else {
        $rowUsuario['nome'] = "";
    }
    
    $stmt = $pdo->prepare("SELECT * FROM `pets` WHERE idPet = $idPet;"); // prepara o código SQL   
    $stmt->execute(); // executa o código onde irá ser selecionado na tabela pets todos os campos com o idPet sendo igual ao selecionado
    $row = $stmt->fetch(PDO::FETCH_BOTH); // irá colocar uma matriz na variavel $row com todos os campos da tabela selecionada e com o filtro aplicado
    $caracTexto = $row['caracteristicas']; // salva os dados do banco de dados em uma variavel 
    $caracArray = explode(',', $caracTexto);
    ?>

    <!-- Sessão de detalhes do pet -->
    <section class="pet-details-area mt-100">
        <div class="container">
            <div class="row">
                <div>
                    <div class="pet-details-content">
                        <h4 class="title">
                            <?php echo $row['nomePet'] ?>
                        </h4>
                        <p>
                            <?php echo $row['descricao'] ?>
                        </p>
                        <div class="pet-details-img">
                            <img src="<?php echo $row['imagemPet'] ?>" alt="">
                        </div>
                        <h4 class="title">Características de
                            <?php echo $row['nomePet'] ?>
                        </h4>

                        <div class="caracteristicas">
                            <p>
                                <?php foreach ($caracArray as $caracteristica) {
                                    echo "<span class='caracteristica'> $caracteristica </span>";
                                } ?>
                            </p>
                        </div>

                        <div class="pet-dog-info">
                            <h5 class="title">Informações do Pet</h5>
                            <div class="row">
                                <div class="col-md-3 col-sm-4 col-6">
                                    <div class="pet-info-item">
                                        <h6>Sexo:</h6>
                                        <span>
                                            <?php echo $row['sexo'] ?>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-4 col-6">
                                    <div class="pet-info-item">
                                        <h6>Idade:</h6>
                                        <span>
                                            <?php echo $row['idadePet'] ?> ano(s)
                                        </span>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-4 col-6">
                                    <div class="pet-info-item">
                                        <h6>Tipo de animal:</h6>
                                        <span>
                                            <?php echo $row['tipoAnimal'] ?>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-4 col-6">
                                    <div class="pet-info-item">
                                        <h6>Porte:</h6>
                                        <span>
                                            <?php echo $row['porte'] ?>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-4 col-6">
                                    <div class="pet-info-item">
                                        <h6>Raça:</h6>
                                        <span>
                                            <?php echo $row['raca'] ?>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-4 col-6">
                                    <div class="pet-info-item">
                                        <h6>Vacinado:</h6>
                                        <span>
                                            <?php echo $row['vacinas'] ?>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-4 col-6">
                                    <div class="pet-info-item">
                                        <h6>Vermifugado:</h6>
                                        <span>
                                            <?php echo $row['vermifugado'] ?>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <a href="#" class="botao" id="adoteJaLink"><i class="fa-solid fa-paw"></i> Adote já</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Fim da sessão -->



    <script src="src/js/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="src/js/pgprincipal.js"></script>
    <script src="./src/js/app.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            document.getElementById("adoteJaLink").addEventListener("click", function (event) {
                event.preventDefault(); // Impede que o link execute o comportamento padrão de navegação

                var xhr = new XMLHttpRequest();
                xhr.open("POST", "controller/verificarCpf.php", true); 
                xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

                xhr.onreadystatechange = function () {
                    if (xhr.readyState === 4 && xhr.status === 200) {
                        // A resposta do servidor está pronta
                        console.log(xhr.responseText); // Verifique a resposta do servidor no console
                        var response = JSON.parse(xhr.responseText);

                        if (response.logado) {
                            if (response.cpfCadastrado) {
                                // O CPF está cadastrado
                                window.location.href = "https://api.whatsapp.com/send?phone=5511947285851&text=Ol%C3%A1,%20me%20chamo%20<?php echo $rowUsuario['nome'] ?>%20e%20quero%20adotar%20este%20pet:%20<?php echo $row['nomePet'] ?>%20ID:<?php echo $row['idPet']?>%0A";
                            } else {
                                // O CPF não está cadastrado
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Quase lá!',
                                    text: 'Você precisa completar seu cadastro antes de poder adotar'
                                }).then((result) => {
                                    window.location.href = "perfil.php";
                                })
                            }
                        } else {
                            Swal.fire({
                                    icon: 'error',
                                    title: 'Quase lá!',
                                    text: 'Você precisa estar logado para poder adotar!'
                                }).then((result) => {
                                    window.location.href = "reglog.php";
                                })
                        }
                    }
                };
                var data = "cpf=" + encodeURIComponent("CPF_DO_USUARIO_AQUI"); 
                xhr.send(data);
            });
        });
    </script>

</body>

</html>