<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastro de Pessoa</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        label {
            display: block;
            margin-bottom: 10px;
        }
        input, select {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
        }
        button {
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }
        button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>

<?php
// Inicialize as variáveis
$nome = $idade = $sexo = $endereco = "";

// Verifique se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Coleta os dados do formulário
    $nome = test_input($_POST["nome"]);
    $idade = test_input($_POST["idade"]);
    $sexo = test_input($_POST["sexo"]);
    $endereco = test_input($_POST["endereco"]);

    // Aqui você pode adicionar lógica para processar os dados do formulário, armazená-los em um banco de dados, etc.
    // Neste exemplo, apenas exibimos os dados na tela.
    echo "<h2>Dados enviados:</h2>";
    echo "<p><strong>Nome:</strong> $nome</p>";
    echo "<p><strong>Idade:</strong> $idade</p>";
    echo "<p><strong>Sexo:</strong> $sexo</p>";
    echo "<p><strong>Endereço:</strong> $endereco</p>";
}
?>

<h2>Cadastro de Pessoa</h2>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <label for="nome">Nome:</label>
    <input type="text" name="nome" size="20" required value="<?php echo $nome; ?>">

    <label for="idade">Idade:</label>
    <input type="number" name="idade" size="3" required value="<?php echo $idade; ?>">

    <label for="sexo">Sexo:</label>
    <select name="sexo" required>
        <option value="Masculino" <?php if ($sexo == "Masculino") echo "selected"; ?>>Masculino</option>
        <option value="Feminino" <?php if ($sexo == "Feminino") echo "selected"; ?>>Feminino</option>
    </select>

    <label for="endereco">Endereço:</label>
    <input type="text" name="endereco" size="60" value="<?php echo $endereco; ?>">

    <button type="submit">Enviar</button>
    <button type="reset">Limpar</button>
</form>

<?php
// Função para validar e formatar os dados do formulário
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>

</body>
</html>
