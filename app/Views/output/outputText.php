<?php $this->layout('layoutBootstrap', ['title' => 'Output - TEXT', 'currentPage' => 'outputText']) ?>

<?php $this->start('main_content') ?>

<p>
    <!--<strong><a href="< ?= $this->url('output_outputText') ?> "title="home">visuals</a> - text </strong>-->
    <strong>
        <a href=" <?= $this->url('output_outputVisuals', array('id' => $pro_id_visual)) ?> " title="home">visuals</a> - text 
    </strong>
</p>

<!-- ////////////////check for case if index 0 does not exist => php get keys////////////-->
<h2>Construction Title :     <strong><?= $allOutputFromProcess [0]['con_name']; ?></strong></h2>
<h5><strong>...<?= $allOutputFromProcess [0]['con_text']; ?></strong></h5>
<br>
<h4>Process :<strong><?= $allOutputFromProcess [0]['pro_name']; ?></strong></h4>
<h5><strong>...<?= $allOutputFromProcess [0]['pro_text']; ?></strong></h5>
<br>

<!--****************General Information**************************-->
<table class='table'>
    <!--
    <caption>Title:<strong>< ?= $allOutputFromProcess [0]['con_name']; ?></strong></caption>
    -->
    <tr>
        <td><strong>Building type:</strong></td>   
        <td><?= $allOutputFromProcess [0]['con_type']; ?></td> 
    </tr>
    <tr>
        <td><strong>Commissioned by:</strong></td>   
        <td><?= $allOutputFromProcess [0]['con_client']; ?></td> 
    </tr>
    <tr>
        <td><strong>City:</strong></td>   
        <td><?= $allOutputFromProcess [0]['cit_name']; ?></td> 
    </tr>
    <tr>
        <td><strong>Country:</strong></td>   
        <td><?= $allOutputFromProcess [0]['cou_name']; ?></td> 
    </tr>
</table>
<br>
<!--****************Tasks and workers**************************-->
<table class='table'>
    <tr>
        <td><strong>Tasks involved: </strong></td>
        <td> 
            <?php foreach ($allOutputFromProcess as $key => $value): ?>
                <?= $value ['tas_name']; ?><br>
            <?php endforeach; ?>
        </td>
        <td><strong>Teams involved: </strong></td>   
        <td> 
            <?php foreach ($allOutputFromProcess as $key => $value): ?>
                <?= $value ['tea_name']; ?><br>
            <?php endforeach; ?>
        </td>
        <td><strong>composed of the workers: </strong></td>
        <td>
<!--            Bug Error<br>
            Bug Error<br>
            Bug Error<br>
            Bug Error<br>
            Bugs Bunny<br>
            Bug Error<br>-->
            <?php foreach ($allOutputFromProcess as $key => $value): ?>
                ..<?= $value ['team_worker_id']; ?><br>
            <?php endforeach; ?>
        </td>


        <td><strong>Workers involved: </strong></td>
        <td> 
<!--            Bug Error<br>
            Bug Error<br>
            Bug Error<br>
            Bug Error<br>
            Bugs Bunny<br>
            Bug Error<br>
            Bug Error<br>
            Bug Error<br>
            Bug Error<br>            -->
            <?php foreach ($allOutputFromProcess as $key => $value): ?>
                ..<?= $value ['unique_worker_id']; ?><br>
            <?php endforeach; ?>
        </td>
    </tr>
</table>
<br>
<br>
<!--
        <form action="" method="post">
            <input type="text" name="txt" placeholder="city"/>
            <input type="submit" name="insert" value="insert" onclick="insert()" />
        </form>
