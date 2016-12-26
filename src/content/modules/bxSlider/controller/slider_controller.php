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
	public function getPictureCount($id) {
		$args = array (
				$id 
		);
		$query = Database::pQuery ( "select count(id) as amount from {prefix}slider_pictures where slider_id = ?", $args, true );
		$result = Database::fetchObject ( $query );
		return $result->amount;
	}
	public function create(){
		$title = strval($_POST["title"]);
		$enabled = intval(isset($_POST["enabled"]));
		$args = array($title, $enabled);
		$sql = "INSERT INTO {prefix}slider (title, enabled) values (?, ?)";
		Database::pQuery($sql, $args, true);
		Request::redirect(ModuleHelper::buildAdminURL("bxSlider"));
	}
}