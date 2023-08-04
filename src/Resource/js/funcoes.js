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
    MostrarMensagem(0); 
    if(!ret)
        return ret;
}