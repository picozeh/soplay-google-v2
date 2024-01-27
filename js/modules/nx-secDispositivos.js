export const nxSecDispositivos=(mainSection)=>{

    const secTextos ={
        titulo:'PRA ASSISTIR QUANDO QUISER E NOS MELHORES DISPOSITIVOS',
        desc: `Sorriam, acenem e assistam a ${('Os Pinguins de Madagascar').bold()} na NXPlay.`,
        btn: 'COMECE AGORA'
    }


    const segundaSecao = document.createElement('section')
    segundaSecao.className = 'dispositivos-secMain'
    segundaSecao.id = 'Dispositivos'
    segundaSecao.style.cssText = `
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        align-items: center;
        align-self: center;
        height: 700px;
        width: 100%;
        margin-top:300px;
        background: url('assets/images/s4BG.png');
        background-repeat: no-repeat;
        background-position: center center;
        background-size: contain;
        color:  white;
    `
    mainSection.appendChild(segundaSecao)

    const tituloH1 = document.createElement('h1')
    tituloH1.className = 'dispositivos-titulo titulo'
    tituloH1.textContent = secTextos.titulo
    tituloH1.style.cssText = `
        font-weight: 700;
        font-size: 42px;
        max-width: 600px;
        text-align: center;
        margin-top: -140px;
        z-index: 1;
    `
    segundaSecao.appendChild(tituloH1)
    
    const subtitulo = document.createElement('p')
    subtitulo.className = 'dispositivos-desc subtitulo'
    subtitulo.innerHTML = secTextos.desc
    subtitulo.style.cssText = `
        font-weight: 400;
        font-size: 24px;
        text-align: center;
        color: white;
        z-index: 1;
    `
    mainSection.appendChild(subtitulo)

    const btn = document.createElement('button')
    btn.className = 'dispositivos-btn btn'
    btn.textContent = secTextos.btn
    btn.style.cssText = `
        width: 250px;
        height: 50px;
        background: linear-gradient(180deg, #3B4A54, #372D72);
        margin-top: 25px;
        font-weight: 400;
        font-size: 18px;
        text-align: center;
        border-style:none;
        border-radius: 5px;
        color: white;
        cursor: pointer;
    `
    btn.addEventListener('click',()=>{
        window.location.href='https://nxplay.com.br/home/filmes'
    })
    mainSection.appendChild(btn)

}