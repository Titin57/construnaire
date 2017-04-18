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
<h2>Title :     <strong><?= $allOutputFromProcess [0]['con_name']; ?></strong></h2>
<table class='table'>
    <!--
    <caption>Title:<strong>< ?= $allOutputFromProcess [0]['con_name']; ?></strong></caption>
    -->
    <tr>
        <td><strong>Building type:</strong></td>   
        <td><?= $allOutputFromProcess [1]['con_type']; ?></td> 
        <td><strong>Workers and Teams involved: </strong></td>
        <td> <?= $allOutputFromProcess [1]['tea_name']; ?></td>
    </tr>
    <tr>
        <td><strong>Commissioned by:</strong></td>   
        <td><?= $allOutputFromProcess [1]['con_client']; ?></td> 
        <!-- ////////////////add foreach/////////////-->
        <td><strong>Team:</strong> remark / observation:</td>
        <td> <?= $allOutputFromProcess [1]['tea_text']; ?></td>
    </tr>
    <tr>
        <td><strong>City / country:</strong></td>   
        <td><?= $allOutputFromProcess [1]['cit_name']; ?> / <?= $allOutputFromProcess [0]['cou_name']; ?></td> 
        <td><strong>Process : </strong></td>
        <td> <?= $allOutputFromProcess [1]['pro_name']; ?></td>
    </tr>
    <tr>
        <td><strong>Construction:</strong> Remark / observation:</td>   
        <td><?= $allOutputFromProcess [1]['con_text']; ?></td> 
        <td><strong>Process :</strong> remark / observation:</td>
        <td> <?= $allOutputFromProcess [1]['pro_text']; ?></td>
    </tr>
</table>
<!--
        <form action="" method="post">
            <input type="text" name="txt" placeholder="city"/>
            <input type="submit" name="insert" value="insert" onclick="insert()" />
        </form>
-->

<?php foreach ($allOutputFromProcess as $key => $value): ?>

<h2>        <td> <?= $value ['tas_name']; ?></td></h2>

    <!-- ask >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>> benjamin if this is the way to do -->
    <?php $accessToOutputModel = new \Model\OutputModel; ?>
    <table class='table'
           style="border: 1px solid black;
           /*border-collapse: collapse;*/
           padding: 25px;">
        <thead>
            <tr<!--A-->
                <th>english<!--1--></th>
                <th>francais<!--2--></th>
                <th>type<!--3--></th>
                <th>value<!--4--></th>
                <th style="width: 25px;"><!--empty--><!--5--></th>
                <th>Detail NVA<!--6--></th>
                <th>Wastage<!--7--></th>
            </tr>
        </thead>
        <tbody>
            <tr<!--B-->
                <td>added value<!--1--></td>            
                <td>valeur ajoutée<!--2--></td>
                <td>VA<!--3--></td>
                <td><?= $accessToOutputModel->floatToPercent($value['tas_va']); ?><!--4- value of VA out of the DB --></td>
                <td><!--5--></td>
                <td><!--6--></td>
                <td><!--7--></td>
            </tr>
            <tr<!--C-->
                <td>NO added value<!--1--></td>            
                <td>non valeur ajoutée totale<!--2--></td>
                <td>NVA<!--3--></td>
                <td>40<!--4- Addition of nvai+nvau--></td>
                <th>===>>><!--5--></th>
                <th>100<!--6--></th>
                <th>% total de la VA et NVA,et la NVA est composé de <!--7--></th>
            </tr>
            <tr<!--C-->
                <td>usefull no added value<!--1--></td>            
                <td>non valeur ajoutée utile<!--2--></td>
                <td>NVA-u<!--3--></td>
                <td><?= $accessToOutputModel->floatToPercent($value['tas_nva']); ?><!--4- value of NVA out of the DB --></td>
                <td><!--5--></td>
                <td>12<!--6--></td>
                <td>Stocks Inutiles<!--7--></td>
            </tr>
            <tr<!--D-->
                <td>unusefull no added value<!--1--></td>            
                <td>non valeur ajoutée inutile<!--2--></td>
                <td>NVA-i<!--3--></td>
                <td><?= $accessToOutputModel->floatToPercent($value['tas_nvau']); ?><!--4- value of NVAU out of the DB --></td>
                <td><!--5--></td>
                <td>2<!--6--></td>
                <td>Surproduction<!--7--></td>
            </tr>
            <tr<!--F-->
                <td><!--1--></td>            
                <td><!--2--></td>
                <td><!--3--></td>
                <td><!--4--></td>
                <td><!--5--></td>
                <td>32<!--6--></td>
                <td>Déplacements<!--7--></td>
            </tr>
            <tr<!--G-->
                <td><!--1--></td>            
                <td><!--2--></td>
                <td><!--3--></td>
                <td><!--4--></td>
                <td><!--5--></td>
                <td>5<!--6--></td>
                <td>Surprocessing ou setup inutiles<!--7--></td>
            </tr>
            <tr<!--H-->
                <td><!--1--></td>            
                <td><!--2--></td>
                <td><!--3--></td>
                <td><!--4--></td>
                <td><!--5--></td>
                <td>11<!--6--></td>
                <td>Mouvements Inutiles<!--7--></td>
            </tr>
            <tr<!--I>-->
                <td><!--1--></td>            
                <td><!--2--></td>
                <td><!--3--></td>
                <td><!--4--></td>
                <td><!--5--></td>
                <td>13<!--6--></td>
                <td>Retravail<!--7--></td>
            </tr>
            <tr<!--J-->
                <td><!--1--></td>            
                <td><!--2--></td>
                <td><!--3--></td>
                <td><!--4--></td>
                <td><!--5--></td>
                <td>25<!--6--></td>
                <td>Sous-utilisation des Compétences<!--7--></td>
            </tr>
        </tbody>
    </table>
