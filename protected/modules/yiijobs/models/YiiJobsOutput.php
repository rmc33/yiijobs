<?php

/**
 * This is the model class for table "yiiJobsOutput".
 *
 * The followings are the available columns in table 'yiiJobsOutput':
 * @property integer $yiiJobsOutput_id
 * @property integer $is_error
 * @property string $output
 * @property integer $yiiJobs_id
 * @property string $start_time
 * @property string $end_time
 */
class YiiJobsOutput extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'yiiJobsOutput';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('is_error, yiiJobs_id', 'numerical', 'integerOnly'=>true),
			array('output, start_time, end_time', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('yiiJobsOutput_id, is_error, output, yiiJobs_id, start_time, end_time', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'yiiJobsOutput_id' => 'Yii Jobs Output',
			'is_error' => 'Is Error',
			'output' => 'Output',
			'yiiJobs_id' => 'Yii Jobs',
			'start_time' => 'Start Time',
			'end_time' => 'End Time',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('yiiJobsOutput_id',$this->yiiJobsOutput_id);
		$criteria->compare('is_error',$this->is_error);
		$criteria->compare('output',$this->output,true);
		$criteria->compare('yiiJobs_id',$this->yiiJobs_id);
		$criteria->compare('start_time',$this->start_time,true);
		$criteria->compare('end_time',$this->end_time,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return YiiJobsOutput the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
