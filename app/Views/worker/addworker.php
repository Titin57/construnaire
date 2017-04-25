<?php  $this->layout('layoutBootstrap', ['title' => 'Worker', 'currentPage'=>'addworker']) ?>

<?php  $this->start('main_content') ?>


<form action="" method="post">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <div class="panel-title">Add a worker</div>
        </div>
        <br/>
            <fieldset>                
                    <table>
                        <tr>
                            <div class="input-group">
                                <span>Lastname  :&nbsp;</span>
                                <input type="text" name="wor_lastname" class="form-control" aria-describedby="basic-addon1">
                            </div>
                        </tr>
                        <br/>
                        <tr>
                            <div class="input-group">
                                <span>Firstname  :&nbsp;</span>
                                <input type="text" name="wor_firstname" class="form-control" aria-describedby="basic-addon1">
                            </div>
                        </tr>
                        <br/>
                        <tr>
                            <div class="input-group">
                                <span>Buissness  :&nbsp;</span>
                                <input type="text" name="wor_quality" class="form-control" aria-describedby="basic-addon1">
                            </div>
                        </tr>
                        <br/>
                        <tr>
                            <div class="input-group">
                                <span>Remarque :&nbsp;</span>
                                <textarea name="wor_remark" rows="5" cols="60" class="form-control" aria-describedby="basic-addon1"></textarea>
                            </div>   
                        </tr>
                        <br/>
                        <tr>
                            <td></td>
                            <td><input class="form-control" type="submit" value="Add"/></td>
                        </tr>	
                    </table>
            </fieldset>
    </div>
</form>	

<?php $this->stop('main_content') ?>