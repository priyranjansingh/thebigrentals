<?php

ob_start();
Yii::import("application.modules.user.models.*", true);

class ResetPasswordController extends Controller {

    public $layout = '//layouts/column1';
    public $defaultAction = 'ResetPassword';

    public function actionResetPassword($id = '') {
        $model = new ResetPassword;
        $user = Users::model()->findByPk($id);
        if (isset($_POST['ResetPassword'])) {
            $model->attributes = $_POST['ResetPassword'];
            if ($model->validate()) {
                //pre($model->password,true);
                $user->password = AdminModule::encrypting($model->password);
                $user->confirm_password = AdminModule::encrypting($model->password);
                //pre($user->attributes,true);
                $user->save();
                $this->redirect(array("/admin/login"));
            }
        }
      
        $this->render('/users/reset_password', array('model' => $model));
    }

}
