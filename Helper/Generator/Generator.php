<?php namespace EdmondsCommerce\Migrations\Helper\Generator;

use EdmondsCommerce\Migrations\Helper\DirectoryList;
use Magento\Framework\App\Helper\Context;

class Generator extends AbstractGenerator
{
    /**
     * @var Structure
     */
    private $structure;

    /**
     * Generator constructor.
     * @param DirectoryList $directoryList
     * @param Context $context
     * @param Structure $structure
     */
    public function __construct(
        DirectoryList $directoryList,
        Context $context,
        Structure $structure
    )
    {
        parent::__construct($directoryList, $context);
        $this->structure = $structure;
    }

    public function createModule($namespace)
    {
        //Create the root directory
        $this->structure->createRootDirectory($namespace);
    }
}