<?php

class Pathogen extends CActiveRecord
{
    public static $label0 = "ข้อมูลทั่วไป";
    public static $label1 = "ชื่อหน่วยงาน";
    public static $label2 = "หมายเลขจดแจ้ง";
    public static $label3 = "ที่อยู่";
    public static $label4 = "โทรศัพท์";
    public static $label5 = "โทรสาร";
    public static $label6 = "e-mail address";

    //Require:
    public static $req1 = " This field has error. ";
    
    // public static const label7 = "หมายเลขจดแจ้ง ";
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public function tableName()
    {
        return 'tb_pathogen';
    }

    public function relations()
    {
        return array();
    }

    public function rules()
    {
        return array(
            array(
                'id,
                department_id,
                department_other,
                pathogen_no,
                address,
                phone_number,
                fax_number,
                email,
                pathogen_name,
                pathogen_code,
                pathogen_volume,
                supervisor,
                manufacture_plant,
                manufacture_fuse,
                manufacture_prepare,
                manufacture_transform,
                manufacture_packing,
                manufacture_total_packing,
                distribute_sell,
                distribute_pay, 
                distribute_give,
                distribute_exchange,
                distribute_donate,
                distribute_lost,
                distribute_discard,
                distribute_destroy,
                import,
                export,
                import_to_other,
                inform_name,
                inform_date',
                'safe'
            )
        );
    }

    public function attributeLabels()
    {
        return array();
    }

    public function getUrl($post = null)
    {
        if ($post === null)
            $post = $this->post;
        return $post->url . '#c' . $this->id;
    }

    protected function beforeSave()
    {
        return true;
    }

    public function search()
    {
        $criteria = new CDbCriteria();
        return new CActiveDataProvider(get_class($this), array(
            'criteria' => $criteria,
            'sort' => array(
                'defaultOrder' => 't.id asc'
            ),
            'pagination' => array(
                'pageSize' => ConfigUtil::getDefaultPageSize()
            ) // ConfigUtil::getDefaultPageSize()
        
        ));
    }

    public static function getMax()
    {
        // $criteria = new CDbCriteria();
        // $criteria->condition = " id <> 999";
        // $criteria->order = 'id DESC';
        // $row = self::model()->find($criteria);
        // if (isset($row)) {
        // $max = $row->id;
        // if ($max == 999) {
        // $max = 1000;
        // }
        // return $max + 1;
        // } else {
        // return 1;
        // }
        return 0;
    }
}