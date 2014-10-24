<?php
namespace Bar;

require_once( __DIR__.'/Core/AutoLoader/AutoLoader.php' );

use MOC\V\Component\Database\Component\Option\DriverOption;
use MOC\V\Component\Database\Database;
use MOC\V\Component\Template\Template;
use MOC\V\Core\AutoLoader\AutoLoader;
use MOC\V\Core\FileSystem\FileSystem;
use MOC\V\Core\HttpKernel\Vendor\Universal\Request;

var_dump( AutoLoader::getUniversalNamespaceAutoLoader( '\MOC\V', __DIR__ ) );
var_dump( FileSystem::getFileLoader( __FILE__ ) );
var_dump( Template::getTemplate( 'index.twig' )->setVariable( 'Foo', 'Bar' )->getContent() );
var_dump( Template::getTemplate( 'index.twig' )->setVariable( 'Foo', array( 'Bar', 'Nuff' ) )->getContent() );
var_dump( Database::getDatabase( 'root', 'kuw', 'ziel2', DriverOption::DRIVER_PDO_MYSQL, '192.168.100.204' ) );

new Request();


/*
$R = new \MOC\V\Component\Router\Router(
    new \MOC\V\Component\Router\Component\Vendor(
        new \MOC\V\Component\Router\Component\Bridge\SymfonyRouter()
    )
);

var_dump( $R->getBridgeInterface()->addRoute( new \MOC\V\Component\Router\Component\Option\RouteOption( '/',
            '\Foo\Bar::Nuff' ) ) );
var_dump( $R->getBridgeInterface()->getRoute() );

namespace Foo;

use MOC\V\Component\Router\Component\Option\ReturnOption;

class Bar
{

    public function Nuff()
    {

    }
}

    /**/
