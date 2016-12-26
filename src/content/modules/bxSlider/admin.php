<?php
define ( "MODULE_ADMIN_HEADLINE", "bxSlider" );
define ( "MODULE_ADMIN_REQUIRED_PERMISSION", "bxSlider" );
function bxSlider_admin() {
	?>
<p>
	<a href="index.php?action=bxslider_new">[<?php translate("bxslider_new");?>]</a>
</p>
<table class="tablesorter">
	<thead>
		<th><?php translate("id");?></th>
		<th><?php translate("title");?></th>
		<th><?php translate("amount_of_pictures");?></th>
	</thead>
	<tbody>
	<?php foreach(ControllerRegistry::get("SliderController")->getAllSliders() as $dataset){?>
	<tr>
			<td><?php Template::escape($dataset->id);?></td>
			<td><?php Template::escape($dataset->title);?></td>
			<td><?php echo ControllerRegistry::get("SliderController")->getPictureCount($dataset->id);?></td>
		</tr>
	<?php }?>
	</tbody>
</table>
<?php
}
?>
