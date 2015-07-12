<?php

/**
 * This is the model class for table "property_gallery".
 *
 * The followings are the available columns in table 'property_gallery':
 * @property string $id
 * @property string $property
 * @property string $image
 * @property string $type
 * @property integer $status
 * @property integer $deleted
 * @property string $created_by
 * @property string $modified_by
 * @property string $created_date
 * @property string $modified_date
 */
class PropertyGallery extends BaseModel {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'property_gallery';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('id, property, image, type, created_by, modified_by, created_date, modified_date', 'required'),
            array('status, deleted', 'numerical', 'integerOnly' => true),
            array('id, property, created_by, modified_by', 'length', 'max' => 36),
            array('image', 'length', 'max' => 100),
            array('type', 'length', 'max' => 1),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, property, image, type, status, deleted, created_by, modified_by, created_date, modified_date', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'property' => array(self::BELONGS_TO, 'Property', 'property'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'property' => 'Property',
            'image' => 'Image',
            'type' => 'Type',
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
        $criteria->compare('property', $this->property, true);
        $criteria->compare('image', $this->image, true);
        $criteria->compare('type', $this->type, true);
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
     * @return PropertyGallery the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}
