# Registro de testes — Portal do Aluno

Ambiente: PHP 8.5 com servidor embutido (`php -S 127.0.0.1:8099` dentro de `portal_aluno/`), sessão mantida por cookie entre as requisições.
Todos os arquivos passaram em `php -l` (sem erros de sintaxe).

| Nº | Ação de teste | Resultado esperado | Resultado obtido | Status |
| --- | --- | --- | --- | --- |
| 1 | Abrir `index.php` | Título, links e rodapé visíveis | Cabeçalho "Portal do Aluno · Senac", botões Cadastrar / Consultar / Sair e rodapé exibidos | ✅ |
| 2 | Enviar nome vazio (`a@b.com`, `20`) | Erro de nome obrigatório | "O nome é obrigatório." e e-mail/idade mantidos nos campos | ✅ |
| 3 | Enviar e-mail `teste` | Erro de e-mail inválido | "Informe um e-mail válido." | ✅ |
| 4 | Enviar idade `0` | Erro de idade inválida | "A idade deve ser um número inteiro maior que zero." | ✅ |
| 5 | Enviar `Ana Souza`, `ana@senac.br`, `22` | Cadastro exibido no resultado | "Cadastro realizado com sucesso!" + Nome, E-mail e Idade. Espaços extras do nome removidos por `limparTexto()` | ✅ |
| 6 | Atualizar `resultado.php` | Dados continuam, mensagem some | Dados exibidos, mensagem de sucesso não aparece | ✅ |
| 7 | Clicar em **Encerrar sessão** e abrir o resultado | Nenhum cadastro na sessão | `logout.php` redireciona (302) para `index.php`; resultado mostra "Nenhum aluno cadastrado nesta sessão." | ✅ |
| 8 | Enviar `<h1>Ana</h1>` como nome | Texto literal, sem criar título | HTML gerado: `<dd>&lt;h1&gt;Ana&lt;/h1&gt;</dd>`, o navegador mostra o texto | ✅ |
| 9 | `Mariana Oliveira`, `teste`, `21` | Volta ao formulário com valores preservados | Os três campos vêm preenchidos com o que foi digitado; ao recarregar o formulário, erro e valores já foram removidos da sessão | ✅ |

Testes extras: idade `abc` e POST sem nenhum campo também são rejeitados com mensagem. Acessar `processar_cadastro.php` direto pelo navegador (GET) redireciona (302) para `cadastro.php`, sem processar nada.

## Respostas do desafio final

1. **Por que algumas operações vêm antes do HTML?** `session_start()` e `header()` enviam cabeçalhos HTTP (o cookie da sessão, o `Location`). Depois que qualquer HTML sai, os cabeçalhos já foram enviados e não podem mais ser alterados.
2. **Vantagem dos componentes compartilhados:** o cabeçalho e o rodapé são escritos uma vez só. Uma mudança vale para todas as páginas e o visual fica consistente.
3. **Por que os dados continuam após o redirecionamento?** Eles ficam em `$_SESSION`, no servidor, ligados ao cookie de sessão do navegador. Cada página que chama `session_start()` recupera os mesmos dados.
4. **Como a mensagem aparece uma vez só?** É uma *flash message*: `resultado.php` lê `$_SESSION["mensagem"]` e logo faz `unset()`. Na próxima visita ela não existe mais, e `$_SESSION["aluno"]` continua lá.
5. **`unset` × encerrar a sessão:** `unset($_SESSION["mensagem"])` apaga uma única chave e a sessão continua. `session_unset()` + `session_destroy()` apagam todas as variáveis e destroem a sessão no servidor.
6. **Por que não confiar no formulário?** Qualquer pessoa pode enviar qualquer valor (inclusive sem usar o formulário). Por isso o servidor valida com `filter_input` e escapa a saída com `htmlspecialchars` (função `escapar()` em `includes/funcoes.php`) para evitar XSS.

Perguntas do README:
- **Por que `require_once` em funções?** Carregar o arquivo duas vezes redeclararia as funções e causaria erro fatal. Além disso, `require` interrompe o script se o arquivo faltar.
- **E se esquecer `exit` após `header()`?** O script continuaria executando: no POST inválido, ele gravaria o aluno mesmo com erro, e no GET direto tentaria processar dados inexistentes.
