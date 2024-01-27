export const nxSecAssinar = (mainSection) => {

  const secTextos = {
    titulo: 'MILHARES DE FILMES, SÉRIES E DESENHOS + DIVERSOS CANAIS DE TV EM UM SÓ LUGAR!',
    subtitulo: 'POR APENAS R$ 9,90/MÊS APROVEITE O MELHOR CONTEÚDO PRA TODA A FAMÍLIA.',
    btn: `ASSINE JÁ`
  }


  const primeiraSecao = document.createElement('section')
  primeiraSecao.className = 'assinar-secMain'
  primeiraSecao.id = 'Assine'
  primeiraSecao.style.cssText = `
        display:flex;
        flex-direction: column;
        height: 1000px;
        width: 100%;
        justify-content: center;
        align-items: center;
        background: url('https://app.nxtv.com.br/landing-nxplay/assets/images/s1BG.png'),
                    linear-gradient(180deg, #241D51, #010101);
        background-position: center center;
        background-size: cover;
        box-shadow: inset 0 -50px 200px #010101,
                    inset -20px 0 80px #010101,
                    inset 20px 0 80px #010101;
        color: white;
    `
  mainSection.appendChild(primeiraSecao)


  const tituloH1 = document.createElement('h1')
  tituloH1.className = 'assinar-titulo titulo'
  tituloH1.textContent = secTextos.titulo
  tituloH1.style.cssText = `
        font-weight: 900;
        font-size: 50px;
        text-align: center;
        max-width: 1000px;
        text-shadow: 0px 4px 12px rgba(0, 0, 0, 0.75);
    `
  primeiraSecao.appendChild(tituloH1)

  const subTitulop = document.createElement('p')
  subTitulop.className = 'assinar-subTitulo subtitulo'
  subTitulop.textContent = secTextos.subtitulo
  subTitulop.style.cssText = `
        margin-top: 25px;
        font-weight: 400;
        font-size: 24px;
        text-align: center;
        max-width: 560px;
        text-shadow: 0px 4px 12px rgba(0, 0, 0, 0.75);
    `
  primeiraSecao.appendChild(subTitulop)

  const btnAssine = document.createElement('button')
  btnAssine.className = 'assinar-btnAssinar'
  btnAssine.textContent = secTextos.btn
  btnAssine.style.cssText = `
        width: 300px;
        height: 65px;
        background: linear-gradient(180deg, #FF9B32, #EE591C);
        margin-top: 25px;
        font-weight: 400;
        font-size: 24px;
        text-align: center;
        border-style:none;
        border-radius: 5px;
        color: white;
        cursor: pointer;
    `

  btnAssine.addEventListener('click', () => {
    window.location.href = 'cadastro.html'
  })

  //primeiraSecao.appendChild(btnAssine)
}