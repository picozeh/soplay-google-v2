import { nxHeader } from "./modules/nx-header.js"
import { nxSecAssinar } from "./modules/nx-secAssinar.js"
import { nxSecCanais } from "./modules/nx-secCanais.js"
import { nxSecFilmes } from "./modules/nx-secFilmes.js"
import { nxSecDispositivos } from "./modules/nx-secDispositivos.js"
import  { nxSecFAQ } from "./modules/nx-secFAQ.js"
import { nxSecMapa } from "./modules/nx-secMapa.js"
import { nxFooter } from   "./modules/nx-footer.js"

window.addEventListener('load',()=>{
    const mainSection = document.createElement('section')
    mainSection.className = 'main-section'
    mainSection.style.cssText=`
        display: flex;
        flex-direction: column;
        width: 100%;
        align-items: center;
        justify-content: center;
        align-self: center;
        padding: 0 50px;
        overflow: hidden;
    `

    document.body.appendChild(mainSection)

    nxHeader(mainSection)
    nxSecAssinar(mainSection)
    nxSecFilmes(mainSection)
    nxSecDispositivos(mainSection)
    nxSecCanais(mainSection)
    nxSecFAQ(mainSection)
    nxSecMapa(mainSection)
    nxFooter(mainSection)
})

