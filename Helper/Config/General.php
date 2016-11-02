<?php namespace EdmondsCommerce\Migrations\Helper\Config;

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


}