<?php

Yii::import("application.modules.user.models.*", true);

class ProfileController extends Controller {

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
                'actions' => array('update'),
                'users' => array('@'),
                // 'expression' => 'isset($user->role) && ($user->role === "admin")'
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate() {
        $id = Yii::app()->user->id;
        $model = $this->loadModel($id);
        $package = BaseModel::getAll('Package');
        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Profile'])) {
            $model->attributes = $_POST['Profile'];
            if ($model->validate()) {
                $model->save();
                $this->redirect(array('update'));
            }
        }

        $this->render('update', array(
            'model' => $model,
            'package' => $package
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return Users the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = Profile::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param Users $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'users-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

    public function gridRoleName($data, $row) {
        $role = Roles::model()->findByPk($data->role_id);
        return '<span class="badge badge-important">' . $role->role . '</span>';
    }

    public function gridPackageName($data, $row) {
        $package = Package::model()->findByPk($data->package_id);
        return '<span class="badge badge-important">' . $package->package_name . '</span>';
    }

}
