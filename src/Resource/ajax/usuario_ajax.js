function VerificarEmailDuplicado(email)
{

    if(validarEmail(email)){

        $.ajax({
            beforeSend: function(){
                Load();
            },
            type: 'POST',
            url: BaseUrlDataview('usuario_dataview'),
            data: {
                VerificarEmailDuplicado: 'ajx',
                email: email
            },
            success: function(ret){
                if(ret){
                    MostrarMensagem(12);
                    $('#email').val('');
                }
            },
            complete: function(){
                RemoverLoad();
            }
        })

    }
}


function CadastrarUsuario(formID){
    
    if(ValidarCampos(formID)){

        let tipoUsuario   = $('#tipo').val();
        let nomeUsuario   = $('#nome').val();
        let emailUsuario  = $('#email').val();
        let telUsuario    = $('#telefone').val();
        let cpfUsuario    = $('#cpf').val();
        let cepUsuario    = $('#cep').val();
        let ruaUsuario    = $('#rua').val();
        let bairroUsuario = $('#bairro').val();
        let estadoUsuario = $('#estado').val();
        let cidadeUsuario = $('#cidade').val();
        let setorFunc     = $('#resultSetor').val();
        let empresaTec    = $('#empresa').val();

        $.ajax({
            beforeSend: function(){
                Load();
            },
            type: 'POST',
            url: BaseUrlDataview('usuario_dataview'),
            data: {
                tipoUsuario: tipoUsuario,
                nomeUsuario: nomeUsuario,
                emailUsuario: emailUsuario,
                telUsuario: telUsuario,
                cpfUsuario: cpfUsuario,
                cepUsuario: cepUsuario,
                ruaUsuario: ruaUsuario,
                bairroUsuario: bairroUsuario,
                estadoUsuario: estadoUsuario,
                cidadeUsuario: cidadeUsuario,
                setorFunc: tipoUsuario == 2 ? setorFunc : '',
                empresaTec: tipoUsuario == 3 ? empresaTec : '',
                btnCadastrarUsuario: 'ajax'
            },
            success: function(ret){
                MostrarMensagem(ret);
                
                if(ret == 1){                  
                    CarregarTipoUsuario(0);
                }
                
            },
            complete: function(){
                RemoverLoad();
            }
        })
        
    }
}