function removerCaracteresNaoAlfabeticos(elemento){
    if(/[^A-Za-z ]/.test(elemento.val())){
        letras = elemento.val().replaceAll(/[^A-Za-z ]/g, "")
        elemento.val(letras)
    }
}