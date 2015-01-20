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

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->