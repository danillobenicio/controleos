function BaseUrlDataview(dataview)
{
    return '../../Resource/dataview/' + dataview + '.php';
}


function LimparNotificacoes(formID)
{
    $("#" + formID + " input, #" + formID + " select, #" + formID + " textarea").each
    (        
        function()
        {                  
            $(this).val('');
            $(this).removeClass("is-invalid").removeClass("is-valid");          
        }       
    );
}

function ValidarCampos(formID)
{
    
    let ret = true;

    $("#" + formID + " input, #" + formID + " select, #" + formID + " textarea").each
    (
        
        function()
        {
            
           if($(this).hasClass("obg"))
           {
            
            if($(this).val() == "")
            {
                ret = false;

                $(this).addClass("is-invalid");
            }
            else
            {
                $(this).removeClass("is-invalid").addClass("is-valid");
            }

           }
           
        }
        
    );
    
    if(!ret)
        MostrarMensagem(0); 
    return ret;
}

function Load()
{
    $(".loader").addClass("is-active");
}

function RemoverLoad()
{
    $(".loader").removeClass("is-active");
}

function KeyPressEnter(inputId, buttonId) {
    $('#' + inputId).keypress(function (e) {
        if (e.which == 13) {
            $('#' + buttonId).click();
            return false;
        }
    });
}
