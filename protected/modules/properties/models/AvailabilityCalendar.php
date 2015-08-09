<?php

/**
 * This is the model class for table "availability_calendar".
 *
 * The followings are the available columns in table 'availability_calendar':
 * @property string $id
 * @property string $property_id
 * @property string $date
 * @property string $created_date
 * @property string $modified_date
 * @property string $created_by
 * @property string $modified_by
 * @property integer $status
 * @property integer $deleted
 */
class AvailabilityCalendar extends BaseModel
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'availability_calendar';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id, property_id, date, created_by, status', 'required'),
			array('status, deleted', 'numerical', 'integerOnly'=>true),
			array('id, property_id, created_by, modified_by', 'length', 'max'=>36),
			array('created_date, modified_date', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, property_id, date, created_date, modified_date, created_by, modified_by, status, deleted', 'safe', 'on'=>'search'),
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
			'id' => 'ID',
			'property_id' => 'Property',
			'date' => 'Date',
			'created_date' => 'Created Date',
			'modified_date' => 'Modified Date',
			'created_by' => 'Created By',
			'modified_by' => 'Modified By',
			'status' => 'Status',
			'deleted' => 'Deleted',
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

		$criteria->compare('id',$this->id,true);
		$criteria->compare('property_id',$this->property_id,true);
		$criteria->compare('date',$this->date,true);
		$criteria->compare('created_date',$this->created_date,true);
		$criteria->compare('modified_date',$this->modified_date,true);
		$criteria->compare('created_by',$this->created_by,true);
		$criteria->compare('modified_by',$this->modified_by,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('deleted',$this->deleted);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return AvailabilityCalendar the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}