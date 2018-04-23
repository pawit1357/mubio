<?php

class WasteController extends CController
{

    public $layout = '_main';

    private $_model;

    public function actionIndex()
    {
        // Authen Login
        if (! UserLoginUtils::isLogin()) {
            $this->redirect(Yii::app()->createUrl('Site/login'));
        }
        if (! UserLoginUtils::authorizePage($_SERVER['REQUEST_URI'])) {
            $this->redirect(Yii::app()->createUrl('DashBoard/Permission'));
        }
        $model = new Waste();
        $this->render('//waste/main', array(
            'data' => $model
        ));
    }

    public function actionCreate()
    {
        // Authen Login
        if (! UserLoginUtils::isLogin()) {
            $this->redirect(Yii::app()->createUrl('Site/login'));
        }
        if (! UserLoginUtils::authorizePage($_SERVER['REQUEST_URI'])) {
            $this->redirect(Yii::app()->createUrl('DashBoard/Permission'));
        }
        
        if (isset($_POST['Waste'])) {
            
            $transaction = Yii::app()->db->beginTransaction();
            // Add Request
            $model = new Waste();
            $model->attributes = $_POST['Waste'];
            
            $model->create_by = UserLoginUtils::getUsersLoginId();
            $model->create_date = date("Y-m-d H:i:s");
            $model->update_by = UserLoginUtils::getUsersLoginId();
            $model->update_date = date("Y-m-d H:i:s");
            $model->save();
            
            // echo "SAVE";
            $transaction->commit();
            // $transaction->rollback ();
            $this->redirect(Yii::app()->createUrl('Waste'));
        } else {
            // Render
            $this->render('//waste/create');
        }
    }

    public function actionDelete()
    {
        // Authen Login
        if (! UserLoginUtils::isLogin()) {
            $this->redirect(Yii::app()->createUrl('Site/login'));
        }
        if (! UserLoginUtils::authorizePage($_SERVER['REQUEST_URI'])) {
            $this->redirect(Yii::app()->createUrl('DashBoard/Permission'));
        }
        
        $transaction = Yii::app()->db->beginTransaction();
        //load Waste 
        $model = $this->loadModel();
        $model->delete();

        $transaction->commit();
        $this->redirect(Yii::app()->createUrl('Waste/'));
    }

    public function actionUpdate()
    {
        // Authen Login
        if (! UserLoginUtils::isLogin()) {
            $this->redirect(Yii::app()->createUrl('Site/login'));
        }
        if (! UserLoginUtils::authorizePage($_SERVER['REQUEST_URI'])) {
            $this->redirect(Yii::app()->createUrl('DashBoard/Permission'));
        }
        $model = $this->loadModel();
        if (isset($_POST['Waste'])) {
            $transaction = Yii::app()->db->beginTransaction();
            $model->attributes = $_POST['Waste'];
            $model->update_by = UserLoginUtils::getUsersLoginId();
            $model->update_date = date("Y-m-d H:i:s");
            $model->update();

            $transaction->commit();
            
            $this->redirect(Yii::app()->createUrl('Waste'));
        }
        $this->render('//waste/update', array(
            'data' => $model
        ));
    }

    public function loadModel()
    {
        if ($this->_model === null) {
            if (isset($_GET['id'])) {
                $id = addslashes($_GET['id']);
                $this->_model = Waste::model()->findbyPk($id);
            }
            if ($this->_model === null)
                throw new CHttpException(404, 'The requested page does not exist.');
        }
        return $this->_model;
    }
}