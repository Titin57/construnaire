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
                    <td><div class="slider" name="tas_va" ></div></td>
                    <td><input type="text" class="val"></td>
		</tr>
                <tr>
                    <td>NVA :&nbsp;</td>
                    <td><div class="slider2" name="tas_nva" ></div></td>
                    <td><input type="text" class="val2"></td>
		</tr>
                <tr>
                    <td>NVAU :&nbsp;</td>
                    <td><div class="slider3" name="nvau" ></div></td>
                    <td><input type="text" class="val3"></td>
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

<script>
  $( function() {
    $( ".slider" ).slider({
        min: 0,
        max: 100,
        step: 10,
        value: 50,
        slide: function( event, ui){
            $(".val").val(ui.value );
        }
    });
    $(".val").val($( ".slider" ).slider("value"));
  });
</script>

<script>
  $( function() {
    $( ".slider2" ).slider({
        min: 0,
        max: 100,
        step: 10,
        value: 50,
        slide: function( event, ui){
            $(".val2").val(ui.value );
        }
    });
    $(".val2").val($( ".slider2" ).slider("value"));
  });
</script>

<script>
  $( function() {
    $( ".slider3" ).slider({
        min: 0,
        max: 100,
        step: 10,
        value: 50,
        slide: function( event, ui){
            $(".val3").val(ui.value );
        }
    });
    $(".val3").val($( ".slider3" ).slider("value"));
  });
</script>




<?php $this->stop('main_content') ?>