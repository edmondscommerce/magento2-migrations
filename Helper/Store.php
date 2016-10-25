<?php namespace EdmondsCommerce\Migrations\Helper;

use Magento\Framework\App\Config\ConfigResource\ConfigInterface;
use Magento\Framework\App\Helper\AbstractHelper;
use Magento\Framework\App\Helper\Context;
use Magento\Store\Model\StoreManagerInterface;

class Store extends AbstractHelper
{
    /**
     * @var ConfigInterface
     */
    private $config;
    /**
     * @var StoreManagerInterface
     */
    private $storeConfig;

    public function __construct(Context $context, StoreManagerInterface $config)
    {
        parent::__construct($context);
        $this->storeConfig = $config;
    }

    public function setWebsiteName($name, $websiteId = null)
    {
        $this->storeConfig->getWebsite($websiteId)->setName($name)->save();
    }

    public function setStoreName($name, $storeId = null)
    {
        $this->storeConfig->getStore($storeId)->setName($name)->save();
    }
}