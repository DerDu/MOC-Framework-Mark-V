<?php
namespace MOC\V\Core\AutoLoader\Component\Option\Repository;

use MOC\V\Core\AutoLoader\Component\Exception\EmptyNamespaceException;
use MOC\V\Core\AutoLoader\Component\IOptionInterface;
use MOC\V\Core\AutoLoader\Component\Option\Option;

/**
 * Class NamespaceOption
 *
 * @package MOC\V\Core\AutoLoader\Component\Option\Repository
 */
class NamespaceOption extends Option implements IOptionInterface
{

    /** @var string $Namespace */
    private $Namespace = null;

    /**
     * @param string $Namespace
     */
    function __construct( $Namespace )
    {

        $this->setNamespace( $Namespace );

    }

    /**
     * @return string
     */
    public function getNamespace()
    {

        return $this->Namespace;
    }

    /**
     * @param string $Namespace
     *
     * @throws EmptyNamespaceException
     */
    public function setNamespace( $Namespace )
    {

        $Namespace = trim( $Namespace, '\\' );
        if (empty( $Namespace )) {
            throw new EmptyNamespaceException();
        } else {
            $this->Namespace = $Namespace;
        }
    }

}
