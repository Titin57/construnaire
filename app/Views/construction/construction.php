<?php $this->layout('layoutBootstrap', ['title' => 'Construction', 'currentPage' => 'home']) ?>

<?php $this->start('main_content') ?>
<h3>Construction</h3>
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
                <td><?= $this->url('construction_construction', array('con_id' => $currentConstruction['con_id'], 'conName' => $currentConstruction['con_name'])); ?>"><?= $currentConstruction['con_name'] ?></a></td>
                <td><?= $currentConstruction['con_startdate'] ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?php $this->stop('main_content') ?>