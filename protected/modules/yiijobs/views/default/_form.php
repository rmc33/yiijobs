<?php
/* @var $this YiiJobsController */
/* @var $model YiiJobs */
/* @var $form CActiveForm */
?>
<?php Yii::app()->clientScript->registerCoreScript('jquery'); ?>

<style>
.box {
width: 150px;
float: left;
}

.clearfix {
  overflow: auto;
  zoom: 1;
  clear:both;
}

</style>

<script>
$(document).ready(function () {
	$('#generateCron').on('click', function (event) {
		var minute, hour, day, month, weekday;
		minute	= getSelection('minute');
		hour	= getSelection('hour');
		day		= getSelection('day');
		month	= getSelection('month');
		weekday	= getSelection('weekday');
		$("#YiiJobs_cron_expression").val(minute + "\t" + hour + "\t" + day + "\t" + month + "\t" + weekday);
	});
	
	function getSelection(name) {
		var chosen;
		console.log("#" + name + "_chooser_every" + ' is checked?' + $("#" + name + "_chooser_every:checked").length);
		if($("#" + name + "_chooser_every:checked").length) {
			chosen = '*';
		} else {
			var all_selected = [];
			$("#" + name+ " option:selected").each(function() {
				console.log('selected option');
				all_selected.push($(this).attr('value'));
			});
			if(all_selected.length)
				chosen = all_selected.join(",");
			else
				chosen = '*';
		}
		return chosen;
	}
});
</script>
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'yii-jobs-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'description'); ?>
		<?php echo $form->textField($model,'description',array('size'=>60,'maxlength'=>245)); ?>
		<?php echo $form->error($model,'description'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'command_classname'); ?>
		<?php echo $form->textField($model,'command_classname',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'command_classname'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'command_args'); ?>
		<?php echo $form->textField($model,'command_args',array('size'=>60,'maxlength'=>145)); ?>
		<?php echo $form->error($model,'command_args'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'active_flag'); ?>
		<?php echo $form->textField($model,'active_flag'); ?>
		<?php echo $form->error($model,'active_flag'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'is_running'); ?>
		<?php echo $form->textField($model,'is_running'); ?>
		<?php echo $form->error($model,'is_running'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'dc'); ?>
		<?php echo $form->textField($model,'dc'); ?>
		<?php echo $form->error($model,'dc'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'last_ran'); ?>
		<?php echo $form->textField($model,'last_ran'); ?>
		<?php echo $form->error($model,'last_ran'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'last_completed'); ?>
		<?php echo $form->textField($model,'last_completed'); ?>
		<?php echo $form->error($model,'last_completed'); ?>
	</div>
	
	<div class="row">
        <?php echo $form->labelEx($model,'application_id'); ?>
        <?php echo $form->dropDownList($model, 'application_id', $model->getApplicationIds()); ?>
        <?php echo $form->error($model,'application_id'); ?>
    </div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'cron_expression'); ?>
		<?php echo $form->textField($model,'cron_expression'); ?>
		<?php echo $form->error($model,'cron_expression'); ?>
		<input type="button" onclick="$('#cron-gen').toggle();" value="...">
		<?php if ($model->cron_expression) { ?>
		<?php echo "Next Run: ".$model->getNextCronRun(); ?>
		<?php } ?>
	</div>
	
	
	<div class="row" id="cron-gen" style="display:none">
<div class="box">
<h3>Minute</h3>
<label for="minute_chooser_every">Every Minute</label>
<input type="radio" name="minute_chooser" id="minute_chooser_every" class="chooser" value="0" checked="checked"><br>

<label for="minute_chooser_choose">Choose</label>
<input type="radio" name="minute_chooser" id="minute_chooser_choose" class="chooser" value="1"><br>


<select name="minute" id="minute" multiple="multiple" >
<option value="0">0</option>
<option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>
<option value="5">5</option>
<option value="6">6</option>
<option value="7">7</option>
<option value="8">8</option>
<option value="9">9</option>
<option value="10">10</option>
<option value="11">11</option>
<option value="12">12</option>
<option value="13">13</option>
<option value="14">14</option>
<option value="15">15</option>
<option value="16">16</option>
<option value="17">17</option>
<option value="18">18</option>
<option value="19">19</option>
<option value="20">20</option>
<option value="21">21</option>
<option value="22">22</option>
<option value="23">23</option>
<option value="24">24</option>
<option value="25">25</option>
<option value="26">26</option>
<option value="27">27</option>
<option value="28">28</option>
<option value="29">29</option>
<option value="30">30</option>
<option value="31">31</option>
<option value="32">32</option>
<option value="33">33</option>
<option value="34">34</option>
<option value="35">35</option>
<option value="36">36</option>
<option value="37">37</option>
<option value="38">38</option>
<option value="39">39</option>
<option value="40">40</option>
<option value="41">41</option>
<option value="42">42</option>
<option value="43">43</option>
<option value="44">44</option>
<option value="45">45</option>
<option value="46">46</option>
<option value="47">47</option>
<option value="48">48</option>
<option value="49">49</option>
<option value="50">50</option>
<option value="51">51</option>
<option value="52">52</option>
<option value="53">53</option>
<option value="54">54</option>
<option value="55">55</option>
<option value="56">56</option>
<option value="57">57</option>
<option value="58">58</option>
<option value="59">59</option>
</select>
</div>

