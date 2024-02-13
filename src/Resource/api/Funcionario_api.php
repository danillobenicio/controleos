<?php

    include_once dirname(__DIR__, 3) . '/vendor/autoload.php';

    use Src\Resource\api\Classes\FuncionarioEndPoints;

    $obj = new FuncionarioEndPoints();

    $obj->setMethod($_SERVER['REQUEST_METHOD']);

    if (!$obj->checkMethod())
        $obj->sendData('METHOD INVÁLIDO', '-1', 'ERRO');

    $recebido = getallheaders();

    $json = $recebido['Content-Type'] == 'application/json' ? true : false;

    //Verifica se o pacote de dados do cliente é no formato json

    if ($json) {
        $dados = file_get_contents('php://input');
        $dados = json_decode($dados, true);
    } else {
        $dados = $_POST;
    }

    $obj->setEndPoint($dados['endpoint']);

    if (!$obj->checkEndPoint($obj->getEndPoint()))
        $obj->sendData('ENDPOINT INVÁLIDO', '-1', 'ERRO');

    $obj->addParameters($dados);

    $result = $obj->{$obj->getEndPoint()}();

    $obj->sendData("Resultado", $result, "Sucesso");

?>