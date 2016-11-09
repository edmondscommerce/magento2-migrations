<?php namespace EdmondsCommerce\Migrations\Helper\Config;

use EdmondsCommerce\Migrations\Contracts\Config\GeneralContract;
use EdmondsCommerce\Migrations\Helper\ConfigManager;

class General extends ConfigManager implements GeneralContract
{
    public function setStoreName($name, $type = self::SCOPE_DEFAULT, $scopeId = 0)
    {
        $this->setConfigPath('general/store_information/name', $name, $type, $scopeId);

        return $this;
    }

    public function setBaseCurrency($currencyCode, $type = self::SCOPE_DEFAULT, $scopeId = 0)
    {
        $this->setConfigPath('currency/options/base', $currencyCode, $type, $scopeId);

        return $this;
    }

    public function setDisplayCurrency($currencyCode, $type = self::SCOPE_DEFAULT, $scopeId = 0)
    {
        $this->setConfigPath('currency/options/default', $currencyCode, $type, $scopeId);

        return $this;
    }

    public function setAllowedCurrencies($currencyCode, $type = self::SCOPE_DEFAULT, $scopeId = 0)
    {
        $this->setConfigPath('currency/options/allow', $currencyCode, $type, $scopeId);

        return $this;
    }

    public function getFooterCopyright($type = self::SCOPE_DEFAULT, $scopeId = 0)
    {
        return $this->scopeConfig->getValue('design/footer/copyright', $type);
    }

    public function setFooterCopyright($currencyCode, $type = self::SCOPE_DEFAULT, $scopeId = 0)
    {
        $this->setConfigPath('design/footer/copyright', $currencyCode, $type, $scopeId);

        return $this;
    }


    public function getWelcomeMessage($type = self::SCOPE_DEFAULT, $scopeId = 0)
    {
        return $this->scopeConfig->getValue('design/header/welcome', $type);
    }

    public function setWelcomeMessage($messageText, $type = self::SCOPE_DEFAULT, $scopeId = 0)
    {
        $this->setConfigPath('design/header/welcome', $messageText, $type, $scopeId);

        return $this;
    }


    public function getHeadTitle($type = self::SCOPE_DEFAULT, $scopeId = 0)
    {
        return $this->scopeConfig->getValue('design/head/default_title', $type);
    }

    public function setHeadTitle($title, $type = self::SCOPE_DEFAULT, $scopeId = 0)
    {
        $this->setConfigPath('design/head/default_title', $title, $type, $scopeId);

        return $this;
    }


    public function getHeadDescription($type = self::SCOPE_DEFAULT, $scopeId = 0)
    {
        return $this->scopeConfig->getValue('design/head/default_description', $type);
    }

    public function setHeadDescription($keywords, $type = self::SCOPE_DEFAULT, $scopeId = 0)
    {
        $this->setConfigPath('design/head/default_description', $keywords, $type, $scopeId);

        return $this;
    }
}