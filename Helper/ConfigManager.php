<?php namespace EdmondsCommerce\Migrations\Helper;

use EdmondsCommerce\Migrations\Contracts\ConfigManagerContract;
use Magento\Framework\App\Config\ConfigResource\ConfigInterface;
use Magento\Framework\App\Helper\Context;
use Magento\Store\Model\StoreManagerInterface;

class ConfigManager extends AbstractHelper implements ConfigManagerContract
{

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
     * @param string $configPath
     * @param mixed $configValue
     * @param string $type
     * @param int $scopeId
     * @return $this
     */
    public function setConfigValue($configPath, $configValue, $type = self::SCOPE_DEFAULT, $scopeId = 0)
    {
        if ($scopeId > 0)
        {
            $this->validateScopeType($type);
        }

        $this->config->saveConfig($configPath, $configValue, $type, $scopeId);

        return $this;
    }

    /**
     * @param $scopeType
     * @return bool
     * @throws \Exception
     */
    public function validateScopeType($scopeType)
    {
        $scopeTypes = array(
            self::SCOPE_DEFAULT,
            self::SCOPE_STORE,
            self::SCOPE_WEBSITE
        );

        if(!in_array($scopeType, $scopeTypes))
        {
            throw new \Exception('Unknown scope type ' . $scopeType);
        }

        return true;
    }

    /**
     * Replaces a string in the config entry path value
     * @param string $configPath Path to a config key
     * @param string $needle A string to match the value against. If it matches, it'll be replaced
     * @param string $configValue string The new value
     * @param string $type Scope type
     * @param int $scopeId Scope ID
     * @return $this
     */
    public function replaceMatchingConfigValue($configPath, $needle, $configValue, $type = self::SCOPE_DEFAULT, $scopeId = 0)
    {
        return $this->setConfigValueCallback($configPath, function($currentValue) use ($needle, $configValue)
        {
            if (strpos($currentValue, $needle) !== false)
            {
                return $configValue;
            }
            return $currentValue;
        });
    }

    /**
     * Performs an operation on the current config value, the closure is passed the current value
     * @param $configPath
     * @param Callable $callback
     * @param string $type
     * @param int $scopeId
     * @return $this
     */
    public function setConfigValueCallback($configPath, Callable $callback, $type = self::SCOPE_DEFAULT, $scopeId = 0)
    {
        $currentValue = $this->scopeConfig->getValue($configPath, $type, $scopeId);
        $newValue = $callback($currentValue);
        if ($currentValue != $newValue)
        {
            //The value has changed, save
            $this->setConfigPath($configPath, $newValue, $type, $scopeId);
        }

        return $this;
    }
}