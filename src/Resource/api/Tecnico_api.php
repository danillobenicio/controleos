<?php

    include_once dirname(__DIR__, 3) . '/vendor/autoload.php';
    use Src\Resource\api\Classes\TecnicoEndPoints;

    $obj = new TecnicoEndPoints();

    $obj->setMethod($_SERVER['REQUEST_METHOD']);

    if (!$obj->checkMethod())
        $obj->sendData('METODO INVÁLIDO', '-1', 'ERRO', $_SERVER['REQUEST_METHOD']);

    $recebido = getallheaders();
   

    $json = $recebido['Content-Type'] == 'application/json' ? true : false;

    if ($json) {
        $dados = file_get_contents('php://input'); // pega tudo que que mandei no body
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