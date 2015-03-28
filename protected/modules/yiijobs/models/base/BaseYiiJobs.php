<?php

/**
 * This is the model class for table "yiiJobs".
 *
 * The followings are the available columns in table 'yiiJobs':
 * @property integer $yiiJobs_id
 * @property string $name
 * @property string $description
 * @property string $command_classname
 * @property string $command_args
 * @property integer $active_flag
 * @property integer $is_running
 * @property string $dc
 * @property string $last_ran
 * @property string $last_completed
 * @property integer $application_id
 * @property integer $mpt_id
 * @property integer $progress
 * @property string $cron_expression
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
            array('active_flag, is_running, application_id, mpt_id, progress', 'numerical', 'integerOnly'=>true),
            array('name, command_classname', 'length', 'max'=>100),
            array('description', 'length', 'max'=>245),
            array('command_args', 'length', 'max'=>145),
            array('cron_expression', 'length', 'max'=>360),
            array('dc, last_ran, last_completed', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('yiiJobs_id, name, description, command_classname, command_args, active_flag, is_running, dc, last_ran, last_completed, application_id, mpt_id, progress, cron_expression', 'safe', 'on'=>'search'),
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
            'description' => 'Description',
            'command_classname' => 'Command Classname',
            'command_args' => 'Command Args',
            'active_flag' => 'Active Flag',
            'is_running' => 'Is Running',
            'dc' => 'Dc',
            'last_ran' => 'Last Ran',
            'last_completed' => 'Last Completed',
            'application_id' => 'Application',
            'mpt_id' => 'Mpt',
            'progress' => 'Progress',
            'cron_expression' => 'Cron Expression',
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
        $criteria->compare('description',$this->description,true);
        $criteria->compare('command_classname',$this->command_classname,true);
        $criteria->compare('command_args',$this->command_args,true);
        $criteria->compare('active_flag',$this->active_flag);
        $criteria->compare('is_running',$this->is_running);
        $criteria->compare('dc',$this->dc,true);
        $criteria->compare('last_ran',$this->last_ran,true);
        $criteria->compare('last_completed',$this->last_completed,true);
        $criteria->compare('application_id',$this->application_id);
        $criteria->compare('mpt_id',$this->mpt_id);
        $criteria->compare('progress',$this->progress);
        $criteria->compare('cron_expression',$this->cron_expression,true);

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
