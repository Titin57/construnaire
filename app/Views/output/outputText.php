<?php $this->layout('layoutBootstrap', ['title' => 'Output - TEXT', 'currentPage' => 'outputText']) ?>

<?php $this->start('main_content') ?>

<p>
    <strong><a href="<?= $this->url('output_output') ?> "title="home">visuals</a> - </strong>
</p>

<h2>output text</h2>

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
        <?php for ($i = 1; $i < 25; $i++): ?>

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


<h2>output text</h2>

<table class='table'
       style="border: 1px solid black;
       /*border-collapse: collapse;*/
       padding: 25px;">
    <thead>
        <tr<!--A-->>
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
        <tr<!--B-->>
            <td>added value<!--1--></td>            
            <td>valeur ajoutée<!--2--></td>
            <td>VA<!--3--></td>
            <td>60<!--4--></td>
            <td><!--5--></td>
            <td><!--6--></td>
            <td><!--7--></td>
        </tr>
        <tr<!--C-->>
            <td>NO added value<!--1--></td>            
            <td>non valeur ajoutée totale<!--2--></td>
            <td>NVA<!--3--></td>
            <td>40<!--4--></td>
            <th>===>>><!--5--></th>
            <th>100<!--6--></th>
            <th>% total de la VA et NVA,et la NVA est composé de <!--7--></th>
        </tr>
        <tr<!--C-->>
            <td>usefull no added value<!--1--></td>            
            <td>non valeur ajoutée utile<!--2--></td>
            <td>NVA-u<!--3--></td>
            <td>15<!--4--></td>
            <td><!--5--></td>
            <td>12<!--6--></td>
            <td>Stocks Inutiles<!--7--></td>
        </tr>
        <tr<!--D-->>
            <td>unusefull no added value<!--1--></td>            
            <td>non valeur ajoutée inutile<!--2--></td>
            <td>NVA-i<!--3--></td>
            <td>25<!--4--></td>
            <td><!--5--></td>
            <td>2<!--6--></td>
            <td>Surproduction<!--7--></td>
        </tr>
        <tr<!--F-->>
            <td><!--1--></td>            
            <td><!--2--></td>
            <td><!--3--></td>
            <td><!--4--></td>
            <td><!--5--></td>
            <td>32<!--6--></td>
            <td>Déplacements<!--7--></td>
        </tr>
        <tr<!--G-->>
            <td><!--1--></td>            
            <td><!--2--></td>
            <td><!--3--></td>
            <td><!--4--></td>
            <td><!--5--></td>
            <td>5<!--6--></td>
            <td>Surprocessing ou setup inutiles<!--7--></td>
        </tr>
        <tr<!--H-->>
            <td><!--1--></td>            
            <td><!--2--></td>
            <td><!--3--></td>
            <td><!--4--></td>
            <td><!--5--></td>
            <td>11<!--6--></td>
            <td>Mouvements Inutiles<!--7--></td>
        </tr>
        <tr<!--I>-->>
            <td><!--1--></td>            
            <td><!--2--></td>
            <td><!--3--></td>
            <td><!--4--></td>
            <td><!--5--></td>
            <td>13<!--6--></td>
            <td>Retravail<!--7--></td>
        </tr>
        <tr<!--J-->>
            <td><!--1--></td>            
            <td><!--2--></td>
            <td><!--3--></td>
            <td><!--4--></td>
            <td><!--5--></td>
            <td>25<!--6--></td>
            <td>Sous-utilisation des Compétences<!--7--></td>
        </tr>
        <tr<!--K-->>
            <td><!--1--></td>            
            <td><!--2--></td>
            <td><!--3--></td>
            <td><!--4--></td>
            <td><!--5--></td>
            <td><!--6--></td>
            <td><!--7--></td>
        </tr>
    </tbody>
</table>

<?php $this->stop('main_content') ?>