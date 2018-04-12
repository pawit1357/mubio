<?php

class PersonSpecialist extends CActiveRecord
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
        return array(
            'person' => array(
                self::BELONGS_TO,
                'Person',
                'person_id'
            ),
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
                'id,person_id,description,create_date,create_by,update_date,update_by',
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
        $criteria->with = array(
            'Person'
        );
        
        // if (isset ( $this->user_id )) {
        // $criteria->condition = " tracking.user_id = " . $this->user_id;
        // }
        
        return new CActiveDataProvider(get_class($this), array(
            'criteria' => $criteria,
            'sort' => array(
                'defaultOrder' => 't.name asc'
            ),
            'pagination' => array(
                'pageSize' => ConfigUtil::getDefaultPageSize()
            ) // ConfigUtil::getDefaultPageSize()
        
        ));
    }

    public static function getMax()
    {
        $criteria = new CDbCriteria();
        $criteria->condition = " id <> 999";
        $criteria->order = 'id DESC';
        $row = self::model()->find($criteria);
        if (isset($row)) {
            $max = $row->id;
            if ($max == 999) {
                $max = 1000;
            }
            return $max + 1;
        } else {
            return 1;
        }
    }
}