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
<div class="row">
	<div class="col-xs-6">
		<p>
			<a
				href="<?php Template::escape(ModuleHelper::buildAdminURL("bxSlider"));?>">[<?php translate("back_to_list");?>]</a></a>

		</p>
	</div>
	<div class="col-xs-6 text-right">
		<p>
			<a
				href="<?php Template::escape(ModuleHelper::buildActionURL ( "bxslider_picture_new", "slider_id=$id" ));?>">[<?php translate("add_image");?>]</a>
		</p>
	</div>

</div>
<table>
	<thead>
		<tr>
			<th><?php translate("position");?></th>
			<th><?php translate("image");?></th>
			<td></td>
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
				title="<?php Template::escape($slider->title);?>"
				class="responsive-image"></td>
			<td style="text-align: center;"><a
				href="<?php echo ModuleHelper::buildActionURL("bxslider_picture_edit", "id=".$picture->id);?>"><img
					src="gfx/edit.png" class="mobile-big-image"
					alt="<?php translate("edit");?>" title="<?php translate("edit");?>"></a></td>
			<td style="text-align: center;"><form
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