function sweetAlert(titulo,mensagem,tipo,botao, fechar = 'Fechar'){
    Swal.fire({
        title: titulo,
        html: mensagem,
        type: tipo,
        confirmButtonClass: ""+botao+"",
        buttonsStyling: false,
        confirmButtonText: fechar
    });
}

function redirect(href){
    window.location.href = href;
}

function emailValido(email){
    return email.includes("@") && (email.includes(".com") || email.includes(".com.br"))
}

function senhasIguais(senha, outraSenha) {
    return senha == outraSenha
}

function obterAplausos() {
    aplausos = obterObjectAplauso() 
    aplausosTratadas = reduzirDescription(aplausos, 38)
    return aplausosTratadas
}



function obterNoticia(){
    return {
        title: 'Roberto comenta sobre bastidores do grande show em Israel.',
        imageUrl: '/assets/img/thumb-search.jpg',
        timestamp: new Date('2020-08-20T00:00:00').toLocaleDateString(),
        content: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.<br><br>'+
            'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.<br><br>'+
            'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.<br><br>'+
            'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'
    }
}

function obterNoticiasRelationadas() {
    novidades = obterObjectNoticiasRelacionadas() 
    novidadesTratadas = reduzirDescription(novidades, 38)
    return novidadesTratadas
}

function obterObjectNoticiasRelacionadas() {
    return [{
        imageUrl: '/assets/img/thumbnail-slider.png',
        description: 'The atmosphere in Chania has a touch of Florence and Venice. The atmosphere in Chania has a touch of Florence and Venice. The atmosphere in Chania has a touch of Florence and Venice.',
        link:'interna-noticia.html'
    }, {
        imageUrl: '/assets/img/thumbnail-slider.png',
        description: 'Beautiful flowers in Kolymbari, Crete. Beautiful flowers in Kolymbari, Crete. Beautiful flowers in Kolymbari, Crete.',
        link:'interna-noticia.html'
    }, {
        imageUrl: '/assets/img/thumbnail-slider.png',
        description: 'The atmosphere in Chania has a touch of Florence and (p) Venice.',
        link:'interna-noticia.html'
    }, {
        imageUrl: '/assets/img/thumbnail-slider.png',
        description: 'Beautiful flowers in Kolymbari, Crete. Beautiful flowers in Kolymbari, Crete. Beautiful flowers in Kolymbari, Crete.',
        link:'interna-noticia.html'
    }, {
        imageUrl: '/assets/img/thumbnail-slider.png',
        description: 'The atmosphere in Chania has a touch of Florence and (p) Venice.',
        link:'interna-noticia.html'
    }, {
        imageUrl: '/assets/img/thumbnail-slider.png',
        description: 'Beautiful flowers in Kolymbari, Crete. Beautiful flowers in Kolymbari, Crete. Beautiful flowers in Kolymbari, Crete.',
        link:'interna-noticia.html'
    }]
}

function obterNovidades() {
    novidades = obterObjectNovidades() 
    novidadesTratadas = reduzirDescription(novidades, 38)
    return novidadesTratadas
}

function obterNoticiasCarousel() {
    noticias = obterObjectNoticias() 
    noticiasTratadas = reduzirDescription(noticias, 78)
    return noticiasTratadas
}

function reduzirDescription(colecao, maxCaracteres){
    colecaoTratada = []
    colecao.forEach(element => {
        if(element.description.length > maxCaracteres){
            element.description = element.description.substring(0, maxCaracteres - 4) + "..."
        }
        colecaoTratada.push(element)
    })
    return colecaoTratada
}

function dataNascimentoInvalida(data){
    
    if(data.trim() == "") return true
    
    nascimento = new Date(data + "T00:00:00")
    hoje = new Date()

    if(nascimento > hoje) return true;

    menorNascimentoValido = new Date(hoje.getFullYear() - 18, hoje.getMonth(), hoje.getDate())

    if(menorNascimentoValido < nascimento) {
        return true;
    }
    return false;
}

function validarTelefone(numero){
    erros = []
    if(numero.trim() == ""){
        erros.push("telefone-vazio")
    }
    else if(!telefoneValido(numero)){
        erros.push("telefone-invalido")
    }
    return erros
}

