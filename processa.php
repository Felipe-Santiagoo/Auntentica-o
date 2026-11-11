<?php

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    exit("Acesse esta página pelo formulário.");
}


function limparSaida($texto) {
    return htmlspecialchars($texto, ENT_QUOTES, "UTF-8");
}

$nome = trim($_POST["nome"] ?? "");
$email = trim($_POST["email"] ?? "");
$idade = trim($_POST["idade"] ?? "");
$cidade = trim($_POST["cidade"] ?? "");
$sexo = $_POST["sexo"] ?? "";
$observacoes = trim($_POST["observacoes"] ?? "");

if ($nome === "" || $email === "" || $idade === "" || $cidade === "" || $sexo === "") {
    exit("Erro: preencha todos os campos obrigatórios.");
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    exit("Erro: digite um e-mail válido.");
}


if (!ctype_digit($idade)) {
    exit("Erro: a idade deve ser um número inteiro.");
}

$idade = (int) $idade;


if ($idade <= 0) {
    exit("Erro: a idade deve ser maior que zero.");
}


if ($idade < 18) {
    exit("Cadastro permitido apenas para maiores de 18 anos.");
}


if (!in_array($sexo, ["M", "F", "Outro"], true)) {
    exit("Erro: opção de sexo inválida.");
}


if (function_exists("mb_convert_case")) {
    $nome = mb_convert_case(mb_strtolower($nome, "UTF-8"), MB_CASE_TITLE, "UTF-8");
    $cidade = mb_convert_case(mb_strtolower($cidade, "UTF-8"), MB_CASE_TITLE, "UTF-8");
} else {
    $nome = ucwords(strtolower($nome));
    $cidade = ucwords(strtolower($cidade));
}

if ($sexo === "M") {
    $sexoTexto = "Masculino";
} elseif ($sexo === "F") {
    $sexoTexto = "Feminino";
} else {
    $sexoTexto = "Outro";
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro realizado</title>
    <link rel="stylesheet" href="CSS/style.css">
</head>
<body>
    <main class="container">
        <h1>Cadastro realizado com sucesso!</h1>

        <p><strong>Nome:</strong> <?= limparSaida($nome) ?></p>
        <p><strong>E-mail:</strong> <?= limparSaida($email) ?></p>
        <p><strong>Idade:</strong> <?= limparSaida((string) $idade) ?></p>
        <p><strong>Cidade:</strong> <?= limparSaida($cidade) ?></p>
        <p><strong>Sexo:</strong> <?= limparSaida($sexoTexto) ?></p>
        <p><strong>Observações:</strong><br>
            <?= nl2br(limparSaida($observacoes)) ?>
        </p>

        <a class="voltar" href="index.php">Voltar ao formulário</a>
    </main>
</body>
</html>
