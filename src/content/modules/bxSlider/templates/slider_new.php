<?php if($acl->hasPermission("bxSlider")){?>

<h1><?php translate("bxslider_new");?></h1>
<form action="index.php" method="post">
<?php csrf_token_html();?>
<strong><?php translate("title");?></strong> <br /> <input type="text"
		name="title" value="" required> <br /> <br /> <strong><?php translate("enabled");?></strong><br />
	<input type="checkbox" name="enabled" value="1" checked> <br /> <br /> <input
		type="submit" value="<?php translate("save");?>"> <input type="hidden"
		name="sClass" value="SliderController"> <input type="hidden"
		name="sMethod" value="create">
</form>
<?php
} else {
	noPerms ();
}
?>