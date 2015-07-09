<?php
Yii::import("application.modules.admin.models.*", true);
class DefaultController extends Controller {

    public $layout = '//layouts/login_main';
    private $afterRegister = false;
    public $paymentMsg = "";

    public function actionIndex() {
        $this->afterRegister = false;
        $this->redirect(array("login"));
    }

    public function actionLogin() {
        $this->afterRegister = false;
        if (!isFrontUserLoggedIn()) {
            $model = new FrontUserLogin;
            $change_password_model = new ChangePassword;
            //$this->performAjaxValidation($change_password_model);
            $mail_sent_message = '';
            // collect user input data
            if (isset($_POST['FrontUserLogin'])) {
                $model->attributes = $_POST['FrontUserLogin'];
                // validate user input and redirect to previous page if valid
                if ($model->validate()) {

                    $user_id = $_SESSION['user_id'];
                    $this->redirect(array("myaccount"));
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

                    $route = 'resetpassword';
                    $params = array('id' => $user->id);
                    $url = $this->createUrl($route, $params);
                    $url = $_SERVER['SERVER_NAME'].$url;
                    $to = $user->email;
                    $subject = 'Change Password Link';
                    $message = ' <a href="'.$url.'">Click on the link</a>';
                    mailsend($to, "arommatech@gmail.com",$subject,$message);
                    $mail_sent_message = "A Password Reset Link has been sent to your mail. Please check your mail.";
                }
            }


            // display the login form
            $this->render('login', array('model' => $model, 'change_password_model' => $change_password_model, 'mail_sent_message' => $mail_sent_message));
        } else {
            $user_id = Yii::app()->session['user_id'];
            if ($user_id != '') {
                $this->redirect(array("myaccount"));
            } else
                $this->redirect(Yii::app()->controller->module->returnUrl);
        }
    }

    public function actionResetPassword($id = '') {
        $this->afterRegister = false;
        $model = new ResetPassword;
        $user = Users::model()->findByPk($id);
       
        if (isset($_POST['ResetPassword'])) {
            $model->attributes = $_POST['ResetPassword'];
            if ($model->validate()) {
                $user->password = UserModule::encrypting($model->password);
                $user->confirm_password = UserModule::encrypting($model->password);
                $user->save();
                $this->redirect(array("/user/login"));
            }
        }
        $this->render('reset_password', array('model' => $model));
    }

    public function actionRegister() {
        $this->afterRegister = false;
        if (!isFrontUserLoggedIn()) {
            $model = new Registration;
            if (isset($_POST['Registration'])) {
                $model->attributes = $_POST['Registration'];
                if ($model->validate()) {
                    $model->password = UserModule::encrypting($model->password);
                    $model->confirm_password = $model->password;
                    $model->activation_key = create_guid();
                    
                    $role = Roles::model()->findByAttributes(array('role' => 'property owner'));
                    $model->role_id = $role->id;
                    $model->status = 0;
                    $model->save();
                    // mail sending
                    $route = 'activate';
                    $params = array('activation_key' => $model->activation_key);
                    $url = $this->createUrl($route, $params);
                    $url = $_SERVER['SERVER_NAME'].$url;
                    $to = $model->email;
                    $subject = 'Account Activation Link';
                    $message = ' <a href="' . $url . '">Click on the link</a>';
                    mailsend($to, "arommatech@gmail.com", $subject, $message);
                    // $this->afterRegister = true;
                    $this->redirect(base_url().'/user/success');
                    // end of mail sending
                    //Yii::app()->session['user_id'] = $model->id;
                    //Yii::app()->session['user_name'] = $model->username;
                    //$this->redirect(array("myaccount"));
                }
            }
            $this->render('register', array('model' => $model));
        } else {
            $this->redirect(array("myaccount"));
        }
    }

    public function actionSuccess() {
        $this->render('success', array('mail_sent_message' => getParam('register_msg')));
        //$this->render('success', array('mail_sent_message' => getParam('activation_msg')));
    }

    public function actionActivate($activation_key) {
        $this->afterRegister = false;
        if ($activation_key) {
            $user = Activate::model()->findByAttributes(array('activation_key' => $activation_key, 'status' => 0));
            if ($user) {
                $user->status = 1;
                $user->activation_key = '';
                if ($user->validate()) {
                    $user->save();
                    $this->redirect(array('login'));
                } else {
                    pre($user->getErrors());
                }
            } else {
                throw new CHttpException(404, 'Page not found');
            }
        } else {
            throw new CHttpException(404, 'Page not found');
        }
    }

    public function actionMyaccount() {
        $this->afterRegister = false;
        $msg = "";
        if (!empty($this->paymentMsg)) {
            $msg = $this->paymentMsg;
        }
        if (isFrontUserLoggedIn()) {
            $this->layout = '//layouts/inner_layout';
            $id = frontUserId();
            $model = Profile::model()->findByPk($id);
            $membership_model = Membership::model()->find(array('condition' => 'user_id = "'.$model->id.'" '));
            $currencies = Currency::model()->findAll();
            $packages = Package::model()->findAll();
            $this->paymentMsg = "";
            $this->render('myaccount', array(
                'model' => $model,
                'membership_model' => $membership_model,
                'currencies' => $currencies,
                'packages' => $packages,
                'msg' => $msg
            ));
        } else {
            $this->redirect(base_url());
        }
    }

