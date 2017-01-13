<?php
class SliderController extends Controller {
	public function getAllSliders() {
		$sliders = array ();
		$query = Database::query ( "select * from {prefix}slider order by id", true );
		while ( $row = Database::fetchObject ( $query ) ) {
			$sliders [] = $row;
		}
		return $sliders;
	}
	public function getSliderPictures($id) {
		$sliderPictures = array ();
		$args = array (
				intval ( $id ) 
		);
		$query = Database::pQuery ( "select * from {prefix}slider_pictures where slider_id = ? order by id", $args, true );
		while ( $row = Database::fetchObject ( $query ) ) {
			$sliderPictures [] = $row;
		}
		return $sliderPictures;
	}
	public function getPictureCount($id) {
		$args = array (
				$id 
		);
		$query = Database::pQuery ( "select count(id) as amount from {prefix}slider_pictures where slider_id = ?", $args, true );
		$result = Database::fetchObject ( $query );
		return $result->amount;
	}
	public function create() {
		$acl = new ACL ();
		if (! $acl->hasPermission ( "bxSlider" )) {
			return;
		}
		$title = strval ( $_POST ["title"] );
		$enabled = intval ( isset ( $_POST ["enabled"] ) );
		$args = array (
				$title,
				$enabled 
		);
		$sql = "INSERT INTO {prefix}slider (title, enabled) values (?, ?)";
		Database::pQuery ( $sql, $args, true );
		Request::redirect ( ModuleHelper::buildAdminURL ( "bxSlider" ) );
	}
	public function addImage() {
		$acl = new ACL ();
		if (! $acl->hasPermission ( "bxSlider" )) {
			return;
		}
		$file = strval ( $_POST ["file"] );
		$enabled = intval ( isset ( $_POST ["enabled"] ) );
		$position = intval ( $_POST ["position"] );
		$slider_id = intval ( $_POST ["slider_id"] );
		$args = array (
				$file,
				$enabled,
				$position,
				$slider_id 
		);
		$sql = "INSERT INTO {prefix}slider_pictures (file, enabled, position, slider_id) values (?, ?, ?, ?)";
		Database::pQuery ( $sql, $args, true );
		Request::redirect ( ModuleHelper::buildActionURL ( "bxslider_pictures", "id=$slider_id" ) );
	}
	public function update() {
		$acl = new ACL ();
		if (! $acl->hasPermission ( "bxSlider" )) {
			return;
		}
		$title = strval ( $_POST ["title"] );
		$enabled = intval ( isset ( $_POST ["enabled"] ) );
		$id = intval ( $_POST ["id"] );
		$args = array (
				$title,
				$enabled,
				$id 
		);
		$sql = "UPDATE {prefix}slider set title = ?, enabled = ? where id = ?";
		Database::pQuery ( $sql, $args, true );
		Request::redirect ( ModuleHelper::buildAdminURL ( "bxSlider" ) );
	}
	public function delete() {
		$acl = new ACL ();
		if (! $acl->hasPermission ( "bxSlider" )) {
			return;
		}
		$id = intval ( $_REQUEST ["id"] );
		$sql = "DELETE FROM {prefix}slider where id = ?";
		$args = array (
				$id 
		);
		Database::pQuery ( $sql, $args, true );
		Request::redirect ( ModuleHelper::buildAdminURL ( "bxSlider" ) );
	}
	public function deletePicture() {
		$acl = new ACL ();
		if (! $acl->hasPermission ( "bxSlider" )) {
			return;
		}
		$id = intval ( $_REQUEST ["id"] );
		$slider_id = intval ( $_REQUEST ["slider_id"] );
		$sql = "DELETE FROM {prefix}slider_pictures where id = ?";
		$args = array (
				$id 
		);
		Database::pQuery ( $sql, $args, true );
		Request::redirect ( ModuleHelper::buildActionURL ( "bxslider_pictures", "id=" . $slider_id ) );
	}
	public function getSliderWithoutPictures($id) {
		$data = null;
		$sql = "select id, title, enabled from {prefix}slider where id = ?";
		$args = array (
				intval ( $id ) 
		);
		$query = Database::pQuery ( $sql, $args, true );
		if (Database::getNumRows ( $query ) > 0) {
			$data = Database::fetchobject ( $query );
		}
		return $data;
	}
}