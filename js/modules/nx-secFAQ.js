export const nxSecFAQ=(mainSection)=>{
    
    const secTextos ={
        titulo:'PERGUNTAS FREQUENTES',
        subtitulo: 'Ainda precisa de ajuda?',
        btnTxt: 'Fale com a gente'
    }

    const selecTextos =[
        {
            pergunta:'O que é o NXPlay?',
            resposta:`
            NX Play é uma plataforma de conteúdo via streaming que oferece acesso a VODs (Videos on Demand) com Filmes, séries, desenhos, shows, documentários e outros conteúdos que você pode assistir onde e quantas vezes quiser. 
            A programação da NX Play oferece também ampla e variada programação com canais abertos e fechados de Filmes, Séries, Desenhos, Documentários, Entretenimento, Noticiário, Esportes, Natureza, Música, Programas de auditório e muito mais.
            Tudo isso em um só lugar.
            Aqui na NX Play você sempre encontra novidades. Adicionamos frequentemente novos títulos de vídeos e canais ao vivo.
            É uma forma econômica de assistir vídeos e canais de TV ao vivo legalizados. Isso mesmo, conteúdo de qualidade por um valor acessível. 
            `  
        },
        {
            pergunta:'Como acesso a NX Play?',
            resposta:`
            Nos smartphones e tablets, via loja Apple Store para produtos da Apple e Play Store para produtos Android. 
            No computador, o NX Play é compatível com todos os navegadores pelo endereço http://www.nxplay.com.br. Insira seu login e senha.
            Você pode assistir também em TVs  Android, TV Samsung (fabricadas a partir de 2018 – Sistema Tizen), TV LG (WebOs 5.0 ou acima), Roku ou utilizando um Set Top Box.
            `
        },
        {
            pergunta:'Quanto custa?',
            resposta: `
            A NX Play oferece planos acessíveis a partir de R$ 9,90 pelo cartão de crédito no formato recorrência, ou seja, não impacta o limite do seu cartão. Já no seu pacote básico, toda a família tem opções variadas em canais de TV e vídeos. O cliente poderá a qualquer momento solicitar a manutenção no plano para adquirir novos pacotes. Entre em contato com a nossa equipe pelo e-mail: comercial@nxplay.com.br .
            `
        },
        {
            pergunta:'Posso testar a NxPlay?',
            resposta:`
            Faça seu cadastro em nossa plataforma e usufrua de 7 (sete) dias corridos para teste. Para sua comodidade, após os 7 (sete) dias o sistema fará o débito no seu cartão. Caso não queira continuar na plataforma, solicite o cancelamento pelo link na plataforma.
            `
        },
        {
            pergunta:'Quero saber mais',
            resposta:`
            A NX Play tem Política de privacidade?
            Sim. A NX Play sabe o quanto sua segurança e sua privacidade são importantes. Para garantir a sua tranquilidade, publica normas que todo cliente deve seguir e os compromissos que a NX Play estabelece para garantir sua privacidade.
            Acesse na íntegra a nossa política de privacidade clicando aqui.
            
            Como faço para cancelar?
            A NX Play é flexível. Não há taxa de cancelamento. Entre em contato com a nossa equipe pelo e-mail: comercial@nxplay.com.br
            
            Quais canais de contato com a NX Play?
            Você pode entrar em contato pelos seguintes canais, por assunto:
            - Adquirir pacotes: comercial@nxplay.com.br
            - Financeiro e outros assuntos: atendimento@nxplay.com.br 
            - Técnico: suporte@nxplay.com.br
            `
        }
    ]

    

    const quintaSecao = document.createElement('section')
    quintaSecao.className = 'faq-secMain'
    quintaSecao.id = 'Duvidas'
    quintaSecao.style.cssText = `
        display:flex;
        flex-direction: column;
        height: 600px;
        width: 1000px;
        margin-top: -50px;
        justify-content: center;
        align-items: center;
        align-self: center;
        color: white;
    `
    mainSection.appendChild(quintaSecao)

    
    const tituloH1 = document.createElement('h1')
    tituloH1.className = 'faq-titulo titulo'
    tituloH1.textContent = secTextos.titulo
    tituloH1.style.cssText = `
        font-weight: 700;
        height: 35px;
        font-size: 34px;
        text-align: center;
        max-width: 800px;
        text-shadow: 0px 4px 12px rgba(0, 0, 0, 0.75);
        margin-bottom: 50px;
    `
    quintaSecao.appendChild(tituloH1)
    
    const secSelect = document.createElement('div')
    secSelect.className = 'faq-secSelect'
    secSelect.style.cssText = `
        display: flex;
        flex-direction: column;
        align-items: center;
        width: 100%;
    `

    quintaSecao.appendChild(secSelect)

    selecTextos.forEach((element, index) => {
        console.log(`elemento ${index}  ${element}`)
        const selec = document.createElement('div')
        selec.textContent = element.pergunta
        selec.className = `faq-selec-${index} faq-selec`
        selec.style.cssText=`
            width: 100%;
            height: 50px;
            padding: 0 50px;
            text-align: center;
            margin-top: 20px;
            font-size: 22px;
            font-weight: 400;
            outline: solid 1px #3B4A54;
            border-radius: 5px;
            background-color: var(--nx-bgColor);
            color: #C9C9C9;
            line-height: 2;
            overflow: hidden;
            cursor: pointer;
        `

        selec.addEventListener('click',()=>{
            const clicou = document.querySelectorAll('.clicou')
            if(clicou.length>0){
                clicou.forEach(element => {
                    element.classList.remove('clicou')
                    quintaSecao.classList.remove('faqExpand')
                })
            }
            if(!clicou[0]){
                selec.classList.add('clicou')
                quintaSecao.classList.add('faqExpand')
            }else{
                selec.classList.remove('clicou')
                quintaSecao.classList.remove('faqExpand')
            }
        })

        const optPergunta = document.createElement('p')
        optPergunta.textContent = element.resposta
        optPergunta.className = 'faq-opc'
        optPergunta.style.textAlign = 'left'
        optPergunta.style.marginTop = '50px'
        optPergunta.style.maxWidth = '100%'
        optPergunta.style.padding = '25px 0'
        optPergunta.style.alignSelf = 'center'
        optPergunta.style.borderTop = '1px solid #555'
        selec.appendChild(optPergunta)
        secSelect.appendChild(selec)
        
        
    });
}