function validarCheckout(formulario){
    
    var erros = []
    
    if(formulario.nome.trim() == ""){
        erros.push("nome")
    }

    if(formulario.lastName.trim() == ""){
        erros.push("last_name")
    }
    
    if(dataNascimentoInvalida(formulario.dataNascimento)) {
        erros.push("data-nascimento-invalida")
    }

    if(formulario.email.trim() == "") {
        erros.push("email-vazio")
    } 
    else if(!emailValido(formulario.email)){
        erros.push("email-invalido")
    }

    // if(!cpfValido(formulario.cpf) && formulario.souEstrangeiro != "on"){ //TODO - Usar essa condição quando for permitido checar "sou estrangeiro"
    if(!cpfValido(formulario.cpf)){
        erros.push("cpf-invalido")
    }

    validarSenhaCadastro(formulario.senha, formulario.senhaRepetida, erros) 

    if(formulario.rua != undefined && !formulario.rua.trim()){
        erros.push("rua")
    }
    
    if(!telefoneValido(formulario.telefone)){
        erros.push("telefone")
    }

    if(formulario.numeroRua != undefined && !formulario.numeroRua.trim()){
        erros.push("numero-rua")
    }

    if(formulario.bairro != undefined && !formulario.bairro.trim()){
        erros.push("bairro")
    }

    if(formulario.cep != undefined && !formulario.cep.trim()){
        erros.push("cep")
    }

    if(formulario.cidade != undefined && !formulario.cidade.trim()){
        erros.push("cidade")
    }

    if(!numeroCartaoValido(formulario.numeroCartao)){
        erros.push("cartao")
    }

    if(formulario.titularCartao.length < 6) {
        erros.push("titular-cartao")
    }

    if(!cvvValido(formulario.cvv)){
        erros.push("cvv-invalido")
    }

    if(validadeCartaoInvalida(formulario.validadeCartao)){
        erros.push("validade-invalida")
    }
    return erros
}

function telefoneValido(telefone){
    tel = telefone.replaceAll(/[ )(._-]/g, "")
    return tel.length == 11
}

function validadeCartaoInvalida(validade) {
    return mesInvalidoValidadeCartao(validade) || cartaoVencido(validade)
}

function mesInvalidoValidadeCartao(validade){
    if(validade.substring(0,2) > 12 ) return true
    else return false
}
function cartaoVencido(validade){
    hoje = new Date()
    vencidoEsteAno = validade.substring(validade.length, validade.length - 4) == hoje.getFullYear()
                     && hoje.getMonth() + 1 > validade.substring(0,2)
    anoValidadePassado = validade.substring(validade.length, validade.length - 4) < hoje.getFullYear()
    
    if(vencidoEsteAno || anoValidadePassado) return true
    else return false
}

function cvvValido(cvv) {
    if(cvv.replaceAll("_","").length < 3) return false
    else return true
}

function cancelarAssinatura(){
   
    const promise = new Promise(function(resolve, reject){ //Essa promise simula uma chamada para o cancelamento da assinatura
        setTimeout(()=> {
            // return reject()
            return resolve(true);
        }, 2000)
    })

    return promise
}

function salvarDadosContato(telefone, email){
    const promise = new Promise(function(resolve, reject){ //Essa promise simula uma chamada para salvamento de email e celular
        setTimeout(()=> {
            // return reject()
            return resolve(true);
        }, 1000)
    })

    return promise
}

function numeroCartaoValido(numero){
    if(numero.replaceAll(/[ ._]/g,"").length < 16) return false;
    else return true;
}

function validarCartao(numero, nome, cvv, validade){
    const promise = new Promise(function(resolve, reject){
        //Essa promise simula uma chamada para a cobrança de validação do cartão
        setTimeout(()=> {
            // return reject()
            return resolve(true)
        }, 2000)
    })

    return promise
}

function cpfValido(cpf){
    var c = cpf.replaceAll(/\D/g, '');

    if(c.length != 11){
        return false;
    }

    var resto = (c[0]*10+c[1]*9+c[2]*8+c[3]*7+c[4]*6+c[5]*5+c[6]*4+c[7]*3+c[8]*2)%11
    if((resto == 0 || resto == 1) && c[9] != 0) return false;
    if(resto > 1 && c[9] != 11 - resto) return false;
    
    var novoResto = (c[0]*11+c[1]*10+c[2]*9+c[3]*8+c[4]*7+c[5]*6+c[6]*5+c[7]*4+c[8]*3+c[9]*2)%11
    if((novoResto == 0 || novoResto == 1) && c[10] != 0) return false;
    if(novoResto > 1 && c[10] != 11 - novoResto) return false;

    return true;
}

function validarEmailRecuperarSenha(email){
    erros = []
    if(email.trim() == ""){
        erros.push("email-vazio")
        return erros
    }
    if(!emailValido(email)){
        erros.push("email-invalido")
        return erros
    }
    return erros
}

