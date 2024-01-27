export const nxSecFilmes=(mainSection)=>{

    const secTextos ={
        titulo:'FILMES, SÉRIES, DESENHOS, DOCUMENTÁRIOS E SHOWS',
        subtitulo:`conteúdo de qualidade pra toda a família.`,
        desc: `Assista ${('Shrek').bold()} e suas aventuras de Tão Tão Distante na NXPlay.`,
        btn: 'COMECE AGORA'
    }


    const terceiraSecao = document.createElement('section')
    terceiraSecao.className = 'filmes-secMain'
    terceiraSecao.id = 'Filmes'
    terceiraSecao.style.cssText = `
        display:flex;
        flex-direction: column;
        height: 650px;
        width: 100%;
        justify-content: flex-start;
        align-self: center;
        align-items: center;
        background: url('assets/images/s3BG.png');
        background-repeat: no-repeat;
        background-position: center center;
        background-size: contain;
        color: white;
        margin-bottom: 50px;
    `
    mainSection.appendChild(terceiraSecao)

    
    const tituloH1 = document.createElement('h1')
    tituloH1.className = 'filmes-titulo titulo'
    tituloH1.textContent = secTextos.titulo
    tituloH1.style.cssText = `
        font-weight: 700;
        font-size: 42px;
        text-align: center;
        max-width: 800px;
        margin-top:-140px;
        text-shadow: 0px 4px 12px rgba(0, 0, 0, 0.75);
    `
    terceiraSecao.appendChild(tituloH1)

    const subTitulop = document.createElement('p')
    subTitulop.className = 'filmes-subTitulo subtitulo'
    subTitulop.textContent = secTextos.subtitulo
    subTitulop.style.cssText = `
        margin-top: 25px;
        font-weight: 400;
        font-size: 24px;
        text-align: center;
        max-width: 560px;
        text-shadow: 0px 4px 12px rgba(0, 0, 0, 0.75);
    `
    terceiraSecao.appendChild(subTitulop)

    const desc = document.createElement('p')
    desc.className = 'filmes-desc subtitulo'
    desc.innerHTML = secTextos.desc
    desc.style.cssText = `
        color: white;
        margin-top: -50px;
        font-weight: 400;
        font-size: 24px;
        text-align: center;
        text-shadow: 0px 4px 12px rgba(0, 0, 0, 0.75);
    `
    mainSection.appendChild(desc)

    const btn = document.createElement('button')
    btn.className = 'filmes-btn btn'
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