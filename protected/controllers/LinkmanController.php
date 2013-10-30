<?php

class LinkmanController extends NController
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/admin_one';

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
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view','operate','Excel'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','operate'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
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
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}
        public function actionOperate(){
            new NOprerator($this);
        }
        public function actionExcel(){
            $this->layout = '';
            $criteria=new CDbCriteria(array(  
                'order'=>'t.`id` DESC',  
                'with'=>array(
                    'platform',
                    'company',
                ),
            )); 
            NDataRender::$dataProviderOptions = array(
                'criteria' => $criteria,
            );
            $dataRender = new NDataRender($this,'excel');
        }
	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Linkman;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
                
		if(isset($_POST['Linkman'])){
                        $ids = explode('.', $_POST['Linkman']['p_id']);
                        $_POST['Linkman']['p_id'] = $ids[0];
                        $_POST['Linkman']['m_id'] = $ids[1];
                        $_POST['Linkman']["c_name_pin"] = GlobalFunction::cn2pinyin($_POST['Linkman']["c_name"]);//拼音
                        $_POST['Linkman']['initial'] = ucfirst(substr($_POST['Linkman']["c_name_pin"],0,1));
                        if(is_numeric($_POST['Linkman']['initial'])) $_POST['Linkman']['initial'] = 0;
			$model->attributes=$model->setAttributes($_POST['Linkman'],false);
			if($model->save())
				$this->redirectUser($model->id);
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

		if(isset($_POST['Linkman']))
		{
			$model->attributes=$_POST['Linkman'];
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
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex(){
            $condition = "";
            $modelName = ucfirst($this->id);
            if(!empty($_POST[$modelName])) {
                 $nsearchcondition = new NSearchConditon($this);
                 $s_condtion = $nsearchcondition->condition;
    //             var_dump($s_condtion);
                 $condition  = $s_condtion;
    //             var_dump($condition);
            }    
            NDataRender::$show_operation = true;
            $criteria=new CDbCriteria(array(  
                'condition'=>$condition,  
                'order'=>'t.`id` DESC',  
                'with'=>array(
                    'platform',
                    'company',
                ),
            )); 
            NDataRender::$dataProviderOptions = array(
                'criteria' => $criteria,
            );
            $dataRender = new NDataRender($this,'index',array(
                  'show_checkbox_select'=>true,
                  
            ));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Linkman('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Linkman']))
			$model->attributes=$_GET['Linkman'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Linkman the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Linkman::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Linkman $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='linkman-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
