<?php
    include_once dirname(__DIR__, 2) . '/Resource/dataview/inicial_dataview.php';

?>
<!DOCTYPE html>
<html>

<head>
    <?php
        include_once PATH . 'Template/_includes/_head.php';
    ?>
</head>

<body class="hold-transition sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">

        <?php
        include_once PATH . 'Template/_includes/_topo.php';
        include_once PATH . 'Template/_includes/_menu.php';
    ?>

        <div class="content-wrapper">
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Página Inicial</h1>
                        </div>
                    </div>
                </div>
            </section>

            <section class="content">
                <div class="card form-cadastro">
                    <div class="card-light">
                        <div class="card-header">
                            <h3 class="card-title">Informações dos Chamados</h3>
                            <div id="grafico_resultado" ></div>
                        </div>
                    </div>
                </div>
            </section>
        </div>

        <?php
        include_once PATH . 'Template/_includes/_footer.php'
        ?>
    </div>
    <?php 
        include_once PATH . 'Template/_includes/_scripts.php';
        include_once PATH . 'Template/_includes/_msg.php';
     ?>
      <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
      <script type="text/javascript">
            google.charts.load("current", {packages:['corechart']});
            google.charts.setOnLoadCallback(drawChart);
            function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ["Element", "Density", { role: "style" } ],
                ["Aguardando Atendimento", <?=$dados['quantidade_aguardando']?>, "blue"],
                ["Em Atendimento", <?=$dados['quantidade_em_atendimento']?>, "orange"],
                ["Finalizados", <?=$dados['quantidade_encerrado']?>, "green"]
            ]);

            var view = new google.visualization.DataView(data);
            view.setColumns([0, 1,
                            { calc: "stringify",
                                sourceColumn: 1,
                                type: "string",
                                role: "annotation" },
                            2]);

            var options = {
                title: "Números em tempo real",
                width: 600,
                height: 400,
                bar: {groupWidth: "95%"},
                legend: { position: "none" },
            };
            var chart = new google.visualization.ColumnChart(document.getElementById("grafico_resultado"));
            chart.draw(view, options);
        }
     </script>
</body>

</html>