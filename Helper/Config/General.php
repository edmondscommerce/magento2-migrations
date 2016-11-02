<?php namespace EdmondsCommerce\Migrations\Helper\Config;

use Magento\Config\Model\ResourceModel\Config;
use Magento\Framework\App\Config\ConfigResource\ConfigInterface;
use Magento\Framework\App\Helper\Context;
use Magento\Store\Model\StoreManagerInterface;
use \Magento\Framework\App\Config\ScopeConfigInterface;

class General extends AbstractConfig
{

    public function setStoreName($name, $type = self::SCOPE_DEFAULT, $scopeId = 0)
    {
        $this->setConfigPath('general/store_information/name', $name, $type, $scopeId);
    }

    public function setBaseCurrency($currencyCode, $type = self::SCOPE_DEFAULT, $scopeId = 0)
    {
        $this->setConfigPath('currency/options/base', $currencyCode, $type, $scopeId);
    }

    public function setDisplayCurrency($currencyCode, $type = self::SCOPE_DEFAULT, $scopeId = 0)
    {
        $this->setConfigPath('currency/options/default', $currencyCode, $type, $scopeId);
    }

    public function setAllowedCurrencies($currencyCode, $type = self::SCOPE_DEFAULT, $scopeId = 0) {
        $this->setConfigPath('currency/options/allow', $currencyCode, $type, $scopeId);
    }



    public function getFooterCopyright($type = self::SCOPE_DEFAULT, $scopeId = 0) {
        return $this->scopeConfig->getValue('design/footer/copyright', $type);
    }

    public function setFooterCopyright($currencyCode, $type = self::SCOPE_DEFAULT, $scopeId = 0) {
        $this->setConfigPath('design/footer/copyright', $currencyCode, $type, $scopeId);
    }



    public function getWelcomeMessage($type = self::SCOPE_DEFAULT, $scopeId = 0) {
        return $this->scopeConfig->getValue('design/header/welcome', $type);
    }

    public function setWelcomeMessage($messageText, $type = self::SCOPE_DEFAULT, $scopeId = 0) {
        $this->setConfigPath('design/header/welcome', $messageText, $type, $scopeId);
    }



    public function getHeadTitle($type = self::SCOPE_DEFAULT, $scopeId = 0) {
        return $this->scopeConfig->getValue('design/head/default_title', $type);
    }

    public function setHeadTitle($title, $type = self::SCOPE_DEFAULT, $scopeId = 0) {
        $this->setConfigPath('design/head/default_title', $title, $type, $scopeId);
    }



    public function getHeadDescription($type = self::SCOPE_DEFAULT, $scopeId = 0) {
        return $this->scopeConfig->getValue('design/head/default_description', $type);
    }

    public function setHeadDescription($keywords, $type = self::SCOPE_DEFAULT, $scopeId = 0) {
        $this->setConfigPath('design/head/default_description', $keywords, $type, $scopeId);
    }



    public function getHeadKeywords($type = self::SCOPE_DEFAULT, $scopeId = 0) {
        return $this->scopeConfig->getValue('design/head/default_title', $type);
    }

    public function setHeadKeywords($keywords, $type = self::SCOPE_DEFAULT, $scopeId = 0) {
        $this->setConfigPath('design/head/default_title', $keywords, $type, $scopeId);
    }




}