<?php namespace EdmondsCommerce\Migrations\Contracts\Config;

use EdmondsCommerce\Migrations\Contracts\ConfigManagerContract;

interface GeneralContract extends ConfigManagerContract
{
    /**
     * @param $name
     * @param $scope
     * @param int $scopeId
     * @return $this
     */
    public function setStoreName($name, $scope = self::SCOPE_DEFAULT, $scopeId = 0);

    /**
     * @param $currencyCode
     * @param $scope
     * @param int $scopeId
     * @return $this
     */
    public function setBaseCurrency($currencyCode, $scope = self::SCOPE_DEFAULT, $scopeId = 0);

    /**
     * @param $currencyCode
     * @param $scope
     * @param int $scopeId
     * @return $this
     */
    public function setDisplayCurrency($currencyCode, $scope = self::SCOPE_DEFAULT, $scopeId = 0);

    /**
     * @param $currencyCode
     * @param $scope
     * @param int $scopeId
     * @return $this
     */
    public function setAllowedCurrencies($currencyCode, $scope = self::SCOPE_DEFAULT, $scopeId = 0);

    /**
     * @param $scope
     * @param int $scopeId
     * @return string
     */
    public function getFooterCopyright($scope = self::SCOPE_DEFAULT, $scopeId = 0);

    /**
     * @param $currencyCode
     * @param $scope
     * @param int $scopeId
     * @return $this
     */
    public function setFooterCopyright($currencyCode, $scope = self::SCOPE_DEFAULT, $scopeId = 0);

    /**
     * @param $scope
     * @param int $scopeId
     * @return string
     */
    public function getWelcomeMessage($scope = self::SCOPE_DEFAULT, $scopeId = 0);

    /**
     * @param $messageText
     * @param $scope
     * @param int $scopeId
     * @return $this
     */
    public function setWelcomeMessage($messageText, $scope = self::SCOPE_DEFAULT, $scopeId = 0);

    /**
     * @param $scope
     * @param int $scopeId
     * @return string
     */
    public function getHeadTitle($scope = self::SCOPE_DEFAULT, $scopeId = 0);

    /**
     * @param $title
     * @param $scope
     * @param int $scopeId
     * @return $this
     */
    public function setHeadTitle($title, $scope = self::SCOPE_DEFAULT, $scopeId = 0);

    /**
     * @param $scope
     * @param int $scopeId
     * @return string
     */
    public function getHeadDescription($scope = self::SCOPE_DEFAULT, $scopeId = 0);

    /**
     * @param $keywords
     * @param $scope
     * @param int $scopeId
     * @return $this
     */
    public function setHeadDescription($keywords, $scope = self::SCOPE_DEFAULT, $scopeId = 0);

}