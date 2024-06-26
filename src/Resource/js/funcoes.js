function baseUrlDataview(dataview)
{
    return '../../Resource/dataview/' + dataview + '.php';
}


function limparNotificacoes(formID) {
    $("#" + formID + " input, #" + formID + " select, #" + formID + " textarea").each(
        function () {
            $(this).val('');
            $(this).removeClass("is-invalid").removeClass("is-valid");
        }
    );
}

function validarCampos(formID) {

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
        mostrarMensagem(0);
    return ret;
}

function load() {
    $(".loader").addClass("is-active");
}

function removerLoad() {
    $(".loader").removeClass("is-active");
}

function keyPressEnter(inputId, buttonId) {
    $('#' + inputId).keypress(function (e) {
        if (e.which == 13) {
            $('#' + buttonId).click();
            return false;
        }
    });
}


function carregarTipoUsuario(tipo) 
{

    $('#empresa').removeClass('obg');
    $('#setor').removeClass('obg');

    //Limpa os campos
    limparNotificacoes("formCad");

    $('#tipo').val(tipo);

    switch (tipo) {
        case '1':
            $('#dadosUsuario').show();
            $('#dadosEndereco').show();
            $('#button').show();
            $('#dadosFuncionario').hide();
            $('#dadosTecnico').hide();
            $('#empresa').removeClass('obg');
            $('#resultSetor').removeClass('obg');
            break;
        case '2':
            $('#dadosUsuario').show();
            $('#dadosEndereco').show();
            $('#dadosFuncionario').show();
            $('#button').show();
            $('#dadosTecnico').hide();

            $('#resultSetor').addClass('obg');
            $('#empresa').removeClass('obg');
            
            break;
        case '3':
            $('#dadosUsuario').show();
            $('#dadosEndereco').show();
            $('#dadosTecnico').show();
            $('#button').show();
            $('#dadosFuncionario').hide();

            $('#empresa').addClass('obg');
            $('#resultSetor').removeClass('obg');
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

function validarCpf(cpf) {
    let result = true;
    if (cpf != '') 
    {
        cpf = cpf.replace(/\D/g, '');
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
            mostrarMensagem(10);
            $('#cpf').val('');
            $('#cpf').focus();
        }
    }
    return result;
}

function validarEmail(email)
{
    let re = /\S+@\S+\.\S+/;
    let retorno = true;

    if(!re.test(email))
    {
        $('#email').val('');
        $('#email').focus();
        mostrarMensagem(11);
        retorno = false;
    }

    return retorno;
}