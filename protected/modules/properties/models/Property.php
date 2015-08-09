<?php
/**
 * This is the model class for table "property".
 *
 * The followings are the available columns in table 'property':
 * @property string $id
 * @property string $title
 * @property string $slug
 * @property string $description
 * @property string $country
 * @property string $state
 * @property string $city
 * @property string $address_line_1
 * @property string $address_line_2
 * @property string $zip
 * @property string $latitude
 * @property string $longitude
 * @property integer $enable_google_street_view
 * @property double $size
 * @property string $size_unit
 * @property double $lot_size
 * @property string $lot_size_unit
 * @property integer $rooms
 * @property integer $bedrooms
 * @property integer $bathrooms
 * @property integer $year_built
 * @property integer $garages
 * @property double $garage_size
 * @property string $garaze_size_unit
 * @property string $basement
 * @property string $external_constructions
 * @property string $roofing
 * @property string $date_availability
 * @property integer $listed_in
 * @property integer $property_status
 * @property integer $status
 * @property integer $deleted
 * @property string $created_date
 * @property string $created_by
 * @property string $modified_date
 * @property string $modified_by
 * @property integer $video_from
 * @property string $embed_video_id
 */
class Property extends BaseModel {
    

    public $main_image;
    public $gallery_image;
    public $amenities;

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'property';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        return array(
            array('title, description, country,category_id, state, city, zip, latitude, longitude, rooms, bedrooms, bathrooms,date_availability_from,date_availability_to', 'required'),
            array('enable_google_street_view, year_built, garages, property_status, status, deleted', 'numerical', 'integerOnly' => true),
            array('size, lot_size, garage_size', 'numerical'),
            array('is_featured, id, listed_in, created_by, modified_by,category_id', 'length', 'max' => 36),
            array('country, state, city, zip, latitude, longitude, size_unit, lot_size_unit, external_constructions', 'length', 'max' => 100),
            array('garaze_size_unit,bedrooms, bathrooms, rooms', 'length', 'max' => 10),
            array('video_from', 'length', 'max' => 512),
            array('basement, roofing', 'length', 'max' => 50),
            array('embed_video_id,address_line_1,address_line_2', 'length', 'max' => 256),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, title,main_image,gallery_image, slug, description, country, state, city, zip, latitude, longitude, enable_google_street_view, size, size_unit, lot_size, lot_size_unit, rooms, bedrooms, bathrooms, year_built, garages, garage_size, garaze_size_unit, basement, external_constructions, roofing, date_availability_from,date_availability_to, listed_in, property_status, status, deleted, created_date, created_by, modified_date, modified_by, video_from, embed_video_id,is_featured', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
         return array(
            'gallery' => array(self::HAS_MANY, 'PropertyGallery', 'property', 'condition'=>'gallery.type = "m" ',),
            'unavailable_date' => array(self::HAS_ONE,'AvailabilityCalendar','property_id'), 
        );
    }

