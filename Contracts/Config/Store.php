<?php namespace EdmondsCommerce\Migrations\Contracts\Config;

interface Store
{
    public function setWebsiteName($name, $websiteId = null);

    public function setStoreName($name, $storeId = null);
}