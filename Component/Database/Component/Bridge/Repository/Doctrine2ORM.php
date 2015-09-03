<?php
namespace MOC\V\Component\Database\Component\Bridge\Repository;

use MOC\V\Component\Database\Component\IBridgeInterface;
use MOC\V\Core\AutoLoader\AutoLoader;

/**
 * Class Doctrine2ORM
 *
 * @package MOC\V\Component\Database\Component\Bridge
 */
class Doctrine2ORM extends Doctrine2DBAL implements IBridgeInterface
{

    /**
     *
     */
    public function __construct()
    {

        AutoLoader::getNamespaceAutoLoader('Doctrine\ORM', __DIR__.'/../../../Vendor/Doctrine2ORM/2.5.0/lib');
        parent::__construct();
    }

}
