<?php
/**
 * Created by PhpStorm.
 * User: chane
 * Date: 23/01/2022
 * Time: 19:21
 */

namespace App\Utils;


use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\Security\Core\Security;

class DbProcessor {

    private $request;

    public function __construct(RequestStack $request, Security $security)
    {
        $this->request = $request->getCurrentRequest();
        $this->security = $security;
    }


    public function __invoke(array $record)
    {
        //On modifie le record pour ajouter des infos


        $record['extra']['clientIp'] = $this->request->getClientIp();
        $record['extra']['url'] = $this->request->getbaseUrl();

        $user = $this->security->getUser();
        $record['extra']['user'] = $user;

//        dd($record);
        return $record;
    }
}