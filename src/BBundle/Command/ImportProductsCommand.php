<?php
/**
 * Created by PhpStorm.
 * User: hassiba
 * Date: 08/10/17
 * Time: 22:06
 */

namespace BBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;


class ImportProductsCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('import:product')
            ->setDescription('Importer les produits')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $productImportService = $this->getContainer()->get('import_product_service');
        $productImportService->import();
    }

}