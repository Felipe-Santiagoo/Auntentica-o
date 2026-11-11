<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Cliente</title>
    <link rel="stylesheet" href="CSS/style.css">
</head>
<body>
    <main class="container">
        <h1>Cadastro de Cliente</h1>
        <p>Preencha os campos abaixo para realizar seu cadastro.</p>

        <form action="processa.php" method="POST">
            <label for="nome">Nome completo:</label>
            <input type="text" id="nome" name="nome" required>

            <label for="email">E-mail:</label>
            <input type="email" id="email" name="email" required>

            <label for="idade">Idade:</label>
            <input type="number" id="idade" name="idade" min="1" step="1" required>

            <label for="cidade">Cidade:</label>
            <input type="text" id="cidade" name="cidade" required>

            <fieldset>
                <legend>Sexo:</legend>
                <label class="radio"><input type="radio" name="sexo" value="M" required> Masculino</label>
                <label class="radio"><input type="radio" name="sexo" value="F"> Feminino</label>
                <label class="radio"><input type="radio" name="sexo" value="Outro"> Outro</label>
            </fieldset>

            <label for="observacoes">Observações (opcional):</label>
            <textarea id="observacoes" name="observacoes" rows="5"></textarea>

            <button type="submit">Enviar Dados</button>
        </form>
    </main>
</body>
</html>