function fazerLogin(email, senha){
    erros = []
    credenciaisValidas = credenciaisCorretas(email, senha)
    
    if(credenciaisValidas) {
        window.location.replace('./login-codigo.html')
    } 
    
    if(email.trim() == ""){
        erros.push("email-vazio")
    }
    else if(!emailValido(email)){
        erros.push("email-invalido")
    }
    
    if(senha.trim() == ""){
        erros.push("senha-vazia")
    }
    
    if(!credenciaisValidas){
        erros.push("login-incorreto")
    }
    return erros
}

function carregarMinhaConta(){
    return {
        nome: "Usuária",
        dataNascimento: new Date('1958/12/20').toLocaleDateString("pt-BR"),
        sexo: "Feminino", 
        cpf: "612.790.780-22",
        email: "usuario@comets.com.br",
        telefone: "00999998888",
        hintCartao:"8977",
        dataProximoPagamento: new Date('2020/01/20').toLocaleDateString("pt-BR"),
        valorProximoPagamento: 15.90,
        nomeSocio: "Usuária M C Rodrigues",
        dataAssociacao: new Date('2019/01/20').toLocaleDateString("pt-BR"),
        dataAssinatura: new Date('2019/01/20').toLocaleDateString("pt-BR"),
        valorAssinatura: 120.00,
        plano: "mensal",
        acessoAte: new Date('2021/03/20').toLocaleDateString("pt-BR"),
    }
}

function credenciaisCorretas(email, senha) {
    return email == "usuario@comets.com.br" && senha == 123;
}

/*function emailValido(email){
    return email != undefined && email.includes("@") && (email.includes(".com") || email.includes(".com.br"))
}*/

function validarCodigoSMS(first, second, third, fourth){
    if(codigoCorreto(first, second, third, fourth)){ 
        window.location.replace('./radio.html');
    }
    else {
        return false;
    }
}

function codigoCorreto(first, second, third, fourth) {
    return first == '1' && second == '2' && third == '3' && fourth == '4';
}

function validarSenhaCadastro(senha, senhaRepetida, erros){
    if(senha.length < 6){
        erros.push("senha-curta");
        return;
    }
    if(senha != senhaRepetida){
        erros.push("senha-divergente");
    }
}

function validarAlterarSenha(senhaAntiga, senhaNova, senhaNovaRepetida){
    
    var promise = new Promise(function(resolve, reject){
        setTimeout(()=> { // Este set timeout é para simular uma chamada a uma API externa
            // reject("erro-sistema")
            var senhaCorreta = checarSenhaUsuario(senhaAntiga); 
            if(!senhaCorreta) {
                return reject("senha-incorreta")
            }

            var mesmaSenha = senhasIguais(senhaNova, senhaNovaRepetida)
            var tamanhoSenhaMaiorQueSeis = senhaNova.length > 5
            var senhasOk = mesmaSenha && tamanhoSenhaMaiorQueSeis

            if(!senhasOk){
                var erro = tamanhoSenhaMaiorQueSeis ? "" : "senha-curta"
                erro = mesmaSenha ? erro : "senha-divergente"

                return reject(erro)
            }

            return resolve(true)
        }, 2000)
    })

    return promise
}

function checarSenhaUsuario(senhaAntiga) {
    //Chamada pra validar senha antiga
    return senhaAntiga.toString() == '123456';
}

function validarNovaSenha(senha, senhaRepetida){
    erros =[]
    if(senha.length < 6){
        erros.push("senha-curta")
    }
    if(!senhasIguais(senha, senhaRepetida)){
        erros.push("senha-divergente")
    }
    if(erros.length == 0){
        cadastrarNovaSenha(senha, senhaRepetida)
    }
    return erros;
}

function cadastrarNovaSenha(senha, senhaRepetida){
    //Cadastrar senha do usuário
}

function cadastrar(nome, email, telefone){
    let camposInvalidos = [];
    if(nomeInvalido(nome)){
        camposInvalidos.push("nome-invalido");
    }
    if(!emailValido(email)){
        camposInvalidos.push("email-invalido");
    }
    if(telefone.trim() == ""){
        camposInvalidos.push("telefone-vazio")
    }
    else if(!telefoneValido(telefone)){
        camposInvalidos.push("telefone-invalido")
    }
    return camposInvalidos;
}

function nomeInvalido(nome) {
    if (nome.length < 6) return true;
    else return false;
}