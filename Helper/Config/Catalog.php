<?php namespace EdmondsCommerce\Migrations\Helper\Config;

class Catalog extends AbstractConfig
{
    const CONFIG_GUESTREVIEWS = "catalog/review/allow_guest";

    public function setStockControlEnabled($enabled = true, $scopeType = self::SCOPE_DEFAULT, $scopeId = 0)
    {
        $this->setConfigPath('cataloginventory/item_options/manage_stock', $enabled, $scopeType, $scopeId);
    }
}