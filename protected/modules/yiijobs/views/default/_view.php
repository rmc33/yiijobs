<?php
/* @var $this YiiJobsController */
/* @var $data YiiJobs */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('yiiJobs_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->yiiJobs_id), array('view', 'id'=>$data->yiiJobs_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('command_classname')); ?>:</b>
	<?php echo CHtml::encode($data->command_classname); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('active_flag')); ?>:</b>
	<?php echo CHtml::encode($data->active_flag); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('last_ran')); ?>:</b>
	<?php echo CHtml::encode($data->last_ran); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('dc')); ?>:</b>
	<?php echo CHtml::encode($data->dc); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('command_args')); ?>:</b>
	<?php echo CHtml::encode($data->command_args); ?>
	<br />


</div>