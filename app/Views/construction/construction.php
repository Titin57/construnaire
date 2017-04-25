<?php $this->layout('layoutBootstrap', ['title' => 'Construction', 'currentPage' => 'home']) ?>

<?php $this->start('main_content') ?>
<h3>Construction</h3>
<div class="panel panel-primary">
    <table class="table">
        <thead>
            <tr>
                <th>#</th>  
                <th>Construction</th>   
                <th>Start date</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($allConstruction as $currentConstruction) : ?>
                <tr>
                    <td><?= $currentConstruction['con_id'] ?></td>
                    <!--- link to the current item returned by the id -->
                    <td><a href="<?= $this->url('construction_listconstruction', array('con_id' => $currentConstruction['con_id'], 'conName' => $currentConstruction['con_name'])); ?>"><?= $currentConstruction['con_name'] ?></a></td>
                    <td><?= $currentConstruction['con_startdate'] ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<?php $this->stop('main_content') ?>