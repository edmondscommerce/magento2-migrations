<?php namespace EdmondsCommerce\Migrations\Helper\Config;

use Magento\Config\Model\ResourceModel\Config;
use Magento\Framework\App\Config\ConfigResource\ConfigInterface;
use Magento\Framework\App\Helper\Context;
use Magento\Store\Model\StoreManagerInterface;
use \Magento\Framework\App\Config\ScopeConfigInterface;

class General extends AbstractConfig
{
    const CONFIG_STORENAME = "general/store_information/name";
    const CONFIG_BASECURRENCY = "currency/options/base";
    const CONFIG_DISPLAYCURRENCY = "currency/options/default";
    const CONFIG_ALLOWEDCURRENCIES = "currency/options/allow";
    const CONFIG_FOOTERCOPYRIGHT= "design/footer/copyright";
    const CONFIG_WELCOMEMESSAGE= "design/header/welcome";
    const CONFIG_HEADTITLE = "design/head/default_title";
    const CONFIG_METADESCRIPTION = "design/head/default_description";
    const CONFIG_METAKEYWORDS = "design/head/default_title";


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




}