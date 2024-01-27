export const nxSecCanais=(mainSection)=>{
    const secTextos ={
        titulo:'CANAIS DE TV AO VIVO',
        subtitulo: `24h de entretenimento com seus canais favoritos.`,
        items:['Esportes', 'Novelas', 'Jornalismo', 'Infantil', 'Arte e Cultura','e mais']
    }


    const segundaSecao = document.createElement('section')
    segundaSecao.className = 'canais-secMain'
    segundaSecao.style.cssText = `
        display: flex;
        flex-direction: column;
        justify-content: flex-start;
        align-items: center;
        align-self: center;
        height: 700px;
        width: 100%;
        margin-top:300px;
        background: url('assets/images/s2BG.png');
        background-repeat: no-repeat;
        background-position: center center;
        background-size: contain;
        color:  white;
    `
    mainSection.appendChild(segundaSecao)

    const tituloH1 = document.createElement('h1')
    tituloH1.className = 'canais-titulo titulo'
    tituloH1.textContent = secTextos.titulo
    tituloH1.style.cssText = `
        font-weight: 700;
        align-self: center;
        font-size: 40px;
        max-width: 1000px;
        margin-top:-100px;
        text-shadow: 0px 4px 12px rgba(0, 0, 0, 0.75);
        z-index: 5;
    `
    segundaSecao.appendChild(tituloH1)

    const subTitulop = document.createElement('p')
    subTitulop.className = 'canais-subTitulo subtitulo'
    subTitulop.textContent = secTextos.subtitulo
    subTitulop.style.cssText = `
        margin-top: 20px;
        margin-bottom: 25px;
        font-weight: 400;
        font-size: 26px;
        text-align: center;
        align-self: center;
        text-shadow: 0px 4px 12px rgba(0, 0, 0, 0.75);
        z-index: 5;
    `
    segundaSecao.appendChild(subTitulop)

    const subSecao = document.createElement('section')
    subSecao.className = 'canais-subSec1'
    subSecao.style.cssText = `
        display:flex;
        align-items: center;
        align-self: center;
        justify-content: center;
        height: 50px;
        width:100%;
        color: white;
        line-height: 1.5;
        z-index: 5;
    `
    segundaSecao.appendChild(subSecao)


    secTextos.items.forEach((element, index) => {
        const subTitulop = document.createElement('p')
        subTitulop.className = 'canais-list-p'
        subTitulop.textContent = element
        subTitulop.style.cssText = `
            display: flex;
            flex-direction: row-reverse; 
            margin-right: 20px;
            align-self: center;
            font-weight: 400;
            font-size: 22px;
            color:#889FAE;
        `
        

        if(index<secTextos.items.length-1){
            const icoCheck = document.createElement('img')
            icoCheck.className = 'canais-list-ico'
            icoCheck.src = 'assets/icons/icoChecked.png'
            icoCheck.style.cssText = `
            height: 35px;
            width: 35px;
            margin-right: 10px;
        `
            subTitulop.appendChild(icoCheck)
        }else{
            const icoPlaceholder = document.createElement('div')
            icoPlaceholder.className = 'cat-ico-placeholder'
            icoPlaceholder.style.cssText = `
            display: none;
            height: 35px;
            width: 35px;
        `
            subTitulop.appendChild(icoPlaceholder)
        }
        
        subSecao.appendChild(subTitulop)
        
       
    });

}