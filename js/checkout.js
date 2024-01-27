function pagarmeToken(){
    var card = {}  
    card.card_holder_name = $("#titular-cartao").val()
    card.card_expiration_date = $("#validade-cartao").val()
    card.card_number = $("#numero-cartao").val().trim()
    card.card_cvv = $("#cvv-cartao").val()
    var cardValidations = pagarme.validate({card: card})
    pagarme.client.connect({ encryption_key: ''+pagarme_encryption_key+'' })
    .then(client => client.security.encrypt(card))
    .then(card_hash => {
        $('#card-hash').val(card_hash);
        if(!cardValidations.card.card_number){
            alert("Cartão inválido!");
            return false;
        } else {
            grecaptcha.ready(function() {
                grecaptcha.execute(''+recaptcha_key+'', {action: 'assinar'}).then(function(token) {
                    jQuery('#form-assinar').prepend('<input type="hidden" name="token" value="' + token + '">');
                    jQuery('#form-assinar').prepend('<input type="hidden" name="action" value="assinar">');
                    jQuery('#form-assinar').unbind('submit').submit();
                    jQuery("#concluir").html('Aguarde...');     
                    jQuery("#concluir").attr("disabled","disabled");     
                });;
            });  
        }
    })
    
}

$(document).ready(function(){
    $("#parcelas").change(function() {
        $("#parcela-selecionada").text($("#parcelas option:selected").val())
    })
    $('#box_anual').click(function(){
        $('#plano').val(id_plan_yearly);
        $('#plano_periodo').val('yearly');
    });
    $('#box_mensal').click(function(){
        $('#plano').val(id_plan_monthly);
        $('#plano_periodo').val('monthly');
    });

    var checkout = {}
    $("#telefone").inputmask("(99) 99999-9999");  
    $("#cpf").inputmask("999.999.999-99",{ "clearIncomplete": true });  
    $("#numero-cartao").inputmask("9999 9999 9999 9999",{ "clearIncomplete": true });  
    $("#validade-cartao").inputmask("99/99",{ "clearIncomplete": true });  
    $("#cvv-cartao").inputmask("9{3,4}");  
    $("#cep").inputmask("99999-999",{ "clearIncomplete": true });  
    $("#numero-rua").inputmask("9{1,6}");  
    
    $("#cep").keyup(async function (){
        if($("#cep").val().replaceAll(/[_.-]/g, '').length == 8){
            var cep = $("#cep").val().replaceAll(/[.-]/g, '');

            await fetch("https://viacep.com.br/ws/" + cep + "/json",
            { method: 'GET', mode: 'cors', cache: 'default'})
            .then(response => {
                response.json().then(data => {
                    $("#rua").val(data.logradouro);
                    checkout.rua = data.logradouro;
                    $("#bairro").val(data.bairro);
                    checkout.bairro = data.bairro;
                    $("#uf").val(data.uf);
                    checkout.uf = data.uf;
                    $("#cidade").val(data.localidade);
                    checkout.cidade = data.cidade;
                }) 
            })
            .catch(error => {
                console.log("Um erro ocorreu: ", error.message);
            });
        }
    });

    $(".plano-anual").click(function() { 
        $("#parcelas").removeClass("hidden")
        $(".plano-anual").addClass("selecionado")
        $(".plano-mensal").removeClass("selecionado")
        $(".resumo-mensal").addClass("hidden")
        $(".resumo-anual").removeClass("hidden")
    })

    $(".plano-mensal").click(function() { 
        $("#parcelas").addClass("hidden")
        $(".plano-mensal").addClass("selecionado")
        $(".plano-anual").removeClass("selecionado")
        $(".resumo-mensal").removeClass("hidden")
        $(".resumo-anual").addClass("hidden")
    })

    $("#nome").keyup(function(event) { 
        if (!(/ /.test(event.key) || /[a-z]/.test(event.key) || /[A-Z]/.test(event.key))) { 
            $("#nome").val($("#nome").val().substring(0, $("#nome").val().length - 1));
        };
    })

    $("#titular-cartao").keyup(function(event) { 
        if (!(/ /.test(event.key) || /[a-z]/.test(event.key) || /[A-Z]/.test(event.key))) { 
            $("#titular-cartao").val($("#titular-cartao").val().substring(0, $("#titular-cartao").val().length - 1));
        };
    })

    var timer;
    $("#concluir").click(function() {
        var planoMensal = $(".plano-anual.selecionado").val() == undefined;
        checkout = {
            nome: $("#nome").val(),
            lastName: $("#last_name").val(),
            dataNascimento: $("#data-nascimento").val(),
            sexo: $("#sexo option:selected").val(),
            cpf: $("#cpf").val(),
            souEstrangeiro: $("#estrangeiro:checked").val(),
            senha: $("#senha").val(),
            senhaRepetida: $("#senha-repetida").val(),
            apelido: $("#apelido").val(),
            email: $("#email").val(),
            telefone: $("#telefone").val(),
            cep: $("#cep").val(),
            rua: $("#rua").val(),
            numeroRua: $("#numero-rua").val(),
            complemento: $("#complemento").val(),
            bairro: $("#bairro").val(),
            cidade: $("#cidade").val(),
            uf: $("#uf").val(),
            planoMensal: planoMensal,
            numeroCartao: $("#numero-cartao").val(),
            titularCartao: $("#titular-cartao").val(),
            cvv: $("#cvv-cartao").val(),
            validadeCartao: $("#validade-cartao").val(),
            parcelas: $("#parcelas option:selected").val()
        }
        
        var camposInvalidos = validarCheckout(checkout);
        if(camposInvalidos != undefined && camposInvalidos.includes("nome")){
            $("#nome-invalido").removeClass("hidden");
            return false;
        } 
        else { $("#nome-invalido").addClass("hidden"); }

        if(camposInvalidos != undefined && camposInvalidos.includes("last_name")){
            $("#last_name-invalido").removeClass("hidden");
            return false;
        } 
        else { $("#last_name-invalido").addClass("hidden"); }
        
        if(camposInvalidos != undefined && $("#data-nascimento").val() == ""){
            $("#data-nascimento-invalido").removeClass("hidden");
            return false;
        } 
        else { $("#data-nascimento-invalido").addClass("hidden"); }

        if(camposInvalidos != undefined && camposInvalidos.includes("email")){
            $("#email-invalido").removeClass("hidden");
            return false;
        } 
        else { $("#email-invalido").addClass("hidden"); }

        if(camposInvalidos != undefined && camposInvalidos.includes("cpf")){
            $("#cpf-invalido").removeClass("hidden");
            return false;
        } 
        else { $("#cpf-invalido").addClass("hidden"); }

        if(camposInvalidos != undefined && camposInvalidos.includes("senha-curta")){
            $("#senha-curta").removeClass("hidden");
            return false;
        } 
        else { $("#senha-curta").addClass("hidden"); }

        if(camposInvalidos != undefined && camposInvalidos.includes("senha-divergente")){
            $("#senha-divergente").removeClass("hidden");
            return false;
        } 
        else { $("#senha-divergente").addClass("hidden"); }

        if(/[^a-zA-Z ]/.test($("#apelido").val().replaceAll(" ", ""))){
            $("#apelido-invalido").removeClass("hidden");
            return false;
        }
        else { $("#apelido-invalido").addClass("hidden"); }

        if(camposInvalidos != undefined && camposInvalidos.includes("cartao")){
            $("#cartao-invalido").removeClass("hidden");
            return false;
        } 
        else { $("#cartao-invalido").addClass("hidden"); }

        var camposInvalidosEndereco = "Campo(s) obrigatório(s): "
        if(camposInvalidos != undefined && camposInvalidos.includes("telefone")){
            camposInvalidosEndereco += "telefone, ";
            $("#endereco-invalido").removeClass("hidden"); 
            return false;
        } 
        if(camposInvalidos != undefined && camposInvalidos.includes("cep")){
            camposInvalidosEndereco += "CEP, ";
            $("#endereco-invalido").removeClass("hidden"); 
            return false;
        } 
        if(camposInvalidos != undefined && camposInvalidos.includes("rua")){
            camposInvalidosEndereco += "rua, ";
            $("#endereco-invalido").removeClass("hidden"); 
            return false;
        } 
        if(camposInvalidos != undefined && camposInvalidos.includes("numero-rua")){
            camposInvalidosEndereco += "número, "
        } 
        if(camposInvalidos != undefined && camposInvalidos.includes("bairro")){
            camposInvalidosEndereco += "bairro, ";
            $("#endereco-invalido").removeClass("hidden"); 
            return false;
        } 
        if(camposInvalidos != undefined && camposInvalidos.includes("cidade")){
            camposInvalidosEndereco += "cidade, ";
            $("#endereco-invalido").removeClass("hidden"); 
            return false;
        } 
        if(camposInvalidosEndereco.slice(camposInvalidosEndereco.length - 2) == ", "){
            camposInvalidosEndereco = camposInvalidosEndereco.slice(0, length - 2)+".";
            $("#endereco-invalido").removeClass("hidden"); 
            return false;
        } 
        $("#erro-endereco").text(camposInvalidosEndereco);
        if (camposInvalidosEndereco == "Campo(s) obrigatório(s): ") { 
            $("#endereco-invalido").addClass("hidden"); 
        } else{
            camposInvalidos.push("endereco")
        }


        if (camposInvalidos.length == 0) {
            $(".filter").removeClass("hidden")
            validarCartao(checkout.numeroCartao, 
                          checkout.titularCartao, 
                          checkout.validadeCartao,
                          checkout.cvv)
                .then(
                cartaoValido => {
                    if(cartaoValido != undefined && cartaoValido){
                        /*$("#pop-up-success").removeClass("hidden")
                        timer = setTimeout(() => {
                            closeSuccessPopUp()
                        }, 3000)*/
                    } 
                    if(cartaoValido!= undefined && !cartaoValido) {
                        /*$("#pop-up-error").removeClass("hidden")
                        timer = setTimeout(() => {
                            closeErrorPopUp()
                        }, 7000)*/
                    }
                }
            )
        }
        pagarmeToken();
        
    })

    $(".filter").click(function(){
        if($("#pop-up-success").hasClass("hidden")){
            closeErrorPopUp()
        }
        else if($("#pop-up-error").hasClass("hidden")){
            closeSuccessPopUp()
        }
    })

    function closeSuccessPopUp(){
        clearTimeout(timer)
        $("#pop-up-success").fadeOut(500, function() {
            $("#pop-up-success").fadeTo(0, 1)
            $("#pop-up-success").addClass("hidden")
        })
        fadeOutFilter()
    }

    function closeErrorPopUp(){
        clearTimeout(timer)
        $("#pop-up-error").fadeOut(500, function() {
            $("#pop-up-error").fadeTo(0, 1)
            $("#pop-up-error").addClass("hidden")
        })
        fadeOutFilter()
    }

    function fadeOutFilter(){
        $(".filter").fadeOut(1000, function() {
            $(".filter").fadeTo(0, 0.5)
            $(".filter").addClass("hidden")
            redirect('/login')
        })
    }
})
/*$(".pagarme_card").on('change', function(event){
    event.preventDefault();
    var card = {}  
    card.card_holder_name = $("#titular-cartao").val()
    card.card_expiration_date = $("#validade-cartao").val()
    card.card_number = $("#numero-cartao").val().trim()
    card.card_cvv = $("#cvv-cartao").val()
    var cardValidations = pagarme.validate({card: card})
    pagarme.client.connect({ encryption_key: 'ek_test_9KQlYYozQEldukdHUFB4OKNapdcFBn' })
    .then(client => client.security.encrypt(card))
    .then(card_hash => $('#card-hash').val(card_hash))
});
*/