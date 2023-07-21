function MostrarMensagem(ret)
{
    switch (ret) 
    {
        case -1:
            toastr.error('OCorreu um erro na operação');
            break;

        case 0:
            toastr.warning('Preencher os campos obrigatórios');
            break;

        case 1:
            toastr.success('Cadastrado com sucesso');
            break;

    }
}