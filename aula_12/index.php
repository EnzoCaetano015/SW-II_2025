<?php
ini_set('display_errors', 0);
error_reporting(0);

$input = isset($_GET['cep']) ? preg_replace('/\D/', '', $_GET['cep']) : "";

$url = "https://viacep.com.br/ws/{$input}/json/";
$response = file_get_contents($url);
$Cep = json_decode($response, true);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilo.css">
    <title>Consulta de CEP</title>
</head>

<body>
    <div class="container">
        <h1>Consulte um CEP</h1>

        <form class="search-form">

            <input type="text" name="cep" id="cep" placeholder="Ex: 01001000" maxlength="8"
                oninput="this.value = this.value.replace(/[^0-9]/g, '')" value="<?php echo htmlspecialchars($input); ?>"
                required>

            <button type="submit">Buscar</button>
        </form>

        <?php if (!empty($Cep) && !isset($Cep['erro'])): ?>

            <div class="results">

                <div class="cep-highlight">
                    <h2>CEP: <?php echo $Cep['cep']; ?></h2>
                </div>

                <div class="result-item">
                    <div class="result-label">LOGRADOURO:</div>
                    <div class="result-value"><?php echo $Cep['logradouro']; ?></div>
                </div>

                <div class="result-item">
                    <div class="result-label">BAIRRO:</div>
                    <div class="result-value"><?php echo $Cep['bairro']; ?></div>
                </div>

                <div class="result-item">
                    <div class="result-label">LOCALIDADE:</div>
                    <div class="result-value"><?php echo $Cep['localidade']; ?></div>
                </div>

                <div class="result-item">
                    <div class="result-label">UF:</div>
                    <div class="result-value"><?php echo $Cep['uf']; ?></div>
                </div>

                <div class="result-item">
                    <div class="result-label">ESTADO:</div>
                    <div class="result-value"><?php echo $Cep['estado']; ?></div>
                </div>

                <div class="result-item">
                    <div class="result-label">REGIÃO:</div>
                    <div class="result-value"><?php echo $Cep['regiao']; ?></div>
                </div>

            </div>

        <?php else: ?>
            <p class="erro">CEP não encontrado ou inválido.</p>
        <?php endif; ?>
    </div>
</body>

</html>