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

/**
 * var_dump( $this->SymfonyRequest->getAcceptableContentTypes() );
 * var_dump( $this->SymfonyRequest->getBasePath() );
 * var_dump( $this->SymfonyRequest->getBaseUrl() );
 * var_dump( $this->SymfonyRequest->getCharsets() );
 * var_dump( $this->SymfonyRequest->getClientIp() );
 * var_dump( $this->SymfonyRequest->getClientIps() );
 * var_dump( $this->SymfonyRequest->getContent() );
 * var_dump( $this->SymfonyRequest->getContentType() );
 * var_dump( $this->SymfonyRequest->getDefaultLocale() );
 * var_dump( $this->SymfonyRequest->getEncodings() );
 * var_dump( $this->SymfonyRequest->getETags() );
 * var_dump( $this->SymfonyRequest->getHost() );
 * var_dump( $this->SymfonyRequest->getHttpHost() );
 * var_dump( $this->SymfonyRequest->getHttpMethodParameterOverride() );
 * var_dump( $this->SymfonyRequest->getLanguages() );
 * var_dump( $this->SymfonyRequest->getLocale() );
 * var_dump( $this->SymfonyRequest->getMethod() );
 * var_dump( $this->SymfonyRequest->getPassword() );
 * var_dump( $this->SymfonyRequest->getPathInfo() );
 * var_dump( $this->SymfonyRequest->getPort() );
 * var_dump( $this->SymfonyRequest->getPreferredLanguage() );
 * var_dump( $this->SymfonyRequest->getQueryString() );
 * var_dump( $this->SymfonyRequest->getRealMethod() );
 * var_dump( $this->SymfonyRequest->getRequestFormat() );
 * var_dump( $this->SymfonyRequest->getRequestUri() );
 * var_dump( $this->SymfonyRequest->getScheme() );
 * var_dump( $this->SymfonyRequest->getSchemeAndHttpHost() );
 * var_dump( $this->SymfonyRequest->getScriptName() );
 * var_dump( $this->SymfonyRequest->getSession() );
 * var_dump( $this->SymfonyRequest->getTrustedHosts() );
 * var_dump( $this->SymfonyRequest->getTrustedProxies() );
 * var_dump( $this->SymfonyRequest->getUri() );
 * var_dump( $this->SymfonyRequest->getUriForPath( __FILE__ ) );
 */
