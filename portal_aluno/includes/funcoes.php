<?php
function validarEmail($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
}

function limparTexto($texto) {
    return trim($texto);
}

// Escapa na exibição para que HTML digitado pelo usuário apareça como texto.
function escapar($texto) {
    return htmlspecialchars((string) $texto, ENT_QUOTES, "UTF-8");
}
