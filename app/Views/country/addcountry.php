<?php $this->layout('layoutBootstrap', ['title' => 'Country', 'currentPage' => 'addcountry']) ?>

<?php $this->start('main_content') ?>

<form action="" method="post">
    <fieldset>
        <input type="cou_name" class="form-control" name="cou_name" value="" placeholder="City" /><br />

        <input type="submit" class="btn btn-success btn-sm" value="Sign in" />
    </fieldset>
</form>
<?php $this->stop('main_content') ?>