    public function actionEditprofile() {
        $this->afterRegister = false;
        if (isFrontUserLoggedIn()) {
            $this->layout = '//layouts/inner_layout';
            $id = frontUserId();
            $model = Profile::model()->findByPk($id);
            $prev_image = $model->user_image;
            if (isset($_POST['Profile'])) {
                $user_image = NULL;
                $model->attributes = $_POST['Profile'];
                if (!empty($_FILES['Profile']['name']['user_image'])) {
                    $image_name = $_FILES['Profile']['name']['user_image'];
                    $image_tmp_name = $_FILES['Profile']['tmp_name']['user_image'];
                    $image_type = $_FILES['Profile']['type']['user_image'];
//                    $user_image = uploadFile($image_name, $image_type, $image_tmp_name, 'users');
                    $user_image = uploadToS3($image_tmp_name, $image_name);
                } else {
                    $user_image = $prev_image;
                    //$user_image = uploadFile($image_name, $image_type, $image_tmp_name, 'users');
                }
                $model->user_image = $user_image;
                if ($model->validate()) {
                    $model->save();
                    $this->redirect(array('myaccount'));
                }
            }
            $this->render('edit_profile', array('model' => $model));
        } else {
            $this->redirect(base_url() . '/user/login');
        }
    }

    public function actionChangepassword() {
        $this->afterRegister = false;
        if (isFrontUserLoggedIn()) {
            $this->layout = '//layouts/inner_layout';
            $id = frontUserId();
            $model = new ChangeUserPassword;
            $user = Profile::model()->findByPk($id);
            if (isset($_POST['ChangeUserPassword'])) {
                $model->attributes = $_POST['ChangeUserPassword'];
                if ($model->validate()) {
                    $user->password = encryption($model->current_password);
                    $user->confirm_password = encryption($model->current_password);
                    if ($user->validate()) {
                        $user->save();
                        $this->redirect(array("myaccount"));
                    } 
                } 
            }
            $this->render('change_user_password', array('model' => $model, 'user' => $user));
        } else {
            $this->redirect(base_url() . '/user/login');
        }
    }

    public function actionCheckout($package) {
        $this->afterRegister = false;
        if (isFrontUserLoggedIn()) {
            $this->layout = '//layouts/inner_layout';
            $id = frontUserId();
            $package = Package::model()->findByAttributes(array('package_name' => $package));
            $user = Profile::model()->findByPk($id);
            if (!empty($package)) {
                $model = new CreditCardForm;
                if (isset($_POST['CreditCardForm'])) {
                    $model->attributes = $_POST['CreditCardForm'];
                    if ($model->validate()) {
//                        pre($model->attributes,true);
                        $orderId = generateRandomString();
                        $result = callGateway($orderId, $package, $user, $model->attributes);
//                    pre($result, true);
                        if ($result['response']['responseCode'] == "APPROVED") {
                            $transactionId = $result['response']['transactionId'];
                            $order_id = $result['response']['merchantOrderId'];
                            $package_id = $package->id;
                            $userId = $user->id;
                            $mode = "CC";
                            $amount = $package->amount;
                            $amount_unit = $result['response']['currencyCode'];
                            $status = 1;

                            $payment = new PaymentHistory;
                            $payment->user_id = $userId;
                            $payment->order_id = $order_id;
                            $payment->reference_code = $transactionId;
                            $payment->amount = $amount;
                            $payment->amount_unit = $amount_unit;
                            $payment->payment_mode = $mode;
                            $payment->package_id = $package_id;
                            $payment->payment_status = $status;
                            if ($payment->validate()) {
                                $payment->save();
                            } else {
                                pre($payment->getErrors(), true);
                            }

                            if ($package->time_period_unit == 'y') {
                                $years = '+' . $package->time_period . ' years';
                                $next_payment_date = $end = date('Y-m-d', strtotime($years));
                            } else if ($package->time_period_unit == 'm') {
                                $days = '+' . ($package->time_period * 30) . ' days';
                                $next_payment_date = $end = date('Y-m-d', strtotime($days));
                            } else if ($package->time_period_unit == 'd') {
                                $days = '+' . $package->time_period . ' days';
                                $next_payment_date = $end = date('Y-m-d', strtotime($days));
                            }

                            $user->package_id = $package_id;
                            $user->next_payment_date = $next_payment_date;
                            $user->payment_status = 1;
                            if ($user->validate()) {
                                $user->save();
                            } else {
                                pre($user->getErrors(), true);
                            }

                            $member = new Membership;
                            $member->user_id = $userId;
                            $member->package_id = $package_id;
                            $member->package_name = $package->package_name;
                            $member->alloted_featured_listing = $package->featured;
                            $member->alloted_listing = $package->listings;
                            $member->remaining_featured_listing = $package->featured;
                            $member->remaining_listing = $package->listings;
                            $member->save();
                            if ($member->validate()) {
                                $member->save();
                                $this->paymentMsg = "Payment SuccessFull";
                                $this->redirect(array("myaccount"));
                            } else {
                                pre($member->getErrors(), true);
                            }
                        }
                    }
                }
                $this->render('card_form', array('model' => $model, 'user' => $user));
            } else {
                throw new CHttpException(404, 'Page not found');
            }
        } else {
            $this->redirect(base_url());
        }
    }

    public function actionLogout() {
        $this->afterRegister = false;
        unset(Yii::app()->session['user_id']);
        unset(Yii::app()->session['user_name']);
        $this->redirect(array("login"));
    }

    private function lastVisit() {
        $lastVisit = Users::model()->findByPk(Yii::app()->user->id);
        $lastVisit->modified_date = date("Y-m-d H:i:s");
        $lastVisit->save();
    }

}
