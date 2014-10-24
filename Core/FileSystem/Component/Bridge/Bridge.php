<?php
namespace MOC\V\Core\FileSystem\Component\Bridge;

/**
 * Interface IBridgeInterface
 *
 * @package MOC\V\Core\FileSystem\Component
 */
interface IBridgeInterface
{

    /**
     * @return string
     */
    public function getLocation();
}

/**
 * Class Bridge
 *
 * @package MOC\V\Core\FileSystem\Component\Bridge
 */
abstract class Bridge implements IBridgeInterface
{

}
