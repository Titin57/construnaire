<?php $this->layout('layoutBootstrap', ['title' => '', 'currentPage' => 'addcountry']) ?>

<?php $this->start('main_content') ?>

<form action="" method="post">
    <fieldset>
        <input type="cou_name" class="form-control" name="cou_name" value="" placeholder="Add a country" /><br />
    </fieldset>
    <input type="submit" class="btn btn-success btn-sm" value="Add country" />
</form>


<?php $this->stop('main_content') ?>