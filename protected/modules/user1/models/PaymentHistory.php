<?php

/**
 * This is the model class for table "payment_history".
 *
 * The followings are the available columns in table 'payment_history':
 * @property string $id
 * @property string $user_id
 * @property string $order_id
 * @property string $reference_code
 * @property string $package_id
 * @property string $payment_mode
 * @property integer $amount
 * @property string $amount_unit
 * @property integer $payment_status
 * @property string $created_date
 * @property string $created_by
 * @property string $modified_date
 * @property string $modified_by
 * @property integer $status
 * @property integer $deleted
 */
class PaymentHistory extends BaseModel
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'payment_history';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id, user_id, order_id, reference_code, package_id, payment_mode, amount, amount_unit, payment_status, created_date, created_by, status', 'required'),
			array('amount, payment_status, status, deleted', 'numerical', 'integerOnly'=>true),
			array('id, user_id, package_id, created_by, modified_by', 'length', 'max'=>36),
			array('order_id, amount_unit', 'length', 'max'=>50),
			array('reference_code, payment_mode', 'length', 'max'=>256),
			array('modified_date', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, user_id, order_id, reference_code, package_id, payment_mode, amount, amount_unit, payment_status, created_date, created_by, modified_date, modified_by, status, deleted', 'safe', 'on'=>'search'),
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
			'order_id' => 'Order',
			'reference_code' => 'Reference Code',
			'package_id' => 'Package',
			'payment_mode' => 'Payment Mode',
			'amount' => 'Amount',
			'amount_unit' => 'Amount Unit',
			'payment_status' => 'Payment Status',
			'created_date' => 'Created Date',
			'created_by' => 'Created By',
			'modified_date' => 'Modified Date',
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
		$criteria->compare('user_id',$this->user_id,true);
		$criteria->compare('order_id',$this->order_id,true);
		$criteria->compare('reference_code',$this->reference_code,true);
		$criteria->compare('package_id',$this->package_id,true);
		$criteria->compare('payment_mode',$this->payment_mode,true);
		$criteria->compare('amount',$this->amount);
		$criteria->compare('amount_unit',$this->amount_unit,true);
		$criteria->compare('payment_status',$this->payment_status);
		$criteria->compare('created_date',$this->created_date,true);
		$criteria->compare('created_by',$this->created_by,true);
		$criteria->compare('modified_date',$this->modified_date,true);
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
	 * @return PaymentHistory the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
