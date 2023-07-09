<?php
include('config.php');
?>
<!DOCTYPE html>
<html lang="pt-br" class="audote-root">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/34e911297d.js" crossorigin="anonymous"></script>
    <title>Index</title>
    <link rel="stylesheet" href="style-inicio.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="src/style/pgprincipal.css" />
</head>

<body>

    <?php include('./secoes/nav.php') ?>

    <section>
        <!-- Nessa seção será feito o formulário para cadastramento dos pets -->
        <form action="salvarpet.php" method="POST" enctype="multipart/form-data" class="container cadastrar-pet">

            <h1 class="text-center h1">Cadastre o seu Pet <i class="fa-solid fa-dog"></i></h1>

            <div class="row input-row">
                <div class="col-md-6 input-col">
                    <label for="nomePet" class="form-label">Nome do Pet</label>
                    <input required type="text" placeholder="Ex: Rex, bob, Marley" name="nomePet" id="nomePet"
                        class="pesquisar-input" />
                </div>
                <div class="mb-3 col-md-6">
                    <label for="tipoAnimal" class="form-label">Tipo de animal</label>
                    <input required type="text" placeholder="Ex: Gato, cachorro, coelho" name="tipoAnimal"
                        id="tipoAnimal" class="pesquisar-input" />
                </div>
            </div>

            <div class="row">
                <div class="mb-3 col-md-6">
                    <label for="raca" class="form-label">Raça</label>
                    <input required type="text" placeholder="Ex: Rottweiler, Vira-lata, Akita inu" name="raca" id="raca"
                        class="pesquisar-input" />
                </div>

                <div class="mb-3 col-md-6">
                    <label for="idadePet" class="form-label">Idade do Pet</label>
                    <input required type="number" placeholder="Insira a idade em anos" name="idadePet" id="idadePet"
                        class="pesquisar-input" />
                </div>
            </div>

            <div class="row">
                <div class="mb-3 col-md-6">
                    <label for="porte" class="form-label">Porte do Pet</label>
                    <input required type="text" placeholder="Ex: pequeno, médio" name="porte" id="porte"
                        class="pesquisar-input" />
                </div>

                <div class="mb-3 col-md-6">
                    <label for="sexo" class="form-label">Sexo</label>
                    <select class="pesquisar-input" id="sexo" name="sexo" required>
                        <option selected disabled>Qual o sexo do seu PET?</option>
                        <option value="Macho">Macho</option>
                        <option value="Fêmea">Fêmea</option>
                    </select>
                </div>
            </div>

            <div class="mb-3 row">
                <label for="descricao" class="form-label">Descricao do Pet</label>
                <textarea name="descricao" id="descricao" cols="30" rows="10"
                    placeholder="Insira aqui a descrição/história do seu Pet" required class="pesquisar-input descricao"
                    maxlength="255"></textarea>
            </div>

            <div class="row">
                <div class="mb-3 col-md-6">
                    <label for="vacina" class="form-label">Vacinas</label>
                    <select class="pesquisar-input" id="vacina" name="vacina" required>
                        <option selected disabled>Seu PET é vacinado?</option>
                        <option value="Vacinado">Vacinado</option>
                        <option value="Não vacinado">Não vacinado</option>
                    </select>
                </div>

                <div class="mb-3 col-md-6">
                    <label for="vermifugado" class="form-label">Vermifugado</label>
                    <select class="pesquisar-input" id="vermifugado" name="vermifugado" required>
                        <option selected disabled>Seu PET é vermifugado?</option>
                        <option value="Vermifugado">Vermifugado</option>
                        <option value="Não vermifugado">Não vermifugado</option>
                    </select>
                </div>
            </div>

            <div class="mb-3 row">
                <label for="imagemPet" class="form-label">Imagem do Pet</label>
                <input required type="file" placeholder="Imagem do Pet" name="imagemPet" id="imagemPet"
                    class="pesquisar-input" />
            </div>

            <div class="mb-3 row">
                <label for="caracteristicas" class="form-label">Características do PET separadas por vírgula</label>
                <textarea name="caracteristicas" id="caracteristicas" cols="30" rows="10"
                    placeholder="Insira aqui as caracteristicas. (Ex: Dócil, Carente, Quieto) Quanto mais caracteristicas melhor!" required
                    class="pesquisar-input descricao" maxlength="255"></textarea>
            </div>

            <div class="d-flex justify-content-center">
                <button type="submit" class="botao"> <i class="fa-solid fa-paw"></i> Adote já</button>
            </div>


        </form>

    </section>

    <script src="./src/js/app.js"></script>
    <script src="src/js/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="src/js/pgprincipal.js"></script>
</body>

</html>