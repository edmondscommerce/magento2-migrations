<?php namespace EdmondsCommerce\Migrations\Helper\Generator;

use Magento\Framework\App\Helper\AbstractHelper;
use Magento\Framework\App\Helper\Context;

/**
 * Handles the directory structure of a module
 * Class Structure
 * @package EdmondsCommerce\Migrations\Helper\Generator
 */
class Structure extends AbstractGenerator
{
    /**
     * Creates the root module directory, returns the path of the new directory
     * @param string $namespace
     * @return string
     */
    public function createRootDirectory($namespace)
    {
        $path = $this->_directoryList->getCodePath().'/'.$namespace.'/Migrations';
        mkdir($path);

        return $path;
    }
}