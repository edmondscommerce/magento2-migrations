<?php namespace EdmondsCommerce\Migrations\Helper\Config;

class General extends AbstractConfig
{
    public function setStoreName($name, $type = self::SCOPE_DEFAULT, $scopeId = 0)
    {
        $this->setConfigPath('general/store_information/name', $name, $type, $scopeId);
    }
}