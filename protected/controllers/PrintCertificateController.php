<?php

class PrintCertificateController extends CController
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
        switch (UserLoginUtils::getUserRole()) {
            case UserLoginUtils::ADMIN:
                break;
            default:
                $model->user_id = UserLoginUtils::getUsersLoginId();
                break;
        }
        $this->render('//printcertificate/main', array(
            'data' => $model
        ));
    }
}