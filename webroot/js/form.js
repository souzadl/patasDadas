$(document).ready(function () {
    $('#submitFilter').click(function(){
        $('#formFilter').submit();
    });
    
    $(".modal-bodys form").submit(function(e){    
        //alert('oi');
        
        var form = $(this);

            var postData = form.serializeArray();
            var formURL = form.attr("action");            
            $.ajax({
                url: formURL,
                type: "POST",
                data: postData,
                success: function (data, textStatus, jqXHR) { 
                    $('.modal .close').click();   
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
        e.preventDefault();
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




