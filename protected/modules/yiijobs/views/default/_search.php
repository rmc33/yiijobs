<?php
/* @var $this YiiJobsController */
/* @var $model YiiJobs */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'yiiJobs_id'); ?>
		<?php echo $form->textField($model,'yiiJobs_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'command_classname'); ?>
		<?php echo $form->textField($model,'command_classname',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'active_flag'); ?>
		<?php echo $form->textField($model,'active_flag',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'last_ran'); ?>
		<?php echo $form->textField($model,'last_ran',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'dc'); ?>
		<?php echo $form->textField($model,'dc'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'command_args'); ?>
		<?php echo $form->textField($model,'command_args',array('size'=>60,'maxlength'=>145)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->