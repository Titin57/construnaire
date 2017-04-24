<?php $this->layout('layoutBootstrap', ['title' => 'Output - TEXT', 'currentPage' => 'output']) ?>

<?php $this->start('main_content') ?>

<p>
    <strong><a href="<?= $this->url('output_output') ?> "title="home">visuals</a> - text </strong>
</p>
<form action="<?=$this->url('output_outputText')?>" method="get">
<!--    <select name="select">
        <option value"">choose construction</option> 
        <? php foreach ($allConstructions as $key => $value): ?>
            <option value="< ?= $value['con_id'] ?>">< ?= $value['con_name'] ?></option> 
        < ?php endforeach; ?>
    </select>-->
 
        <!--<input type="hidden" name="pro_id"/>-->
        <select name="">
<!--        <input type="hidden" name="pro_id"/>
        <select name="select"  name="pro_id">-->
            <option>choose process text</option> 
            <?php foreach ($allProcess as $key => $value): ?>
                <option  value="<?= $value['pro_id'] ?>" ><?= $value['pro_id'] ?>.' '. <?= $value['pro_name'] ?></option> 
            <?php endforeach; ?>
        </select>
        <input type="submit" value="Submit">
        
</form>
<form action="<?=$this->url('output_outputVisuals')?>" method="post">
<!--    <select name="select">
        <option value"">choose construction</option> 
        <? php foreach ($allConstructions as $key => $value): ?>
            <option value="< ?= $value['con_id'] ?>">< ?= $value['con_name'] ?></option> 
        < ?php endforeach; ?>
    </select>-->
 
        <!--<input type="hidden" name="pro_id"/>-->
        <select name="">
<!--        <input type="hidden" name="pro_id"/>
        <select name="select"  name="pro_id">-->
            <option>choose process Visual</option> 
            <?php foreach ($allProcess as $key => $value): ?>
                <option  value="<?= $value['pro_id'] ?>" ><?= $value['pro_id'] ?>.' '. <?= $value['pro_name'] ?></option> 
            <?php endforeach; ?>
        </select>
        <input type="submit" value="Submit">
        
</form>

<?php $this->stop('main_content') ?>