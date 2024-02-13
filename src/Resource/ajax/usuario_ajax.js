function verificarEmailDuplicado(email)
{
    if(validarEmail(email))
    {
        $.ajax({
            beforeSend: function(){
                load();
            },
            type: 'POST',
            url: baseUrlDataview('usuario_dataview'),
            data: {
                verificarEmailDuplicado: 'ajx',
                email: email
            },
            success: function(ret){
                if(ret){
                    mostrarMensagem(12);
                    $('#email').val('');
                    $('#email').focus();
                }
            },
            complete: function(){
                removerLoad();
            }
        })
    }
}


function cadastrarUsuario(formID){
    
    if(validarCampos(formID)){

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
                load();
            },
            type: 'POST',
            url: baseUrlDataview('usuario_dataview'),
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
                mostrarMensagem(ret);
                
                if(ret == 1){                  
                    carregarTipoUsuario(0);
                }
                
            },
            complete: function(){
                removerLoad();
            }
        })
        
    }
    
}


function filtrarUsuario() 
{
    
    let nome = document.getElementById("nome_filtro").value;

    if(nome.length > 2) {

        $.ajax({
            beforeSend: function(){
                load();
            },
            type: 'POST',
            url: baseUrlDataview('usuario_dataview'),
            data: {
                filtrarUsuario: 'ajx',
                nome_filtro: nome
            },
            success: function(dados){

                if (dados == 0) {
                    mostrarMensagem(13);
                }

                $("#tableResult").html(dados);
            },
            complete: function(){
                removerLoad();
            }
        })

    }else {
        $("#tableResult").html("");
    }
}



function alterarStatusUsuario(id, status) {

    $.ajax({
        beforeSend: function(){
            load();
        },
        type: 'POST',
        url: baseUrlDataview('usuario_dataview'),
        data: {
            AlterarStatusUsuario: 'ajx',
            id_usuario: id,
            status_usuario: status
        },
        success: function(ret){
            mostrarMensagem(ret);

            if(ret == 2){
                filtrarUsuario();
            }
        },
        complete: function(){
            removerLoad();
        }
    })

}

function alterarUsuario(formID){
    
    if(validarCampos(formID)){

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
        let idUsuario     = $('#id_usuario').val();
        let idEndereco    = $('#id_endereco').val();
        let tipoUsuario   = $('#tipo_usuario').val();

        $.ajax({
            beforeSend: function(){
                load();
            },
            type: 'POST',
            url: baseUrlDataview('usuario_dataview'),
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
                idEndereco: idEndereco,
                tipoUsuario: tipoUsuario,
                idUsuario: idUsuario,
                btn_alterar: 'ajax'
            },
            success: function(ret){
                mostrarMensagem(ret);
                if(ret == 1){                  
                    carregarTipoUsuario(0);
                }              
            },
            complete: function(){
                removerLoad();
            }
        })
        
    }
    
}

function logar(formID)
{
    if (validarCampos(formID))
    {
        let login = $('#login').val();
        let senha = $('#senha').val();

        $.ajax({
            beforeSend: function(){
                load();
            },
            type: 'POST',
            url: BaseUrlDataview('usuario_dataview'),
            data: {                   
                btnValidarLogin: 'ajax',
                login: login,
                senha: senha
            },
            success: function(ret){
                mostrarMensagem(ret);
            },
            complete: function(){
                removerLoad();
            }
        })
    }
}