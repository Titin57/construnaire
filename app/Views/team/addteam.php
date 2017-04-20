<?php  $this->layout('layoutBootstrap', ['title' => ' Team', 'currentPage'=>'addteam']) ?>

<?php  $this->start('main_content') ?>


<form action="" method="post">
    <legend>Add a team</legend>
    <fieldset>
	<input type="hidden" name="wor_id" value="" />
            <table>
		<tr>
                    <td>Team name :&nbsp;</td>
                    <td><input type="text" name="tea_name" value=""/></td>
		</tr>
		<tr>
                    <td>Fontion :&nbsp;</td>
                    <td>                     
			<input type="text" name="tea_text" value=""/>     
                    </td>
		</tr>
                <tr>
                    <td></td>
                    <td><input type="submit" value="Add"/></td>
		</tr>	
            </table>
    </fieldset>
</form>	

<?php $this->stop('main_content') ?>