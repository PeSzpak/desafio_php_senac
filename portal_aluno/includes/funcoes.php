<?php
// [25] true se o formato do e-mail for válido, false caso contrário.
function validarEmail($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
}

// [26] (bônus) remove espaços do início e do fim do texto.
function limparTexto($texto) {
    return trim($texto);
}