<div class="box">
<h3>Hour</h3>
<label for="hour_chooser_every">Every Hour</label>
<input type="radio" name="hour_chooser" id="hour_chooser_every" class="chooser" value="0" checked="checked"><br>

<label for="hour_chooser_choose">Choose</label>
<input type="radio" name="hour_chooser" id="hour_chooser_choose" class="chooser" value="1"><br>

<select name="hour" id="hour" multiple="multiple" >
<option value="0">12 Midnight</option>
<option value="1">1 AM</option><option value="2">2 AM</option><option value="3">3 AM</option><option value="4">4 AM</option><option value="5">5 AM</option><option value="6">6 AM</option><option value="7">7 AM</option><option value="8">8 AM</option><option value="9">9 AM</option><option value="10">10 AM</option><option value="11">11 AM</option><option value="12">12 Noon</option>
<option value="13">1 PM</option><option value="14">2 PM</option><option value="15">3 PM</option><option value="16">4 PM</option><option value="17">5 PM</option><option value="18">6 PM</option><option value="19">7 PM</option><option value="20">8 PM</option><option value="21">9 PM</option><option value="22">10 PM</option><option value="23">11 PM</option></select>
</div>

<div class="box">
<h3>Day</h3>
<label for="day_chooser_every">Every Day</label>
<input type="radio" name="day_chooser" id="day_chooser_every" class="chooser" value="0" checked="checked"><br>

<label for="day_chooser_choose">Choose</label>
<input type="radio" name="day_chooser" id="day_chooser_choose" class="chooser" value="1"><br>

<select name="day" id="day" multiple="multiple" >
<option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>
<option value="5">5</option>
<option value="6">6</option>
<option value="7">7</option>
<option value="8">8</option>
<option value="9">9</option>
<option value="10">10</option>
<option value="11">11</option>
<option value="12">12</option>
<option value="13">13</option>
<option value="14">14</option>
<option value="15">15</option>
<option value="16">16</option>
<option value="17">17</option>
<option value="18">18</option>
<option value="19">19</option>
<option value="20">20</option>
<option value="21">21</option>
<option value="22">22</option>
<option value="23">23</option>
<option value="24">24</option>
<option value="25">25</option>
<option value="26">26</option>
<option value="27">27</option>
<option value="28">28</option>
<option value="29">29</option>
<option value="30">30</option>
</select>
</div>

<div class="box">
<h3>Month</h3>
<label for="month_chooser_every">Every Month</label>
<input type="radio" name="month_chooser" id="month_chooser_every" class="chooser" value="0" checked="checked"><br>

<label for="month_chooser_choose">Choose</label>
<input type="radio" name="month_chooser" id="month_chooser_choose" class="chooser" value="1"><br>

<select name="month" id="month" multiple="multiple" >
<option value="1">January</option>
<option value="2">February</option>
<option value="3">March</option>
<option value="4">April</option>
<option value="5">May</option>
<option value="6">June</option>
<option value="7">July</option>
<option value="8">Augest</option>
<option value="9">September</option>
<option value="10">October</option>
<option value="11">November</option>
<option value="12">December</option>
</select>
</div>

<div class="box">
<h3>Weekday</h3>
<label for="weekday_chooser_every">Every Weekday</label>
<input type="radio" name="weekday_chooser" id="weekday_chooser_every" class="chooser" value="0" checked="checked"><br>

<label for="weekday_chooser_choose">Choose</label>
<input type="radio" name="weekday_chooser" id="weekday_chooser_choose" class="chooser" value="1"><br>

<select name="weekday" id="weekday" multiple="multiple" >
<option value="0">Sunday</option>
<option value="1">Monday</option>
<option value="2">Tuesday</option>
<option value="3">Wednesday</option>
<option value="4">Thursday</option>
<option value="5">Friday</option>
<option value="6">Saturday</option>
</select>
</div>
<div class="box">
	<input type="button" value="OK" id="generateCron"/>
</div>
	</div>

	<div class="row buttons clearfix">
	<br/>
	<br/>
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
		<?php if (!$model->isNewRecord) echo CHtml::submitButton('Test', array('name' => 'test'));?>
	</div>
	

<?php $this->endWidget(); ?>

</div><!-- form -->