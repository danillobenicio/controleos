<?php

    use Src\Controller\ChamadoCTRL;

    include_once dirname(__DIR__, 3) . '/vendor/autoload.php';

    
    use Src\_Public\Util;

    Util::verificarLogado();

    $dados = (new ChamadoCTRL)->numerosChamadoAtualCtrl();

?>