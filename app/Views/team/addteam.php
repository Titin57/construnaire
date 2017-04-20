<?php  $this->layout('layoutBootstrap', ['title' => ' Team', 'currentPage'=>'addteam']) ?>

<?php  $this->start('main_content') ?>


<form action="" method="post">
    <legend>Add a team</legend>
    <fieldset>
	<input type="hidden" name="tea_id" value="" />
            <table>
		<tr>
                    <td>Add a team :&nbsp;</td>
                    <td><input type="text" name="tea_name" value=""/></td>
		</tr>
		<tr>
                    <td>Fonction :&nbsp;</td>
                    <td><input type="text" name="tea_text" value=""/></td>
		</tr>
                <tr>
                    <td>Worker 1 :&nbsp;</td>
                    <td>                     
			<select name="wor_id">
                            <option value="">choisissez</option>
                            <?php foreach ($allWorker as $curWorker) : ?>
                            <option value="<?php echo $curWorker['wor_id']; ?>"><?php echo $curWorker['wor_lastname']; ?></option>
                            <?php endforeach; ?>
			</select>     
                    </td>
		</tr>
                <tr>
                    <td>Worker 2 :&nbsp;</td>
                    <td>                     
			<select name="wor_id">
                            <option value="">choisissez</option>
                            <?php foreach ($allWorker as $curWorker) : ?>
                            <option value="<?php echo $curWorker['wor_id']; ?>"><?php echo $curWorker['wor_lastname']; ?></option>
                            <?php endforeach; ?>
			</select>     
                    </td>
		</tr>
                <tr>
                    <td>Worker 3 :&nbsp;</td>
                    <td>                     
			<select name="wor_id">
                            <option value="">choisissez</option>
                            <?php foreach ($allWorker as $curWorker) : ?>
                            <option value="<?php echo $curWorker['wor_id']; ?>"><?php echo $curWorker['wor_lastname']; ?></option>
                            <?php endforeach; ?>
			</select>     
                    </td>
		</tr>
                <tr>
                    <td>Worker 4 :&nbsp;</td>
                    <td>                     
			<select name="wor_id">
                            <option value="">choisissez</option>
                            <?php foreach ($allWorker as $curWorker) : ?>
                            <option value="<?php echo $curWorker['wor_id']; ?>"><?php echo $curWorker['wor_lastname']; ?></option>
                            <?php endforeach; ?>
			</select>     
                    </td>
		</tr>
                <tr>
                    <td></td>
                    <td><input type="submit" value="Add Team"/></td>
		</tr>	
            </table>
    </fieldset>
</form>	

<?php $this->stop('main_content') ?>