<?php endforeach; ?>


<table class='table'>
    <thead>
        <tr>

            <th>Task</th>
            <th>Date</th>             
            <th>Typologie</th>               
            <th>Name</th>
            <th>Value AV</th>            
            <th>Value NAV</th>            
            <th>Value NAV-N</th>            
            <th>Repetition</th>

            <th>Wastage</th>
            <th>Hardship</th>            
            <th>Observations</th>               
            <th>Remarks</th>
            <th>Started</th>            
            <th>Stopped</th>

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
                <td><?= $value['tas_date'] ?></td>
                <!--Typologie [tas_typology] -->
                <td><?= $value['tas_typology'] ?></td>
                <!--Name [tea_name] -->
                <td><?= $value['tea_name'] ?></td>
                <!--Value [tas_va]--> 
                <td><?= $accessToOutputModel->floatToPercent($value['tas_va']); ?></td>
                <!--Value [tas_nva]--> 
                <td><?= $accessToOutputModel->floatToPercent($value['tas_nva']) ?></td>
                <!--Value [tas_nvau]--> 
                <td><?= $accessToOutputModel->floatToPercent($value['tas_nvau']) ?></td>
                <!--Repetition [tas_repeat] -->
                <td><?= $value['tas_repeat'] ?></td>

                <!--Wastage  [tas_wastage]-->
                <td><?= $value['tas_wastage'] ?></td>
                <!--Hardship [tas_penalitiy]-->
                <td><?= $value['tas_penality'] ?></td>
                <!--Observations  [tas_text] -->
                <td><?= $value['tas_text'] ?></td>
                <!--Remarks [tas_remark] -->
                <td><?= $value['tas_remark'] ?></td>
                <!--Started  [tas_start] -->
                <td><?= $value['tas_start'] ?></td>
                <!--Stopped [tas_stop] --> 
                <td><?= $value['tas_stop'] ?></td>

                <!--Total time [tas_time] -->
                <td><?= $value['tas_time'] ?></td>

            </tr>
        <?php endforeach; ?>
    </tbody>
</table>


<h2>output text</h2>

