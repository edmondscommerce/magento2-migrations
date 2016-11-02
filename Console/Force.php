<?php namespace EdmondsCommerce\Migrations\Console;

use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\UpgradeDataInterface;
use Symfony\Component\Console;
use \Magento\Framework\Setup\ModuleContextInterface;
use \Magento\Framework\Setup\ModuleDataSetupInterface;

class Force extends Console\Command\Command
{
    /**
     * @var  \Magento\Framework\App\State
     */
    private $state;
    /**
     * @var InstallDataInterface
     */
    private $installData;

    /**
     * @var UpgradeDataInterface
     */
    private $upgradeData;

    /**
     * @var Console\Question\ConfirmationQuestionFactory
     */
    private $confirmationQuestionFactory;

    /**
     * @var Console\Helper\QuestionHelper
     */
    private $questionHelper;

    /**
     * @var ModuleDataSetupInterface
     */
    private $setup;


    /**
     * Force constructor.
     * @param \Magento\Framework\App\State $state
     * @param InstallDataInterface $installData
     * @param UpgradeDataInterface $upgradeData
     * @param Console\Helper\QuestionHelper $questionHelper
     * @param Console\Question\ConfirmationQuestionFactory $confirmationQuestionFactory
     * @param ModuleDataSetupInterface $setup
     * @param $commandName
     */
    public function __construct(
        \Magento\Framework\App\State $state,
        InstallDataInterface $installData,
        UpgradeDataInterface $upgradeData,
        \Symfony\Component\Console\Helper\QuestionHelper $questionHelper,
        Console\Question\ConfirmationQuestionFactory $confirmationQuestionFactory,
        ModuleDataSetupInterface $setup,
        $commandName
    )
    {
        parent::__construct($commandName);

        $this->state = $state;
        $this->installData = $installData;
        $this->upgradeData = $upgradeData;
        $this->confirmationQuestionFactory = $confirmationQuestionFactory;
        $this->questionHelper = $questionHelper;
        $this->setup = $setup;
    }

    public function execute(Console\Input\InputInterface $input, Console\Output\OutputInterface $output)
    {
        $this->state->setAreaCode('catalog');

        $output->writeln('Forcing Migrations, do NOT run this on production, all migrations will be run and the world will implode');
        $confirmation = $this->confirmationQuestionFactory->create(array('question' => "Are you absolutely sure?\n", 'default' => false));

        if (!$this->questionHelper->ask($input, $output, $confirmation))
        {
            $output->writeln('No worries, work safe');

            return;
        }

        $output->writeln('You were warned');

        $this->installData->install($this->setup);
        $this->upgradeData->upgrade($this->setup);
    }

    public function configure()
    {
        $this->setDescription('Force this module\'s install scripts to fire - do not use in production');

        parent::configure();
    }
}