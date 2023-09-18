<?php
require '../config.php';
if (isset($_SESSION["id"])) {
    $userId = $_SESSION["id"];

    // Consulta SQL para verificar se o CPF está cadastrado para o usuário logado
    $sql = "SELECT cpf FROM usuarios WHERE id = $userId";

    $result = mysqli_query($conn, $sql);

    if (!$result) {
        die("Erro na consulta: " . mysqli_error($conn));
    }

    if (mysqli_num_rows($result) > 0) {
        // O CPF está cadastrado para o usuário logado, agora obtenha o valor
        $row = mysqli_fetch_assoc($result);
        $cpf = $row["cpf"];

        // Verifique se o CPF está vazio
        if (!empty($cpf)) {
            header("Content-Type: application/json");
            echo json_encode(["cpfCadastrado" => true, "logado" => true]);
        } else {
            header("Content-Type: application/json");
            echo json_encode(["cpfCadastrado" => false, "logado" => true]);
        }
    } else {
        header("Content-Type: application/json");
        echo json_encode(["cpfCadastrado" => false, "logado" => true]);
    }
} else {
    header("Content-Type: application/json");
    echo json_encode(["cpfCadastrado" => false, "logado" => false]);
}

// Feche a conexão com o banco de dados
mysqli_close($conn);
?>