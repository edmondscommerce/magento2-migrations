<?php namespace EdmondsCommerce\Migrations\Helper\Generator;

use EdmondsCommerce\Migrations\Helper\DirectoryList;
use Magento\Framework\App\Helper\AbstractHelper;
use Magento\Framework\App\Helper\Context;

abstract class AbstractGenerator extends AbstractHelper
{
    /**
     * @var DirectoryList
     */
    protected $_directoryList;

    /**
     * AbstractGenerator constructor.
     * @param DirectoryList $directoryList
     * @param Context $context
     */
    public function __construct(DirectoryList $directoryList, Context $context)
    {
        parent::__construct($context);
        $this->_directoryList = $directoryList;
    }
}