<?php

Yii::import("application.modules.user.models.*", true);
Yii::import("application.modules.admin.models.*", true);
Yii::import("application.modules.user.models.*", true);

class DefaultController extends Controller {

    public function actionIndex() {
        $properties = Property::model()->getLast4Record();
        $this->render('index', array('properties' => $properties));
    }

    public function actionDestinations($country) {
        $this->layout = '//layouts/destination_layout';
        $criteria = new CDbCriteria();
        $criteria->condition='country=:country';
        $criteria->params=array(':country'=>$country);
        $count = Property::model()->count($criteria);
        $pages = new CPagination($count);

        // results per page
        $pages->pageSize = 10;
        $pages->applyLimit($criteria);
        $properties = Property::model()->findAll($criteria);



        //$properties = Property::model()->findAll(array('condition' => 'country = "' . $country . '" '));
        $this->render('destinations', array('properties' => $properties, 'country' => $country,'pages' => $pages));
    }

    public function actionView($property) {
        $this->layout = '//layouts/login_main';
        $check = Property::model()->validateProperty($property);
        if (!$check) {
            echo "Error";
        } else {
            $property = $check;
            $owner = Users::model()->findByPk($property->created_by);
            $criteria = new CDbCriteria;
            $criteria->condition = "property = '$property->id'";
            $gallery = PropertyGallery::model()->findAll($criteria);
            $amenities = PropertyAmenities::model()->getAllAmenities($property->id);
            $prices = PropertyPrice::model()->getAllPrice($property->id);
            unset(Yii::app()->session['date_arr']);
            $this->render('view', array(
                'property' => $property,
                'gallery' => $gallery,
                'amenities' => $amenities,
                'prices' => $prices,
                'owner' => $owner
            ));
        }
    }

    public function actionAdd() {
        $this->layout = '//layouts/login_main';
        $front_user = isFrontUserLoggedIn();
        if (!$front_user) {
            $this->redirect(base_url() . '/user/login');
        } else {
            $front_user_id = frontUserId();
            $user = Users::model()->findByPk($front_user_id);
            if (!$user->payment_status) {
                $this->redirect(base_url() . '/user/checkout');
            }
        }
        $model = new Property;
        //pre($model->attributes,true);
        $listed = BaseModel::getAll('Listed');
        $categories = BaseModel::getAll('Category');
        $amenities = BaseModel::getAll('AmenitiesFeatures');
        $currency = BaseModel::getAll('Currency');

        if (isset($_POST['Property'])) {

            $amenities = $_POST['Property']['amenities'];
            $property_price = $_POST['Property']['Price'];

            $model->attributes = $_POST['Property'];
            //pre($_POST['Property']);

            if (empty($model->is_featured)) {
                $model->is_featured = 'N';
            }
            //pre($model->attributes,true);    

            $model->main_image = 'abcd';

            $model->gallery_image = 'xyz';

            $model->amenities = "13212";

            if ($model->save()) {
                foreach ($amenities as $amenity) {
                    $pAmenities = new PropertyAmenities;
                    $pAmenities->property_id = $model->id;
                    $pAmenities->amenity_id = $amenity;
                    $pAmenities->save();
                }
                if (!empty($property_price)) {
                    foreach ($property_price['season'] as $key => $val) {
                        $property_price_model = new PropertyPrice;
                        $property_price_model->property_id = $model->id;
                        $property_price_model->season = $property_price['season'][$key];
                        $property_price_model->currency = $property_price['currency'][$key];
                        $property_price_model->start_date = $property_price['start_date'][$key];
                        $property_price_model->end_date = $property_price['end_date'][$key];
                        $property_price_model->night_price = $property_price['night_price'][$key];
                        $property_price_model->week_price = $property_price['week_price'][$key];
                        $property_price_model->month_price = $property_price['month_price'][$key];
                        $property_price_model->save();
                    }
                }
                // for saving in the unavailability calendar
                $session_data = Yii::app()->session['date_arr'];
                $unavailable = array();
                if (!empty($session_data)) {
                    foreach ($session_data as $val) {
                        $unavailable[] = $val;
                    }
                    $json_string = json_encode($unavailable);
                    $calendar_model = new AvailabilityCalendar;
                    $calendar_model->property_id = $model->id;
                    $calendar_model->status = 1;
                    $calendar_model->date = $json_string;
                    $calendar_model->save();
                }
                // end of saving in the unavailability calendar
                $this->redirect(array('step2', 'property' => $model->slug));
                // $this->redirect(array('view', 'property' => $model->slug));
            } else {
                // pre($model->getErrors(),true);
            }
        }
        $this->render('add', array('model' => $model,
            'listed' => $listed,
            'amenities' => $amenities,
            'categories' => $categories,
            'currency' => $currency,
            'user' => $user));
    }

