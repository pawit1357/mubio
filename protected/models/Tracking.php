<?php
class Tracking extends CActiveRecord {
    public $user_id;
	public static function model($className = __CLASS__) {
		return parent::model ( $className );
	}
	public function tableName() {
		return 'tb_tracking';
	}
	public function relations() {
	    return array (
	        'usersLogin' => array (self::BELONGS_TO,'UsersLogin','user_id' ),
	        'trackingStatus' => array(self::BELONGS_TO, 'TrackingStatus', 'status_id'),
	        'usersLogin2' => array (self::BELONGS_TO,'UsersLogin','create_by' )
	    );
	}
	public function rules() {
		return array (
				array (
						'id,user_id,status_id,code,description,certificate_path,create_date,create_by,update_date,update_by',
						'safe' 
				) 
		);
	}
	public function attributeLabels() {
		return array ()

		;
	}
	public function getUrl($post = null) {
		if ($post === null)
			$post = $this->post;
		return $post->url . '#c' . $this->id;
	}
	protected function beforeSave() {
		return true;
	}
	public function search() {
		$criteria = new CDbCriteria ();
		if (isset ( $this->user_id )) {
		    $criteria->condition = " user_id=" . $this->user_id;
		}

		return new CActiveDataProvider ( get_class ( $this ), array (
				'criteria' => $criteria,
				'sort' => array (
						'defaultOrder' => 't.code asc' 
				),
				'pagination' => array (
						'pageSize' => ConfigUtil::getDefaultPageSize ()
						) // ConfigUtil::getDefaultPageSize()
 
		) );
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