<?php

function bxSlider_content_filter($text) {
    preg_match_all("/\[bxSlider]([0-9]+)\[\/bxSlider]/", $text, $match);

    if (count($match) > 0) {
        for ($i = 0; $i < count($match [0]); $i ++) {
            $placeholder = $match [0] [$i];
            $id = unhtmlspecialchars($match [1] [$i]);
            Vars::set("slider_id", $id);
            $html = Template::executeModuleTemplate("bxSlider", "slider_list");
            $text = str_replace($placeholder, $html, $text);
        }
    }
    return $text;
}
