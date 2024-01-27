export const nxFooter=(mainSection)=>{

    const ftContainer = document.createElement('section')
    ftContainer.className = 'ft-secMain'
    ftContainer.style.cssText=`
        display: flex;
        align-self:center;
        align-items: center;
        width: 95%;
        height: 100px;
    `

    mainSection.appendChild(ftContainer)

    const logo = document.createElement('img')
    logo.className = 'ft-logo'
    logo.src = 'assets/icons/logo.png'
    logo.style.cssText=`
        height: 50px;
    `

    ftContainer.appendChild(logo)

    const copy = document.createElement('p')
    copy.className = 'ft-copy subtitulo'
    copy.textContent = 'NXPlay - Todos os direitos reservados 2024'
    copy.style.cssText=`
        width: 100%;
        height: 50px;
        text-align: center;
        color: #E5E5E5;
        font-size: 18px;
        line-height: 3;
        font-wheight:600;
    `

    ftContainer.appendChild(copy)



    

}