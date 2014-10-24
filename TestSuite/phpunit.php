<?php
namespace MOC\V\TestSuite;

use MOC\V\Core\AutoLoader\AutoLoader;
use MOC\V\Core\AutoLoader\Component\Bridge\UniversalNamespace;
use MOC\V\Core\AutoLoader\Component\Option\DirectoryOption;
use MOC\V\Core\AutoLoader\Component\Option\NamespaceOption;
use MOC\V\Core\AutoLoader\Component\Vendor;

require_once( __DIR__.'/../Core/AutoLoader/AutoLoader.php' );
$Loader = new AutoLoader(
    new Vendor(
        new UniversalNamespace()
    )
);
$Loader->getBridgeInterface()->addNamespaceDirectoryMapping(
    new NamespaceOption( '\MOC\V' ), new DirectoryOption( __DIR__.'/../' )
);
$Loader->getBridgeInterface()->registerLoader();

set_include_path( get_include_path().PATH_SEPARATOR.__DIR__.'/../' );
