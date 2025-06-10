<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Trabalho de Força</title>
</head>
<body>
    <form action="calcular.php" method="post">
        <div class="container">
            <h1>Trabalho de Força</h1>
            <label for="forca">Força(F)</label>
            <input type="number" id="forca" name="força" required>
            <label for="deslocamento">Deslocamento(D)</label>
            <input type="number" id="deslocamento" name="deslocamento" required>
            <label for="angulo">Angulo(θ)</label>
            <input type="number" id="angulo" name="angulo" required>

            <button type="submit">Calcular Trabalho</button>
        </div>
    </form>
</body>
</html>