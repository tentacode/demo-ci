<?php

namespace App\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Doctrine\Common\Persistence\ObjectManager;
use Nelmio\Alice\Loader\SimpleFileLoader as AliceLoader;

class LoadFixturesCommand extends Command
{
    private $projectDirectory;
    private $em;
    private $aliceLoader;

    protected static $defaultName = 'fixtures:load';

    protected function configure()
    {
        $this
            ->setDescription('Load fixtures')
        ;
    }

    public function __construct(ObjectManager $em, AliceLoader $aliceLoader)
    {
        $this->projectDirectory = __DIR__.'/../../';
        $this->em = $em;
        $this->aliceLoader = $aliceLoader;

        parent::__construct();
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $io = new SymfonyStyle($input, $output);

        $io->section('Loading fixtures…');

        $objectSet = $this->aliceLoader->loadFile(sprintf(
            '%s/resources/fixtures/demo.yml',
            $this->projectDirectory
        ));

        foreach ($objectSet->getObjects() as $entity) {
            $this->em->persist($entity);
        }

        $this->em->flush();

        $io->success('Fixtures loaded.');
    }
}