-->
<p>here happens inline style!!</p>
<!--****************VA NVA NVAU Overview**************************-->
<?php foreach ($allOutputFromProcess as $key => $value): ?>

    <h1 style="display: inline">
        <h4 style="display: inline" > [<?= $value ['tas_id']; ?> ]</h4> 
        <h4 style="display: inline" > ... <?= $value ['tas_date']; ?> ...</h4> 
        <h2 style="display: inline"><?= $value ['tas_name']; ?>     </h2>

        <h4 style="display: inline" > ... <?= $value ['tas_text']; ?></h4>
    </h1>
    <br>
    <br>
    <!--  >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>> benjamin: better use a helper file <<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<< -->
    <table class='table' style="border: 1px solid lightgray; border-radius : 16px;
           /*border-collapse: collapse;*/
           padding: 25px;">
    <!--    <table class='table'
           style="border: 1px solid black;
           /*border-collapse: collapse;*/
           padding: 25px;">-->
        <thead>
            <tr style="background-color: lightgray"><!--A-->
                <th>english<!--1--></th>
                <th>francais<!--2--></th>
                <th>type<!--3--></th>
                <th>value<!--4--></th>
                <th>( time [min.] *<!--empty--><!--5--></th>
                <th> repetitions)<!--empty--><!--6--></th>
                <th>=  total time<!--empty--><!--7--></th>
                <th>Wastage ttype<!--8--></th>
            </tr>
        </thead>
        <!--// CUSTOM COLORS    // green:  #90E82A // orange:  #FFC720 // red:  #BF1F0C-->
        <tbody>
            <tr style="background-color: #BF1F0C"><!--B-->
                <td>unusefull no added value<!--1--></td>            
                <td>non valeur ajoutée inutile<!--2--></td>
                <td>NVA-i<!--3--></td>
                <td><?= \Model\OutputModel::floatToPercent($value['tas_nvau']); ?> % <!--4- value of NVAU out of the DB --></td>
                <td>
                    stopped:(<?= ($value['tas_timeNVA']); ?><!--5 - NAV--> *<br>
                    <!-- if both values are set, and not 0, and their difference is within +/- 10 minutes -->
                    <?php if ((isset($value['tas_calc_timeNVA']) && isset($value['tas_total_timeNVA'])) && (($value['tas_calc_timeNVA'] !== 0) && ($value['tas_total_timeNVA'] !== 0)) && ((($value['tas_calc_timeNVA'] - $value['tas_total_timeNVA']) <= -10) || (($value['tas_calc_timeNVA'] - $value['tas_total_timeNVA']) >= 10))): ?>
                        calc. difference:<br>
                        <?= ($value['tas_calc_timeNVA'] - $value['tas_total_timeNVA']); ?> <!--7-->
                    <?php endif; ?>
                    input:<?= ($value['tas_calc_timeNVA']); ?><!--5 - NAV-->
                </td>
                <td><?= ($value['tas_repeat']); ?>      )=   <!--6--> </td>
                <td>
                    <?= $value['tas_total_timeNVA']; ?> <br><!--7-->
                    <!-- if both values are set, and not 0, and their difference is within +/- 10 minutes -->
                    <?php if ((isset($value['tas_calc_timeNVA']) && isset($value['tas_total_timeNVA'])) && (($value['tas_calc_timeNVA'] !== 0) && ($value['tas_total_timeNVA'] !== 0)) && ((($value['tas_calc_timeNVA'] - $value['tas_total_timeNVA']) <= -10) || (($value['tas_calc_timeNVA'] - $value['tas_total_timeNVA']) >= 10))): ?>
                        calc. difference:<br>
                        <?= ($value['tas_calc_timeNVA'] - $value['tas_total_timeNVA']); ?> <!--7-->
                    <?php endif; ?>
                </td>
                <td><?= ($value['tas_wastage']); ?><!--8--></td>
            </tr>
            <tr style="background-color: #FFC720"><!--C-->
                <td>usefull no added value<!--1--></td>            
                <td>non valeur ajoutée utile<!--2--></td>
                <td>NVA-u<!--3--></td>
                <td><?= \Model\OutputModel::floatToPercent($value['tas_nva']); ?> % <!--4- value of NVA out of the DB --></td>
                <td>
                    stopped:(<?= ($value['tas_timeNVAU']); ?><!--5 - NAVU--> *<br>
                    input:<?= ($value['tas_calc_timeNVAU']); ?><!--5 - NAVU-->
                </td>                
                <td><?= ($value['tas_repeat']); ?>      )=   <!--6--></td>
                <td>
                    <?= $value['tas_total_timeNVAU']; ?> <br><!--7-->
                    <!-- if both values are set, and not 0, and their difference is within +/- 10 minutes -->
                    <?php
                    if ((isset($value['tas_calc_timeNVAU']) && isset($value['tas_total_timeNVAU'])) && (($value['tas_calc_timeNVAU'] !== 0) && ($value['tas_total_timeNVAU'] !== 0)) && ((($value['tas_calc_timeNVAU'] - $value['tas_total_timeNVAU']) <= -10) || (($value['tas_calc_timeNVAU'] - $value['tas_total_timeNVAU']) >= 10))):
                        ?>

                        calc. difference:<br>
                        <?= ($value['tas_calc_timeNVAU'] - $value['tas_total_timeNVAU']); ?> <!--7-->
                    <?php endif; ?>
                </td>
                <td> <!--8--></td>
            </tr>
            <tr style="background-color: #90E82A"><!--D-->
                <td>added value<!--1--></td>            
                <td>valeur ajoutée<!--2--></td>
                <td>VA<!--3--></td>
                <td><?= \Model\OutputModel::floatToPercent($value['tas_va']); ?> % <!--4- value of VA out of the DB --></td>
                <td>
                    stopped:(<?= ($value['tas_timeVA']); ?><!--5 - AV--> *<br>
                    input:<?= ($value['tas_calc_timeVA']); ?><!--5 - AV-->
                </td>                
                <td><?= ($value['tas_repeat']); ?>     )=   <!--6--></td>
                <td>
                    <?= $value['tas_total_timeVA']; ?> <br><!--7-->
                    <!-- if both values are set, and not 0, and their difference is within +/- 10 minutes -->
                    <?php if ((isset($value['tas_calc_timeVA']) && isset($value['tas_total_timeVA'])) && (($value['tas_calc_timeVA'] !== 0) && ($value['tas_total_timeVA'] !== 0)) && ((($value['tas_calc_timeVA'] - $value['tas_total_timeVA']) <= -10) || (($value['tas_calc_timeNVA'] - $value['tas_total_timeNVA']) >= 10))): ?>
                        calc. difference:<br>
                        <?= ($value['tas_calc_timeVA'] - $value['tas_total_timeVA']); ?><br> <!--7-->
                    <?php endif; ?>
                </td>
                <td><!--7--></td>
            </tr>
            <tr style="background-color: lightgray"><!--f-->
                <td>Timer date:<?= $value['tas_start_date'] . ' '; ?><br>until<?= ' ' . $value['tas_stop_date']; ?><!--1--></td>            
                <td>From:<?= $value['tas_start'] . ' '; ?><br>till<?= ' ' . $value['tas_stop']; ?><!--2--></td>
                <td><b>Time :</b><!--3--></td>
                <td><?= \Model\OutputModel::floatToPercent($value['tas_va']) + \Model\OutputModel::floatToPercent($value['tas_nvau']) + \Model\OutputModel::floatToPercent($value['tas_nva']); ?> % <!--4- value of VA out of the DB --></td>
                <td>
                    stopped:<?= ($value['tas_timeTotal']); ?> <br><!--5- Time-->
                    input: <?= ($value['tas_calc_timeTotal']); ?>*<!--5- Time-->
                </td>
                <td><?= ($value['tas_repeat']); ?>     )=   <!--6--></td>
                <td>
                    stopped:<?= ($value['tas_timeTotal'] * $value['tas_repeat']); ?> <br><!--7 TOTAL time-->
                    input: <?= ($value['tas_calc_timeTotal'] * $value['tas_repeat']); ?><!--7 TOTAL time-->
                <td><!--8--></td>
            </tr>
        </tbody>
    </table>
