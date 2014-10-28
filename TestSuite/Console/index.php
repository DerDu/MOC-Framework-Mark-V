<?php
namespace Bar;

require_once( __DIR__.'/../../Core/AutoLoader/AutoLoader.php' );

use MOC\V\Component\Template\Template;
use MOC\V\Core\AutoLoader\AutoLoader;
use MOC\V\Core\HttpKernel\HttpKernel;

AutoLoader::getNamespaceAutoLoader( '\MOC\V', __DIR__.'/../../' );

var_dump(
    HttpKernel::getRequest()->getPathBase(),
    HttpKernel::getRequest()->getPathInfo(),
    HttpKernel::getRequest()->getUrlBase(),
    HttpKernel::getRequest()->getPort()
);

var_dump( Template::getTemplate( 'index.twig' )->setVariable( 'Foo', 'Bar' )->getContent() );
var_dump( Template::getTemplate( 'index.tpl' )->setVariable( 'Foo', 'Bar' )->getContent() );
var_dump( Template::getTemplate( 'index.twig' )->setVariable( 'Foo', array( 'Bar', 'Nuff' ) )->getContent() );
var_dump( Template::getTemplate( 'index.tpl' )->setVariable( 'Foo', array( 'Bar', 'Nuff' ) )->getContent() );

//new Request();


/*
$R = new \MOC\V\Component\Router\Router(
    new \MOC\V\Component\Router\Component\Vendor(
        new \MOC\V\Component\Router\Component\Bridge\SymfonyRouter()
    )
);

var_dump( $R->getBridgeInterface()->addRoute( new \MOC\V\Component\Router\Component\Option\Repository\RouteOption( '/',
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