    public function actionEdit($property) {
        $property_model = Property::model()->find(array('condition' => 'slug = "' . $property . '" '));
        $property_model->date_availability_from = date("Y-m-d", strtotime($property_model->date_availability_from));
        $property_model->date_availability_to = date("Y-m-d", strtotime($property_model->date_availability_to));
        $property_amenities_model = PropertyAmenities::model()->findAll(array('condition' => 'property_id = "' . $property_model->id . '" '));
        $property_price_model = PropertyPrice::model()->findAll(array('condition' => 'property_id = "' . $property_model->id . '" '));
        $this->layout = '//layouts/login_main';
        $front_user = isFrontUserLoggedIn();
        if (!$front_user) {
            $this->redirect(base_url() . '/user/login');
        } else {
            $front_user_id = frontUserId();
            $user = Users::model()->findByPk($front_user_id);
            if (!$user->payment_status) {
                $this->redirect(base_url() . '/user/checkout');
            }
        }
        $model = $property_model;


        //pre($model->unavailable_date->date,true);
        $listed = BaseModel::getAll('Listed');
        $categories = BaseModel::getAll('Category');
        $amenities = BaseModel::getAll('AmenitiesFeatures');
        $currency = BaseModel::getAll('Currency');

        if (isset($_POST['Property'])) {

            $amenities = $_POST['Property']['amenities'];
            $property_price = $_POST['Property']['Price'];

            $model->attributes = $_POST['Property'];

            if (empty($model->is_featured)) {
                $model->is_featured = 'N';
            }

            $model->main_image = 'abcd';

            $model->gallery_image = 'xyz';

            $model->amenities = "13212";

            if ($model->save()) {
                PropertyAmenities::model()->deleteAll('property_id = "' . $model->id . '" ');
                PropertyPrice::model()->deleteAll('property_id = "' . $model->id . '" ');
                foreach ($amenities as $amenity) {
                    $pAmenities = new PropertyAmenities;
                    $pAmenities->property_id = $model->id;
                    $pAmenities->amenity_id = $amenity;
                    $pAmenities->save();
                }
                if (!empty($property_price)) {
                    foreach ($property_price['season'] as $key => $val) {
                        $property_price_model = new PropertyPrice;
                        $property_price_model->property_id = $model->id;
                        $property_price_model->season = $property_price['season'][$key];
                        $property_price_model->currency = $property_price['currency'][$key];
                        $property_price_model->start_date = $property_price['start_date'][$key];
                        $property_price_model->end_date = $property_price['end_date'][$key];
                        $property_price_model->night_price = $property_price['night_price'][$key];
                        $property_price_model->week_price = $property_price['week_price'][$key];
                        $property_price_model->month_price = $property_price['month_price'][$key];
                        $property_price_model->save();
                    }
                }
                // for updating in the unavailability calendar
                $calendar_model = AvailabilityCalendar::model()->find(array('condition' => 'property_id = "' . $model->id . '" '));
                if (!empty($calendar_model)) {
                    $session_data = Yii::app()->session['date_arr'];
                    $unavailable = array();
                    if (!empty($session_data)) {
                        foreach ($session_data as $val) {
                            $unavailable[] = $val;
                        }
                        $json_string = json_encode($unavailable);
                        $calendar_model->date = $json_string;
                        $calendar_model->save();
                    }
                } else {
                    // end of updating in the unavailability calendar
                    // for saving in the unavailability calendar
                    $session_data = Yii::app()->session['date_arr'];
                    $unavailable = array();
                    if (!empty($session_data)) {
                        foreach ($session_data as $val) {
                            $unavailable[] = $val;
                        }
                        $json_string = json_encode($unavailable);
                        $calendar_model = new AvailabilityCalendar;
                        $calendar_model->property_id = $model->id;
                        $calendar_model->status = 1;
                        $calendar_model->date = $json_string;
                        $calendar_model->save();
                    }
                }
                // end of saving in the unavailability calendar

                unset(Yii::app()->session['date_arr']);
                $this->redirect(array('step2', 'property' => $model->slug));
                // $this->redirect(array('view', 'property' => $model->slug));
            } else {
                // pre($model->getErrors(),true);
            }
        }
        if (!empty($model->unavailable_date->date)) {
            Yii::app()->session['date_arr'] = json_decode($model->unavailable_date->date);
        }
        $this->render('edit', array('model' => $model,
            'listed' => $listed,
            'property_amenities_model' => $property_amenities_model,
            'property_price_model' => $property_price_model,
            'amenities' => $amenities,
            'categories' => $categories,
            'currency' => $currency,
            'user' => $user));
    }

