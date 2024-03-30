<?php

    use Src\Controller\EquipamentoCTRL;
    Use Src\_Public\Util;

    include_once dirname(__DIR__, 2) . '/Resource/dataview/gerar_pdf_dataview.php';

    if (isset($_POST['btn_pdf'])) 
    {
        $tipo_filtro = $_POST['tipo'];
        $modelo_filtro = $_POST['modelo'];

        $dados = (new EquipamentoCTRL)->filtrarEquipamentoCtrl($tipo_filtro, $modelo_filtro);
    
        $cabecalho = "<center>Equipamentos</center><hr>";

        
        $table_inicial = "<table>
                            <thead>
                                <tr>
                                    <th>Tipo</th>
                                    <th>Modelo</th>
                                    <th>Identificação</th>
                                    <th>Descrição</th>
                                    <th>Situação</th>
                                </tr>
                            </thead>
                           <tbody>";
        $table_result = "";
                foreach ($dados as $item) {
                    $table_result = "<tr>
                                        <td>" . $item['nome_tipo'] . "</td>
                                        <td>" . $item['nome_modelo'] . "</td>
                                        <td>" . $item['identificacao'] . "</td>
                                        <td>" . Util::TratarExibicao($item['descricao']) . "</td>
                                        <td>" . $item['situacao'] . "</td>
                                    </tr>";
                }
        $table_result .= "</tbody></table>";

        $resultado = $cabecalho . $table_inicial . $table_result;

        $dompdf->loadHtml($resultado);

        // (Optional) Setup the paper size and orientation
        $dompdf->setPaper('A4', 'landscape');

        // Render the HTML as PDF
        $dompdf->render();

        // Output the generated PDF to Browser
        $dompdf->stream();

    }
?>