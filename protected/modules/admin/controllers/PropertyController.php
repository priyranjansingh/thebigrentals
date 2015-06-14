<?php

Yii::import("application.modules.properties.models.*", true);

class PropertyController extends Controller {

    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout = '//layouts/column2';

    /**
     * @return array action filters
     */
    public function filters() {
        return array(
            'accessControl', // perform access control for CRUD operations
            'postOnly + delete', // we only allow deletion via POST request
        );
    }

    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
    public function accessRules() {
        return array(
            array('allow',
                'actions' => array('index', 'create', 'update', 'view', 'manage', 'delete'),
                'users' => array('@'),
                'expression' => 'isset($user->role) && ($user->role === "admin")'
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }

    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionView($id) {
        $currency = BaseModel::getAll('Currency');
        $modelAmenities = BaseModel::getAll('PropertyAmenities',array('condition' => "property_id = '$id'"));
        $modelPrices = BaseModel::getAll('PropertyPrice',array('condition' => "property_id = '$id'"));
        $modelGallery = BaseModel::getAll('PropertyGallery',array('condition' => "property = '$id'"));
        $this->render('view', array(
            'model' => $this->loadModel($id),
            'currency' => $currency,
            'modelAmenities' => $modelAmenities,
            'modelPrices' => $modelPrices,
            'modelGallery' => $modelGallery
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate() {
        $model = new Property;
        $listed = BaseModel::getAll('Listed');
        $categories = BaseModel::getAll('Category');
        $amenities = BaseModel::getAll('AmenitiesFeatures');
        $currency = BaseModel::getAll('Currency');
        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);
        //pre($_POST,true);
        // pre($_FILES,true);
        if (isset($_POST['Property'])) {


            $amenities = $_POST['Property']['amenities'];
            $property_price = $_POST['Property']['Price'];

            $model->attributes = $_POST['Property'];
            $model->main_image = 'abcd';
            $model->gallery_image = 'xyz';
            $model->amenities = "13212";
            // pre($model,true);
            if ($model->save()) {
                // echo "hi";
                // die("here");
                $main_image_name = $_FILES['Property']['name']['main_image'];
                $main_image_type = $_FILES['Property']['type']['main_image'];
                $main_image_tmp = $_FILES['Property']['tmp_name']['main_image'];
                $main_image = uploadImage($main_image_name, $main_image_type, $main_image_tmp, 'property');
                $gallery = new PropertyGallery;
                $gallery->image = $main_image;
                $gallery->type = "m";
                $gallery->property = $model->id;
                $gallery->save();
                // die("here");
                $i = 0;
                foreach ($_FILES['Property']['name']['gallery_image'] as $name) {
                    $gallery_image_name = $name;
                    $gallery_image_type = $_FILES['Property']['type']['gallery_image'][$i];
                    $gallery_image_tmp = $_FILES['Property']['tmp_name']['gallery_image'][$i];
                    $gallery_image = uploadImage($gallery_image_name, $gallery_image_type, $gallery_image_tmp, 'property');
                    $gallery = new PropertyGallery;
                    $gallery->image = $gallery_image;
                    $gallery->type = "g";
                    $gallery->property = $model->id;
                    $gallery->save();
                    $i++;
                }
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
                        $property_price_model->night_price = $property_price['night_price'][$key];
                        $property_price_model->week_price = $property_price['week_price'][$key];
                        $property_price_model->month_price = $property_price['month_price'][$key];
                        $property_price_model->save();
                    }
                }


                $this->redirect(array('view', 'id' => $model->id));
            }
        }

        $this->render('create', array(
            'model' => $model,
            'listed' => $listed,
            'categories' => $categories,
            'amenities' => $amenities,
            'currency' => $currency
        ));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id) {
        $model = $this->loadModel($id);

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        $listed = BaseModel::getAll('Listed');
        $categories = BaseModel::getAll('Category');
        $amenities = BaseModel::getAll('AmenitiesFeatures');
        $currency = BaseModel::getAll('Currency');
        $modelAmenities = BaseModel::getAll('PropertyAmenities',array('condition' => "property_id = '$id'"));
        $modelPrices = BaseModel::getAll('PropertyPrice',array('condition' => "property_id = '$id'"));
        $modelGallery = BaseModel::getAll('PropertyGallery',array('condition' => "property = '$id'"));
        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Property'])) {
            $amenities = $_POST['Property']['amenities'];
            PropertyAmenities::model()->deleteAll(array("condition" => "property_id = '$id'"));
            $property_price = $_POST['Property']['Price'];

            $model->attributes = $_POST['Property'];
            $model->main_image = 'abcd';
            $model->gallery_image = 'xyz';
            $model->amenities = "13212";
            // pre($model,true);
            if ($model->save()) {
                // echo "hi";
                // die("here");
                if(!empty($_FILES['Property']['name']['main_image'])){
                    PropertyGallery::model()->deleteAll(array("condition" => "property = '$id' AND type = 'm'"));
                    $main_image_name = $_FILES['Property']['name']['main_image'];
                    $main_image_type = $_FILES['Property']['type']['main_image'];
                    $main_image_tmp = $_FILES['Property']['tmp_name']['main_image'];
                    $main_image = uploadImage($main_image_name, $main_image_type, $main_image_tmp, 'property');
                    $gallery = new PropertyGallery;
                    $gallery->image = $main_image;
                    $gallery->type = "m";
                    $gallery->property = $model->id;
                    $gallery->save();
                }
                // die("here");
                if(sizeof($_FILES['Property']['name']['gallery_image']) > 0){
                    $i = 0;
                    foreach ($_FILES['Property']['name']['gallery_image'] as $name) {
                        // PropertyGallery::model()->deleteAll(array("condition" => "property = '$id' AND type = 'g'"));
                        $gallery_image_name = $name;
                        $gallery_image_type = $_FILES['Property']['type']['gallery_image'][$i];
                        $gallery_image_tmp = $_FILES['Property']['tmp_name']['gallery_image'][$i];
                        $gallery_image = uploadImage($gallery_image_name, $gallery_image_type, $gallery_image_tmp, 'property');
                        $gallery = new PropertyGallery;
                        $gallery->image = $gallery_image;
                        $gallery->type = "g";
                        $gallery->property = $model->id;
                        $gallery->save();
                        $i++;
                    }
                }
                foreach ($amenities as $amenity) {
                    $pAmenities = new PropertyAmenities;
                    $pAmenities->property_id = $model->id;
                    $pAmenities->amenity_id = $amenity;
                    $pAmenities->save();
                }
                if (!empty($property_price)) {
                    PropertyPrice::model()->deleteAll(array("condition" => "property_id = '$id'"));
                    foreach ($property_price['season'] as $key => $val) {
                        $property_price_model = new PropertyPrice;
                        $property_price_model->property_id = $model->id;
                        $property_price_model->season = $property_price['season'][$key];
                        $property_price_model->currency = $property_price['currency'][$key];
                        $property_price_model->night_price = $property_price['night_price'][$key];
                        $property_price_model->week_price = $property_price['week_price'][$key];
                        $property_price_model->month_price = $property_price['month_price'][$key];
                        $property_price_model->save();
                    }
                }


                $this->redirect(array('view', 'id' => $model->id));
            }
        }

        $this->render('update', array(
            'model' => $model,
            'listed' => $listed,
            'categories' => $categories,
            'amenities' => $amenities,
            'currency' => $currency,
            'modelAmenities' => $modelAmenities,
            'modelPrices' => $modelPrices,
            'modelGallery' => $modelGallery
        ));
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id) {
        $this->loadModel($id)->delete();

        // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
        if (!isset($_GET['ajax']))
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('manage'));
    }

    /**
     * Lists all models.
     */
    public function actionIndex() {
        $this->redirect(array('manage'));
    }

    /**
     * Manages all models.
     */
    public function actionManage() {
        $model = new Property('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Property']))
            $model->attributes = $_GET['Property'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return Property the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = Property::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param Property $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'property-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}
