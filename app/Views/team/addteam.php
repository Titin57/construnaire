<?php  $this->layout('layoutBootstrap', ['title' => 'Team', 'currentPage'=>'addteam']) ?>

<?php  $this->start('main_content') ?>


<form action="" method="post">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <div class="panel-title">Add a team</div>
        </div>
        <br/>
        <fieldset>
            <input type="hidden" name="tea_id" value="" />
                <table>
                    <tr>
                        <div class="input-group">
                            <span>Add a team :&nbsp;</span>
                            <input class="form-control" type="text" name="tea_name" value=""/>
                        </div>
                    </tr>
                    <br/>
                    <tr>
                        <div class="input-group">
                            <span>Fonction :&nbsp;</span>
                            <input class="form-control" type="text" name="tea_text" value=""/>
                        </div>
                    </tr>
                    <br/>
                    <tr>
                        <div class="input-group">
                            <span>Worker 1 :&nbsp;</span>                     
                                <select class="form-control" name="wor_id1">
                                    <option value="">choisissez</option>
                                    <?php foreach ($allWorker as $curWorker) : ?>
                                    <option value="<?php echo $curWorker['wor_id']; ?>"><?php echo $curWorker['wor_lastname']; ?></option>
                                    <?php endforeach; ?>
                                </select>            
                        </div>
                    </tr>
                    <br/>
                    <tr>
                        <div class="input-group">
                            <span>Worker 2 :&nbsp;</span>                       
                                <select class="form-control" name="wor_id2">
                                    <option value="">choisissez</option>
                                    <?php foreach ($allWorker as $curWorker) : ?>
                                    <option value="<?php echo $curWorker['wor_id']; ?>"><?php echo $curWorker['wor_lastname']; ?></option>
                                    <?php endforeach; ?>
                                </select>     
                            
                        </div>
                    </tr>
                    <br/>
                    <tr>
                        <div class="input-group">
                            <span>Worker 3 :&nbsp;</span>                   
                                <select class="form-control" name="wor_id3">
                                    <option value="">choisissez</option>
                                    <?php foreach ($allWorker as $curWorker) : ?>
                                    <option value="<?php echo $curWorker['wor_id']; ?>"><?php echo $curWorker['wor_lastname']; ?></option>
                                    <?php endforeach; ?>
                                </select>     
                            
                        </div>
                    </tr>
                    <br/>
                    <tr>
                        <div class="input-group">
                            <span>Worker 4 :&nbsp;</span>                
                                <select class="form-control" name="wor_id4">
                                    <option value="">choisissez</option>
                                    <?php foreach ($allWorker as $curWorker) : ?>
                                    <option value="<?php echo $curWorker['wor_id']; ?>"><?php echo $curWorker['wor_lastname']; ?></option>
                                    <?php endforeach; ?>
                                </select>        
                        </div>
                    </tr>
                    <br/>
                    <tr>
                        <td></td>
                        <td><input class="form-control" type="submit" value="Add Team"/></td>
                    </tr>	
                </table>
        </fieldset>
    </div>
</form>	

<?php $this->stop('main_content') ?>