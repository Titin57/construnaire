<?php $this->layout('layoutBootstrap', ['title' => 'Construction', 'currentPage' => 'construction']) ?>

<!--- 
* Main page for constructions (chantier)
* The view displays all constructions in DB and the 4(or 6) last inserted
* an add button for city and country will be visible (if a new city or new country must be inserted into DB) 

-->


<?php $this->start('main_content') ?>
<form action="" method="post">
    <fieldset>
        <input type="name" class="form-control" name="name" value="" placeholder="Construction name" /><br />
        <input type="client" class="form-control" name="client" value="" placeholder="Client name" /><br />
        <!--- this will be a drop down list for city -->
        <input type="city" class="form-control" name="city" value="" placeholder="City" /><br />
        <!--- this will be a drop down list for country -->        
        <input type="country" class="form-control" name="country" value="Luxembourg" placeholder="" /><br />

        <input type="submit" class="btn btn-success btn-block" value="Sign up" />
    </fieldset>
</form>
<?php $this->stop('main_content') ?>