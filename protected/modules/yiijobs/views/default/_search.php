<?php
/* @var $this YiiJobsController */
/* @var $model YiiJobs */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
    'action'=>$this->createUrl($this->route),
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
        <?php echo $form->label($model,'description'); ?>
        <?php echo $form->textField($model,'description',array('size'=>60,'maxlength'=>245)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model,'command_classname'); ?>
        <?php echo $form->textField($model,'command_classname',array('size'=>60,'maxlength'=>100)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model,'command_args'); ?>
        <?php echo $form->textField($model,'command_args',array('size'=>60,'maxlength'=>145)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model,'active_flag'); ?>
        <?php echo $form->textField($model,'active_flag'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model,'is_running'); ?>
        <?php echo $form->textField($model,'is_running'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model,'dc'); ?>
        <?php echo $form->textField($model,'dc'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model,'last_ran'); ?>
        <?php echo $form->textField($model,'last_ran'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model,'last_completed'); ?>
        <?php echo $form->textField($model,'last_completed'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model,'application_id'); ?>
        <?php echo $form->dropDownList($model, 'application_id', $model->getApplicationIds()); ?>
    </div>

    <div class="row buttons">
        <?php echo CHtml::submitButton('Search'); ?>
    </div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->