<?php  $this->layout('layout_Bootstrap', ['title' => ' - AddWorker', 'currentPage'=>'addWorker']) ?>

<?php  $this->start('main_content') ?>




<form action="" method="post">
    <legend>Add a worker</legend>
    <fieldset>
	<input type="hidden" name="wor_id" value="" />
            <table>
		<tr>
                    <td>Lastname :&nbsp;</td>
                    <td><input type="text" name="wor_lastname" value=""/></td>
		</tr>
		<tr>
                    <td>Firstname :&nbsp;</td>
                    <td>                     
			<input type="text" name="wor_firstname" value=""/>     
                    </td>
		</tr>
		<tr>
                    <td>Buisness :&nbsp;</td>
                    <td>
                        <input type="text" name="wor_quality" value=""/>
                    </td>
		</tr>
		<tr>
                    <td>Remarque :&nbsp;</td>
                    <td><textarea name="wor_remark" rows="5" cols="100"></textarea></td>
		</tr>
                <tr>
                    <td></td>
                    <td><input type="submit" value="Add"/></td>
		</tr>	
            </table>
    </fieldset>
</form>	

<?php $this->stop('main_content') ?>