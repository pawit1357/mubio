<?php

class TrackingController extends CController
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
        $model = new Tracking();
        $this->render('//tracking/main', array(
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
        
        if (isset($_POST['Tracking'])) {
            
            $transaction = Yii::app()->db->beginTransaction();
            // Add Request
            $model = new Tracking();
            $model->attributes = $_POST['Tracking'];
            $model->create_by = UserLoginUtils::getUsersLoginId();
            $model->create_date = date("Y-m-d H:i:s");
            $model->update_by = UserLoginUtils::getUsersLoginId();
            $model->update_date = date("Y-m-d H:i:s");
            
            if (isset($file_path)) {
                $file_ary = CommonUtil::reArrayFiles($file_path);
                
                $index = 0;
                foreach ($file_ary as $file) {
                    if ($file['size'] > 0) {
                        $model->certificate_path = '/uploads/' . CommonUtil::upload($file);
                    }
                    $index ++;
                }
            }
            $model->save();
            // :::Add history:::
            $detail = new TrackingDetail();
            $detail->tracking_id = $model->id;
            $detail->tracking_status_id = $model->status_id;
            $detail->create_date = $detail->create_date = date("Y-m-d H:i:s");
            $detail->create_by = UserLoginUtils::getUsersLoginId();
            $detail->save();
            // :::End:::
            
            // echo "SAVE";
            $transaction->commit();
            // $transaction->rollback ();
            $this->redirect(Yii::app()->createUrl('Tracking'));
        } else {
            // Render
            $this->render('//tracking/create');
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
        $model = $this->loadModel();
        $model->delete();
        
        $this->redirect(Yii::app()->createUrl('Tracking/'));
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
        if (isset($_POST['Tracking'])) {
            $transaction = Yii::app()->db->beginTransaction();
            $model->attributes = $_POST['Tracking'];
            $model->update_by = UserLoginUtils::getUsersLoginId();
            $model->update_date = date("Y-m-d H:i:s");
            $file_path = $_FILES['file_path'];
            if (isset($file_path)) {
                $file_ary = CommonUtil::reArrayFiles($file_path);
                
                $index = 0;
                foreach ($file_ary as $file) {
                    if ($file['size'] > 0) {
                        $model->certificate_path = '/uploads/' . CommonUtil::upload($file);
                    }
                    $index ++;
                }
            }
            $model->update();
            // :::Add history:::
            $detail = new TrackingDetail();
            $detail->tracking_id = $model->id;
            $detail->tracking_status_id = $model->status_id;
            $detail->create_date = $detail->create_date = date("Y-m-d H:i:s");
            $detail->create_by = UserLoginUtils::getUsersLoginId();
            $detail->save();
            // :::End:::
            
            $transaction->commit();
            
            $this->redirect(Yii::app()->createUrl('Tracking'));
        }
        $this->render('//tracking/update', array(
            'data' => $model
        ));
    }

    public function loadModel()
    {
        if ($this->_model === null) {
            if (isset($_GET['id'])) {
                $id = addslashes($_GET['id']);
                $this->_model = Tracking::model()->findbyPk($id);
            }
            if ($this->_model === null)
                throw new CHttpException(404, 'The requested page does not exist.');
        }
        return $this->_model;
    }
}