    /**
     * Behaviors for this model
     */
    public function behaviors() {
        return array(
            'slug' => array(
                'class' => 'ext.behaviors.SluggableBehavior.SluggableBehavior',
                'columns' => array('title'),
                'unique' => true,
                'update' => true,
            ),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'title' => 'Property Name',
            'slug' => 'Slug',
            'category_id' => 'Property Type',
            'description' => 'Property Description',
            'date_availability_from' => 'Available From', 
            'date_availability_to' => 'Available To', 
            'country' => 'Country',
            'state' => 'State',
            'city' => 'City',
            'amenities' => 'Features & Amenities',
            'address_line_1' => 'Address Line',
            'address_line_2' => 'Address Line 2',
            'zip' => 'Zip',
            'latitude' => 'Latitude',
            'longitude' => 'Longitude',
            'enable_google_street_view' => 'Enable Google Street View',
            'size' => 'Size',
            'size_unit' => 'Size Unit',
            'lot_size' => 'Lot Size',
            'lot_size_unit' => 'Lot Size Unit',
            'rooms' => 'Rooms',
            'bedrooms' => 'Bedrooms',
            'bathrooms' => 'Bathrooms',
            'year_built' => 'Year Built',
            'garages' => 'Garages',
            'garage_size' => 'Garage Size',
            'garaze_size_unit' => 'Garaze Size Unit',
            'basement' => 'Basement',
            'external_constructions' => 'External Constructions',
            'roofing' => 'Roofing',
            'date_availability' => 'Date Availability',
            'listed_in' => 'Listed In',
            'property_status' => 'Property Status',
            'status' => 'Status',
            'is_featured' => 'Is Featured',
            'deleted' => 'Deleted',
            'created_date' => 'Created Date',
            'created_by' => 'Created By',
            'modified_date' => 'Modified Date',
            'modified_by' => 'Modified By',
            'video_from' => 'Video From',
            'embed_video_id' => 'Embed Video',
            'main_image' => 'Property Main Image',
            'gallery_image' => 'Other Images of property'
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
        $criteria->compare('title', $this->title, true);
        $criteria->compare('slug', $this->slug, true);
        $criteria->compare('category_id', $this->slug, true);
        $criteria->compare('description', $this->description, true);
        $criteria->compare('country', $this->country, true);
        $criteria->compare('state', $this->state, true);
        $criteria->compare('city', $this->city, true);
        $criteria->compare('zip', $this->zip, true);
        $criteria->compare('latitude', $this->latitude, true);
        $criteria->compare('longitude', $this->longitude, true);
        $criteria->compare('enable_google_street_view', $this->enable_google_street_view);
        $criteria->compare('size', $this->size);
        $criteria->compare('size_unit', $this->size_unit, true);
        $criteria->compare('lot_size', $this->lot_size);
        $criteria->compare('lot_size_unit', $this->lot_size_unit, true);
        $criteria->compare('rooms', $this->rooms);
        $criteria->compare('bedrooms', $this->bedrooms);
        $criteria->compare('bathrooms', $this->bathrooms);
        $criteria->compare('year_built', $this->year_built);
        $criteria->compare('garages', $this->garages);
        $criteria->compare('garage_size', $this->garage_size);
        $criteria->compare('garaze_size_unit', $this->garaze_size_unit, true);
        $criteria->compare('basement', $this->basement, true);
        $criteria->compare('external_constructions', $this->external_constructions, true);
        $criteria->compare('roofing', $this->roofing, true);
        $criteria->compare('date_availability_from', $this->date_availability_from, true);
        $criteria->compare('date_availability_to', $this->date_availability_to, true);
        $criteria->compare('listed_in', $this->listed_in);
        $criteria->compare('property_status', $this->property_status);
        $criteria->compare('status', $this->status);
        $criteria->compare('is_featured', $this->is_featured);
        $criteria->compare('deleted', $this->deleted);
        $criteria->compare('created_date', $this->created_date, true);
        $criteria->compare('created_by', $this->created_by, true);
        $criteria->compare('modified_date', $this->modified_date, true);
        $criteria->compare('modified_by', $this->modified_by, true);
        $criteria->compare('video_from', $this->video_from);
        $criteria->compare('embed_video_id', $this->embed_video_id, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Property the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }
    
    public function getLast20Record(){
        $sql = "SELECT p.id,p.title,p.description,p.slug,p.bedrooms,p.bathrooms,p.garages,pc.month_price,pg.image FROM `property` p LEFT JOIN property_price pc ON p.id = pc.property_id LEFT JOIN property_gallery pg ON p.id = pg.property WHERE pg.type = 'm' AND pc.start_date < CURDATE() AND pc.end_date > CURDATE() ORDER BY p.created_date DESC LIMIT 20";
        $result = BaseModel::executeSimpleQuery($sql);
        return $result;
    }
    
    public function validateProperty($property) {
        $result = Property::model()->findByAttributes(array('slug' => $property));
        if(!empty($result)){
            return $result;
        }
        return false;
    }
    
     public function getTop50List(){
        $sql = "SELECT DISTINCT city,state,country FROM property ORDER BY city ASC LIMIT 0,50";
        $result = BaseModel::executeSimpleQuery($sql);
        return $result;
    }

    public function searchList($list) {
        $sql = "SELECT DISTINCT city,state,country FROM property WHERE city LIKE '%$list%' OR state LIKE '%$list%' OR country LIKE '%$list%' ORDER BY city ASC LIMIT 0,50";
        $result = BaseModel::executeSimpleQuery($sql);
        return $result;   
    }

    public function searchProperties($query,$ch_in,$ch_out,$guest){
        $arr = explode(", ",$query);
        $city = $arr[0];
        $state = $arr[1];
        $country = $arr[2];
        $rooms = ceil($guest/2);
        $ret = [];
        if(!empty($ch_in) && !empty($query) && !empty($guest)){
            $c_sql = "SELECT COUNT(*) as p_count FROM `property` p LEFT JOIN property_price pc ON p.id = pc.property_id LEFT JOIN property_gallery pg ON p.id = pg.property WHERE p.city = '$city' AND p.state = '$state' AND p.country = '$country' AND p.bedrooms >= $rooms AND pg.type = 'm' AND pc.start_date < CURDATE() AND pc.end_date > CURDATE()";
            
            $c_result = BaseModel::executeSimpleQuery($c_sql);
            $ret['count'] = $c_result[0]['p_count'];
            if($c_result[0]['p_count'] > 0){
                $sql = "SELECT p.id,p.title,p.description,p.slug,p.bedrooms,p.bathrooms,p.garages,pc.month_price,pg.image FROM `property` p LEFT JOIN property_price pc ON p.id = pc.property_id LEFT JOIN property_gallery pg ON p.id = pg.property WHERE p.city = '$city' AND p.state = '$state' AND p.country = '$country' AND p.bedrooms >= $rooms AND pg.type = 'm' AND pc.start_date < CURDATE() AND pc.end_date > CURDATE() ORDER BY p.created_date DESC LIMIT 20";
                $result = BaseModel::executeSimpleQuery($sql);
                $ret['list'] = $result;
            }
        }
        
        return $ret;

    }
    

}
