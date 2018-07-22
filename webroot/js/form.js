$(document).ready(function () {
    $('#submitFilter').click(function(){
        $('#formFilter').submit();
    });  
    
    $('.modal .close').click(function(){
        $(':input').not(':button, :submit, :reset, :hidden, :checkbox, :radio').val('');
        $('div.error-message').remove();
        $('div.error').removeClass('error');
        
    });
  
    $("form").submit(function(e){         
        try{            
            var form = $(this);
            form.find("div.error-message").remove();
            form.find("div.error").removeClass('error');
            form.removeClass("was-validated");
            if(form.parent('div').hasClass('modal-body')){
                e.preventDefault();
            }
            if($(this)[0].checkValidity()){                
                $.post($(this).attr('action'), $(this).serialize(), function(data){  
                    var retorno = JSON.parse(data);
                    if(retorno['status'] === 'error'){
                        $.each(retorno['errors'], function(index, errors){
                            input = form.find("input[name*='"+index+"'], select[name*='"+index+"']");
                            div = input.parent('div');
                            div.addClass('error');   
                            $.each(errors, function(errorName, errorMsg){                                                                                           
                                div.append("<div class=\"error-message\">"+errorMsg+"</div>");     
                            });
                        });                        
                    }else{                        
                        $('.modal .close').click();
                        window.location.reload();
                    }
                });
            }else{   
                e.preventDefault();
                e.stopPropagation();
                $(this).addClass('was-validated');
            }            
        }
        catch(err){alert('err='+err);};
              
    });    
    
});





