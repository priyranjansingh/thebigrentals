<?php

/**
 * This is the model class for table "property_price".
 *
 * The followings are the available columns in table 'property_price':
 * @property string $id
 * @property string $property_id
 * @property string $season
 * @property string $currency
 * @property string $start_date
 * @property string $end_date
 * @property integer $night_price
 * @property integer $week_price
 * @property integer $month_price
 * @property integer $status
 * @property integer $deleted
 * @property string $created_by
 * @property string $modified_by
 * @property string $created_date
 * @property string $modified_date
 */
class PropertyPrice extends BaseModel {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'property_price';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('id, property_id,start_date,end_date, season, currency, night_price, created_by, modified_by, created_date, modified_date', 'required'),
            array('night_price, week_price, month_price, status, deleted', 'numerical', 'integerOnly' => true),
            array('id, property_id, currency, created_by, modified_by', 'length', 'max' => 36),
            array('season', 'length', 'max' => 3),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, property_id, season, currency, night_price, week_price, month_price, status, deleted, created_by, modified_by, created_date, modified_date', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'property_id' => 'Property',
            'season' => 'Season',
            'currency' => 'Currency',
            'start_date' => 'Start Date',
            'end_date' => 'End Date',
            'night_price' => 'Night Price',
            'week_price' => 'Week Price',
            'month_price' => 'Month Price',
            'status' => 'Status',
            'deleted' => 'Deleted',
            'created_by' => 'Created By',
            'modified_by' => 'Modified By',
            'created_date' => 'Created Date',
            'modified_date' => 'Modified Date',
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
    public function search() {
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id, true);
        $criteria->compare('property_id', $this->property_id, true);
        $criteria->compare('season', $this->season, true);
        $criteria->compare('currency', $this->currency, true);
        $criteria->compare('night_price', $this->night_price);
        $criteria->compare('week_price', $this->week_price);
        $criteria->compare('month_price', $this->month_price);
        $criteria->compare('status', $this->status);
        $criteria->compare('deleted', $this->deleted);
        $criteria->compare('created_by', $this->created_by, true);
        $criteria->compare('modified_by', $this->modified_by, true);
        $criteria->compare('created_date', $this->created_date, true);
        $criteria->compare('modified_date', $this->modified_date, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return PropertyPrice the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function getAllPrice($property_id) {
        $sql = "SELECT pc.season,pc.start_date,pc.end_date,pc.night_price,pc.week_price,pc.month_price,c.currency,c.symbol FROM `property_price` pc LEFT JOIN currency c ON pc.currency = c.id WHERE pc.property_id = '$property_id' ORDER BY pc.start_date ASC";
        $result = BaseModel::executeSimpleQuery($sql);
        return $result;
    }

}
