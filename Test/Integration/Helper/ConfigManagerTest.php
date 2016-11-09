<?php namespace EdmondsCommerce\Migrations\Test\Integration\Helper;

use EdmondsCommerce\Migrations\Helper\ConfigManager;
use EdmondsCommerce\Migrations\Test\Integration\BaseTest;
use Magento\Framework\App\Config\ScopeConfigInterface;

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
        $this->config = $this->getOM()->create(ScopeConfigInterface::class);
    }

    /**
     * @test
     */
    public function itCanSetAStringConfigPathOnDefaults()
    {
        $check = 'Test Store';
        $checkPath = 'general/store_information/name';
        $this->class->setConfigValue($checkPath, $check);

        $result = $this->scopeConfig->getValue($checkPath);
        $this->assertEquals($check, $result);
    }
}


