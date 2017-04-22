<?php  $this->layout('layoutBootstrap', ['title' => ' - Process', 'currentPage'=>'process']) ?>

<?php  $this->start('main_content') ?>


<form action="" method="post">
    <legend>Add a Process</legend>
    <fieldset>
	<input type="hidden" name="pro_id" value="" />
            <table>
		<tr>
                    <td>Process name :&nbsp;</td>
                    <td>
                        <select name="pro_name">
                            <option value="">Nom du process</option>
                            <?php foreach ($allProcess as $curProcess) : ?>
                            <option name="pro_name" value="<?php echo $curProcess['pro_name']; ?>"><?php echo $curProcess['pro_name']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </td>
		</tr>
                <tr>

                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" value="Add Process"/></td>
		</tr>	
            </table>
    </fieldset>
</form>	




<ul id="sortable">
    <li class="ui-state-default"><span class="ui-icon ui-icon-arrowthick-2-n-s"></span><input type="text" value=""/></li>
    <li class="ui-state-default"><span class="ui-icon ui-icon-arrowthick-2-n-s"></span>tâche 2 : Préparer le beton</li>
    <li class="ui-state-default"><span class="ui-icon ui-icon-arrowthick-2-n-s"></span>tâche 3 : Pose du beton</li>
    <li class="ui-state-default"><span class="ui-icon ui-icon-arrowthick-2-n-s"></span>tâche 4 : Pose des agglos</li>
    <li class="ui-state-default"><span class="ui-icon ui-icon-arrowthick-2-n-s"></span>tâche 5 : Mise à niveau</li>
    <li class="ui-state-default"><span class="ui-icon ui-icon-arrowthick-2-n-s"></span>tâche 6 : Nettoyage des joints</li>
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