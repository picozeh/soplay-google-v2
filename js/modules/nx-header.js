export const nxHeader=(mainSection)=>{

    const hdContainer = document.createElement('section')
    hdContainer.className = 'header-secMain'
    hdContainer.style.cssText=`
        position: absolute;
        top:0;
        display: flex;
        width: 100%;
        height: 180px;
        padding: 50px 100px 0 100px;
        justify-content: space-between;
        background: linear-gradient(180deg ,#13181B, transparent);
        z-index: 99;
    `
    mainSection.appendChild(hdContainer)


    const logo = document.createElement('img')
    logo.className = 'header-logo'
    logo.src = 'assets/icons/logo.png'
    logo.style.cssText=`
        height: 105px;
    `

    hdContainer.appendChild(logo)

    const botaoEntrar = document.createElement('button')
    botaoEntrar.className = 'header-btnEntrar'
    botaoEntrar.id = 'Cadastro'
    botaoEntrar.textContent = 'ENTRAR'
    botaoEntrar.style.cssText=`
        width: 130px;
        height: 50px;
        border-style: none;
        text-align: center;
        border: solid 1px white;
        border-radius: 5px;
        background-color: transparent;
        color: white;
        font-size: 22px;
        font-wheight:600;
        cursor: pointer;
    `

    botaoEntrar.addEventListener('click',()=>{
        window.location.href='https://nxplay.com.br/user/login'
    })

    hdContainer.appendChild(botaoEntrar)
}