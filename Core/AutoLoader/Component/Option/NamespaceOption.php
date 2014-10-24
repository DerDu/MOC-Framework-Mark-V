<?php
namespace MOC\V\Core\AutoLoader\Component\Option;

use MOC\V\Core\AutoLoader\Component\Exception\EmptyNamespaceException;

/**
 * Class NamespaceOption
 *
 * @package MOC\V\Core\AutoLoader\Component\Option
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
