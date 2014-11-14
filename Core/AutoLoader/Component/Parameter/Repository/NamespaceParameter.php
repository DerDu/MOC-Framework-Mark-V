<?php
namespace MOC\V\Core\AutoLoader\Component\Parameter\Repository;

use MOC\V\Core\AutoLoader\Component\Exception\Repository\EmptyNamespaceException;
use MOC\V\Core\AutoLoader\Component\IParameterInterface;
use MOC\V\Core\AutoLoader\Component\Parameter\Parameter;

/**
 * Class NamespaceParameter
 *
 * @package MOC\V\Core\AutoLoader\Component\Parameter\Repository
 */
class NamespaceParameter extends Parameter implements IParameterInterface
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
     * @throws \MOC\V\Core\AutoLoader\Component\Exception\Repository\EmptyNamespaceException
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