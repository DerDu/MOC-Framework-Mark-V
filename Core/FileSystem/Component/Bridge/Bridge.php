<?php
namespace MOC\V\Core\FileSystem\Component\Bridge;

use MOC\V\Core\AutoLoader\AutoLoader;
use MOC\V\Core\FileSystem\Component\IBridgeInterface;
use Symfony\Component\HttpFoundation\File\MimeType\MimeTypeGuesser;

/**
 * Class Bridge
 *
 * @package MOC\V\Core\FileSystem\Component\Bridge
 */
abstract class Bridge implements IBridgeInterface
{

    /**
     * Bridge constructor.
     */
    public function __construct()
    {

        // PHP 7+
        AutoLoader::getNamespaceAutoLoader(
            'Symfony\Component\HttpFoundation\File', __DIR__.'/../../../HttpKernel/Vendor/Symfony/Component/HttpFoundation/3.3.2'
        );
        // PHP 5.x
        // AutoLoader::getNamespaceAutoLoader(
        //     'Symfony\Component\HttpFoundation\File', __DIR__.'/../../../HttpKernel/Vendor/Symfony/Component/HttpFoundation/2.5.0'
        // );
    }

    /**
     * @return null|false|string returns null if not detected, false on error (enable the php_fileinfo extension)
     */
    public function getMimeType()
    {

        try {
            return MimeTypeGuesser::getInstance()->guess($this->getRealPath());
        } catch (\Exception $Exception) {
            return false;
        }
    }
}
