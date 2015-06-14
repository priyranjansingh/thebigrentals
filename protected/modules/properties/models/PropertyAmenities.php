<?php

/**
 * This is the model class for table "property_amenities".
 *
 * The followings are the available columns in table 'property_amenities':
 * @property string $id
 * @property string $property_id
 * @property string $amenity_id
 * @property integer $status
 * @property integer $deleted
 * @property string $created_by
 * @property string $modified_by
 * @property string $created_date
 * @property string $modified_date
 */
class PropertyAmenities extends BaseModel {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'property_amenities';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('id, property_id, amenity_id, created_by, modified_by, created_date, modified_date', 'required'),
            array('status, deleted', 'numerical', 'integerOnly' => true),
            array('id, property_id, amenity_id, created_by, modified_by', 'length', 'max' => 36),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, property_id, amenity_id, status, deleted, created_by, modified_by, created_date, modified_date', 'safe', 'on' => 'search'),
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
            'amenity_id' => 'Amenity',
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
        $criteria->compare('amenity_id', $this->amenity_id, true);
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
     * @return PropertyAmenities the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function getAllAmenities($property_id) {
        $sql = "SELECT am.name FROM `property_amenities` pa LEFT JOIN amenities_features am ON pa.amenity_id = am.id WHERE `property_id` = '$property_id'";
        $result = BaseModel::executeSimpleQuery($sql);
        return $result;
    }

}
