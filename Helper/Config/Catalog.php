<?php namespace EdmondsCommerce\Migrations\Helper\Config;

use EdmondsCommerce\Migrations\Contracts\Config\CatalogContract;
use EdmondsCommerce\Migrations\Helper\ConfigManager;

class Catalog extends ConfigManager implements CatalogContract
{
    public function setStockControlEnabled($enabled = true, $scopeType = self::SCOPE_DEFAULT, $scopeId = 0)
    {
        $this->setConfigPath('cataloginventory/item_options/manage_stock', $enabled, $scopeType, $scopeId);

        return $this;
    }
}