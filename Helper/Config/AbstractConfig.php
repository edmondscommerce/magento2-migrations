<?php namespace EdmondsCommerce\Migrations\Helper\Config;

use Magento\Config\Model\ResourceModel\Config;
use Magento\Framework\App\Helper\AbstractHelper;
use Magento\Framework\App\Config\ConfigResource\ConfigInterface;
use Magento\Framework\App\Helper\Context;
use Magento\Store\Model\StoreManagerInterface;

abstract class AbstractConfig extends AbstractHelper
{
    const SCOPE_DEFAULT = 'default';
    const SCOPE_WEBSITE = 'websites';
    const SCOPE_STORE = 'stores';

    /**
     * @var ConfigInterface
     */
    private $config;
    /**
     * @var StoreManagerInterface
     */
    private $storeManager;

    /**
     * AbstractConfig constructor.
     * @param Context $context
     * @param ConfigInterface $config
     * @param StoreManagerInterface $storeManager
     */
    public function __construct(Context $context, ConfigInterface $config, StoreManagerInterface $storeManager)
    {
        parent::__construct($context);
        $this->config = $config;
        $this->storeManager = $storeManager;
    }

    /**
     * @param string $path
     * @param string $value
     * @param string $scopeType
     * @param int $scopeId
     */
    public function setConfigPath($path, $value, $scopeType = self::SCOPE_DEFAULT, $scopeId = 0)
    {
        if ($scopeId > 0)
        {
            $this->validateScope($scopeType, $scopeId);
        }

        $this->config->saveConfig($path, $value, $scopeType, $scopeId);
    }

    protected function validateScope($scopeType, $scopeId)
    {
        switch ($scopeType)
        {
            case self::SCOPE_WEBSITE:
                $this->validateWebsite($scopeId);
                break;
            case self::SCOPE_STORE:
                $this->validateStoreView($scopeId);
                break;
            case self::SCOPE_DEFAULT:
                return true;
                break;

            default:
                throw new \Exception('Unknown scope type ' . $scopeType);
        }

        return true;
    }

    protected function validateWebsite($scopeId)
    {
        $this->storeManager->getWebsite($scopeId);
    }

    protected function validateStoreView($scopeId)
    {
        $this->storeManager->getStore($scopeId);
    }




    public function getConfigValue($configPath, $type = self::SCOPE_DEFAULT, $scopeId = 0) {
        return $this->scopeConfig->getValue($configPath, $type, $scopeId);
    }

    public function setConfigValue($configPath, $configValue, $type = self::SCOPE_DEFAULT, $scopeId = 0) {
        $this->setConfigPath($configPath, $configValue, $type, $scopeId);
    }

    /**
     * @param string $configPath Path to a config key
     * @param string $needle A string to match the value against. If it matches, it'll be replaced
     * @param string $configValue string The new value
     * @param string $type Scope type
     * @param int $scopeId Scope ID
     */
    public function replaceMatchingConfigValue($configPath, $needle, $configValue, $type = self::SCOPE_DEFAULT, $scopeId = 0) {
        $currentValue = $this->getConfigValue($configPath, $type, $scopeId);
        if(strpos($currentValue, $needle) !== false) {
            $this->setConfigValue($configPath, $configValue, $type, $scopeId);
        }
    }
}