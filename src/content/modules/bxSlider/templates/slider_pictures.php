<?php
if ($acl->hasPermission ( "bxSlider" )) {
	$id = intval ( $_REQUEST ["id"] );
	$controller = ControllerRegistry::get ( "SliderController" );
	$slider = $controller->getSliderWithoutPictures ( $id );
	if (! $slider) {
		Request::javascriptRedirect ( ModuleHelper::buildAdminURL ( "bxSlider" ) );
	} else {
		$sliderPictures = $controller->getSliderPictures ( $id );
		?>

<h1><?php translate("pictures_of_slider_x", array("%title%" => $slider->title));?></h1>
<table>
	<thead>
		<tr>
			<th><?php translate("position");?></th>
			<th><?php translate("image");?></th>
			<td></td>
		</tr>
	</thead>
	<?php if(count($sliderPictures) > 0 ){?>
	<tbody>
	<?php
			
			foreach ( $sliderPictures as $picture ) {
				if ($picture->enabled) {
					$color = 'green';
				} else {
					$color = "red";
				}
				?>
	<tr>
			<td style="color:<?php echo $color;?>"><?php echo $picture->position;?></td>
			<td style="max-width: 70%; text-align: center;"><img
				src="<?php Template::escape($picture->file);?>"
				alt="<?php Template::escape($slider->title);?>"
				title="<?php Template::escape($slider->title);?>"></td>

			<td><form
					action="<?php echo ModuleHelper::buildAdminURL("bxSlider", "sClass=SliderController&sMethod=deletePicture&id=".$picture->id . "&slider_id=".$slider->id);?>"
					method="post" onsubmit="return confirm('Wirklich Löschen?')"
					class="delete-form"><?php csrf_token_html();?><input type="image"
						class="mobile-big-image" src="gfx/delete.gif"
						alt="<?php
				
				translate ( "delete" );
				?>"
						title="<?php
				
				translate ( "delete" );
				?>">
				</form></td>

		</tr>
	<?php }?>
	</tbody>
	<?php }?>
</table>
<?php
	}
} else {
	noPerms ();
}
?>