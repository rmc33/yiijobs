<?php
/* @var $this YiiJobsController */
/* @var $model YiiJobs */

$this->breadcrumbs=array(
	'Yii Jobs'=>array('admin'),
	$model->name=>array('view','id'=>$model->yiiJobs_id),
	'Update',
);

$this->menu=array(
	array('label'=>'Create YiiJobs', 'url'=>array('create')),
	array('label'=>'View YiiJobs', 'url'=>array('view', 'id'=>$model->yiiJobs_id)),
	array('label'=>'Manage YiiJobs', 'url'=>array('admin')),
);
?>

<h1>Update YiiJobs <?php echo $model->yiiJobs_id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>