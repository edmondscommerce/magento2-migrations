<?php namespace EdmondsCommerce\Migrations\Test\Integration;

use Magento\Framework\ObjectManagerInterface;
use \PHPUnit_Framework_TestCase;

abstract class BaseTest extends PHPUnit_Framework_TestCase
{
    /**
     * @return \Magento\Framework\ObjectManagerInterface
     */
    public function getOM()
    {
        return \Magento\TestFramework\Helper\Bootstrap::getObjectManager();
    }
}