<?php $this->layout('layoutBootstrap', ['title' => 'Output - Visuals', 'currentPage' => 'output']) ?>

<?php $this->start('main_content') ?>

<p>
    <strong>visuals - </strong><a href="<?= $this->url('output_outputText') ?>">Text</a>
</p>

<h2>output visuals</h2>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/highcharts-3d.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>

<!--<div id="chart1" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto"></div>-->
<div class = "panel panel-default">
   <div class = "panel-heading">
      <h3 class = "panel-title">
         Tasks related to the process <?=$allOutputFromProcess[0]['pro_name']?>
      </h3>
   </div>
   
   <!--<div class = "panel-body">-->
    <div id="taskCharts" class="panel-body">
<!--    <div id="taskCharts" class="panel-body" style="margin: auto 10px">-->
<?php foreach ($allOutputFromProcess as $key => $value): ?>
    <div id="chart<?=$key?>" style="min-width: 40%; height: 400px; max-width: 600px; margin: auto; display: inline-block"></div>
<?php endforeach ; ?>
    </div>
</div>
    <script>
//        Highcharts.getOptions().colors = Highcharts.map(Highcharts.getOptions().colors, function (color) {
//            return {
//                radialGradient: {
//                    cx: 0.5,
//                    cy: 0.3,
//                    r: 0.7
//                },
//                stops: [
//                    [0, color],
//                    [1, Highcharts.Color(color).brighten(-0.3).get('rgb')] // darken
//                ]
//            };
//        });
        
// CUSTOM COLORS    // green:  #90E82A // orange:  #FFC720 // red:  #BF1F0C
        Highcharts.setOptions({
    colors: ['#90E82A', '#BF1F0C', '#FFC720']
});
        // Radialize the colors
        Highcharts.getOptions().colors = Highcharts.map(Highcharts.getOptions().colors, function (color) {
            return {
                radialGradient: {
                    cx: 0.5,
                    cy: 0.3,
                    r: 0.7
                },
                stops: [
                    [0, color],
                    [1, Highcharts.Color(color).brighten(-0.3).get('rgb')] // darken
                ]
            };
        });
    // Build the chart
    <?php foreach ($allOutputFromProcess as $key => $value): ?>
        Highcharts.chart('chart<?=$key?>', {
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                type: 'pie'
            },
            title: {
                text: '<?= $value['tas_name'] ?>'
            },
            tooltip: {
                pointFormat: '{series.name}: <?= $value['tas_text'] ?><br><b>{point.percentage:.1f}%</b>'
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: true,
                        format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                        style: {
                            color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                        },
                        connectorColor: 'silver'
                    }
                }
            },
            series: [{
                    name: 'Brands',
                    data: [
                        {name: '<?=$value['tas_total_timeVA']?>min. AV / VA<br>Added Value', y: <?= $value['tas_va']?><?=$value['tas_total_timeVA']?>},
                        {
                            name: '<?=$value['tas_total_timeNVA']?>min. NAV / NVA-u<br>Non Added Value<br>',
                            y: <?= $value['tas_nva']?><?=$value['tas_total_timeNVA']?>,
                            sliced: true,
                            selected: true
                        },
                        {name: '<?=$value['tas_total_timeNVAU']?>min. NNAV / NVA-u <br> Necessary Non Added Value', y: <?= $value['tas_nvau']?><?=$value['tas_total_timeNVAU']?>}
                        //            
                        //            { name: 'Microsoft Internet Explorer', y: 56.33 },
                        //            {
                        //                name: 'Chrome',
                        //                y: 24.03,
                        //                sliced: true,
                        //                selected: true
                        //            },
                        //            { name: 'Firefox', y: 10.38 },
                        //            { name: 'Safari', y: 4.77 }, 
                        //            { name: 'Opera', y: 0.91 },
                        //            { name: 'Proprietary or Undetectable', y: 0.2 }
                    ]
                }],
            credits: {
                enabled: false
            }
        });
<?php endforeach ; ?>

    </script>
    <?php $this->stop('main_content') ?>
