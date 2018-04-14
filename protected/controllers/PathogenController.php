<?php

class PathogenController extends CController
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
        $model = new Pathogen();
        $this->render('//Pathogen/main', array(
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
        
        if (isset($_POST['Pathogen'])) {
            
            $transaction = Yii::app()->db->beginTransaction();
            // Add Request

            
            
            $pathogen_names = $_POST['pathogen_name'];
            $pathogen_codes = $_POST['pathogen_code'];
            $pathogen_volumes = $_POST['pathogen_volume'];
            $supervisors = $_POST['supervisor'];
            $manufacture_plants = $_POST['manufacture_plant'];
            $manufacture_fuses = $_POST['manufacture_fuse'];
            $manufacture_prepares = $_POST['manufacture_prepare'];
            $manufacture_transforms = $_POST['manufacture_transform'];
            $manufacture_packings = $_POST['manufacture_packing'];
            $manufacture_total_packings = $_POST['manufacture_total_packing'];
            $distribute_sells = $_POST['distribute_sell'];
            $distribute_pays = $_POST['distribute_pay'];
            $distribute_gives = $_POST['distribute_give'];
            $distribute_exchanges = $_POST['distribute_exchange'];
            $distribute_donates = $_POST['distribute_donate'];
            $distribute_losts = $_POST['distribute_lost'];
            $distribute_discards = $_POST['distribute_discard'];
            $distribute_destroys = $_POST['distribute_destroy'];
            $imports = $_POST['import'];
            $exports = $_POST['export'];
            $import_to_others = $_POST['import_to_other'];
            
            $index = 0;
            foreach ($pathogen_names as $item) {
                $model = new Pathogen();
                $model->attributes = $_POST['Pathogen'];
                $model->inform_date = CommonUtil::getDate($model->inform_date);
                $model->pathogen_name = $pathogen_names[$index];
                $model->pathogen_code = $pathogen_codes[$index];
                $model->pathogen_volume = $pathogen_volumes[$index];
                $model->supervisor = $supervisors[$index];
                $model->manufacture_plant = $manufacture_plants[$index];
                $model->manufacture_fuse = $manufacture_fuses[$index];
                $model->manufacture_prepare = $manufacture_prepares[$index];
                $model->manufacture_transform = $manufacture_transforms[$index];
                $model->manufacture_packing = $manufacture_packings[$index];
                $model->manufacture_total_packing = $manufacture_total_packings[$index];
                $model->distribute_sell = $distribute_sells[$index];
                $model->distribute_pay = $distribute_pays[$index];
                $model->distribute_give = $distribute_gives[$index];
                $model->distribute_exchange = $distribute_exchanges[$index];
                $model->distribute_donate = $distribute_donates[$index];
                $model->distribute_lost = $distribute_losts[$index];
                $model->distribute_discard = $distribute_discards[$index];
                $model->distribute_destroy = $distribute_destroys[$index];
                $model->import = $imports[$index];
                $model->export = $exports[$index];
                $model->import_to_other = $import_to_others[$index];
                $model->create_by = UserLoginUtils::getUsersLoginId();
                $model->create_date = date("Y-m-d H:i:s");
                $model->update_by = UserLoginUtils::getUsersLoginId();
                $model->update_date = date("Y-m-d H:i:s");
                $index ++;
                $model->save ();
 
            }
            
            
            // echo "SAVE";
            $transaction->commit ();
            
            // $transaction->rollback ();
            $this->redirect ( Yii::app ()->createUrl ( 'Pathogen' ) );
        } else {
            // Render
            $this->render('//Pathogen/create');
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
        
        $this->redirect(Yii::app()->createUrl('Pathogen/'));
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
        if (isset($_POST['Pathogen'])) {
            $transaction = Yii::app()->db->beginTransaction();
            $model->attributes = $_POST['Pathogen'];
            $model->update_by = UserLoginUtils::getUsersLoginId();
            $model->update_date = date("Y-m-d H:i:s");
            $model->inform_date = CommonUtil::getDate($model->inform_date);
            $model->update();
            $transaction->commit();
            
            $this->redirect(Yii::app()->createUrl('Pathogen'));
        }
        $this->render('//Pathogen/update', array(
            'data' => $model
        ));
    }

    public function loadModel()
    {
        if ($this->_model === null) {
            if (isset($_GET['id'])) {
                $id = addslashes($_GET['id']);
                $this->_model = Pathogen::model()->findbyPk($id);
            }
            if ($this->_model === null)
                throw new CHttpException(404, 'The requested page does not exist.');
        }
        return $this->_model;
    }
}