<?php namespace EdmondsCommerce\Migrations\Helper;

use EdmondsCommerce\Migrations\Helper\AbstractHelper;
use Magento\Framework\App\Helper\Context;
use Magento\Store\Model\StoreManagerInterface;

class Store extends AbstractHelper implements \EdmondsCommerce\Migrations\Contracts\Config\Store
{
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