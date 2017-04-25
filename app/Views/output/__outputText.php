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
           NVS of Tasks related to the process <?= $allOutputFromProcess[0]['pro_name'] ?>
        </h3>
    </div>
    <div id="processPie">
        
        
    </div>
</div>

</div>
<div class = "panel panel-default">
    <div class = "panel-heading">
        <h3 class = "panel-title">
            Tasks related to the process <?= $allOutputFromProcess[0]['pro_name'] ?>
        </h3>
    </div>
    <div id="containerArea">
    </div>
</div>


<!--<div class = "panel-body">-->
<div id="taskCharts" class="panel-body">
    <!--    <div id="taskCharts" class="panel-body" style="margin: auto 10px">-->
    <?php foreach ($allOutputFromProcess as $key => $value): ?>
        <div id="chart<?= $key ?>" style="min-width: 40%; height: 400px; max-width: 600px; margin: auto; display: inline-block"></div>
    <?php endforeach; ?>
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
        Highcharts.chart('chart<?= $key ?>', {
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
                        {name: '<?= $value['tas_total_timeVA'] ?>min. AV / VA<br>Added Value', y: <?= $value['tas_va'] ?><?= $value['tas_total_timeVA'] ?>},
                        {
                            name: '<?= $value['tas_total_timeNVA'] ?>min. NAV / NVA-u<br>Non Added Value<br>',
                            y: <?= $value['tas_nva'] ?><?= $value['tas_total_timeNVA'] ?>,
                            sliced: true,
                            selected: true
                        },
                        {name: '<?= $value['tas_total_timeNVAU'] ?>min. NNAV / NVA-u <br> Necessary Non Added Value', y: <?= $value['tas_nvau'] ?><?= $value['tas_total_timeNVAU'] ?>}
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
<?php endforeach; ?>
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// processpie

////////////////////////////////////////////////////////// color Theme for chart
   
   /**
 * (c) 2010-2017 Torstein Honsi
 *
 * License: www.highcharts.com/license
 * 
 * Dark theme for Highcharts JS
 * @author Torstein Honsi
 */
//
//'use strict';
///* global document */
//// Load the fonts
//import Highcharts from '../parts/Globals.js';
//Highcharts.createElement('link', {
//   href: 'https://fonts.googleapis.com/css?family=Unica+One',
//   rel: 'stylesheet',
//   type: 'text/css'
//}, null, document.getElementsByTagName('head')[0]);
//
//Highcharts.theme = {
//   colors: ['#2b908f', '#90ee7e', '#f45b5b', '#7798BF', '#aaeeee', '#ff0066', '#eeaaee',
//      '#55BF3B', '#DF5353', '#7798BF', '#aaeeee'],
//   chart: {
//      backgroundColor: {
//         linearGradient: { x1: 0, y1: 0, x2: 1, y2: 1 },
//         stops: [
//            [0, '#2a2a2b'],
//            [1, '#3e3e40']
//         ]
//      },
//      style: {
//         fontFamily: '\'Unica One\', sans-serif'
//      },
//      plotBorderColor: '#606063'
//   },
//   title: {
//      style: {
//         color: '#E0E0E3',
//         textTransform: 'uppercase',
//         fontSize: '20px'
//      }
//   },
//   subtitle: {
//      style: {
//         color: '#E0E0E3',
//         textTransform: 'uppercase'
//      }
//   },
//   xAxis: {
//      gridLineColor: '#707073',
//      labels: {
//         style: {
//            color: '#E0E0E3'
//         }
//      },
//      lineColor: '#707073',
//      minorGridLineColor: '#505053',
//      tickColor: '#707073',
//      title: {
//         style: {
//            color: '#A0A0A3'
//
//         }
//      }
//   },
//   yAxis: {
//      gridLineColor: '#707073',
//      labels: {
//         style: {
//            color: '#E0E0E3'
//         }
//      },
//      lineColor: '#707073',
//      minorGridLineColor: '#505053',
//      tickColor: '#707073',
//      tickWidth: 1,
//      title: {
//         style: {
//            color: '#A0A0A3'
//         }
//      }
//   },
//   tooltip: {
//      backgroundColor: 'rgba(0, 0, 0, 0.85)',
//      style: {
//         color: '#F0F0F0'
//      }
//   },
//   plotOptions: {
//      series: {
//         dataLabels: {
//            color: '#B0B0B3'
//         },
//         marker: {
//            lineColor: '#333'
//         }
//      },
//      boxplot: {
//         fillColor: '#505053'
//      },
//      candlestick: {
//         lineColor: 'white'
//      },
//      errorbar: {
//         color: 'white'
//      }
//   },
//   legend: {
//      itemStyle: {
//         color: '#E0E0E3'
//      },
//      itemHoverStyle: {
//         color: '#FFF'
//      },
//      itemHiddenStyle: {
//         color: '#606063'
//      }
//   },
//   credits: {
//      style: {
//         color: '#666'
//      }
//   },
//   labels: {
//      style: {
//         color: '#707073'
//      }
//   },
//
//   drilldown: {
//      activeAxisLabelStyle: {
//         color: '#F0F0F3'
//      },
//      activeDataLabelStyle: {
//         color: '#F0F0F3'
//      }
//   },
//
//   navigation: {
//      buttonOptions: {
//         symbolStroke: '#DDDDDD',
//         theme: {
//            fill: '#505053'
//         }
//      }
//   },
//
//   // scroll charts
//   rangeSelector: {
//      buttonTheme: {
//         fill: '#505053',
//         stroke: '#000000',
//         style: {
//            color: '#CCC'
//         },
//         states: {
//            hover: {
//               fill: '#707073',
//               stroke: '#000000',
//               style: {
//                  color: 'white'
//               }
//            },
//            select: {
//               fill: '#000003',
//               stroke: '#000000',
//               style: {
//                  color: 'white'
//               }
//            }
//         }
//      },
//      inputBoxBorderColor: '#505053',
//      inputStyle: {
//         backgroundColor: '#333',
//         color: 'silver'
//      },
//      labelStyle: {
//         color: 'silver'
//      }
//   },
//
//   navigator: {
//      handles: {
//         backgroundColor: '#666',
//         borderColor: '#AAA'
//      },
//      outlineColor: '#CCC',
//      maskFill: 'rgba(255,255,255,0.1)',
//      series: {
//         color: '#7798BF',
//         lineColor: '#A6C7ED'
//      },
//      xAxis: {
//         gridLineColor: '#505053'
//      }
//   },
//
//   scrollbar: {
//      barBackgroundColor: '#808083',
//      barBorderColor: '#808083',
//      buttonArrowColor: '#CCC',
//      buttonBackgroundColor: '#606063',
//      buttonBorderColor: '#606063',
//      rifleColor: '#FFF',
//      trackBackgroundColor: '#404043',
//      trackBorderColor: '#404043'
//   },
//
//   // special colors for some of the
//   legendBackgroundColor: 'rgba(0, 0, 0, 0.5)',
//   background2: '#505053',
//   dataLabelsColor: '#B0B0B3',
//   textColor: '#C0C0C0',
//   contrastTextColor: '#F0F0F3',
//   maskColor: 'rgba(255,255,255,0.3)'
//};
//
//// Apply the theme
//Highcharts.setOptions(Highcharts.theme);
//   
//   
//   
//   
//   
//   
   
   
   
   
   
    // Build the chart *************************************************************************************************************

    // pie construction

   Highcharts.chart('processPie', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie'
    },
    title: {
        text: 'Browser market shares January, 2015 to May, 2015'
    },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
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
                }
            }
        }
    },
    series: [{
        name: 'Tasks',
        colorByPoint: true,
        data: [
            
                        <?php foreach ($getTasksProcessNVA as $key => $value) : ?>
                    {
            name: '<?=$value['tas_name'].' '.$value['tas_time_input'] ?>',
            y: <?= (100/$getNormalizingProcessNVA[0]['tas_sum_nva'])* $value['tas_time_input'] ?>
            },
                        <?php endforeach; ?>

            /*
        }, {
            name: 'Chrome',
            y: 24.03,
            sliced: true,
            selected: true
        }, {
        }, {
            name: 'Opera',
            y: 0.91
        }, {
            name: 'Proprietatzutzuetectable',
            y: 0.2
        },
        */
        ]
    }],
            credits: {
                enabled: false
            },
            
});
                                             
