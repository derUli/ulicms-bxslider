<?php

use function UliCMS\HTML\icon;

$acl = new ACL();
?>
<?php if ($acl->hasPermission("bxSlider")) { ?>
    <h1><?php translate("bxslider_new"); ?></h1>
    <div class="row">
        <div class="col-xs-6">
            <p>
                <a
                    href="<?php
                    Template::escape(ModuleHelper::buildActionURL("bxslider_pictures", "id=$slider_id"));
                    ;
                    ?>"
                    class="btn btn-primary">
                    <?php echo icon("fa fa-arrow-left"); ?><?php translate("back_to_list"); ?></a>
            </p>
        </div>
        <div class="col-xs-6 text-right"></div>
    </div>
    <form action="index.php" method="post">
        <?php csrf_token_html(); ?>
        <strong><?php translate("title"); ?></strong> <br /> <input type="text"
                                                                    name="title" value="" required> <br /> <br /> <strong><?php translate("enabled"); ?></strong><br />
        <input type="checkbox" name="enabled" value="1" checked> <br /> <br />
        <button
            type="submit"
            class="btn btn-primary"
            >
                <?php echo icon("fa fa-save"); ?>
            <?php translate("save"); ?></button>
        <input
            type="hidden" name="sClass" value="SliderController"> <input
            type="hidden" name="sMethod" value="create">
    </form>
    <?php
} else {
                        noPerms();
                    }
?>