    public function actionStep2($property) {
        $property_model = Property::model()->find(array('condition' => 'slug = "' . $property . '" '));
        $this->layout = '//layouts/login_main';
        $front_user = isFrontUserLoggedIn();
        if (!$front_user) {
            $this->redirect(base_url() . '/user/login');
        } else {
            $front_user_id = frontUserId();
            $user = Users::model()->findByPk($front_user_id);
            if (!$user->payment_status) {
                $this->redirect(base_url() . '/user/checkout');
            }
        }
        Yii::import("application.modules.properties.models.PropertyGallery", true);
        $property_id = $property_model->id;
        $property_gallery = PropertyGallery::model()->findAll(array('condition' => 'property = "' . $property_id . '" '));

        $model = new Property;
        $this->render('step2', array('model' => $model, 'property_gallery' => $property_gallery, 'user' => $user, 'property' => $property));
    }

    public function actionMakeMainImage() {
        $id = $_POST['id'];
        $p_id = $_POST['p_id'];
        Yii::import("application.modules.properties.models.PropertyGallery", true);
        // for unsetting all the main image set for this property
        PropertyGallery::model()->updateAll(array('type' => 'g'), 'property = "' . $p_id . '" ');
        $property_gallery = PropertyGallery::model()->findByPk($id);
        $property_gallery->type = 'm';
        $property_gallery->save(); // save the change to database
    }

    public function actionStoreDate() {
        $date = $_POST['date'];
        $date_arr = array();
        $date_arr = Yii::app()->session['date_arr'];
        if (empty($date_arr)) {
            $date_arr = array();
        }
        if (in_array($date, $date_arr)) {
            $key = array_search($date, $date_arr);
            unset($date_arr[$key]);
        } else {
            array_push($date_arr, $date);
        }
        Yii::app()->session['date_arr'] = $date_arr;
        $session_data = Yii::app()->session['date_arr'];
        $unavailable = array();
        if (!empty($session_data)) {
            foreach ($session_data as $val) {
                $unavailable[] = $val;
            }
        }
        echo json_encode($unavailable);
    }

    public function actionGetDate() {
        $session_data = Yii::app()->session['date_arr'];
        $unavailable = array();
        if (!empty($session_data)) {
            foreach ($session_data as $val) {
                $unavailable[] = $val;
            }
        }
        echo json_encode($unavailable);
    }

