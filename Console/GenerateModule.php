<?php namespace EdmondsCommerce\Migrations\Console;

use Symfony\Component\Console;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Creates a new migrations module to reduce the amount of boiler plate, will set up every thing
 * including di.xml, upgrade and install data classes etc
 * Class GenerateModule
 * @package EdmondsCommerce\Migrations\Console
 */
class GenerateModule extends Console\Command\Command
{
    public function __construct($name)
    {
        parent::__construct($name);

        $this->addArgument('namespace', Console\Input\InputArgument::REQUIRED, '')
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        //Get the namespace argument
        $arguments = $input->getArguments();
        if(count($arguments) != 1)
        {
            $output->writeln('Please pass the namespace for the new migrations module');
            return 1;
        }
        $namespace = array_shift($arguments);


    }



    public function getDescription()
    {
        return 'Generates a new module to add migrations to';
    }
}