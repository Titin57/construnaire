<?php $this->layout('layoutBootstrap', ['title' => 'City', 'currentPage' => 'addcity']) ?>

<?php $this->start('main_content') ?>

<form action="" method="post">
    <fieldset>
        <input type="cit_name" class="form-control" name="cit_name" value="" placeholder="City" /><br />

        <input type="submit" class="btn btn-success btn-sm" value="Sign in" />
    </fieldset>
</form>
<?php $this->stop('main_content') ?>