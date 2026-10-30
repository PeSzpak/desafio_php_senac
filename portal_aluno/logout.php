<?php
// [21] recupera a sessão atual.
session_start();
// [22] remove todas as variáveis da sessão.
session_unset();
// [23] destrói a sessão no servidor.
session_destroy();
// [24] volta para a página inicial e encerra o script.
header("Location: index.php");
exit;
