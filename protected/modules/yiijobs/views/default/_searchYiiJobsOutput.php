<?php
/* @var $this YiiJobsController */
/* @var $model YiiJobsOutput */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>$this->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'yiiJobsOutput_id'); ?>
		<?php echo $form->textField($model,'yiiJobsOutput_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'yiiJobs_id'); ?>
		<?php echo $form->textField($model,'yiiJobs_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'is_error'); ?>
		<?php echo $form->textField($model,'is_error'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'output'); ?>
		<?php echo $form->textField($model,'output',array('size'=>60,'maxlength'=>200)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'start_time'); ?>
		<?php echo $form->textField($model,'start_time'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'end_time'); ?>
		<?php echo $form->textField($model,'end_time'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->