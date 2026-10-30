<?php
// [09] inicia ou recupera a sessão.
session_start();
// [10] require_once garante que as funções sejam carregadas uma única vez.
require_once "includes/funcoes.php";

// [11] só processa requisições POST.
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: cadastro.php");
    exit;
}

// [12] recebe os campos (null quando o campo não foi enviado).
$nome = limparTexto(filter_input(INPUT_POST, "nome") ?? "");
$email = filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL);
$idade = filter_input(INPUT_POST, "idade", FILTER_VALIDATE_INT);

// [13] validação na ordem nome -> e-mail -> idade.
// filter_input devolve false para valor inválido e null para campo ausente.
$erro = "";
if ($nome === "") {
    $erro = "O nome é obrigatório.";
} elseif ($email === false || $email === null) {
    $erro = "Informe um e-mail válido.";
} elseif ($idade === false || $idade === null || $idade <= 0) {
    $erro = "A idade deve ser um número inteiro maior que zero.";
}

// [14] em caso de erro, guarda a mensagem e os valores digitados e volta ao formulário.
if ($erro !== "") {
    $_SESSION["erro"] = $erro;
    $_SESSION["dados_anteriores"] = [
        "nome" => $nome,
        "email" => $_POST["email"] ?? "",
        "idade" => $_POST["idade"] ?? "",
    ];
    header("Location: cadastro.php");
    exit;
}

// [15] cadastro válido guardado na sessão, com mensagem de sucesso.
$_SESSION["aluno"] = [
    "nome" => $nome,
    "email" => $email,
    "idade" => $idade,
];
$_SESSION["mensagem"] = "Cadastro realizado com sucesso!";
header("Location: resultado.php");
exit;
