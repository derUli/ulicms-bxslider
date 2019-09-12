<?php
$acl = new ACL();
if ($acl->hasPermission ( "bxSlider" )) {
	$slider_id = intval ( $_REQUEST ["slider_id"] );
	?>
<h1><?php translate("add_image");?></h1>
<div class="row">
	<div class="col-xs-6">
		<p>
			<a
				href="<?php
	
	Template::escape ( ModuleHelper::buildActionURL ( "bxslider_pictures", "id=$slider_id" ) );
	;
	?>">[<?php translate("back_to_list");?>]</a>

		</p>
	</div>
	<div class="col-xs-6 text-right"></div>

</div>
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
		onclick="openImageSelectWindow(this)" value="" style="cursor: pointer" /><br />
	<a href="#" onclick="$('#file').val('');return false;" required><?php translate("clear");?>
		</a> <br /> <br /> <strong><?php translate("title");?></strong> <br />
	<input type="text" name="title" value="" required> <br /> <br /> <strong><?php translate("position");?></strong><br />
	<input type="number" required="required" name="position" value="0"
		min="0" step="1"> <br /> <br /> <strong><?php translate("link");?></strong>
		
		<br/>
		  <input type="url" name="link">
		<br/>
		<br/><strong><?php translate("enabled");?></strong><br />
	<input type="checkbox" name="enabled" value="1" checked> <br /> <br />
	<input type="hidden" name="slider_id"
		value="<?php echo intval($_REQUEST["slider_id"]);?>"> <input
		type="submit" value="<?php translate("save");?>"> <input type="hidden"
		name="sClass" value="SliderController"> <input type="hidden"
		name="sMethod" value="addImage">
</form>
<?php
} else {
	noPerms ();
}
?>