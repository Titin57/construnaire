<?php $this->layout('layoutBootstrap', ['title' => '', 'currentPage' => 'addcity']) ?>

<?php $this->start('main_content') ?>

<form action="" method="post">
    <legend>Add a city</legend>
    <fieldset>
        <input type="cit_name" class="form-control" name="cit_name" value="" placeholder="Add a city" /><br />


    </fieldset>
        <!--- make drop down list for city -->    
        <div class="form-group">
            <label>Country</label>
            <select name="cou_name" class="form-control">
                <option value="">Country</option>
                <?php foreach ($countries as $couInfos) : ?>
                    <!--- do not forget to change $citInfos['cit_id'] == 0 in cit_id in order to edit  -->
                    <!--- pass values from first dim array $cities to second dim array $citInfos -->
                    <option value="<?= $couInfos['cou_name'] ?>"<?= $couInfos['cou_name'] == 0 ? ' selected=selected"' : '' ?>><?= $couInfos['cou_name'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>  
        <input type="submit" class="btn btn-success btn-sm" value="Add city">
</form>	


<?php $this->stop('city_addcity') ?>