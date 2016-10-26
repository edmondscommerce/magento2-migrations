<?php namespace EdmondsCommerce\Migrations\Console;

use Symfony\Component\Console;
use \Magento\Framework\Setup\ModuleContextInterface;
use \Magento\Framework\Setup\ModuleDataSetupInterface;
use Symfony\Component\Console\Question\ConfirmationQuestionFactory;

class Force extends Console\Command\Command
{


    /**
     * @var  \Magento\Framework\App\State
     */
    private $state;
    /**
     * @var \EdmondsCommerce\Migrations\Setup\InstallData
     */
    private $installData;

    /**
     * @var ConfirmationQuestionFactory
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
     * @param \EdmondsCommerce\Migrations\Setup\InstallData $installData
     * @param Console\Helper\QuestionHelper $questionHelper
     * @param ConfirmationQuestionFactory $confirmationQuestionFactory
     * @param ModuleDataSetupInterface $setup
     * @param ModuleContextInterface $context
     */
    public function __construct(
        \Magento\Framework\App\State $state,
        \Symfony\Component\Console\Helper\QuestionHelper $questionHelper,
        ConfirmationQuestionFactory $confirmationQuestionFactory,
        ModuleDataSetupInterface $setup
    )
    {
        parent::__construct('migrations:force');

        $this->state = $state;
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
    }

    public function configure()
    {
        $this->setName('migrate:force')
            ->setDescription('Force migrations to run');

        parent::configure();
    }
}