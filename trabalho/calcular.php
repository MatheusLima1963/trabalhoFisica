<?php 
function calcularTrabalho($força, $deslocamento, $angulo){
    $angulo_rad = deg2rad($angulo);
    return $força * $deslocamento * cos($angulo_rad);
}

$força = $_POST['força'];
$deslocamento = $_POST['deslocamento'];
$angulo = $_POST['angulo'];

$trabalho = calcularTrabalho($força, $deslocamento, $angulo);
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Resultado do Cálculo</title>
    <style>
        .animation-container {
            width: 100%;
            height: 100px;
            position: relative;
            margin: 30px 0;
            background-color: #f5f5f5;
            border-radius: 5px;
            overflow: visible;
        }
        
        .bloco-fixo {
            width: 50px;
            height: 50px;
            background-color: #3498db;
            position: absolute;
            left: 25px;
            top: 25px;
            border-radius: 5px;
            z-index: 1;
        }
        
        .bloco-movel {
            width: 50px;
            height: 50px;
            background-color: #e74c3c;
            position: absolute;
            left: 25px;
            top: 25px;
            border-radius: 5px;
            z-index: 2;
        }
        
        .linha {
            position: absolute;
            left: 75px; /* 25px (left do bloco) + 50px (largura do bloco) */
            top: 50px;
            height: 2px;
            background-color: #333;
            width: 0;
            z-index: 0;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Resultado do Cálculo</h1>
        <label>Força: <?php echo $força; ?> N</label>
        <label>Deslocamento: <?php echo $deslocamento; ?> m</label>
        <label>Ângulo: <?php echo $angulo; ?>°</label>
        <br>
        <label class="resultado">Trabalho: <?php echo number_format($trabalho, 2); ?> J</label>

        <div class="animation-container" id="anim-container">
            <div class="bloco-fixo"></div>
            <div class="linha" id="linha"></div>
            <div class="bloco-movel" id="bloco-movel"></div>
        </div>

        <a href="trabalho.php">Nova Simulação</a>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const deslocamentoInput = <?php echo $deslocamento * 10; ?>;
            const blocoMovel = document.getElementById('bloco-movel');
            const linha = document.getElementById('linha');
            const container = document.getElementById('anim-container');
            
            // Calcula o deslocamento máximo permitido
            // Largura do container - posição inicial (25px) - largura do bloco (50px)
            const maxDeslocamento = container.offsetWidth - 75;
            const deslocamento = Math.min(deslocamentoInput, maxDeslocamento);
            
            let posicao = 0;
            const velocidade = 2;

            function animar() {
                if (posicao < deslocamento) {
                    posicao += velocidade;
                    blocoMovel.style.transform = `translateX(${posicao}px)`;
                    linha.style.width = `${posicao}px`;
                    requestAnimationFrame(animar);
                }
            }

            // Reset inicial
            blocoMovel.style.transform = 'translateX(0px)';
            linha.style.width = '0px';
            
            animar();
        });
    </script>
</body>
</html>