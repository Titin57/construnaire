<?php $this->layout('layoutBootstrap', ['title' => '', 'currentPage' => 'addcity']) ?>

<?php $this->start('main_content') ?>

<form action="" method="post">
    <legend>Add a city</legend>
    <fieldset>
        <input type="cit_name" class="form-control" name="cit_name" value="" placeholder="Add a city" /><br />

        <input type="submit" class="btn btn-success btn-sm" value="Add city"
    </fieldset>
</form>	


<?php $this->stop('city_addcity') ?>