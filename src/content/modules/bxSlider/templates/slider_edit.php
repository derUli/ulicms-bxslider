<?php if($acl->hasPermission("bxSlider")){
$id = intval($_REQUEST["id"]);
$controller = ControllerRegistry::get("SliderController");
$slider = $controller->getSliderWithoutPictures($id);
if(!$slider){
	Request::javascriptRedirect(ModuleHelper::buildAdminURL("bxSlider"));
}
	?>

<h1><?php translate("bxslider_new");?></h1>
<form action="index.php" method="post">
<?php csrf_token_html();?>
<strong><?php translate("title");?></strong> <br /> <input type="text"
		name="title" value="<?php Template::escape($slider->title);?>" required> <br /> <br /> <strong><?php translate("enabled");?></strong><br />
	<input type="checkbox" name="enabled" value="1" <?php if($slider->enabled) echo "checked";?>> <br /> <br /> <input
		type="submit" value="<?php translate("save");?>"> <input type="hidden"
		name="sClass" value="SliderController"> <input type="hidden"
		name="sMethod" value="update">
		<input type="hidden" name="id" value="<?php echo $id;?>">
</form>
<?php
} else {
	noPerms ();
}
?>