<?php

class Waste extends CActiveRecord
{

    // public static $label0 = "ข้อมูลทั่วไป";
    // public static $label1 = "ชื่อหน่วยงาน";
    // public static $label2 = "หมายเลขจดแจ้ง";
    // public static $label3 = "ที่อยู่";
    // public static $label4 = "โทรศัพท์";
    // public static $label5 = "โทรสาร";
    // public static $label6 = "e-mail address";
    
    // Require:
    public static $req1 = "This field is require.";

    // public static const label7 = "หมายเลขจดแจ้ง ";
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public function tableName()
    {
        return 'tb_waste';
    }

    public function relations()
    {
        return array(
            'createBy' => array(
                self::BELONGS_TO,
                'UsersLogin',
                'create_by'
            ),
            'updateBy' => array(
                self::BELONGS_TO,
                'UsersLogin',
                'update_by'
            )
        );
    }

    public function rules()
    {
        return array(
            array(
                'id,
waste_code,
waste_type,
container_type,
waste_volume,
waste_room,
create_date,
create_by,
udpate_date,
update_by,',
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
        $criteria = new CDbCriteria();
        
        $row = self::model()->find($criteria);
        if (isset($row)) {
            $max = $row->id;
            return $max + 1;
        } else {
            return 1;
        }
    }
}