<?php $this->layout('layoutBootstrap', ['title' => 'Output - TEXT', 'currentPage' => 'outputText']) ?>

<?php $this->start('main_content') ?>

<p>
    <strong><a href="<?= $this->url('output_output') ?> "title="home">visuals</a> - text </strong>
</p>
<form action="" method="post">
    <select name="select">
        <option value"">choose construction</option> 
        <?php foreach ($allConstructions as $key => $value): ?>
            <option value="<?= $value['con_id'] ?>"><?= $value['con_name'] ?></option> 
        <?php endforeach; ?>
    </select>
    <select name="select">
        <option value"">choose process</option> 
        <?php foreach ($allProcess as $key => $value): ?>
            <option value="<?= $value['pro_id'] ?>"><?= $value['pro_name'] ?></option> 
        <?php endforeach; ?>
    </select>    
</form>
<!-- ////////////////check for case if index 0 does not exist => php get keys////////////-->
<h2>Construction Title :     <strong><?= $allOutputFromProcess [1]['con_name']; ?></strong></h2>
<h5><strong>...<?= $allOutputFromProcess [1]['con_text']; ?></strong></h5>
<br>
<h4>Process :<strong><?= $allOutputFromProcess [1]['pro_name']; ?></strong></h4>
<h5><strong>...<?= $allOutputFromProcess [1]['pro_text']; ?></strong></h5>
<br>
<table class='table'>
    <!--
    <caption>Title:<strong>< ?= $allOutputFromProcess [0]['con_name']; ?></strong></caption>
    -->
    <tr>
        <td><strong>Building type:</strong></td>   
        <td><?= $allOutputFromProcess [1]['con_type']; ?></td> 
        <td></td>   
        <td></td>   
        <td></td>   
        <td></td>   
        <td><strong>City:</strong></td>   
        <td><?= $allOutputFromProcess [0]['cit_name']; ?></td> 
    </tr>
    <tr>
    </tr>
    <tr>
        <td><strong>Commissioned by:</strong></td>   
        <td><?= $allOutputFromProcess [1]['con_client']; ?></td> 
        <td></td>   
        <td></td>   
        <td></td>   
        
        <td></td>   
        <td><strong>Country:</strong></td>   
        <td><?= $allOutputFromProcess [0]['cou_name']; ?></td> 
    </tr>
    <tr>
    </tr>
</table>
<br>
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
        <td><strong>Workers involved: </strong></td>
        <td> 
            <?php foreach ($allOutputFromProcess as $key => $value): ?>
                <?= $value ['tea_name']; ?><br>
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
<?php foreach ($allOutputFromProcess as $key => $value): ?>

    <h1 style="display: inline">
        <h6 style="display: inline" > ... <?= $value ['tas_date']; ?></h6> 
        <h2 style="display: inline"><?= $value ['tas_name']; ?>     </h2>

        <h6 style="display: inline" > ... <?= $value ['tas_text']; ?></h6>
    </h1>
    <br>
    <br>
            <!-- ask >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>> benjamin if this is the way to do<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<< -->
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
                <th>time<!--empty--><!--5--></th>
                <th>X repetitions<!--empty--><!--6--></th>
                <th>= sum<!--empty--><!--7--></th>
                <th>Wastage ttype<!--8--></th>
            </tr>
        </thead>
        <tbody>
            <tr style="color: #d11010"><!--B-->
                <td>unusefull no added value<!--1--></td>            
                <td>non valeur ajoutée inutile<!--2--></td>
                <td>NVA-i<!--3--></td>
                <td><?= \Model\OutputModel::floatToPercent($value['tas_nvau']); ?> % <!--4- value of NVAU out of the DB --></td>
                <td>(<?= ($value['tas_time']); ?><!--5 - NAV--> *</td>
                <td><?= ($value['tas_repeat']); ?>)     =<!--6--> </td>
                <td><?= ($value['tas_time']*$value['tas_repeat']); ?><!--7--></td>
                <td><?= ($value['tas_wastage']); ?><!--8--></td>
            </tr>
            <tr style="background-color: lightgray; color: gold"><!--C-->
                <td>usefull no added value<!--1--></td>            
                <td>non valeur ajoutée utile<!--2--></td>
                <td>NVA-u<!--3--></td>
                <td><?= \Model\OutputModel::floatToPercent($value['tas_nva']); ?> % <!--4- value of NVA out of the DB --></td>
                <td><?= ($value['tas_time']); ?><!--5 - NAV - U--></td>
                <td><?= ($value['tas_repeat']); ?><!--5--></td>
                <td><?= ($value['tas_time']*$value['tas_repeat']); ?><!--5--></td>
                <td> <!--7--></td>
            </tr>
            <tr style="color: greenyellow"><!--D-->
                <td>added value<!--1--></td>            
                <td>valeur ajoutée<!--2--></td>
                <td>VA<!--3--></td>
                <td><?= \Model\OutputModel::floatToPercent($value['tas_va']); ?> % <!--4- value of VA out of the DB --></td>
                <td><?= ($value['tas_time']); ?><!--5 - AV --></td>
                <td><?= ($value['tas_repeat']); ?><!--5--></td>
                <td><?= ($value['tas_time']*$value['tas_repeat']); ?><!--5--></td>
                <td><!--7--></td>
            </tr>
            <tr style="background-color: lightgray"><!--f-->
                <td><!--1--></td>            
                <td><!--2--></td>
                <td><b>Time :</b><!--3--></td>
                <td><?= \Model\OutputModel::floatToPercent($value['tas_va']) + \Model\OutputModel::floatToPercent($value['tas_nvau']) + \Model\OutputModel::floatToPercent($value['tas_nva']); ?> % <!--4- value of VA out of the DB --></td>
                <td><?= ($value['tas_time']); ?><!--5- TOTAL time--></td>
                <td><?= ($value['tas_repeat']); ?><!--5--></td>
                <td><?= ($value['tas_time']*$value['tas_repeat']); ?><!--5--></td>
                <td><!--7--></td>
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