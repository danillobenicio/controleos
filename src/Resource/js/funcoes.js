function BaseUrlDataview(dataview) {
    return '../../Resource/dataview/' + dataview + '.php';
}


function LimparNotificacoes(formID) {
    $("#" + formID + " input, #" + formID + " select, #" + formID + " textarea").each(
        function () {
            $(this).val('');
            $(this).removeClass("is-invalid").removeClass("is-valid");
        }
    );
}

function ValidarCampos(formID) {

    let ret = true;

    $("#" + formID + " input, #" + formID + " select, #" + formID + " textarea").each(

        function () {

            if ($(this).hasClass("obg")) {

                if ($(this).val() == "") {
                    ret = false;

                    $(this).addClass("is-invalid");
                } else {
                    $(this).removeClass("is-invalid").addClass("is-valid");
                }

            }

        }

    );

    if (!ret)
        MostrarMensagem(0);
    return ret;
}

function Load() {
    $(".loader").addClass("is-active");
}

function RemoverLoad() {
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


function CarregarTipoUsuario(tipo) {

    $('#empresa').removeClass('obg');
    $('#setor').removeClass('obg');

    //Limpa os campos
    LimparNotificacoes("formCad");

    $('#tipo').val(tipo);

    switch (tipo) {
        case '1':
            $('#dadosUsuario').show();
            $('#dadosEndereco').show();
            $('#button').show();
            $('#dadosFuncionario').hide();
            $('#dadosTecnico').hide();
            break;
        case '2':
            $('#dadosUsuario').show();
            $('#dadosEndereco').show();
            $('#dadosFuncionario').show();
            $('#button').show();
            $('#dadosTecnico').hide();

            $('#setor').addClass('obg');
            
            break;
        case '3':
            $('#dadosUsuario').show();
            $('#dadosEndereco').show();
            $('#dadosTecnico').show();
            $('#button').show();
            $('#dadosFuncionario').hide();

            $('#empresa').addClass('obg');
           
            break;
        default:
            $('#dadosUsuario').hide();
            $('#dadosEndereco').hide();
            $('#dadosTecnico').hide();
            $('#button').hide();
            $('#dadosFuncionario').hide();
            break;
    }
}

/*function mascarasInput() {
    $('#telefone').mask('(00) 00000-0000');
    $('#cpf').mask('000.000.000-00', {reverse: true});
    $('#cep').mask('00000-000');
}*/

function validarCpf(cpf) {
    cpf = cpf.replace(/\D/g, '');
    let result = true;
    if (cpf.toString().length != 11 || /^(\d)\1{10}$/.test(cpf)) {
        result = false;
    }

    [9, 10].forEach(function (j) {
        var soma = 0,
            r;
        cpf.split(/(?=)/).splice(0, j).forEach(function (e, i) {
            soma += parseInt(e) * ((j + 2) - (i + 1));
        });
        r = soma % 11;
        r = (r < 2) ? 0 : 11 - r;
        if (r != cpf.substring(j, j + 1)) {
            result = false;
        }
    });

    if (!result) {
        MostrarMensagem(10);
        $('#cpf').val('');
        $('#cpf').focus();
    }
}


/*function checarEmail() {
    if (document.forms[0].email.value == "" ||
        document.forms[0].email.value.indexOf('@') == -1 ||
        document.forms[0].email.value.indexOf('.') == -1) {
        MostrarMensagem(11);
        return false;
    }
}*/


function validarEmail(email) {
    let re = /\S+@\S+\.\S+/;

    let retorno = true;

    if(!re.test(email)) {
        $('#email').val('');
        MostrarMensagem(11);
        retorno = false;
    }
    return retorno;
}