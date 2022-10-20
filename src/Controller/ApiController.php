<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

use App\Entity\Calendar;
use App\Form\CalendarType;
use App\Repository\CalendarRepository;

use Symfony\Component\Validator\Constraints;
use Symfony\Component\Validator\Constraints\DateTime;
use Symfony\Component\Validator\Constraints\DateTimeInterface;

class ApiController extends AbstractController
{
    /**
     * @Route("/user/api", name="api")
     */
    public function index()
    {
        return $this->render('api/index.html.twig', [
            'controller_name' => 'ApiController',
        ]);
    }

    /**
     * @Route("/api/{id}/edit", name="api_event_edit", methods={"PUT"})
     */
    public function majEvent(?Calendar $calendar, Request $request)
    {

        //recuperer les donnees
        $donnees = json_decode($request->getContent());

        if(
        isset($donnees->title) && !empty($donnees->title) &&
        isset($donnees->start) && !empty($donnees->start) &&
        isset($donnees->description) && !empty($donnees->description) &&
        isset($donnees->backgroundColor) && !empty($donnees->backgroundColor) &&
        isset($donnees->borderColor) && !empty($donnees->borderColor) &&
        isset($donnees->textColor) && !empty($donnees->textColor)
        ){
            //les donnees sont complètes
            // initialise le code
            $code= 200;

            // on verifie que lid existe
            if(!$calendar){

                // On instancie un rdv
                $calendar = new Calendar;

                //On change le code
                $code = 201;
            }

//            var_dump($donnees);

            // On hydrate l'objet avec les donnees
            $calendar->setTitle($donnees->title);
            $calendar->setDescription($donnees->description);
            $calendar->setStart(new DateTime($donnees->start));
            if($donnees->allDay){
                $calendar->setEnd(new DateTime($donnees->start));
            }else{
                $calendar->setEnd(new DateTime($donnees->end));
            }
            $calendar->setAllDay($donnees->allDay);
            $calendar->setBackgroundColor($donnees->backgroundColor);
            $calendar->setBorderColor($donnees->borderColor);
            $calendar->setTextColor($donnees->textColor);

            $em = $this->getDoctrine()->getManager();
            $em->persist($calendar);
            $em->flush();

            //On retourne le code
            return new Response('Ok', $code);

        }else{
            //les donnees sont incompletes
            return new Response('Données incomplètes', 404);
        }

        return $this->render('api/index.html.twig', [
            'controller_name' => 'ApiController',
        ]);
    }
}