<table class='table'
       style="border: 1px solid black;
       /*border-collapse: collapse;*/
       padding: 25px;">
    <thead>
        <tr<!--A-->
            <th>english<!--1--></th>
            <th>francais<!--2--></th>
            <th>type<!--3--></th>
            <th>value<!--4--></th>
            <th style="width: 25px;"><!--empty--><!--5--></th>
            <th>Detail NVA<!--6--></th>
            <th>Wastage<!--7--></th>
        </tr>
    </thead>

    <tbody>
        <tr<!--B-->
            <td>added value<!--1--></td>            
            <td>valeur ajoutée<!--2--></td>
            <td>VA<!--3--></td>
            <td>60<!--4--></td>
            <td><!--5--></td>
            <td><!--6--></td>
            <td><!--7--></td>
        </tr>
        <tr<!--C-->
            <td>NO added value<!--1--></td>            
            <td>non valeur ajoutée totale<!--2--></td>
            <td>NVA<!--3--></td>
            <td>40<!--4--></td>
            <th>===>>><!--5--></th>
            <th>100<!--6--></th>
            <th>% total de la VA et NVA,et la NVA est composé de <!--7--></th>
        </tr>
        <tr<!--C-->
            <td>usefull no added value<!--1--></td>            
            <td>non valeur ajoutée utile<!--2--></td>
            <td>NVA-u<!--3--></td>
            <td>15<!--4--></td>
            <td><!--5--></td>
            <td>12<!--6--></td>
            <td>Stocks Inutiles<!--7--></td>
        </tr>
        <tr<!--D-->
            <td>unusefull no added value<!--1--></td>            
            <td>non valeur ajoutée inutile<!--2--></td>
            <td>NVA-i<!--3--></td>
            <td>25<!--4--></td>
            <td><!--5--></td>
            <td>2<!--6--></td>
            <td>Surproduction<!--7--></td>
        </tr>
        <tr<!--F-->
            <td><!--1--></td>            
            <td><!--2--></td>
            <td><!--3--></td>
            <td><!--4--></td>
            <td><!--5--></td>
            <td>32<!--6--></td>
            <td>Déplacements<!--7--></td>
        </tr>
        <tr<!--G-->
            <td><!--1--></td>            
            <td><!--2--></td>
            <td><!--3--></td>
            <td><!--4--></td>
            <td><!--5--></td>
            <td>5<!--6--></td>
            <td>Surprocessing ou setup inutiles<!--7--></td>
        </tr>
        <tr<!--H-->
            <td><!--1--></td>            
            <td><!--2--></td>
            <td><!--3--></td>
            <td><!--4--></td>
            <td><!--5--></td>
            <td>11<!--6--></td>
            <td>Mouvements Inutiles<!--7--></td>
        </tr>
        <tr<!--I>-->
            <td><!--1--></td>            
            <td><!--2--></td>
            <td><!--3--></td>
            <td><!--4--></td>
            <td><!--5--></td>
            <td>13<!--6--></td>
            <td>Retravail<!--7--></td>
        </tr>
        <tr<!--J-->
            <td><!--1--></td>            
            <td><!--2--></td>
            <td><!--3--></td>
            <td><!--4--></td>
            <td><!--5--></td>
            <td>25<!--6--></td>
            <td>Sous-utilisation des Compétences<!--7--></td>
        </tr>

    </tbody>
</table>


<table class='table'>
    <thead>
        <tr>
            <th>Process</th>
            <th>Task</th>            
            <th>Typologie</th>               
            <th>Name</th>
            <th>Value</th>            
            <th>Repetition</th>

            <th>Wastage</th>
            <th>Hardship</th>            
            <th>Observations</th>               
            <th>Remarks</th>
            <th>Started</th>            
            <th>Stopped</th>

            <th>Total time</th>               
        </tr>
    </thead>
    <tbody>
        <?php
        for ($i = 1; $i < 25; $i++):
            ?>

            <tr>
                <!--Process-->
                <td>ewqrqewr</td>
                <!--Task-->
                <td>qwrqwer</td>
                <!--Typologie-->
                <td>qwerqw</td>
                <!--Name-->
                <td>wqreqwer</td>
                <!--Value--> 
                <td>qwerqwe</td>
                <!--Repetition-->
                <td>werqwer</td>

                <!--Wastage-->
                <td>312412</td>
                <!--Hardship-->
                <td>1234</td>
                <!--Observations-->
                <td>214</td>
                <!--Remarks-->
                <td>1234</td>
                <!--Started-->
                <td>2134</td>
                <!--Stopped--> 
                <td>2134</td>

                <!--Total time-->
                <td>214</td>

            </tr>
        <?php endfor; ?>
    </tbody>
</table>
<?php $this->stop('main_content') ?>