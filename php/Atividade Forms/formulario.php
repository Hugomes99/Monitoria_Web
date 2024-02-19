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
        .error {
            color: red;
            font-weight: bold;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>

<?php
// Inicialize as variáveis
$nome = $idade = $sexo = $endereco = "";
$nomeErr = $idadeErr = "";

// Verifique se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Coleta os dados do formulário
    $nome = test_input($_POST["nome"]);
    $idade = test_input($_POST["idade"]);
    $sexo = test_input($_POST["sexo"]);
    $endereco = test_input($_POST["endereco"]);

    // Validação da idade e do nome
    if (($sexo == "Masculino" && $idade <= 18) || ($sexo == "Feminino" && $idade <= 20)) {
        $idadeErr = "Idade mínima não atendida para o sexo selecionado.";
    }

    $nome_parts = explode(" ", $nome);
    if (count($nome_parts) < 2) {
        $nomeErr = "O nome deve ter pelo menos duas partes (nome e sobrenome).";
    }

    // Se não houver erros, os dados podem ser processados ou armazenados no banco de dados
    if (empty($nomeErr) && empty($idadeErr)) {
        echo "<h2>Dados enviados:</h2>";
        echo "<p><strong>Nome:</strong> $nome</p>";
        echo "<p><strong>Idade:</strong> $idade</p>";
        echo "<p><strong>Sexo:</strong> $sexo</p>";
        echo "<p><strong>Endereço:</strong> $endereco</p>";
    }
}

?>

<h2>Cadastro de Pessoa</h2>

<?php
// Exibe mensagens de erro, se houverem
if (!empty($nomeErr) || !empty($idadeErr)) {
    echo '<div class="error">';
    echo '<p>Por favor, corrija os seguintes erros:</p>';
    echo "<ul>";
    if (!empty($nomeErr)) {
        echo "<li>$nomeErr</li>";
    }
    if (!empty($idadeErr)) {
        echo "<li>$idadeErr</li>";
    }
    echo "</ul>";
    echo '</div>';
}
?>

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
