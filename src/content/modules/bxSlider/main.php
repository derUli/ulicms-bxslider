<?php

function bxSlider_get($id) {
    $id = intval($id);
    $result = null;
    $args = array(
        $id,
        1,
        1
    );
    $sql = "select * from {prefix}slider s inner join {prefix}slider_pictures p on p.slider_id = s.id where s.id = ? and p.enabled = ? and s.enabled = ? order by p.position, p.id";
    $query = Database::pQuery($sql, $args, true);
    if (Database::getNumRows($query) > 0) {
        $result = array();
        while ($row = Database::fetchObject($query)) {
            $result [] = $row;
        }
    }
    return $result;
}

function bxSlider_render() {
    return Template::executeModuleTemplate("bxSlider", "slider_list");
}
