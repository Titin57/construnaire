<?php  $this->layout('layoutBootstrap', ['title' => ' - Worker', 'currentPage'=>'addworker']) ?>

<?php  $this->start('main_content') ?>


<form action="" method="post">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <div class="panel-title">Add a worker</div>
        </div>
            <fieldset>                
                    <table>
                        <tr>
                            <div class="input-group">
                                <span class="input-group-addon" id="basic-addon1">Lastname :&nbsp;</span>
                                <input type="text" name="wor_lastname" class="form-control" aria-describedby="basic-addon1">
                            </div>
                        </tr>
                        <tr>
                            <div class="input-group">
                                <span class="input-group-addon" id="basic-addon1">Firstname :&nbsp;</span>
                                <input type="text" name="wor_firstname" class="form-control" aria-describedby="basic-addon1">
                            </div>
                        </tr>
                        <tr>
                            <div class="input-group">
                                <span class="input-group-addon" id="basic-addon1">Buisness :&nbsp;</span>
                                <input type="text" name="wor_quality" class="form-control" aria-describedby="basic-addon1">
                            </div>
                        </tr>
                        <tr>
                            <div class="input-group">
                                <span class="input-group-addon" id="basic-addon1">Remarque :&nbsp;</span>
                                <textarea name="wor_remark" rows="5" cols="120" class="form-control" aria-describedby="basic-addon1"></textarea>
                            </div>   
                        </tr>
                        <tr>
                            <td></td>
                            <td><input type="submit" value="Add"/></td>
                        </tr>	
                    </table>
            </fieldset>
    </div>
</form>	

<?php $this->stop('main_content') ?>