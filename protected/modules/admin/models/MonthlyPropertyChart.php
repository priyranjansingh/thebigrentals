<?php

/**
 * This is the model class for table "monthly_property_chart".
 *
 * The followings are the available columns in table 'monthly_property_chart':
 * @property integer $id
 * @property integer $total_property
 * @property integer $month
 * @property integer $year
 */
class MonthlyPropertyChart extends BaseModel
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'monthly_property_chart';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('total_property, month, year', 'required'),
			array('total_property, month, year', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, total_property, month, year', 'safe', 'on'=>'search'),
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
			'total_property' => 'Total Property',
			'month' => 'Month',
			'year' => 'Year',
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

		$criteria->compare('id',$this->id);
		$criteria->compare('total_property',$this->total_property);
		$criteria->compare('month',$this->month);
		$criteria->compare('year',$this->year);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
        
         public function getMonthlyPropertyData($year)
        {
             //$year = "2015";
             $sql = "select total_property,name from monthly_property_chart , month  "
                     . "where monthly_property_chart.month = month.id  and  year = '$year'";   
             $command = Yii::app()->db->createCommand($sql);
             $results = $command->queryAll();
             $property = array();
             foreach($results as $key => $val)
             {
                 $property[$key][] = $val['name'];
                 $property[$key][] = (int) ($val['total_property']);
                 
             }    
             return $property;
        }       

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return MonthlyPropertyChart the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
