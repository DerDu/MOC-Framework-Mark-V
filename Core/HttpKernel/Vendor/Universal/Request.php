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

    /**
     *
     */
    public function __construct()
    {

        // PHP 7+
        AutoLoader::getNamespaceAutoLoader('Symfony\Component', __DIR__.'/../Symfony/Component/HttpFoundation/3.3.2');
        // PHP 5.x
        // AutoLoader::getNamespaceAutoLoader('Symfony\Component', __DIR__.'/../Symfony/Component/HttpFoundation/2.5.0');

        $this->SymfonyRequest = SymfonyRequest::createFromGlobals();
    }

    /**
     * @return null|SymfonyRequest
     */
    public function getSymfonyRequest()
    {

        return $this->SymfonyRequest;
    }

}
