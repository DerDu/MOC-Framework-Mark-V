<?php
namespace MOC\V\Core\HttpKernel\Vendor\Universal;

use MOC\V\Core\AutoLoader\AutoLoader;
use Symfony\Component\HttpFoundation\Request as SymfonyRequest;

/**
 * Class Request
 *
 * @package MOC\V\Core\HttpKernel\Vendor\Universal
 */
class Request
{

    /** @var null|SymfonyRequest $SymfonyRequest */
    private $SymfonyRequest = null;

    function __construct()
    {

        AutoLoader::getUniversalNamespaceAutoLoader( 'Symfony\Component', __DIR__.'/../Symfony/Component/' );

        $this->SymfonyRequest = SymfonyRequest::create('');

        var_dump( $this->SymfonyRequest->getAcceptableContentTypes() );
        var_dump( $this->SymfonyRequest->getBasePath() );
        var_dump( $this->SymfonyRequest->getBaseUrl() );
        var_dump( $this->SymfonyRequest->getCharsets() );
        var_dump( $this->SymfonyRequest->getClientIp() );
        var_dump( $this->SymfonyRequest->getClientIps() );
        var_dump( $this->SymfonyRequest->getContent() );
        var_dump( $this->SymfonyRequest->getContentType() );
        var_dump( $this->SymfonyRequest->getDefaultLocale() );
        var_dump( $this->SymfonyRequest->getEncodings() );
        var_dump( $this->SymfonyRequest->getETags() );
        var_dump( $this->SymfonyRequest->getHost() );
        var_dump( $this->SymfonyRequest->getHttpHost() );
        var_dump( $this->SymfonyRequest->getHttpMethodParameterOverride() );
        var_dump( $this->SymfonyRequest->getLanguages() );
        var_dump( $this->SymfonyRequest->getLocale() );
        var_dump( $this->SymfonyRequest->getMethod() );
        var_dump( $this->SymfonyRequest->getPassword() );
        var_dump( $this->SymfonyRequest->getPathInfo() );
        var_dump( $this->SymfonyRequest->getPort() );
        var_dump( $this->SymfonyRequest->getPreferredLanguage() );
        var_dump( $this->SymfonyRequest->getQueryString() );
        var_dump( $this->SymfonyRequest->getRealMethod() );
        var_dump( $this->SymfonyRequest->getRequestFormat() );
        var_dump( $this->SymfonyRequest->getRequestUri() );
        var_dump( $this->SymfonyRequest->getScheme() );
        var_dump( $this->SymfonyRequest->getSchemeAndHttpHost() );
        var_dump( $this->SymfonyRequest->getScriptName() );
        var_dump( $this->SymfonyRequest->getSession() );
        var_dump( $this->SymfonyRequest->getTrustedHosts() );
        var_dump( $this->SymfonyRequest->getTrustedProxies() );
        var_dump( $this->SymfonyRequest->getUri() );
        var_dump( $this->SymfonyRequest->getUriForPath( __FILE__ ) );

    }

}
