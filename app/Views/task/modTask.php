<?php  $this->layout('layoutBootstrap', ['title' => ' Task modification/duplication', 'currentPage'=>'modTask']) ?>

<?php  $this->start('main_content') ?>


<form action="" method="post">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <div class="panel-title">Modify/Duplicate a task</div>
        </div>
        <fieldset>
            <input type="hidden" name="tas_id" value="" />
                <table>
                    <tr>
                        <td>Name :&nbsp;</td>
                        <td><input class="form-control" type="text" name="tas_name" value=""/></td>
                    </tr>
                    <tr>
                        <td>Date :&nbsp;</td>
                        <td>                     
                            <input class="form-control" type="text" name="tas_date" id="datepicker">     
                        </td>
                    </tr>
                    <tr>
                        <td>Chantier :&nbsp;</td>
                        <td>
                            <select class="form-control" name="con_id">
                                <option value="">Nom du chantier</option>
                                <?php foreach ($allConstruc as $curConstruc) : ?>
                                <option name="con_id" value="<?php echo $curConstruc['con_id']; ?>"><?php echo $curConstruc['con_name']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Process :&nbsp;</td>
                        <td>
                            <select class="form-control" name="pro_name">
                                <option value="">Nom du process</option>
                                <?php foreach ($allProcess as $curProcess) : ?>
                                <option name="pro_name" value="<?php echo $curProcess['pro_id']; ?>"><?php echo $curProcess['pro_name']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Typologie :&nbsp;</td> 
                        <td>
                            <select class="form-control" name="tas_typology">
                                <option value="">Worker</option>
                                <?php foreach ($allWorker as $curWorker) : ?>
                                <option name="tas_typology" value="<?php echo $curWorker['wor_lastname']; ?>"><?php echo $curWorker['wor_lastname']; ?></option>
                                <?php endforeach; ?>
                                <option value="">Team</option>
                                <?php foreach ($allTeam as $curTeam) : ?>
                                <option name="tas_typology" value="<?php echo $curTeam['tea_name']; ?>"><?php echo $curTeam['tea_name']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>wastage :&nbsp;</td>
                        <td>
                            <input class="form-control" type="text" name="tas_wastage" value=""/>
                        </td>
                    </tr>
                    <tr>
                        <td>repeat :&nbsp;</td>
                        <td><input class="form-control" type="text" name="tas_repeat" value=""/></td>
                    </tr>
                    <tr>
                        <td>Observation :&nbsp;</td>
                        <td><textarea class="form-control" name="tas_text" rows="5" cols="30"></textarea></td>
                    </tr>
                    <tr>
                        <td>Remarque :&nbsp;</td>
                        <td><textarea class="form-control" name="tas_remark" rows="5" cols="30"></textarea></td>
                    </tr>
                    <tr>
                        <td>Penality :&nbsp;</td>
                        <td>
                            <input class="form-control" type="text" name="tas_penality" value=""/>
                        </td>
                    </tr>
                    <tr>
                        <td>VA :&nbsp;</td>                 
                        <td><div class="slider"  ></div></td>
                        <td><input style="border: 2px solid green" class="form-control" type="text" class="val" name="tas_va" value=""></td>
                    </tr>
                    <tr>
                        <td>NVA :&nbsp;</td>
                        <td><div class="slider2" ></div></td>
                        <td><input style="border: 2px solid red" class="form-control" type="text" class="val2" name="tas_nva"></td>
                    </tr>
                    <tr>
                        <td>NVAU :&nbsp;</td>
                        <td><div class="slider3" ></div></td>
                        <td><input class="form-control" type="text" class="val3" name="tas_nvau" ></td>
                    </tr>
                    <tr>
                        <td>Chrono :&nbsp;</td>
                        <td><div id="start" name="tas_start">Début</div></td>
                        <td><input type="hidden" value="<?php echo date('Y-m-d') ?>" name="tas_start"/></td>
                        <td><div id="stop">Fin</div></td>
                        <td><div id="reset">Reset</div></td>
                    </tr>
                    <tr>
                        <td>Durée chrono :&nbsp;</td>
                        <td><div id="showtm" style="font-size:21px; font-weight:800;">0 : 0</div></td>
                    <tr>
                        <td>Durée :&nbsp;</td>
                        <td><input class="form-control" name="tas_time" value=""></textarea></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><input class="form-control" type="submit" value="modify task"/></td>
                    </tr>	
                </table>
        </fieldset>
    </div>
</form>	





<script>
  $( function() {
    $( "#datepicker" ).datepicker({
        dateFormat: "yy-mm-dd"
    });
  } );
</script>

<script>
 $(function() {
    $(".slider").slider({
        value: 50,
        min: 0,
        max: 100,
        //step: 10,
        slide: function(event, ui) {
            $(".slider2").slider("value", 100-($(".slider").slider("value")));
            updateValues();
        }
    }); 
   $(".slider2").slider({
        value: 50,
        min: 0,
        max: 100,
        //step: 10,
        slide: function(event, ui) {
            $(".slider3").slider("value", 100- (($(".slider").slider("value"))+($(".slider2").slider("value"))) );
            
            updateValues();
        }
    });
    $(".slider3").slider({
        value: 0,
        min: 0,
        max: 100,
        //step: 10,
        slide: function(event, ui) {
            updateValues();
        }
    });
});
function updateValues()
{
    $(".val").val($(".slider").slider("value"));
    $(".val2").val($(".slider2").slider("value"));
    $(".val3").val($(".slider3").slider("value"));
}
</script>








<script type="text/javascript">

// Here set the minutes, seconds, and tenths-of-second when you want the chronometer to stop
// If all these values are set to 0, the chronometer not stop automatically
var stmints = 0;
var stseconds = 0;
var stzecsec = 0;

// the initial tenths-of-second, seconds, and minutes
var zecsec = 0;
var seconds = 0;
var mints = 0;

var startchron = 0;

function chronometer() {
  if(startchron == 1) {
    zecsec += 1;       // set tenths of a second

    // set seconds
    if(zecsec > 9) {
      zecsec = 0;
      seconds += 1;
    }

    // set minutes
    if(seconds > 59) {
      seconds = 0;
      mints += 1;
    }

    // adds data in #showtm
    document.getElementById('showtm').innerHTML = mints+ ' : '+ seconds;
    
    

    // if the chronometer reaches to the values for stop, calls whenChrStop(), else, auto-calls chronometer()
   if(zecsec == stzecsec && seconds == stseconds && mints == stmints) toAutoStop();
   else setTimeout("chronometer()", 100);
  }
}

function startChr() { startchron = 1; chronometer(); }      // starts the chronometer
function stopChr() { startchron = 0; }                      // stops the chronometer
function resetChr() {
  zecsec = 0;  seconds = 00; mints = 00; startchron = 0; 
  document.getElementById('showtm').innerHTML = mints+ ' : '+ seconds+ '<sub>'+ zecsec+ '</sub>';
}
</script>

<script>
$( "#start" ).click(function() {
  startChr();
});

$( "#stop" ).click(function() {
  stopChr();
});

$( "#reset" ).click(function() {
  resetChr();
});
</script>






<?php $this->stop('main_content') ?>