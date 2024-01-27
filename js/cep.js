$(document).ready(function () {
  $("input[name=cep]").blur(function () {
    var cep = $(this).val().replace(/[^0-9]/, '');
    if (cep) {
      var url = 'https://viacep.com.br/ws/' + cep + '/json/';
      $.ajax({
        url: url,
        dataType: 'jsonp',
        crossDomain: true,
        contentType: "application/json",
        success: function (json) {
          if (json.localidade) {
            $("input[name=cidade]").val(json.localidade);
            $("input[name=estado-uf]").val(json.uf);
            console.log(json);
          }
        }
      });
    }
  });
});