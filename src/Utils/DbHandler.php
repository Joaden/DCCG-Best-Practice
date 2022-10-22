<?php
/**
 * Created by PhpStorm.
 * User: chane
 * Date: 23/01/2022
 * Time: 14:20
 */

namespace App\Utils;

use App\Entity\Log;
use Doctrine\ORM\EntityManagerInterface;
use Monolog\Handler\AbstractProcessingHandler;
use Doctrine\Persistence\ObjectManager;


class DbHandler extends AbstractProcessingHandler
{
    private $manager;

    public function __construct(EntityManagerInterface $manager)
    {
        parent::__construct();
        $this->manager = $manager;
    }

    protected function write(array $record): void
    {
        // on envoi le log en bdd
        $log = new Log();

        $log->setContext($record['context']);
        $log->setLevel($record['level']);
        $log->setLevelName($record['level_name']);
        $log->setMessage($record['message']);
        $log->setExtra($record['extra']);
//        $log->setExtra($record['extra']['user']);

//        $manager = $this->getDoctrine()->getManager();
        $this->manager->persist($log);
        $this->manager->flush();
    }
}