<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal do Aluno | Senac</title>
    <style>
        :root {
            --azul: #004a8d;
            --laranja: #f7941d;
            --fundo: #f4f6f9;
            --texto: #1f2933;
            --suave: #6b7280;
        }
        * { box-sizing: border-box; }
        body {
            margin: 0;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            font-family: system-ui, -apple-system, "Segoe UI", Roboto, sans-serif;
            background: var(--fundo);
            color: var(--texto);
        }
        header { background: var(--azul); border-bottom: 4px solid var(--laranja); }
        header a { display: block; max-width: 560px; margin: 0 auto; padding: 18px 16px; color: #fff; text-decoration: none; }
        header h1 { margin: 0; font-size: 1.3rem; }
        main { flex: 1; width: 100%; max-width: 560px; margin: 32px auto; padding: 0 16px; }
        .cartao { background: #fff; border-radius: 12px; padding: 28px; box-shadow: 0 2px 10px rgba(0, 0, 0, .06); }
        h2 { margin-top: 0; color: var(--azul); }
        label { display: block; margin: 16px 0 6px; font-weight: 600; }
        input { width: 100%; padding: 10px 12px; font-size: 1rem; border: 1px solid #d1d5db; border-radius: 8px; }
        input:focus { outline: 2px solid var(--azul); border-color: transparent; }
        .botao {
            display: inline-block; padding: 11px 20px; border: 0; border-radius: 8px;
            background: var(--azul); color: #fff; font-size: 1rem; text-decoration: none; cursor: pointer;
        }
        .botao:hover { filter: brightness(1.15); }
        .botao.secundario { background: #fff; color: var(--azul); border: 1px solid var(--azul); }
        .acoes { display: flex; flex-wrap: wrap; gap: 10px; margin-top: 24px; }
        .alerta { padding: 12px 16px; border-radius: 8px; margin-bottom: 16px; }
        .alerta.erro { background: #fdecec; color: #9b1c1c; }
        .alerta.sucesso { background: #e7f6ec; color: #1e6b3a; }
        dl { display: grid; grid-template-columns: max-content 1fr; gap: 10px 16px; margin: 0; }
        dt { font-weight: 600; color: var(--suave); }
        dd { margin: 0; overflow-wrap: anywhere; }
        footer { padding: 20px 16px; text-align: center; color: var(--suave); font-size: .85rem; }
    </style>
</head>
<body>
<header>
    <a href="index.php"><h1>Portal do Aluno · Senac</h1></a>
</header>
<main>
