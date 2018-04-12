<?php
class TrackingStatus extends CActiveRecord {
	public static function model($className = __CLASS__) {
		return parent::model ( $className );
	}
	public function tableName() {
		return 'tb_tracking_status';
	}
	public function relations() {
		return array ();
	}
	public function rules() {
		return array (
				array (
						'ID,name',
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
		return new CActiveDataProvider ( get_class ( $this ), array (
				'criteria' => $criteria,
				'sort' => array (
						'defaultOrder' => 't.name asc' 
				),
				'pagination' => array (
						'pageSize' => ConfigUtil::getDefaultPageSize ()
						) // ConfigUtil::getDefaultPageSize()
 
		) );
	}
	public static function getMax()
	{
	    $criteria = new CDbCriteria();
	    $criteria->order = 'id DESC';
	    $row = self::model()->find($criteria);
	    if (isset($row)) {
	        $max = $row->id;
	        return $max + 1;
	    } else {
	        return 1;
	    }
	}
}