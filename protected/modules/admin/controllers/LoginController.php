<?php

ob_start();
Yii::import("application.modules.user.models.*", true);

class LoginController extends Controller {

    public $layout = '//layouts/column1';
    public $defaultAction = 'login';

    /**
     * Displays the login page
     */
    public function actionLogin() {
        if (Yii::app()->user->isGuest) {
            $model = new UserLogin;
            $change_password_model = new ChangePassword;
            //$this->performAjaxValidation($change_password_model);
            $mail_sent_message = '';
            // collect user input data
            if (isset($_POST['UserLogin'])) {
                $model->attributes = $_POST['UserLogin'];
                // validate user input and redirect to previous page if valid
                if ($model->validate()) {
                    $this->lastVisit();
                    $this->redirect(array("/admin"));
                }
            }

            if (isset($_POST['ChangePassword'])) {
                $change_password_model->attributes = $_POST['ChangePassword'];
                // validate user input and redirect to previous page if valid
                if ($change_password_model->validate()) {
                    /* code for sending emails */

                    if (strpos($change_password_model->username, "@")) {
                        $user = Users::model()->findByAttributes(array('email' => $change_password_model->username));
                    } else {
                        $user = Users::model()->findByAttributes(array('username' => $change_password_model->username));
                    }

                    $route = 'admin/resetpassword';
                    $params = array('id' => 100);
                    $url = $this->createUrl($route, $params);
                    $to = $user->email;
                    $subject = 'Password Reset Link';
                    $message = ' Click on the link';
                    mail($to, $subject, $message);
                    $mail_sent_message = "A Password Reset Link has been sent to your mail. Please check your mail.";
                }
            }


            // display the login form
            $this->render('/users/login', array('model' => $model, 'change_password_model' => $change_password_model, 'mail_sent_message' => $mail_sent_message));
        } else {
            $user_id = Yii::app()->user->id;
            if ($user_id != '') {
                $this->redirect(array("/admin/profile"));
            } else
                $this->redirect(Yii::app()->controller->module->returnUrl);
        }
    }

    private function lastVisit() {
        $lastVisit = Users::model()->findByPk(Yii::app()->user->id);
        $lastVisit->modified_date = date("Y-m-d H:i:s");
        $lastVisit->save();
    }

//    private function userSession() {
//        $user_id = Yii::app()->user->id;
//        $ip_address = Yii::app()->request->getUserHostAddress();
//        if (strpos($ip_address, '.') !== false) {
//            $remote_ip = $ip_address;
//        } else {
//            $remote_ip = "127.0.0.1";
//        }
//        $user_agent = Yii::app()->request->getUserAgent();
//        $session = new CHttpSession;
//        $session->open();
//        $session_id = $session->getSessionID();
////        $last_activity
//    }


    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'change-password-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}
