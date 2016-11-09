<?php

class ConfigManagerTest extends \EdmondsCommerce\Migrations\Test\Integration\BaseTest
{
    /**
     * @var \EdmondsCommerce\Migrations\Contracts\ConfigManagerContract
     */
    protected $class;

    protected function setUp()
    {
        parent::setUp();
        $this->class = new \EdmondsCommerce\Migrations\Helper\ConfigManager();
    }
}