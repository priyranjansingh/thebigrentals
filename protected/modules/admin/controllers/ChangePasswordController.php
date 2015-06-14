<?php
ob_start();
Yii::import("application.modules.user.models.*", true);

class ChangePasswordController extends Controller {

    public $layout = '//layouts/column2';
    public $defaultAction = 'ChangePassword';

    public function actionChangePassword() {
        $id = Yii::app()->user->id;
        $model = new ChangeUserPassword;
        $user = Users::model()->findByPk($id);
        if (isset($_POST['ChangeUserPassword'])) {
            $model->attributes = $_POST['ChangeUserPassword'];
            //pre($model->attributes,true);
            if ($model->validate()) {
                $new_password = Users::model()->findbyPk(Yii::app()->user->id);
                $new_password->password = AdminModule::encrypting($model->current_password);
                $new_password->confirm_password = AdminModule::encrypting($model->current_password);
                if($new_password->validate()){
                    $new_password->save();
                    $this->redirect(array("profile/update"));
                } else {
                    pre($new_password->getErrors(),true);
                }
            }
        }
        $this->render('/users/change_user_password', array('model' => $model));
    }

}
