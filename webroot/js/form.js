$(document).ready(function () {
    $('#submitFilter').click(function(){
        $('#formFilter').submit();
    });
    
    $(".modal-body form").submit(function(e){ 
        e.preventDefault();
        var form = $(this);
        var postData = form.serializeArray();
        var formURL = form.attr("action");            
        $.ajax({
            url: formURL,
            type: "post",
            data: postData,
            success: function (data, textStatus, jqXHR) { 
                var retorno = JSON.parse(data);
                alert(retorno['status']);
                if(retorno['status'] == "error"){
                    //alert(retorno['errors']['termino']['terminoMenorQueInicio']);
                    form.find("div[class='error-message']").remove();
                    form.removeClass("was-validated"); 
                    $.each(retorno['errors'], function(index, value){
                        input = form.find("select[name*='"+index+"']");
                        div = input.parent('div');
                        div.addClass('error');                                               
                        div.append("<div class=\"error-message\">"+value['terminoMenorQueInicio']+"</div>");
                    });
                    
                    //alert(input.attr('name'));
                    
                    //alert(div.attr('class'));
                    
                    
                }else{
                    alert(retorno['redirect']);
                    $('.modal .close').click();
                }
                //   
                //location.reload();
                /*json = eval("(" + data + ")");
                $(':input').not(':button, :submit, :reset, :hidden, :checkbox, :radio').val('');                    
                $('.modal .close').click();   

                if(form.attr("id") == "historicoPesoForm"){
                    $('#tableHistoricosPeso tbody').append("<tr><td>"+json.data_afericao+"</td><td>"+json.peso+"</td><td><a href=\"#\"><i class=\"fa fa-trash\"></i></a></td></tr>");
                }

                if(form.attr("id") == "doencaCronicaForm"){
                    $('#lista_doencas_cronicas').append("<li>"+json.descricao+" <a href=\"#\"><i class=\"fa fa-trash\"></i></a></li>");
                }
                if(form.attr("id") == "alimentacaoEspecialForm"){
                    $('#lista_alimentacao_especial').append("<li>"+json.descricao+" <a href=\"#\"><i class=\"fa fa-trash\"></i></a></li>");
                }    
                if(form.attr("id") == "deficienciaFisicaForm"){
                    $('#lista_deficiencia_fisica').append("<li>"+json.descricao+" <a href=\"#\"><i class=\"fa fa-trash\"></i></a></li>");
                } */                     
            },
            error: function (jqXHR, status, error) {
                console.log(status + ": " + error);
            }
        });             
    });    
    
});

// Example starter JavaScript for disabling form submissions if there are invalid fields
(function() {
  'use strict';
  window.addEventListener('load', function() {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();




