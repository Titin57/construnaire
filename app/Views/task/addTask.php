<?php  $this->layout('layoutBootstrap', ['title' => ' - A/M Task', 'currentPage'=>'addtask']) ?>

<?php  $this->start('main_content') ?>


<form action="" method="post">
    <legend>Add a task</legend>
    <fieldset>
	<input type="hidden" name="tas_id" value="" />
            <table>
		<tr>
                    <td>Name :&nbsp;</td>
                    <td><input type="text" name="wor_lastname" value=""/></td>
		</tr>
		<tr>
                    <td>Date :&nbsp;</td>
                    <td>                     
			<input type="text" name="wor_firstname" value=""/>     
                    </td>
		</tr>
		<tr>
                    <td>Typologie :&nbsp;</td>
                    <td>
                        <input type="text" name="wor_quality" value=""/>
                    </td>
		</tr>
		<tr>
                    <td>wastage :&nbsp;</td>
                    <td><textarea name="wor_remark" rows="5" cols="100"></textarea></td>
		</tr>
                <tr>
                    <td>repeat :&nbsp;</td>
                    <td><textarea name="wor_remark" rows="5" cols="100"></textarea></td>
		</tr>
                <tr>
                    <td>Observation :&nbsp;</td>
                    <td><textarea name="wor_remark" rows="5" cols="100"></textarea></td>
		</tr>
                <tr>
                    <td>Remarque :&nbsp;</td>
                    <td><textarea name="wor_remark" rows="5" cols="100"></textarea></td>
		</tr>
                <tr>
                    <td>Penality :&nbsp;</td>
                    <td><textarea name="wor_remark" rows="5" cols="100"></textarea></td>
		</tr>
                <tr>
                    <td>VA :&nbsp;</td>
                    <td><textarea name="wor_remark" rows="5" cols="100"></textarea></td>
		</tr>
                <tr>
                    <td>NVA :&nbsp;</td>
                    <td><textarea name="wor_remark" rows="5" cols="100"></textarea></td>
		</tr>
                <tr>
                    <td>NVAU :&nbsp;</td>
                    <td><textarea name="wor_remark" rows="5" cols="100"></textarea></td>
		</tr>
                <tr>
                    <td>Start :&nbsp;</td>
                    <td><textarea name="wor_remark" rows="5" cols="100"></textarea></td>
		</tr>
                <tr>
                    <td>stop :&nbsp;</td>
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