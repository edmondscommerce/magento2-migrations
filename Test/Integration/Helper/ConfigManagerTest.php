<?php namespace EdmondsCommerce\Migrations\Test\Integration\Helper;

use EdmondsCommerce\Migrations\Helper\ConfigManager;
use EdmondsCommerce\Migrations\Test\Integration\BaseTest;
use Magento\Framework\App\Config\ScopeConfigInterface;

/**
 * Class ConfigManagerTest
 * @package EdmondsCommerce\Migrations\Test\Integration\Helper
 * @magentoConfigFixture
 */
class ConfigManagerTest extends BaseTest
{
    /**
     * @var ConfigManager
     */
    protected $class;

    /**
     * @var ScopeConfigInterface
     */
    protected $scopeConfig;

    protected function setUp()
    {
        parent::setUp();

        $this->class = $this->getOM()->create(ConfigManager::class);
        $this->scopeConfig = $this->getOM()->create(ScopeConfigInterface::class);
    }

    /**
     * @test
     */
    public function itCanSetAStringConfigPathOnDefaults()
    {
        $value = 'Test Store';
        $path = 'general/store_information/name';

        $this->class->setConfigValue($path, $value);

        $this->assertConfigValue($value, $path);
    }

    /**
     * Checks that a config entry matches an expectation
     * @param $expectation
     * @param $path
     * @param string $scopeType
     * @param int $scope
     */
    protected function assertConfigValue($expectation, $path, $scopeType = ScopeConfigInterface::SCOPE_TYPE_DEFAULT, $scope = 0)
    {
        $result = $this->scopeConfig->getValue($path, $scopeType, $scope);

        $this->assertEquals($expectation, $result);
    }
}