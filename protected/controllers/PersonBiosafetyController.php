<?php

class PersonBiosafetyController extends CController
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
        $model = new PersonBiosafety();
        $this->render('//personbiosafety/main', array(
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
        
        if (isset($_POST['PersonBiosafety'])) {
            
            $transaction = Yii::app()->db->beginTransaction();
            // Add Request
            $model = new PersonBiosafety();
            $model->attributes = $_POST['PersonBiosafety'];
            
            $model->create_by = UserLoginUtils::getUsersLoginId();
            $model->create_date = date("Y-m-d H:i:s");
            $model->update_by = UserLoginUtils::getUsersLoginId();
            $model->update_date = date("Y-m-d H:i:s");
            $model->save();
            
            // echo "SAVE";
            $transaction->commit();
            // $transaction->rollback ();
            $this->redirect(Yii::app()->createUrl('PersonBiosafety'));
        } else {
            // Render
            $this->render('//personbiosafety/create');
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
        //load PersonSpecialList 
        $model = $this->loadModel();
        $model->delete();

        $transaction->commit();
        $this->redirect(Yii::app()->createUrl('PersonBiosafety/'));
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
        if (isset($_POST['PersonBiosafety'])) {
            $transaction = Yii::app()->db->beginTransaction();
            $model->attributes = $_POST['PersonBiosafety'];
            $model->update_by = UserLoginUtils::getUsersLoginId();
            $model->update_date = date("Y-m-d H:i:s");
            $model->update();

            $transaction->commit();
            
            $this->redirect(Yii::app()->createUrl('PersonBiosafety'));
        }
        $this->render('//personbiosafety/update', array(
            'data' => $model
        ));
    }

    public function loadModel()
    {
        if ($this->_model === null) {
            if (isset($_GET['id'])) {
                $id = addslashes($_GET['id']);
                $this->_model = PersonBiosafety::model()->findbyPk($id);
            }
            if ($this->_model === null)
                throw new CHttpException(404, 'The requested page does not exist.');
        }
        return $this->_model;
    }
}