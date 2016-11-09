<?php namespace EdmondsCommerce\Migrations\Contracts\Config;

interface StoreContract
{
    public function setWebsiteName($name, $websiteId = null);

    public function setStoreName($name, $storeId = null);
}