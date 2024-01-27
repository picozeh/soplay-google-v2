export const nxSecMapa = (mainSection)=>{
    const secTextos ={
        titulo:'Mapa do site',
        links:[{
                item:'Assine',
                link:'#Assine'
            },
            {
                item:`Cadastre-se`,
                link:'#Cadastro'
            },
            {   item:`Dispositivos`,
                link:'#Dispositivos'
            },
            {   item:`Duvidas Frequentes`,
                link:'#Duvidas'
            },
            {   item:`Quem Somos`,
                link:'#QuemSomos'
            },
            {   item:`Fale Conosco`,
                link:'#FaleConosco'
            },
            {   item:`Política de Privacidade`,
                link:'#Politica'
            },
            {   item:`Termos de Uso`,
                link:'#Termos'
            }
        ]
    }

    const sec = document.createElement('section')
    sec.className = 'mapa-secMain'
    sec.style.cssText = `
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: flex-start;
        align-self: center;
        height: 300px;
        width: 95%;
        border: 1px solid #3B4A54;
        border-left: none;
        border-right: none;
    `
    mainSection.appendChild(sec)

    const titulo = document.createElement('h3')
    titulo.className = 'mapa-titulo titulo'
    titulo.textContent = secTextos.titulo
    titulo.style.cssText = `
        text-align: left;
        font-size: 34px;
        font-weight: 600;
        color: white;
        margin-bottom: 30px;
    `
    sec.appendChild(titulo)

    const lista = document.createElement('ul')
    lista.className = 'mapa-ul subtitulo'
    lista.style.cssText = `
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: flex-start;
        flex-wrap: wrap;
        height: 150px;
        width: 70%;
        list-style: none;
        text-decoration: none;
        font-size: 22px;
    `
    secTextos.links.forEach((element, index) => {
        const item = document.createElement('li')
        item.className = 'mapa-li'
        const link = document.createElement('a')
        link.textContent = element.item
        link.href = element.link
        link.style.cssText = `
            text-decoration: none;
            color: #C9C9C9;
            line-height: 1.6;
        `
        item.appendChild(link)
        
        lista.appendChild(item)
    });
    sec.appendChild(lista)

    const ajudaSec = document.createElement('section')
    ajudaSec.className = 'ajuda-secMain'
    ajudaSec.style.cssText = `
        display: flex;
        align-items: center;
        justify-content: flex-start;
        width:95%;
        height: 150px;
        border-bottom: solid 1px #3B4A54;
    `

    const tituloH3 = document.createElement('h3')
    tituloH3.className = 'ajuda-titulo'
    tituloH3.textContent = 'Ainda precisa de ajuda?'
    tituloH3.style.cssText = `
        font-weight: 400;
        margin-right: 25px;
        font-size: 22px;
        text-align: left;
        max-width: 900px;
        color: #fff;
        text-shadow: 0px 4px 12px rgba(0, 0, 0, 0.75);
    `
    ajudaSec.appendChild(tituloH3)

    const btnContato = document.createElement('button')
    btnContato.className = 'ajuda-btn'
    btnContato.textContent = 'Fale com a gente'
    btnContato.style.cssText = `
        width: 300px;
        height: 60px;
        background: linear-gradient(180deg, #3B4A54, #2F3B43);
        font-weight: 400;
        font-size: 22px;
        text-align: center;
        border-style:none;
        border-radius: 5px;
        color: white;
        cursor: pointer;
    `

    btnContato.addEventListener('click',()=>{
        window.location.href='https://nxplay.com.br/'
    })

    ajudaSec.appendChild(btnContato)

    mainSection.appendChild(ajudaSec)

}