//                        < ?php foreach ($getTasksProcessNVA as $key => $value) : ?>
//                                    
//                        {name: 'min. AV / VA<br>Added Value', y: 15},
//                                
//                        < ?php endforeach; ?>
                            //< ?= (100/$getNormalizingProcessNVA[0]['tas_sum_nva'])* $value['tas_time_input'] ?>
//            /*{
//                            name: '<? = $value['tas_total_timeNVA'] ?>min. NAV / NVA-u<br>Non Added Value<br>',
//                            y: <? = ($value['tas_nva']) ?><? = $value['tas_total_timeNVA'] ?>,
//                            sliced: true,
//                            selected: true
//                        },
   //                     {name: '<? = $value['tas_total_timeNVAU'] ?>min. NNAV / NVA-u <br> Necessary Non Added Value', y: <? = $value['tas_nvau'] ?><? = $value['tas_total_timeNVAU'] ?>}
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


    /*
<!--< ?php for ($i=0;$i<count($allOutputFromProcess);$i++)-->
Highcharts.chart('containerArea', {
chart: {
    type: 'area'
},
title: {
    text: 'Split of AV, NAV, NAVU for the process < ?=$allOutputFromProcess["pro_name"]?>'
},
subtitle: {
    text: 'On site observations'
},
    < ?php foreach ($allOutputFromProcess as $key => $value): ?>
xAxis: {
    
    categories:'
    ['< ?=$value['tas_name'].','?>'
    < ?php endforeach ;?>],
        tickmarkPlacement: 'on',
    title: {
        enabled: false
    }
},
yAxis: {
    title: {
        text: 'Percent'
    }
},
tooltip: {
    pointFormat: '<span style="color:{series.color}">{series.name}</span>: <b>{point.percentage:.1f}%</b> ({point.y:,.0f} millions)<br/>',
    split: true
},
plotOptions: {
    area: {
        stacking: 'percent',
        lineColor: '#ffffff',
        lineWidth: 1,
        marker: {
            lineWidth: 1,
            lineColor: '#ffffff'
        }
    }
},
series: [{
    name: 'NVA',
    data: [502, 635, 809, 947, 1402, 3634, 5268]
}, {
    name: 'NVAU',
    data: [106, 107, 111, 133, 221, 767, 1766]
}, {
    name: 'VA',
    data: ['< ?=$allOutputFromProcess[0]['tas_total_timeVA']?>]
}]
});
*/
</script>
<?php $this->stop('main_content') ?>