    public function actionUploadPropertyImage() {
        $slug = $_REQUEST['example'];
        $property_model = Property::model()->find(array('condition' => 'slug = "' . $slug . '" '));
        $upload_handler = new UploadHandler(null, true, null, 'images/property/', $property_model->id);
    }

    public function actionPropertySubmit() {
        $user_id = Yii::app()->session['user_id'];
        $membership_model = Membership::model()->find(array('condition' => 'user_id = "' . $user_id . '" '));
        $remaining_property_listing = $membership_model->remaining_listing;
        if ($remaining_property_listing >= 1) {
            $property_id = $_REQUEST['p_id'];
            Property::model()->updateAll(array('is_published' => 'Y'), 'id = "' . $property_id . '" ');
            $membership_model->remaining_listing = $remaining_property_listing - 1;
            $membership_model->save();
            echo "SUCCESS";
            //echo "Your property has been listed successfully";
        } else {
            echo "FAILURE";
            //echo "Sorry you have used all the property listing facility";
        }
    }

    public function actionRemoveImage() {
        $gallery_id = $_POST['id'];
        $property_gallery = PropertyGallery::model()->findByPk($gallery_id);
        if ($property_gallery->type == "m") {
            echo "failure";
        } else {
            deleteFromS3($property_gallery->image);
            deleteFromS3("thumb_" . $property_gallery->image);
            $property_gallery->delete();
            echo "success";
        }
    }

    // function for checking whether user will be allowed to add more featured property or not
    public function actionCheckFeatured() {
        $front_user = isFrontUserLoggedIn();
        if (!$front_user) {
            $this->redirect(base_url() . '/user/login');
        } else {
            $front_user_id = frontUserId();
            $membership_model = Membership::model()->find(array('condition' => 'user_id = "' . $front_user_id . '" '));
            if ($membership_model->remaining_featured_listing > 0) {
                echo "Y";
            } else {
                echo "N";
            }
        }
    }

    public function actionSearch() {
        if (!empty($_POST)) {
            $query = $_POST['query'];
            $ch_in = $_POST['ch_in'];
            $ch_out = $_POST['ch_out'];
            $guest = $_POST['guest'];
            $page = 0;
            $properties = Property::model()->searchProperties($query, $ch_in, $ch_out, $guest, $page);
            //pre($properties,true);
            $this->layout = '//layouts/login_main';
            $this->render('search', array('properties' => $properties['list']));
        } else {
            $this->redirect(base_url());
        }
    }

    public function actionPrefetch() {
        $list = Property::model()->getTop50List();
        $arr = [];
        foreach ($list as $key => $value) {
            $v['value'] = $value['city'] . ', ' . $value['state'] . ', ' . $value['country'];
            array_push($arr, $v);
        }
        echo json_encode($arr, true);
    }

    public function actionQueries($list) {
        $rows = Property::model()->searchList($list);
        $arr = [];
        if (!empty($rows)) {
            foreach ($rows as $key => $value) {
                $v['value'] = $value['city'] . ', ' . $value['state'] . ', ' . $value['country'];
                array_push($arr, $v);
            }
        }
        echo json_encode($arr, true);
    }

    public function actionContactowner() {
        $arrival = $_POST['arrival'];
        $departure = $_POST['departure'];
        $flexible = $_POST['flexible'];
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $country = $_POST['country'];
        $email = $_POST['email'];
        $adults = $_POST['adults'];
        $childs = $_POST['childs'];
        $message = $_POST['message'];
        $property = $_POST['property'];

        $prop = Property::model()->findByPk($property);
        $owner = Users::model()->findByPk($prop->created_by);
        $message = ownerEmail($name, $phone, $email, $country, $message, $arrival, $departure);
        $to = $owner->email;
        $subject = 'Contact Info For Property: ' . $prop->title;

        mailsend($to, "arommatech@gmail.com", $subject, $message);
        echo "mail sent";
    }

}
