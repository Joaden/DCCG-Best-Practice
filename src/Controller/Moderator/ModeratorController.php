<?php

namespace App\Controller\Moderator;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ModeratorController extends AbstractController
{
    /**
     * @Route("/moderator", name="moderator_index")
     */
    public function index(): Response
    {
        return $this->render('moderator/index.html.twig', [
            'controller_name' => 'ModeratorController',
        ]);
    }
}
