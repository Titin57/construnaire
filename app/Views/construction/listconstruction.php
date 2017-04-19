<?php $this->layout('layoutBootstrap', ['title' => '', 'currentPage' => 'construction']) ?>

<?php $this->start('main_content') ?>
<h3>All constructions</h3>
<table class="table">
    <thead>
        <tr>
            <th>Construction</th>   
            <th>Date started</th>
        </tr>
    </thead>
    <tbody>

        <?php foreach ($allConstruction as $currentConstruction) : ?>
            <tr>
                <!--- 
                in order to make an hyperlink from this to a other page's
                the link to the page must be added as php here 
                put all data in two or three columns            
                -->
                <td><?= $currentConstruction['con_name'] ?></td>
                <td><?= $currentConstruction['con_startdate'] ?></td>

            </tr>
        <?php endforeach; ?>

    </tbody>
</table>

<?php $this->stop('main_content') ?>