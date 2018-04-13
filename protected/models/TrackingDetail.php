<?php
class TrackingDetail extends CActiveRecord {
    public $user_id;
	public static function model($className = __CLASS__) {
		return parent::model ( $className );
	}
	public function tableName() {
		return 'tb_tracking_detail';
	}
	public function relations() {
	    return array (
	        'tracking' => array(self::BELONGS_TO, 'Tracking', 'tracking_id'),
	        'trackingStatus' => array(self::BELONGS_TO, 'TrackingStatus', 'tracking_status_id'),
	        'usersLogin' => array (self::BELONGS_TO,'UsersLogin','create_by' )
	    );
	}
	public function rules() {
		return array (
				array (
						'id,tracking_id,tracking_status_id,create_date,create_by',
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
		$criteria->with = array (
		    'tracking'
		);
		
		if (isset ( $this->user_id )) {		    
		    $criteria->condition = " tracking.user_id = " . $this->user_id;
		}
		
		return new CActiveDataProvider ( get_class ( $this ), array (
				'criteria' => $criteria,
				'sort' => array (
						'defaultOrder' => 't.id,tracking_id desc' 
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