<?php
define ( "MODULE_ADMIN_HEADLINE", "bxSlider" );
define ( "MODULE_ADMIN_REQUIRED_PERMISSION", "bxSlider" );
function bxSlider_admin() {
	?>
<div class="row">
	<div class="col-xs-6"></div>
	<div class="col-xs-6 text-right">
		<p>
			<a href="index.php?action=bxslider_new">[<?php translate("bxslider_new");?>]</a>
		</p>
	</div>
</div>

<table class="tablesorter">
	<thead>
		<th><?php translate("id");?></th>
		<th><?php translate("title");?></th>
		<th><?php translate("amount_of_pictures");?></th>
		<th><?php translate("code_to_embed");?></th>

		<td></td>
		<td></td>
	</thead>
	<tbody>
	<?php foreach(ControllerRegistry::get("SliderController")->getAllSliders() as $dataset){?>
	<tr>
			<td><?php Template::escape($dataset->id);?></td>
			<td><a
				href="<?php echo ModuleHelper::buildActionURL("bxslider_pictures", "id=".$dataset->id);?>">
				<?php Template::escape($dataset->title);?></a></td>
			<td><?php echo ControllerRegistry::get("SliderController")->getPictureCount($dataset->id);?></td>
			<td><input type="text"
				value="[bxSlider]<?php echo $dataset->id;?>[/bxSlider]" readonly
				onclick="this.select();"></td>
			<td><a
				href="<?php
		
		echo ModuleHelper::

		buildActionURL ( "bxslider_edit", "id=" . $dataset->id );
		?>"><img src="gfx/edit.png" class="mobile-big-image"
					alt="<?php translate("edit");?>" title="<?php translate("edit");?>"></a></td>

			<td style="text-align: center;"><form
					action="<?php echo ModuleHelper::buildAdminURL("bxSlider", "sClass=SliderController&sMethod=delete&id=".$dataset->id);?>"
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
</table>
<?php
}
?>
