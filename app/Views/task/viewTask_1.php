<?php  $this->layout('layoutBootstrap', ['title' => ' Task overview', 'currentPage'=>'viewtasks']) ?>

<?php  $this->start('main_content') ?>


<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/highcharts-more.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>

<!--DIV containing the entire bubble graph-->
<div id="containerBubbles" style="height: 80%; min-width: 310px; max-width: 100%; margin: 0 auto"></div>


<script>
//    prnt_r ($tasksFromConstructions);
Highcharts.chart('containerBubbles', {

    chart: {
        type: 'bubble',
        plotBorderWidth: 1,
        zoomType: 'xy'
    },

    legend: {
        enabled: false
    },

    title: {
        text: 'Overview of all the existing tasks'
    },

    subtitle: {
        text: 'Tasks are regrouped by their process (X) and distributed acordind to their date (Y)'
    },

    xAxis: {
        gridLineWidth: 1,
        title: {
            text: 'Time Axis'
        },
        labels: {
            format: '{value} days'
        },
        plotLines: [{
            color: 'black',
            dashStyle: 'dot',
            width: 2,
            value: 7,
            label: {
                rotation: 270,
                y: 100,
                x: 15,
                style: {
                    fontStyle: 'italic'
                },
                text: 'last week'
            },
            zIndex: 3
        },{
            color: 'black',
            dashStyle: 'dot',
            width: 1,
            value: 14,
            label: {
                rotation:270,
                y: 100,
                x: 15,
                style: {
                    fontStyle: 'italic'
                },
                text: 'two weeks ago'
            },
            zIndex: 3
        }]
    },

    yAxis: {
        startOnTick: false,
        endOnTick: false,
        title: {
            text: 'All the processes in order they were created'
        },
        labels: {
            format: 'ID {value}'
        },
        maxPadding: 0.2,
        plotLines: [{
            color: 'black',
            dashStyle: 'dot',
            width: 2,
            value: 50,
            label: {
                align: 'right',
                style: {
                    fontStyle: 'italic'
                },
                text: 'mark a process',
                /*
                x: -10
                */
            },
            zIndex: 3
        }]
    },

    tooltip: {
        useHTML: true,
        headerFormat: '<table>',
        pointFormat:
            '<tr><th colspan="2"><h3>{point.country}</h3></th></tr>'
            ,
        footerFormat: '</table>',
        followPointer: true
    },

    plotOptions: {
        series: {
            dataLabels: {
                enabled: true,
                format: '{point.name}'
            }
        }
    },

    series: [{
        data: [

            { x: 8, 
                y: 20, 
                z: 24, 
                con_name: "< ?=$value['con_name']?>", 
                textName: "< ?=$value['tas_name']?>", 
                startdate: "< ?=$value['tas_start']?>", 
                stopdate: "< ?=$value['tas_stop']?>", 
                name: "<a href= http://www.wf3.fr/ > wf3.fr</a>", 
                process: " < ?=$value['pro_name']?>" }
        ]
    }],
                credits: {
                enabled: false
            }

});

</script>

<!--classic box-iesque view of the tasks-->
<!--
< ?php foreach ($tasksFromConstructions as $key => $value): ?>
<a style="color:white" href="< ?= $this->url('task_addtask') ?>">
<div style="background-color: #006687; padding: 25px; margin: 25px; width: 100px; display: inline-block">
    <p>
        < ?=$value['tas_name']?>
    </p>
    
</div>
</a>
< ?php endforeach ; ?>-->

<?php $this->stop('main_content') ?>