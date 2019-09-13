<?php
$data = CustomData::get();
$slider = null;
if (Vars::get("slider_id")) {
    $slider = bxSlider_get(Vars::get("slider_id"));
    Vars::delete("slider_id");
} else if (isset($data ["slider_id"])) {
    $slider = bxSlider_get($data ["slider_id"]);
}
?>
<ul class="bxslider">
    <?php
    foreach ($slider as $picture) {
        if ($slider and is_array($slider)) {
            if (!empty($picture->title)) {
                $title = $picture->title;
            } else {
                $title = $picture->file;
            }
            ?>
            <li><?php if (StringHelper::isNotNullOrEmpty($picture->link)) { ?><a
                        href="<?php Template::escape($picture->link); ?>"><img
                            src="<?php Template::escape($picture->file); ?>"
                            alt="<?php Template::escape($title); ?>" /></a>
                        <?php
                    } else {
                        ?><img src="<?php Template::escape($picture->file); ?>"
                         alt="<?php Template::escape($title); ?>" />
                     <?php } ?>
            </li>
        <?php } ?>
    <?php } ?>

</ul>
