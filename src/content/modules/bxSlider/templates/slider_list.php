<?php
$data = CustomData::get ();
$slider = null;
if (isset ( $data ["slider_id"] )) {
	$slider = bxSlider_get ( $data ["slider_id"] );
}
if ($slider and is_array ( $slider )) {
	?>
<ul class="bxslider">
<?php foreach($slider as $picture){?>
  <li><img src="<?php Template::escape($slider->file);?>" /></li>
<?php }?>

</ul>
<?php }?>
