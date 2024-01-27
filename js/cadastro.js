import { nxHeader } from "./modules/nx-header.js"

window.addEventListener('load',()=>{
    const mainSection = document.createElement('section')
    mainSection.className = 'main-section'
    mainSection.style.cssText=`
        display: flex;
        flex-direction: column;
        width: 90%;
        align-items: center;
        justify-content: center;
        align-self: center;
        padding: 0 50px;
        overflow: hidden;
    `

    document.body.appendChild(mainSection)

    nxHeader(mainSection)
    
})

