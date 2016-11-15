<?php namespace EdmondsCommerce\Migrations\Helper\Config;

use EdmondsCommerce\Migrations\Contracts\Config\CatalogContract;
use EdmondsCommerce\Migrations\Helper\ConfigManager;

class Catalog extends ConfigManager implements CatalogContract
{
    public function setStockControlEnabled($enabled = true, $scopeType = self::SCOPE_DEFAULT, $scopeId = 0)
    {
        $this->setConfigValue('cataloginventory/item_options/manage_stock', $enabled, $scopeType, $scopeId);

        return $this;
    }

    public function setGuestReviewsEnabled($enabled = true, $scopeType = self::SCOPE_DEFAULT, $scopeId = 0)
    {
        $this->setConfigValue('catalog/review/allow_guest', $enabled, $scopeType, $scopeId);

        return $this;
    }
}