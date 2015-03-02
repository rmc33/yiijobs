<?php
/* @var $this YiiJobsController */
/* @var $model YiiJobs */
/* @var $form CActiveForm */
?>

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
		<input type="button" onclick="$('#cron-gen').toggle();" value="...">
	</div>
	
	
	<div class="row" id="cron-gen" style="display:none">
		<table class="generator">
    <tbody>
        <tr>
            <td>
                <table class="generatorBlock">
                    <tbody>
                        <tr>
                            <th colspan="2">Minutes</th>
                        </tr>
                        <tr>
                            <td>
                                <label class="radio" for="everyMinute"><input id="everyMinute" type="radio" value="*" name="minutes">
                                Every Minute</label>
                                <label class="radio" for="everyEvenMinute"><input id="everyEvenMinute" type="radio" value="*/2" name="minutes">
                                Even Minutes</label>
                                <label class="radio" for="everyOddMinute"><input id="everyOddMinute" type="radio" value="1-59/2" name="minutes">
                                Odd Minutes</label>
                                <label class="radio" for="every5Minute"><input id="every5Minute" type="radio" value="*/5" name="minutes">
                                Every 5 Minutes</label>
                                <label class="radio" for="every15Minute"><input id="every15Minute" type="radio" value="*/15" name="minutes">
                                Every 15 Minutes</label>
                                <label class="radio" for="every30Minute"><input id="every30Minute" type="radio" value="*/30" name="minutes">
                                Every 30 Minutes</label>
                            </td>
                            
                            <td>
                                <table class="multipleEntries">
                                    <tbody>
                                        <tr> 
                                            <td>
                                                <input type="radio" checked="checked" value="select" name="minutes">
                                            </td>
                                            <td>
                                                <select multiple="" size="10" name="selectMinutes[]">
                                                <option value="0">0</option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option><option value="10">10</option><option value="11">11</option><option value="12">12</option><option value="13">13</option><option value="14">14</option><option value="15">15</option><option value="16">16</option><option value="17">17</option><option value="18">18</option><option value="19">19</option><option value="20">20</option><option value="21">21</option><option value="22">22</option><option value="23">23</option><option value="24">24</option><option value="25">25</option><option value="26">26</option><option value="27">27</option><option value="28">28</option><option value="29">29</option><option value="30">30</option><option value="31">31</option><option value="32">32</option><option value="33">33</option><option value="34">34</option><option value="35">35</option><option value="36">36</option><option value="37">37</option><option value="38">38</option><option value="39">39</option><option value="40">40</option><option value="41">41</option><option value="42">42</option><option value="43">43</option><option value="44">44</option><option value="45">45</option><option value="46">46</option><option value="47">47</option><option value="48">48</option><option value="49">49</option><option value="50">50</option><option value="51">51</option><option value="52">52</option><option value="53">53</option><option value="54">54</option><option value="55">55</option><option value="56">56</option><option value="57">57</option><option value="58">58</option><option value="59">59</option>                                                </select>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </td>        
            <td>
                <table class="generatorBlock">
                    <tbody>
                        <tr>
                            <th colspan="2">Hours</th>
                        </tr>
                        <tr>
                            <td>
                                <label class="radio" for="everyHour"><input id="everyHour" type="radio" value="*" name="hours">
                                Every Hour</label>
                                <label class="radio" for="everyEvenHour"><input id="everyEvenHour" type="radio" value="*/2" name="hours">
                                Even Hours</label>
                                <label class="radio" for="everyOddHour"><input id="everyOddHour" type="radio" value="1-23/2" name="hours">
                                Odd Hours</label>
                                <label class="radio" for="every6Hours"><input id="every6Hours" type="radio" value="*/6" name="hours">
                                Every 6 Hours</label>
                                <label class="radio" for="every12Hours"><input id="every12Hours" type="radio" value="*/12" name="hours">
                                Every 12 Hours</label>
                            </td>
                            <td>
                                <table class="multipleEntries">
                                    <tbody>
                                        <tr> 
                                            <td> 
                                                <input type="radio" checked="checked" value="select" name="hours">
                                            </td>
                                            <td>
                                                <select multiple="" size="10" name="selectHours[]">
                                                <option value="0">Midnight</option>
                                                <option value="1">1am</option>
                                                <option value="2">2am</option>
                                                <option value="3">3am</option>
                                                <option value="4">4am</option>
                                                <option value="5">5am</option>
                                                <option value="6">6am</option>
                                                <option value="7">7am</option>
                                                <option value="8">8am</option>
                                                <option value="9">9am</option>
                                                <option value="10">10am</option>
                                                <option value="11">11am</option>
                                                <option value="12">Noon</option>
                                                <option value="13">1pm</option>
                                                <option value="14">2pm</option>
                                                <option value="15">3pm</option>
                                                <option value="16">4pm</option>
                                                <option value="17">5pm</option>
                                                <option value="18">6pm</option>
                                                <option value="19">7pm</option>
                                                <option value="20">8pm</option>
                                                <option value="21">9pm</option>
                                                <option value="22">10pm</option>
                                                <option value="23">11pm</option>
                                                </select>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </td>
            <td>
                <table class="generatorBlock">
                    <tbody>
                        <tr>
                            <th colspan="2">Days</th>
                        </tr>
                        <tr>
                            <td> 
                                <label class="radio" for="everyday"><input id="everyday" type="radio" checked="checked" value="*" name="days">
                              Every Day</label>
                                <label class="radio" for="everyEvenDay"><input id="everyEvenDay" type="radio" value="*/2" name="days">
                              Even Days</label>
                                <label class="radio" for="everyOddDay"><input id="everyOddDay" type="radio" value="1-31/2" name="days">
                              Odd Days</label>
                              <label class="radio" for="every5Days"><input id="every5Days" type="radio" value="*/5" name="days">
                              Every 5 Days</label>
                              <label class="radio" for="every5Days"><input id="every5Days" type="radio" value="*/10" name="days">
                              Every 10 Days</label>                              
                                <label class="radio" for="every15Days"><input id="every15Days" type="radio" value="*/15" name="days">
                              Every Half Month</label>
                            </td>
                            <td> 
                                <table class="multipleEntries">                        
                                    <tbody>
                                        <tr> 
                                            <td> 
                                                <input type="radio" value="select" name="days">
                                            </td>
                                            <td> 
                                                <select multiple="" size="10" name="selectDays[]">
                                                <option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option><option value="10">10</option><option value="11">11</option><option value="12">12</option><option value="13">13</option><option value="14">14</option><option value="15">15</option><option value="16">16</option><option value="17">17</option><option value="18">18</option><option value="19">19</option><option value="20">20</option><option value="21">21</option><option value="22">22</option><option value="23">23</option><option value="24">24</option><option value="25">25</option><option value="26">26</option><option value="27">27</option><option value="28">28</option><option value="29">29</option><option value="30">30</option><option value="31">31</option>                                                </select>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>                        
                        </tr>
                    </tbody>
                </table>
            </td>
        </tr>        
        <tr>
            <td>
                <table class="generatorBlock">
                    <tbody>
                        <tr>
                            <th colspan="2">Months</th>
                        </tr>
                        <tr>                        
                            <td>                        
                                 <label class="radio" for="everyMonth"><input id="everyMonth" type="radio" checked="checked" value="*" name="months">    
                                 Every Month</label>
                                 <label class="radio" for="everyEvenMonths"><input id="everyEvenMonths" type="radio" value="*/2" name="months">
                                 Even Months</label>
                                 <label class="radio" for="everyOddMonths"><input id="everyOddMonths" type="radio" value="1-11/2" name="months">
                                 Odd Months</label>
                                 <label class="radio" for="every4Months"><input id="every4Months" type="radio" value="*/4" name="months">
                                 Every 4 Months</label>
                                 <label class="radio" for="every6Months"><input id="every6Months" type="radio" value="*/6" name="months">
                                 Every Half Year</label>
                            </td>
                            <td>
                                <table class="multipleEntries">
                                    <tbody>
                                        <tr>                            
                                            <td> 
                                              <input type="radio" value="select" name="months">
                                            </td>
                                            <td> 
                                                <select multiple="" size="10" name="selectMonths[]" class="cron">
                                                <option value="1">Jan</option>
                                                <option value="2">Feb</option>
                                                <option value="3">Mar</option>
                                                <option value="4">Apr</option>
                                                <option value="5">May</option>
                                                <option value="6">Jun</option>
                                                <option value="7">Jul</option>
                                                <option value="8">Aug</option>
                                                <option value="9">Sep</option>
                                                <option value="10">Oct</option>
                                                <option value="11">Nov</option>
                                                <option value="12">Dec</option>
                                                </select>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </td>
            <td>
                <table class="generatorBlock">
                    <tbody>
                        <tr>
                            <th colspan="2">Weekday</th>
                        </tr>
                        <tr>                        
                            <td>
                                <label class="radio" for="everyWeekday"><input id="everyWeekday" name="weekdays" value="*" checked="checked" type="radio">
                                Every Weekday</label>
                                <label class="radio" for="everyNonWeekenDays"><input id="everyNonWeekenDays" name="weekdays" value="1-5" type="radio">
                                Monday-Friday</label>                       
                                <label class="radio" for="everyWeekenDays"><input id="everyWeekenDays" name="weekdays" value="0,6" type="radio">
                                Weekend Days</label>
                            </td>
                            <td>
                                <table class="multipleEntries">
                                    <tbody>
                                        <tr>
                                            <td>
                                                <input type="radio" value="select" name="weekdays">
                                            </td>
                                            <td>
                                                <select multiple="" size="10" name="selectWeekdays[]">
                                                <option value="0">Sun</option>
                                                <option value="1">Mon</option>
                                                <option value="2">Tue</option>
                                                <option value="3">Wed</option>
                                                <option value="4">Thu</option>
                                                <option value="5">Fri</option>
                                                <option value="6">Sat</option>
                                                </select>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </td>                   
        </tr>
    </tbody>
</table>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
		<?php if (!$model->isNewRecord) echo CHtml::submitButton('Test', array('name' => 'test'));?>
	</div>
	

<?php $this->endWidget(); ?>

</div><!-- form -->