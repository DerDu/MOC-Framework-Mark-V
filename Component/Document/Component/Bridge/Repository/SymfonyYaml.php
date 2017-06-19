<?php
namespace MOC\V\Component\Document\Component\Bridge\Repository;

use MOC\V\Component\Document\Component\Bridge\Bridge;
use MOC\V\Component\Document\Component\Exception\Repository\TypeFileException;
use MOC\V\Component\Document\Component\IBridgeInterface;
use MOC\V\Component\Document\Component\Parameter\Repository\FileParameter;
use MOC\V\Core\AutoLoader\AutoLoader;
use Symfony\Component\Yaml\Yaml;

/**
 * Class SymfonyYaml
 * @package MOC\V\Component\Document\Component\Bridge\Repository
 */
class SymfonyYaml extends Bridge implements IBridgeInterface
{
    // TODO: Implement Error Handling

    /** @var array $YamlPayload */
    private $Content = array();

    /**
     * SymfonyYaml constructor.
     */
    public function __construct()
    {
        AutoLoader::getNamespaceAutoLoader('Symfony\Component\Yaml',
            __DIR__ . '/../../../Vendor/SymfonyYaml/2.8.18',
            'Symfony\Component\Yaml'
        );
    }

    /**
     * @param FileParameter $Location
     * @return IBridgeInterface
     * @throws TypeFileException
     */
    public function loadFile(FileParameter $Location)
    {

        $Info = $Location->getFileInfo();
        if( $Info->getExtension() != 'yaml' ) {
            throw new TypeFileException('No Reader for '.$Location->getFile().' available!');
        }
        $this->setFileParameter($Location);
        $Yaml = file_get_contents($Location->getFile());
        $this->Content = Yaml::parse($Yaml);
        return $this;
    }

    /**
     * @param null|FileParameter $Location
     * @param int $InlineDepth
     * @param int $IndentDepth
     *
     * @return IBridgeInterface
     */
    public function saveFile(FileParameter $Location = null, $InlineDepth = 2, $IndentDepth = 4 )
    {
        if (null === $Location) {
            $Location = $this->getFileParameter();
        } else {
            $Location = $Location->getFile();
        }
        $Yaml = Yaml::dump($this->Content, $InlineDepth, $IndentDepth);
        file_put_contents($Location, $Yaml);
        return $this;
    }

    /**
     * @return array
     */
    public function getContent()
    {
        return $this->Content;
    }

    /**
     * @param array $Content
     * @return IBridgeInterface
     */
    public function setContent($Content)
    {
        $this->Content = $Content;
        return $this;
    }
}