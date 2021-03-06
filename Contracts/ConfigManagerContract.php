<?php namespace EdmondsCommerce\Migrations\Contracts;

interface ConfigManagerContract
{
    const SCOPE_DEFAULT = 'default';
    const SCOPE_WEBSITE = 'websites';
    const SCOPE_STORE = 'stores';

    /**
     * Check that the scope type is valid
     * @param $scopeType
     * @return bool
     */
    public function validateScopeType($scopeType);

    /**
     * @param string $configPath
     * @param mixed $configValue
     * @param string $type
     * @param int $scopeId
     * @return $this
     */
    public function setConfigValue($configPath, $configValue, $type = self::SCOPE_DEFAULT, $scopeId = 0);

    /**
     * Replaces a string in the config entry path value
     * @param string $configPath Path to a config key
     * @param string $needle A string to match the value against. If it matches, it'll be replaced
     * @param string $configValue string The new value
     * @param string $type Scope type
     * @param int $scopeId Scope ID
     */
    public function replaceMatchingConfigValue($configPath, $needle, $configValue, $type = self::SCOPE_DEFAULT, $scopeId = 0);

    /**
     * Performs an operation on the current config value, the closure is passed the current value
     * @param $configPath
     * @param Callable $callback
     * @param string $type
     * @param int $scopeId
     * @return $this
     */
    public function setConfigValueCallback($configPath, Callable $callback, $type = self::SCOPE_DEFAULT, $scopeId = 0);
}