<?php
namespace Bar;

require_once( __DIR__.'/../../Core/AutoLoader/AutoLoader.php' );

use MOC\V\Component\Router\Component\Bridge\Repository\UniversalRouter;
use MOC\V\Component\Router\Component\Parameter\Repository\RouteParameter;
use MOC\V\Core\AutoLoader\AutoLoader;
use MOC\V\Core\HttpKernel\HttpKernel;

AutoLoader::getNamespaceAutoLoader( '\MOC\V', __DIR__.'/../../' );

var_dump(
    HttpKernel::getRequest()->getPathBase(),
    HttpKernel::getRequest()->getPathInfo(),
    HttpKernel::getRequest()->getUrlBase(),
    HttpKernel::getRequest()->getPort()
);

$_POST['Username'] = 'root';
$_POST['Password'] = 'kuw';
$_POST['Database'] = 'ziel2';

$Router = new UniversalRouter();
$Route = new RouteParameter( '/',
    'MOC\V\Component\Database\Component\Bridge\Repository\Doctrine2DBAL::registerConnection' );
$Route->setParameterDefault( 'Driver', '123' );
$Route->setParameterDefault( 'Host', '192.168.100.204' );
$Route->setParameterDefault( 'Port', '3346' );
$Router->addRoute( $Route );

var_dump( $Router );

var_dump( $Router->getRoute() );
