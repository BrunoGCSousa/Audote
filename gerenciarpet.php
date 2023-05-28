<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/34e911297d.js" crossorigin="anonymous"></script>
    <title>Gerenciar Pet</title>
    <link rel="stylesheet" href="style-inicio.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" />
</head>

<body>

    <?php include('./secoes/nav.php') ?>

    <div>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Nome do pet</th>
                    <th scope="col">Tipo de animal</th>
                    <th scope="col">Raça</th>
                    <th scope="col">Idade</th>
                    <th scope="col">Porte</th>
                    <th scope="col">Sexo</th>
                    <th scope="col">Descricao</th>
                    <th scope="col">Vacinas</th>
                    <th scope="col">Vermifugado</th>
                    <th scope="col">Imagem do Pet</th>
                    <th scope="col">Características</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $stmt = $pdo->prepare("select * from pets"); // prepara o SQL
                $stmt->execute(); // executa o código e seleciona todos os dados da tabela pets

                while ($row = $stmt->fetch(PDO::FETCH_BOTH)) { // faz um loop que percorre todos os dados da pesquisa sql
                    echo "<tr class='celula'>";
                    echo "<td> $row[idPet] </td>";
                    echo "<td> $row[nomePet] </td>";
                    echo "<td> $row[tipoAnimal] </td>";
                    echo "<td> $row[raca] </td>";
                    echo "<td> $row[idadePet] </td>";
                    echo "<td> $row[porte] </td>";
                    echo "<td> $row[sexo] </td>";
                    echo "<td> $row[descricao] </td>";
                    echo "<td> $row[vacinas] </td>";
                    echo "<td> $row[vermifugado] </td>";
                    echo "<td> <img src='$row[imagemPet]'> </td>";
                    echo "<td> $row[caracteristicas] </td>";
                    echo "<td> 
                            <a href='removerPet.php?idPet=$row[0]'><i class='fa-solid fa-trash'></i></a>
                            <a href='?idPet=$row[0]&nomePet=$row[1]&tipoAnimal=$row[2]&raca=$row[3]&idadePet=$row[4]&porte=$row[5]&sexo=$row[6]&descricao=$row[7]&vacinas=$row[8]&vermifugado=$row[9]&imagemPet=$row[10]'><i class='fa-solid fa-pencil'></i></a>
                          </td>"; // com o código ?idPet=$row[0] armazena no campo $_GET['idPet'] o valor da variavel $row[0] sendo possivel assim colocar esse valor em outras páginas
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>


    <section id="editarForm">

        <form action="editarpet.php" method="POST" class="container cadastrar-pet">

            <h1 class="text-center h1">Edite o seu Pet</h1>

            <input type="text" value="<?php echo @$_GET['idPet'] ?>" name="idPet" hidden>
            <div class="row">
                <div class="mb-3 col-md-6">
                    <label for="nomePet" class="form-label">Nome do Pet</label>
                    <input required type="text" value="<?php echo @$_GET['nomePet']; ?>" name="nomePet" id="nomePet"
                        class="form-control" />
                </div>
                <div class="mb-3 col-md-6">
                    <label for="tipoAnimal" class="form-label">Tipo de animal</label>
                    <input required type="text" value="<?php echo @$_GET['tipoAnimal']; ?>" name="tipoAnimal"
                        id="tipoAnimal" class="form-control" />
                </div>
            </div>

            <div class="row">
                <div class="mb-3 col-md-6">
                    <label for="raca" class="form-label">Raça</label>
                    <input required type="text" value="<?php echo @$_GET['raca']; ?>" name="raca" id="raca"
                        class="form-control" />
                </div>

                <div class="mb-3 col-md-6">
                    <label for="idadePet" class="form-label">Idade do Pet</label>
                    <input required type="number" value="<?php echo @$_GET['idadePet']; ?>" name="idadePet" id="idadePet"
                        class="form-control" />
                </div>
            </div>

            <div class="row">
                <div class="mb-3 col-md-6">
                    <label for="porte" class="form-label">Porte do Pet</label>
                    <input required type="text" value="<?php echo @$_GET['porte']; ?>" name="porte" id="porte"
                        class="form-control" />
                </div>

                <div class="mb-3 col-md-6">
                    <label for="sexo" class="form-label">Sexo</label>
                    <select class="form-select" id="sexo" name="sexo" required>
                        <option selected value="<?php echo @$_GET['sexo']; ?>"><?php echo @$_GET['sexo']; ?></option>
                        <option value="Macho">Macho</option>
                        <option value="Fêmea">Fêmea</option>
                    </select>
                </div>
            </div>

            <div class="mb-3">
                <label for="descricao" class="form-label">Descricao do Pet</label>
                <textarea name="descricao" id="descricao" cols="30" rows="10"
                    value="Insira aqui a descrição/história do seu Pet" required class="form-control"
                    maxlength="255"><?php echo @$_GET['descricao']; ?></textarea>
            </div>

            <div class="row">
                <div class="mb-3 col-md-6">
                    <label for="vacinas" class="form-label">Vacinas</label>
                    <select class="form-select" id="vacinas" name="vacinas" required>
                        <option selected value="<?php echo @$_GET['vacinas']; ?>"><?php echo @$_GET['vacinas']; ?></option>
                        <option value="Vacinado">Vacinado</option>
                        <option value="Não vacinado">Não vacinado</option>
                    </select>
                </div>

                <div class="mb-3 col-md-6">
                    <label for="vermifugado" class="form-label">Vermifugado</label>
                    <select class="form-select" id="vermifugado" name="vermifugado" required>
                        <option selected value="<?php echo @$_GET['vermifugado']; ?>"><?php echo @$_GET['vermifugado']; ?></option>
                        <option value="Vermifugado">Vermifugado</option>
                        <option value="Não vermifugado">Não vermifugado</option>
                    </select>
                </div>
            </div>

            <div class="mb-3">
                <label for="imagemPet" class="form-label">Imagem do Pet</label>
                <input required type="text" value="<?php echo @$_GET['imagemPet']; ?>" name="imagemPet" id="imagemPet"
                    class="form-control" />
            </div>

            <div class="row">
                <div class="mb-3">
                    <input type="submit" value="Salvar" class="btn btn-primary mb-3 col-md-12" />
                </div>
            </div>
        </form>
    </section>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="./src/js/app.js"></script>
</body>

</html>