<?php
/* @var $this YiiJobsController */
/* @var $model YiiJobs */

$this->breadcrumbs=array(
	'Yii Jobs'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List YiiJobs', 'url'=>array('index')),
	array('label'=>'Create YiiJobs', 'url'=>array('create')),
	array('label'=>'Update YiiJobs', 'url'=>array('update', 'id'=>$model->yiiJobs_id)),
	array('label'=>'Delete YiiJobs', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->yiiJobs_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage YiiJobs', 'url'=>array('admin')),
);
?>

<h1>View YiiJobs #<?php echo $model->yiiJobs_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'yiiJobs_id',
		'name',
		'application_id',
		'description',
		'command_classname',
		'command_args',
		'active_flag',
		'is_running',
		'dc',
		'last_ran',
		'last_completed',
		'cron_expression'
	),
)); ?>
<?php if ($model->cron_expression) {?>
<b>Next Run:</b><?php echo $model->getNextCronRun();?>
</br>
<?php } ?>
<b>View Output:</b>
<a href="<?php echo "viewOutput?YiiJobsOutput%5ByiiJobsOutput_id%5D=&YiiJobsOutput%5ByiiJobs_id%5D={$model->yiiJobs_id}&YiiJobsOutput%5Bis_error%5D=&YiiJobsOutput%5Boutput%5D=&YiiJobsOutput%5Bstart_time%5D=&YiiJobsOutput%5Bend_time%5D=&YiiJobsOutput_page=1&ajax=yii-jobs-grid&id=3";?>">output logs</a>
<br />
