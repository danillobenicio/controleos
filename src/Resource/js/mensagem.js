function MostrarMensagem(ret) {

    if (ret == -1){
        toastr.error('Ocorreu um erro na operação, contate o suporte técnico');
    }else if(ret == 0){
        toastr.warning('Preencher os campos obrigatórios');
    }else if(ret == 1){
        toastr.success('Cadastrado com sucesso');
    }else if(ret == 2){
        toastr.success('Alterado com sucesso');
    }else if(ret == 3){
        toastr.success('Registro Excluído com sucesso');
    }
    
}