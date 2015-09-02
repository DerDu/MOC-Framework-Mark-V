<?php
class Singleton
{
    private static $uniqueInstance = null;

    protected function __construct()
    {
    }

    public static function getInstance()
    {
        if (self::$uniqueInstance === null) {
            self::$uniqueInstance = new self;
        }

        return self::$uniqueInstance;
    }

    final private function __clone()
    {
    }
}
