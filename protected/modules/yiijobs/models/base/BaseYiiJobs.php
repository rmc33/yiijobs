<?php

/**
 * This is the model class for table "yiiJobs".
 *
 * The followings are the available columns in table 'yiiJobs':
 * @property integer $yiiJobs_id
 * @property string $name
 * @property string $command_classname
 * @property string $active_flag
 * @property string $last_ran
 * @property string $dc
 * @property string $command_args
 * @property string $description
 * @property string $last_completed
 */
class BaseYiiJobs extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'yiiJobs';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, command_classname', 'length', 'max'=>100),
			array('active_flag, last_ran', 'length', 'max'=>45),
			array('command_args', 'length', 'max'=>145),
			array('description', 'length', 'max'=>245),
			array('dc, last_completed', 'safe'),
			// The following rule is used by search().
			array('name, command_classname, active_flag, last_ran, dc, command_args, description, last_completed', 'safe', 'on'=>'search'),
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
			'yiiJobs_id' => 'Yii Jobs',
			'name' => 'Name',
			'command_classname' => 'Command Classname',
			'active_flag' => 'Active Flag',
			'last_ran' => 'Last Ran',
			'dc' => 'Dc',
			'command_args' => 'Command Args',
			'description' => 'Description',
			'last_completed' => 'Last Completed',
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

		$criteria->compare('yiiJobs_id',$this->yiiJobs_id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('command_classname',$this->command_classname,true);
		$criteria->compare('active_flag',$this->active_flag,true);
		$criteria->compare('last_ran',$this->last_ran,true);
		$criteria->compare('dc',$this->dc,true);
		$criteria->compare('command_args',$this->command_args,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('last_completed',$this->last_completed,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return YiiJobs the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
