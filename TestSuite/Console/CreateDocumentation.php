<?php
require_once( __DIR__.'/../../Core/AutoLoader/AutoLoader.php' );
use MOC\V\Component\Documentation\Documentation;
use MOC\V\Core\AutoLoader\AutoLoader;

AutoLoader::getNamespaceAutoLoader( '\MOC\V', __DIR__.'/../../' );
Documentation::getDocumentation()->createDocumentation();
