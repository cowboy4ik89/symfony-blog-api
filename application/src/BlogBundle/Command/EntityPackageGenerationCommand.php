<?php

namespace BlogBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Class EntityPackageGenerationCommand
 * @package BlogBundle\Command
 */
class EntityPackageGenerationCommand extends ContainerAwareCommand
{

    protected function configure()
    {
        $this
            ->setName('entity:package:generate')
            ->setDescription('Command generates empty default repository, entity, entitymanger, update service configs')
            ->setHelp('<info>%command.name%</info> Command generates empty default repository, entity, entity-manager, update service configs')
            ->addOption('entity', 'e', InputOption::VALUE_REQUIRED, 'new entity name', null);
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $entityName = $input->getOption('entity');

    }
}