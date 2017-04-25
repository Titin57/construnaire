<?php $this->layout('layoutBootstrap', ['title' => '', 'currentPage' => 'construction']) ?>

<?php $this->start('main_content') ?>
<h3>All constructions</h3>
<div class="panel panel-primary">
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
                    -->
                    <!--- in this part the link to the tasks overview is defined
                    to do next: link to the task(s) related to the construction -->
                    <td><a href="<?= $this->url('tasks_viewtasks'); ?>"><?= $currentConstruction['con_name'] ?></a></td>
                    <td><?= $currentConstruction['con_startdate'] ?></td>
                </tr>
            <?php endforeach; ?>
        <!--- code for buttons to display page addconstruction -->
        <ul class="nav nav-pills">
            <li role="presentation" class=""><a href="add/">Add new construction</a></li>

        </ul>

    </tbody>
    </table>
</div>

<?php $this->stop('main_content') ?>