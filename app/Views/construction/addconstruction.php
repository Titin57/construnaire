<?php $this->layout('layoutBootstrap', ['title' => '', 'currentPage' => 'addconstruction']) ?>

<!--- 
 * This is the update / modify page for constructions (chantier)
 * The view displays input fields for:
 * Name; City; Country (default can be Luxembourg); ....
 * .... Type of constructions (ex. house, building, etc.); Client
 * on click (Submit) page should redirect to the constructions page again 
 * and in drop down box the new added construction, 
 * (which was added | updated | modified in the DB), 
 * should be  selectable | visible. 
-->


<?php $this->start('main_content') ?>
<form action="" method="post">
    <fieldset>
        <input type="name" class="form-control" name="name" value="" placeholder="Construction name" /><br />
        <!--- make drop down list for city -->    
        <div class="form-group">
            <label>City</label>
            <select name="cit_id" class="form-control">
                <option value="">City</option>
                <?php foreach ($cities as $citInfos) : ?>
                    <!--- do not forget to change $citInfos['cit_id'] == 0 in cit_id in order to edit  -->
                    <!--- pass values from first dim array $cities to second dim array $citInfos -->
                    <option value="<?= $citInfos['cit_id'] ?>"<?= $citInfos['cit_id'] == 0 ? ' selected=selected"' : '' ?>><?= $citInfos['cit_name'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>    



        <!--- <input type="country" class="form-control" name="country" value="Luxembourg" placeholder="" /><br /> -->
        <!--- make drop down list for construction type data from CSV file -->    
        <div class="form-group">
            <label>Construction type</label>
            <select name="type" class="form-control">
                <option value="">Construction type</option>
                <?php foreach ($constructype as $key=>$typeInfos) : ?>
                    <option value='<?= $key?>'><?=$typeInfos ?></option>
                <?php endforeach; ?>
            </select>
        </div>          
        <input type="client" class="form-control" name="client" value="" placeholder="Client name" /><br />     
        <input type="con_startdate" class="form-control" name="con_startdate" id="datepicker" value="" placeholder="Start date" /><br /> 
        <input type="con_enddate" class="form-control" name="con_enddate" value="" placeholder="End date" /><br />         
        <input type="submit" class="btn btn-success btn-sm" value="Submit" />
    </fieldset>
</form>

<script>
    $(function () {
        $("#datepicker").datepicker({
            dateFormat: "yy-mm-dd"
        });
    });
</script>

<?php $this->stop('main_content') ?>