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
        <input type="city" class="form-control" name="city" value="" placeholder="City" /><br />
        <!--- make drop down list for country -->
        <input type="country" class="form-control" name="country" value="Luxembourg" placeholder="" /><br />
        <input type="type" class="form-control" name="type" value="" placeholder="Construction type" /><br />
        <input type="client" class="form-control" name="client" value="" placeholder="Client name" /><br />        
        <input type="submit" class="btn btn-success btn-sm" value="Submit" />
    </fieldset>
</form>
<?php $this->stop('main_content') ?>