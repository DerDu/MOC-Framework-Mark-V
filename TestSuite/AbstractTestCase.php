<?php
namespace MOC\V\TestSuite;

/**
 * Class AbstractTestCase
 *
 * @package MOC\V\TestSuite
 */
abstract class AbstractTestCase extends \PHPUnit_Framework_TestCase
{

    /**
     * Call protected/private method of a object.
     *
     * @param object &$object    Instantiated object that we will run method on.
     * @param string $methodName Method name to call
     * @param array  $parameters Array of parameters to pass into method.
     *
     * @return mixed Method return.
     */
    public function invokeObjectMethod(&$object, $methodName, array $parameters = array())
    {

        $reflection = new \ReflectionClass(get_class($object));
        $method = $reflection->getMethod($methodName);
        $method->setAccessible(true);

        return $method->invokeArgs($object, $parameters);
    }

    /**
     * Call protected/private method of a class.
     *
     * @param string $class      Class that we will run method on.
     * @param string $methodName Method name to call
     * @param array  $parameters Array of parameters to pass into method.
     *
     * @return mixed Method return.
     */
    public function invokeClassMethod($class, $methodName, array $parameters = array())
    {

        $reflection = new \ReflectionClass($class);
        $method = $reflection->getMethod($methodName);
        $method->setAccessible(true);

        $object = $reflection->newInstanceWithoutConstructor();
        return $method->invokeArgs($object, $parameters);
    }
}
