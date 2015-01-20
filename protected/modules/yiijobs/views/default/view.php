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
		'description',
		'command_classname',
		'command_args',
		'active_flag',
		'is_running',
		'dc',
		'last_ran',
		'last_completed',
	),
)); ?>
