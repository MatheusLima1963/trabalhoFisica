function animarBloco(deslocamento) {
    const blocoMovel = document.getElementById('bloco-movel');
    const linhaMovel = document.getElementById('linha-movel');
    
    if (!blocoMovel || !linhaMovel) {
        console.error('Elementos da animação não encontrados!');
        return;
    }

    let posicao = 0;
    const velocidade = 2;
    const blocoFixoWidth = 50;

    function mover() {
        if (posicao < deslocamento) {
            posicao += velocidade;
            blocoMovel.style.transform = `translateX(${posicao}px)`;
            linhaMovel.setAttribute('x2', posicao + blocoFixoWidth);
            requestAnimationFrame(mover);
        }
    }

    // Reset inicial
    blocoMovel.style.transform = 'translateX(0px)';
    linhaMovel.setAttribute('x2', '25');
    
    mover();
}