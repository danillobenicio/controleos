<?php

    include_once dirname(__DIR__, 3) . '/vendor/autoload.php';

    use Src\_Public\Util;

    Util::verificarLogado();

    // reference the Dompdf namespace
    use Dompdf\Dompdf;

    // instantiate and use the dompdf class
    $dompdf = new Dompdf();

?>