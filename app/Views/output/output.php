<?php $this->layout('layoutBootstrap', ['title' => 'Output - TEXT', 'currentPage' => 'output']) ?>

<?php $this->start('main_content') ?>

<form action="" method="post">

        <select name="pro_id">

            <option>choose process text</option> 
            <?php foreach ($allProcess as $key => $value): ?>
                <option  value="<?= $value['pro_id'] ?>" ><?= $value['pro_name'] ?></option> 
            <?php endforeach; ?>
        </select>
        <input type="submit" value="Display Text">
        
</form>
<form action="" method="post">
        <select name="pro_id_visual">
            <option>choose process Visual</option> 
            <?php foreach ($allProcess as $key => $value): ?>
                <option  value="<?= $value['pro_id'] ?>" ><?= $value['pro_name'] ?></option> 
            <?php endforeach; ?>
        </select>
        <input type="submit" value="Display Charts">
        
</form>

<?php $this->stop('main_content') ?>