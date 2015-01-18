<?php
/* @var $this YiiJobsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Yii Jobs',
);

$this->menu=array(
	array('label'=>'Create YiiJobs', 'url'=>array('create')),
	array('label'=>'Manage YiiJobs', 'url'=>array('admin')),
);
?>

<h1>Yii Jobs</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
