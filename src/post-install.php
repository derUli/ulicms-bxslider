<?php
$migrator = new DBMigrator("module/bxSlider", ModuleHelper::buildModuleRessourcePath("bxSlider", "sql/up"));
$migrator->migrate();
