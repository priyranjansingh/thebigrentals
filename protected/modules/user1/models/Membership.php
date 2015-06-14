<?php

/**
 * This is the model class for table "user_membership_detail".
 *
 * The followings are the available columns in table 'user_membership_detail':
 * @property string $id
 * @property string $user_id
 * @property string $package_id
 * @property string $package_name
 * @property integer $alloted_listing
 * @property integer $remaining_listing
 * @property integer $alloted_featured_listing
 * @property integer $remaining_featured_listing
 * @property string $created_date
 * @property string $created_by
 * @property string $modified_date
 * @property string $modified_by
 * @property integer $deleted
 * @property integer $status
 */
class Membership extends BaseModel
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'user_membership_detail';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id, user_id, package_id, package_name, alloted_listing, remaining_listing, alloted_featured_listing, remaining_featured_listing, created_date, created_by, status', 'required'),
			array('alloted_listing, remaining_listing, alloted_featured_listing, remaining_featured_listing, deleted, status', 'numerical', 'integerOnly'=>true),
			array('id, user_id, package_id, created_by, modified_by', 'length', 'max'=>36),
			array('package_name', 'length', 'max'=>256),
			array('modified_date', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, user_id, package_id, package_name, alloted_listing, remaining_listing, alloted_featured_listing, remaining_featured_listing, created_date, created_by, modified_date, modified_by, deleted, status', 'safe', 'on'=>'search'),
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
			'user_id' => 'User',
			'package_id' => 'Package',
			'package_name' => 'Package Name',
			'alloted_listing' => 'Alloted Listing',
			'remaining_listing' => 'Remaining Listing',
			'alloted_featured_listing' => 'Alloted Featured Listing',
			'remaining_featured_listing' => 'Remaining Featured Listing',
			'created_date' => 'Created Date',
			'created_by' => 'Created By',
			'modified_date' => 'Modified Date',
			'modified_by' => 'Modified By',
			'deleted' => 'Deleted',
			'status' => 'Status',
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
		$criteria->compare('user_id',$this->user_id,true);
		$criteria->compare('package_id',$this->package_id,true);
		$criteria->compare('package_name',$this->package_name,true);
		$criteria->compare('alloted_listing',$this->alloted_listing);
		$criteria->compare('remaining_listing',$this->remaining_listing);
		$criteria->compare('alloted_featured_listing',$this->alloted_featured_listing);
		$criteria->compare('remaining_featured_listing',$this->remaining_featured_listing);
		$criteria->compare('created_date',$this->created_date,true);
		$criteria->compare('created_by',$this->created_by,true);
		$criteria->compare('modified_date',$this->modified_date,true);
		$criteria->compare('modified_by',$this->modified_by,true);
		$criteria->compare('deleted',$this->deleted);
		$criteria->compare('status',$this->status);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Membership the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
