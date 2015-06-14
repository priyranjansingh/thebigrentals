<?php
Yii::import("application.modules.user.models.*", true);
class EmailTemplatesController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	public $menu=array(
				array('label'=>'Add Email Templates', 'url'=>array('create')),
				array('label'=>'Manage Email Templates', 'url'=>array('manage')),
			  );

	/**
	 * @return array action filters
	 */
	public function filters()
	{
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
	public function accessRules()
	{
		return array(
			array('allow',
				    'actions'=>array('index','create','update','view','manage','delete','send'),
				    'users'=>array('@'),
				    'expression'=>'isset($user->role) && ($user->role === "admin")'
			),
			array('allow',
				    'actions'=>array('index','view','manage','send'),
				    'users'=>array('@'),
				    'expression'=>'isset($user->role) && ($user->role === "manager")'
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		EmailSentTo::model()->sentEmail = $id;
		$email=new EmailSentTo('search');
		
		$this->render('view',array(
			'model'=>$this->loadModel($id),
			'email' => $email
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new EmailTemplates;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['EmailTemplates']))
		{
			$model->attributes=$_POST['EmailTemplates'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['EmailTemplates']))
		{
			$model->attributes=$_POST['EmailTemplates'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('manage'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$this->redirect(array('manage'));
	}

	/**
	 * Manages all models.
	 */
	public function actionManage()
	{
		$model=new EmailTemplates('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['EmailTemplates']))
			$model->attributes=$_GET['EmailTemplates'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	* Send Template to Users
	*/

	public function actionSend($id){
		$template = $this->loadModel($id);
		$model = new SendTemplate();

		if(isset($_POST['SendTemplate'])){
			// pre($_POST['SendTemplate'],true);
			$emails = explode(',',$_POST['SendTemplate']['to']);
			foreach($emails as $email){
				$sentTo = new EmailSentTo;
				$sentTo->sent_to = $email;
				$sentTo->sent_by = Yii::app()->user->id;
				$sentTo->email = $id;
				$sentTo->save();
			}
			$this->redirect(array('manage'));
		}

		$this->render("send",array(
			"template" => $template,
			"model" => $model
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return EmailTemplates the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=EmailTemplates::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param EmailTemplates $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='email-templates-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

	public function gridUserName($data,$row){
		$user = Users::model()->findByPk($data->sent_by);
		return $user->username;
	}
}
