<?php

/**
 * This is the model class for table "package".
 *
 * The followings are the available columns in table 'package':
 * @property string $id
 * @property string $package_name
 * @property integer $amount
 * @property string $currency
 * @property integer $properties_no
 * @property integer $time_period
 * @property string $time_period_unit
 * @property integer $listings
 * @property integer $featured
 * @property integer $status
 * @property string $created_date
 * @property string $created_by
 * @property string $modified_date
 * @property string $modified_by
 * @property integer $deleted
 */
class Package extends BaseModel
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'package';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id, package_name, amount, currency, properties_no, time_period, time_period_unit, listings, featured, status, created_date, created_by, deleted', 'required'),
			array('amount, properties_no, time_period, listings, featured, status, deleted', 'numerical', 'integerOnly'=>true),
			array('id, currency, created_by, modified_by', 'length', 'max'=>36),
			array('package_name', 'length', 'max'=>100),
			array('time_period_unit', 'length', 'max'=>50),
			array('modified_date', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, package_name, amount, currency, properties_no, time_period, time_period_unit, listings, featured, status, created_date, created_by, modified_date, modified_by, deleted', 'safe', 'on'=>'search'),
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
			'package_name' => 'Package Name',
			'amount' => 'Amount',
			'currency' => 'Currency',
			'properties_no' => 'Properties No',
			'time_period' => 'Time Period',
			'time_period_unit' => 'Time Period Unit',
			'listings' => 'Listings',
			'featured' => 'Featured',
			'status' => 'Status',
			'created_date' => 'Created Date',
			'created_by' => 'Created By',
			'modified_date' => 'Modified Date',
			'modified_by' => 'Modified By',
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
		$criteria->compare('package_name',$this->package_name,true);
		$criteria->compare('amount',$this->amount);
		$criteria->compare('currency',$this->currency,true);
		$criteria->compare('properties_no',$this->properties_no);
		$criteria->compare('time_period',$this->time_period);
		$criteria->compare('time_period_unit',$this->time_period_unit,true);
		$criteria->compare('listings',$this->listings);
		$criteria->compare('featured',$this->featured);
		$criteria->compare('status',$this->status);
		$criteria->compare('created_date',$this->created_date,true);
		$criteria->compare('created_by',$this->created_by,true);
		$criteria->compare('modified_date',$this->modified_date,true);
		$criteria->compare('modified_by',$this->modified_by,true);
		$criteria->compare('deleted',$this->deleted);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Package the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
