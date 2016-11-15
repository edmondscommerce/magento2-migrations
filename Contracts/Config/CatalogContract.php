<?php namespace EdmondsCommerce\Migrations\Contracts\Config;

use EdmondsCommerce\Migrations\Contracts\ConfigManagerContract;

interface CatalogContract extends ConfigManagerContract
{
    /**
     * @param bool $enabled
     * @param $scopeType
     * @param int $scopeId
     * @return $this
     */
    public function setStockControlEnabled($enabled = true, $scopeType = self::SCOPE_DEFAULT, $scopeId = 0);


    /**
     * @param bool $enabled
     * @param $scopeType
     * @param int $scopeId
     * @return $this
     */
    public function setGuestReviewsEnabled($enabled = true, $scopeType = self::SCOPE_DEFAULT, $scopeId = 0);

}