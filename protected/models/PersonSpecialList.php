<?php

class PersonSpecialList extends CActiveRecord
{
    
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public function tableName()
    {
        return 'tb_person_specialist';
    }

    public function relations()
    {
        return array (
            'title' => array(self::BELONGS_TO, 'MTitle', 'title_id'),
            'position' => array(self::BELONGS_TO, 'MPosition', 'position_id'),
            'createBy' => array (self::BELONGS_TO,'UsersLogin','create_by' ),
            'updateBy' => array (self::BELONGS_TO,'UsersLogin','update_by' ),
        );
    }

    public function rules()
    {
        return array(
            array(
                'id,name,title_id,position_id,firstname,surname,desc,create_date,create_by,update_date,update_by',
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