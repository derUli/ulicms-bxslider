<?php
if ($acl->hasPermission ( "bxSlider" )) {
	$id = intval ( $_REQUEST ["id"] );
	$controller = ControllerRegistry::get ( "SliderController" );
	if ($controller) {
		$picture = $controller->getPictureByID ( $id );
		if ($picture) {
			?>
<h1><?php translate("edit_image");?></h1>
<form action="index.php" method="post">
<?php csrf_token_html();?>
<strong><?php translate("file");?></strong> <br />
	<script type="text/javascript">
function openImageSelectWindow(field) {
    window.KCFinder = {
        callBack: function(url) {
            field.value = url;
            window.KCFinder = null;
        }
    };
    window.open('kcfinder/browse.php?type=images&dir=images&lang=<?php echo htmlspecialchars(getSystemLanguage());?>', 'file',
        'status=0, toolbar=0, location=0, menubar=0, directories=0, ' +
        'resizable=1, scrollbars=0, width=800, height=600'
    );
}
</script>
	<input type="text" id="file" name="file" readonly="readonly"
		onclick="openImageSelectWindow(this)"
		value="<?php Template::escape($picture->file);?>"
		style="cursor: pointer" /><br /> <a href="#"
		onclick="$('#file').val('');return false;" required><?php translate("clear");?>
		</a> <br /> <br /> <strong><?php translate("position");?></strong><br />
	<input type="number" required="required" name="position"
		value="<?php Template::escape($picture->position);?>" min="0" step="1">
	<br /> <br /> <strong><?php translate("enabled");?></strong><br /> <input
		type="checkbox" name="enabled" value="1"
		<?php if($picture->enabled == 1) echo "checked"?>> <br /> <br /> <input
		type="hidden" name="slider_id"
		value="<?php echo $picture->slider_id;?>"> <input type="hidden"
		name="id" value="<?php echo $picture->id;?>"> <input type="submit"
		value="<?php translate("save");?>"> <input type="hidden" name="sClass"
		value="SliderController"> <input type="hidden" name="sMethod"
		value="editImage">
</form>
<?php
		}
	}
} else {
	noPerms ();
}
?>