<?php endforeach; ?>


<table class='table'
       style="border: 1px solid black;
       border-collapse: collapse;
       padding: 25px;">
    <thead>
        <tr>

            <th>Task</th>
            <th>Date</th>             
            <th>Typologie</th>               
            <th>Name</th>
            <th>Val.</th>            
            <th></th>            
            <th></th>
            <th>Repetition</th>

            <th>Wastage</th>
            <th>Hardship</th>            
            <th>Start/Stop</th>            
            <th>Total time</th>           
        </tr>
    </thead>
    <tbody>


        <?php foreach ($allOutputFromProcess as $key => $value): ?>

            <!-- ask >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>> benjamin if this is the way to do -->
            <?php $accessToOutputModel = new \Model\OutputModel; ?>
            <tr>

                <!--Task  [tas_name] -->
                <td><?= $value['tas_name'] ?></td>
                <!--Task date [tas_date] -->
                <td><?= \Model\OutputModel::myDate($value['tas_date']) ?></td>
                <!--Typologie [tas_typology] -->
                <td><?= $value['tas_typology'] ?></td>
                <!--Name [tea_name] -->
                <td><?= $value['tea_name'] ?></td>
                <!--Value [tas_va]--> 
                <td>
                    <div style="color: #d11010">NAV<br> 
                        <?= $accessToOutputModel->floatToPercent($value['tas_va']); ?>
                    </div>
                    <div style="color: gold">NAD/U<br> <?= $accessToOutputModel->floatToPercent($value['tas_nvau']) ?></div>
                    <div style="color: greenyellow">AV<br> <?= $accessToOutputModel->floatToPercent($value['tas_nva']) ?></div>
                </td>
                <!--Value [tas_nva]--> 
                <td>
                </td>
                <!--Value [tas_nvau]--> 
                <td>
                </td>
                <!--Repetition [tas_repeat] -->
                <td><?= $value['tas_repeat'] ?></td>

                <!--Wastage  [tas_wastage]-->
                <td><?= $value['tas_wastage'] ?></td>
                <!--Hardship [tas_penalitiy]-->
                <td><?= $value['tas_penality'] ?></td>
                <!--Observations  [tas_text] -->
                <!--Started  [tas_start] -->
                <td><?= $value['tas_start'] /* ; \Model\OutputModel::timeDiffMinutes($value['tas_start'] , */ ?> <br> <?= $value['tas_stop']; ?></td>
                <!--Stopped [tas_stop] --> 
                <!--<td><? = $value['tas_stop'] ?></td>-->

                <!--Total time [tas_time] -->
                <td><?= $value['tas_time'] ?></td>
                <!--//< ?= \Model\OutputModel::timeDiffMinutes($value['tas_start'],$value['tas_stop'])?></td>-->

            </tr>
        </tbody>
        <thead>
        <th>Observations</th>               
        <th>Remarks</th>
    </thead>
    <tbody>

        <tr>
            <td><?= $value['tas_text'] ?></td>
            <!--Remarks [tas_remark] -->
            <td><?= $value['tas_remark'] ?></td>
        </tr>
    <?php endforeach; ?>
</tbody>
</table>
<?php $this->stop('main_content') ?>