<?php  $this->layout('layoutBootstrap', ['title' => 'Construction', 'currentPage'=>'addconstruction']) ?>

<?php  $this->start('main_content') ?>


<form action="" method="post">
    <legend>Add a new construction</legend>
    <fieldset>
	<input type="hidden" name="wor_id" value="" />
            <table>
		<tr>
                    <td>Construction name :&nbsp;</td>
                    <td><input type="text" name="con_name" value=""/></td>
		</tr>
		<tr>
                    <td>Client name :&nbsp;</td>
                    <td>                     
			<input type="text" name="con_client" value=""/>     
                    </td>
		</tr>
		<tr>
                    <td>Construction type :&nbsp;</td>
                    <td>
                        <input type="text" name="con_type" value=""/>
                    </td>
		</tr>
		<tr>
                    <td>Remark :&nbsp;</td>
                    <td><textarea name="con_remark" rows="5" cols="100"></textarea></td>
		</tr>
                <tr>
                    <td></td>
                    <td><input type="submit" value="Add"/></td>
		</tr>	
            </table>
    </fieldset>
</form>	

<?php $this->stop('main_content') ?>