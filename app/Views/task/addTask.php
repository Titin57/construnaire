<?php  $this->layout('layoutBootstrap', ['title' => ' - A/M Task', 'currentPage'=>'addtask']) ?>

<?php  $this->start('main_content') ?>


<form action="" method="post">
    <legend>Add a task</legend>
    <fieldset>
	<input type="hidden" name="tas_id" value="" />
            <table>
		<tr>
                    <td>Name :&nbsp;</td>
                    <td><input type="text" name="tas_name" value=""/></td>
		</tr>
		<tr>
                    <td>Date :&nbsp;</td>
                    <td>                     
			<input type="text" name="tas_date" id="datepicker">     
                    </td>
		</tr>
		<tr>
                    <td>Typologie :&nbsp;</td>
                    <td>
                        <input type="text" name="tas_typology" value=""/>
                    </td>
		</tr>
		<tr>
                    <td>wastage :&nbsp;</td>
                    <td><textarea name="tas_wastage" rows="5" cols="100"></textarea></td>
		</tr>
                <tr>
                    <td>repeat :&nbsp;</td>
                    <td><textarea name="tas_repeat" rows="5" cols="100"></textarea></td>
		</tr>
                <tr>
                    <td>Observation :&nbsp;</td>
                    <td><textarea name="tas_text" rows="5" cols="100"></textarea></td>
		</tr>
                <tr>
                    <td>Remarque :&nbsp;</td>
                    <td><textarea name="tas_remark" rows="5" cols="100"></textarea></td>
		</tr>
                <tr>
                    <td>Penality :&nbsp;</td>
                    <td><textarea name="tas_penality" rows="5" cols="100"></textarea></td>
		</tr>
                <tr>
                    <td>VA :&nbsp;</td>
                    <td><textarea name="tas_va" rows="5" cols="100"></textarea></td>
		</tr>
                <tr>
                    <td>NVA :&nbsp;</td>
                    <td><textarea name="tas_nva" rows="5" cols="100"></textarea></td>
		</tr>
                <tr>
                    <td>NVAU :&nbsp;</td>
                    <td><textarea name="tas_nvau" rows="5" cols="100"></textarea></td>
		</tr>
                <tr>
                    <td>Start :&nbsp;</td>
                    <td><textarea name="tas_start" rows="5" cols="100"></textarea></td>
		</tr>
                <tr>
                    <td>stop :&nbsp;</td>
                    <td><textarea name="tas_stop" rows="5" cols="100"></textarea></td>
		</tr>
                
                <tr>
                    <td></td>
                    <td><input type="submit" value="Add"/></td>
		</tr>	
            </table>
    </fieldset>
</form>	





<script>
  $( function() {
    $( "#datepicker" ).datepicker();
  } );
  </script>




<?php $this->stop('main_content') ?>