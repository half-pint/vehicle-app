<?php 

namespace AppBundle\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;


class AddDBEntriesCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
	        ->setName('app:add-db-entries')
	        ->setDescription('Populate the database with the provded entries.')
	        ->setHelp('This command allows you to populate the db with the test entries...')
        	->addArgument('path', InputArgument::REQUIRED, 'The path to the xml.')
	    ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
	    $output->writeln([
	        'Populating the database',
	        '============',
	        '',
	    ]);

	    // retrieve the argument value using getArgument()
	    $output->writeln('Path to xml: '.$input->getArgument('path'));
		$em = $this->getContainer()->get('doctrine')->getManager();
	    $databasePopulator = $this->getContainer()->get('app.populatedb');
        $text = $databasePopulator->populateDatabase($em, $input->getArgument('path'));
        $output->writeln(print_r($text));
    }
}
