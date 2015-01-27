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

	<b><?php echo CHtml::encode($data->getAttributeLabel('description')); ?>:</b>
	<?php echo CHtml::encode($data->description); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('command_classname')); ?>:</b>
	<?php echo CHtml::encode($data->command_classname); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('command_args')); ?>:</b>
	<?php echo CHtml::encode($data->command_args); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('active_flag')); ?>:</b>
	<?php echo CHtml::encode($data->active_flag); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('is_running')); ?>:</b>
	<?php echo CHtml::encode($data->is_running); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('dc')); ?>:</b>
	<?php echo CHtml::encode($data->dc); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('last_ran')); ?>:</b>
	<?php echo CHtml::encode($data->last_ran); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('last_completed')); ?>:</b>
	<?php echo CHtml::encode($data->last_completed); ?>
	<br />
	
<b>View Output:</b>
<a href="<?php echo "viewOutput?YiiJobsOutput%5ByiiJobsOutput_id%5D=&YiiJobsOutput%5ByiiJobs_id%5D={$data->yiiJobs_id}&YiiJobsOutput%5Bis_error%5D=&YiiJobsOutput%5Boutput%5D=&YiiJobsOutput%5Bstart_time%5D=&YiiJobsOutput%5Bend_time%5D=&YiiJobsOutput_page=1&ajax=yii-jobs-grid&id=3";?>">output logs</a>
<br />

</div>