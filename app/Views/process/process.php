<?php  $this->layout('layoutBootstrap', ['title' => ' - Process', 'currentPage'=>'process']) ?>

<?php  $this->start('main_content') ?>


<form action="" method="post">
    <legend>Add a Process</legend>
    <fieldset>
            <table>
		<tr>
                    <td>Process name :&nbsp;</td>
                    <td>
                        <select name="pro_name">
                            <option value="">Nom du process</option>
                            <?php foreach ($allProcess as $curProcess) : ?>
                            <option value="<?php echo $curProcess['pro_name']; ?>"><?php echo $curProcess['pro_name'].$curProcess['pro_id']; ?></option>               
                            <?php endforeach; ?>
                        </select>
                        <select name="pro_id">
                            <option value="">Numero du process</option>
                            <?php foreach ($allProcess as $curProcess) : ?>
                            <option value="<?php echo $curProcess['pro_id']; ?>"><?php echo $curProcess['pro_id']; ?></option>               
                            <?php endforeach; ?>
                        </select>  
                    </td>
		</tr>
                <tr>
                    <td>Process :&nbsp;</td>
                    <td><?php echo $pro_name ?></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" value="Valider"/></td>
		</tr>	
            </table>  
    </fieldset>
</form>	






<ul id="sortable">
    <li class="ui-state-default"><span class="ui-icon ui-icon-arrowthick-2-n-s"></span><select name="tas_name">
                            <option value="">Nom du la tache</option>
                            <?php foreach ($allTasks as $curTask) : ?>
                            <option name="pro_id" value="<?php echo $curTask['pro_id']; ?>"><?php echo $curTask['tas_name']; ?></option>
                            <?php endforeach; ?>
                        </select></li>
    <li class="ui-state-default"><span class="ui-icon ui-icon-arrowthick-2-n-s"></span><select name="tas_name">
                            <option value="">Nom du la tache</option>
                            <?php foreach ($allTasks as $curTask) : ?>
                            <option name="pro_id" value="<?php echo $curTask['pro_id']; ?>"><?php echo $curTask['tas_name']; ?></option>
                            <?php endforeach; ?>
                        </select></li>
    <li class="ui-state-default"><span class="ui-icon ui-icon-arrowthick-2-n-s"></span><select name="tas_name">
                            <option value="">Nom du la tache</option>
                            <?php foreach ($allTasks as $curTask) : ?>
                            <option name="pro_id" value="<?php echo $curTask['pro_id']; ?>"><?php echo $curTask['tas_name']; ?></option>
                            <?php endforeach; ?>
                        </select></li>
    <li class="ui-state-default"><span class="ui-icon ui-icon-arrowthick-2-n-s"></span><select name="tas_name">
                            <option value="">Nom du la tache</option>
                            <?php foreach ($allTasks as $curTask) : ?>
                            <option name="pro_id" value="<?php echo $curTask['pro_id']; ?>"><?php echo $curTask['tas_name']; ?></option>
                            <?php endforeach; ?>
                        </select></li>
    <li class="ui-state-default"><span class="ui-icon ui-icon-arrowthick-2-n-s"></span><select name="tas_name">
                            <option value="">Nom du la tache</option>
                            <?php foreach ($allTasks as $curTask) : ?>
                            <option name="pro_id" value="<?php echo $curTask['pro_id']; ?>"><?php echo $curTask['tas_name']; ?></option>
                            <?php endforeach; ?>
                        </select></li>
    <li class="ui-state-default"><span class="ui-icon ui-icon-arrowthick-2-n-s"></span><select name="tas_name">
                            <option value="">Nom du la tache</option>
                            <?php foreach ($allTasks as $curTask) : ?>
                            <option name="pro_id" value="<?php echo $curTask['pro_id']; ?>"><?php echo $curTask['tas_name']; ?></option>
                            <?php endforeach; ?>
                        </select></li>
</ul>

<style>
  #sortable { list-style-type: none; margin: 0; padding: 0; width: 60%; }
  #sortable li { margin: 0 3px 3px 3px; padding: 0.4em; padding-left: 1.5em; font-size: 1.4em; height: 50px; }
  #sortable li span { position: absolute; margin-left: -1.3em; }
</style>

<script>
  $( function() {
    $( "#sortable" ).sortable();
    $( "#sortable" ).disableSelection();
  } );
</script>

<?php $this->stop('main_content') ?>