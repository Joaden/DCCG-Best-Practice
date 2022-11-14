<?php

namespace App\Command;

use App\Repository\ProductsRepository;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Encoder\CsvEncoder;
use Symfony\Component\Serializer\Encoder\XmlEncoder;

class CreateProductFromCsvOrXmlOrYamlFileCommand extends Command
{
    private EntityManagerInterface $entityManager;
    // private EntityManager $manager;
    private string $dataDirectory;
    private SymfonyStyle $io;
    private ProductsRepository $productsRepository;

    public function _construct(
        EntityManagerInterface $entityManager,
        string $dataDirectory,
        ProductsRepository $productsRepository
    )
    {
        $this->entityManager = $entityManager;
        $this->dataDirectory = $dataDirectory;
        $this->productsRepository = $productsRepository;
    }

    protected static $defaultName = 'app:create-product-from-csv';

    protected function configure(): void
    {
        $this
            ->setDescription('Importer des données via un CSV XML ou Yaml');
            // ->addArgument('arg1', InputArgument::OPTIONAL, 'Argument description')
            // ->addOption('option1', null, InputOption::VALUE_NONE, 'Option description')
        // ;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);
        // $arg1 = $input->getArgument('arg1');
        $this->createProducts();

        // if ($arg1) {
        //     $io->note(sprintf('You passed an argument: %s', $arg1));
        // }

        // if ($input->getOption('option1')) {
        //     // ...
        // }

        $io->success('You have a new command! Now make it your own! Pass --help to see your options.');

        return Command::SUCCESS;
    }

    
    private function getDataFomFile(): array
    {
        $file = $this->dataDirectory . 'random-products.csv';

        $fileExtenction = pathinfo($file, PATHINFO_EXTENSION);

        $normalizers = [new ObjectNormalizer()];
        $encoders = [
            new CsvEncoder(),
            new XmlEncoder(),
            new YamlEncoder()
        ];

        $serializer = new Serializer($normalizers,$encoders);

        /**
         * @var string $fileString
         */
        $fileString = file_get_contents($file);

        $data = $serializer->decode($fileString, $fileExtenction);

        dd($data);


    }

    private function createProducts(): void
    {
        $this->getDataFomFile();
    }
}
