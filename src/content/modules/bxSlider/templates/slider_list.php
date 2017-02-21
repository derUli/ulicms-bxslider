<?php
$data = CustomData::get ();
$slider = null;
if (isset ( $data ["slider_id"] )) {
	$slider = bxSlider_get ( $data ["slider_id"] );
}
?>
<ul class="bxslider">
<?php
foreach ( $slider as $picture ) {
	if ($slider and is_array ( $slider )) {
		if (! empty ( $picture->title )) {
			$title = $picture->title;
		} else {
			$title = $picture->file;
		}
		?>
  <li><img src="<?php Template::escape($picture->file);?>"
		alt="<?php Template::escape($title);?>" /></li>
<?php }?>
<?php }?>

</ul>
