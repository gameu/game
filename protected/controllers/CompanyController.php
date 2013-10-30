<?php

class CompanyController extends NController {
    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout = '//layouts/admin_one';
    
    public function actions(){
            // return external action classes, e.g.:
            return array(
                   
            );
    }
        
    
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
            array('allow', // allow all users to perform 'index' and 'view' actions
                'actions' => array('index', 'view','uncheck','search','Ispassed','Isrejected','operate','logout'),
                'users' => array('@'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('create', 'update'),
                'users' => array('@'),
            ),
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array('admin', 'delete'),
                'users' => array('admin'),
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
        $this->render('view', array(
            'model' => $this->loadModel($id),
        ));
    }
    public function actionSearch(){
        $s_condition = new NSearchConditon($this);
        echo $s_condition->condition;
    }
    private function check($examine,$operate,$show=true){
        NDataRender::$show_operation = $show;
        $condition = "`examine`=$examine";
        $modelName = ucfirst($this->id);
        if(!empty($_POST[$modelName])) {
             $nsearchcondition = new NSearchConditon($this);
             $s_condtion = $nsearchcondition->condition;
//             var_dump($s_condtion);
             if($s_condtion!='')
                 $condition  = "$s_condtion and `examine`=$examine";
             
//             var_dump($condition);
        }
        $criteria=new CDbCriteria(array(  
            'condition'=>$condition,  
            'order'=>'`created` DESC',  
        )); 
        NDataRender::$dataProviderOptions = array(
            'criteria' => $criteria,
        );
        $dataRender = new NDataRender($this,'uncheck',array(
            'show_checkbox_select'=>true,
            'operate'=>$operate,
        ));
    }
    public function actionUncheck(){
        $this->check(0,'examine');
    }
    public function actionIspassed(){
        $this->check(1,'delete',true);
    }
    public function actionIsrejected(){
       $this->check(2,'e_delete');
    }
    /**
     * 批量操作
     */
    public function actionOperate(){
        new NOprerator($this);
    }
    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate() {
        $model=new Company;
        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if(isset($_POST['Company'])) {
//            $_POST['Company']['created'] = GlobalFunction::$date;
            $_POST['Company']["name_pin"] = GlobalFunction::cn2pinyin($_POST['Company']["name"]);//拼音
            $_POST['Company']['initial'] = ucfirst(substr($_POST['Company']["name_pin"],0,1));
            if(is_numeric($_POST['Company']['initial'])) $_POST['Company']['initial'] = 0;
            $_POST['Company']["user"] = 5884;
            $_POST['Company']["mid"] = $model->count('NOT `mid` = 0')+1;
            if(isset($_POST['Company']['city']))
                $_POST['Company']['city'] .= '-'.$_POST['Company']['city1'];
            else $_POST['Company']['city'] = '国外-国外';
            $model->setAttributes($_POST['Company']);
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
    public function actionUpdate($id) {
        $model = $this->loadModel($id);

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Company'])) {
            $_POST['Company']["name_pin"] = GlobalFunction::cn2pinyin($_POST['Company']["name"]);//拼音
            $_POST['Company']['initial'] = ucfirst(substr($_POST['Company']["name_pin"],0,1));
            if(is_numeric($_POST['Company']['initial'])) $_POST['Company']['initial'] = 0;
            $_POST['Company']["user"] = 5884;
            $_POST['Company']["mid"] = $model->count('NOT `mid` = 0')+1;
            if(isset($_POST['Company']['city']))
                $_POST['Company']['city'] .= '-'.$_POST['Company']['city1'];
            else $_POST['Company']['city'] = '国外-国外';
            $model->setAttributes($_POST['Company']);
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->id));
        }

        $this->render('update', array(
            'model' => $model,
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
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
    }

    /**
     * Lists all models.
     */
    public function actionIndex() {
       $this->redirect(Yii::app()->createUrl('company/uncheck'));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        NDataRender::$show_operation = true;
        $dataRender = new NDataRender($this,'admin');
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return Company the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = Company::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param Company $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'company-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }
    public function actionLogout()
    {
            Yii::app()->user->logout();
            Yii::app()->session->clear();
            Yii::app()->session->destroy();
            $this->redirect(Yii::app()->createUrl('self/login'));
    }

}
