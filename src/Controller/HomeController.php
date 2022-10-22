<?php

namespace App\Controller;

use App\Data\SearchData;
use App\Entity\Users;
use App\Form\SearchForm;
use App\Repository\AnnoncesRepository;
use App\Repository\CalendarRepository;
use App\Repository\PostRepository;

use App\Entity\Post;

use App\Repository\UsersRepository;
use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Validator\Constraints;
use Symfony\Component\Validator\Constraints\DateTime;
use Symfony\Component\Validator\Constraints\DateTimeInterface;
use Twig\Environment;
use Symfony\Component\Security\Core\User\UserInterface;


class HomeController extends AbstractController
{

    // private $twig;

    // public function __construct($twig){
    //     $this->twig = $twig;
    // }


    /**
     * @Route("/home", name="app_home")
     */
    public function index(PostRepository $postRepository, UserRepository $usersRepository, AnnoncesRepository $annoncesRepository, Request $request)
    {
        // Récupération du User connecté dans la session
//        if ($user) {
//            return new Response(sprintf('Hello %s!', $user->getUsername())
//        }
//        dd($this->getUser()->getEmail());

        $data = new SearchData();
        $form = $this->createForm(SearchForm::class, $data);
        $form->handleRequest($request);


        $postSearch = $postRepository->findSearch($data);
        $userSearch = $usersRepository->findUserSearch();
        $annonceSearch = $annoncesRepository->findall();




        return $this->render('front/home/index.html.twig', [
            'controller_name' => 'HomeController',
            'postSearch' => $postSearch,
            'userSearch' => $userSearch,
            'annonceSearch' => $annonceSearch,
            'form' => $form->createView()
//            'userConnected' => $userConnected->getUsername(),
        ]);
    }


    /**
     * @Route("/mentions-legales", name="mentions")
     */
    public function mentions()
    {
        return $this->render('main/mentions.html.twig');
    }


    /**
     * @Route("/about", name="about", methods={"GET"})
     */
    public function about()
    {

        return $this->render('pages/about.html.twig');
      //return new Response('about');
    }


    /**
     * @Route("/privacy", name="privacy")
     */
    public function privacy()
    {
        return $this->render('pages/privacy.html.twig');
        //return new Response('privacy');
    }

    /**
     * @Route("/faq", name="faq")
     */
    public function faq()
    {
        return $this->render('pages/faq.html.twig');
    }

    /**
     * @Route("/infos", name="infos", methods={"GET"})
     */
    public function infosAction()
    {
        return $this->render('front/infos/infos.html.twig', array());
    //        return $this->render('@FrontSite/' . $this->getParameter("name_repo") . '/Infos/infos.html.twig', array());
    }

    /**
     * @Route("/cgu" , name="cgu")
     */
    public function cguAction()
    {
        return $this->render('front/cgu/cgu.html.twig');
//        return $this->render('front/Site/' . $this->getParameter("name_repo") . '/views/CGU/cgu.html.twig');
    }


    /**
     * @Route("/concept", name="concept")
     */
    public function conceptAction()
    {
        dump('conceptAction');

        return $this->render('front/concept/concept.html.twig', array());
//        return $this->render('@FrontSite/' . $this->getParameter("name_repo") . '/Concept/concept.html.twig', array());
    }


    /**
     * @Route("/faq", name="faq", methods={"GET"})
     */
    public function faqAction()
    {
        return $this->render('front/faq/faq.html.twig', array());
    }


    /**
     * @Route("/contact-send",  name="contact_send", methods={"POST"})
     *
     */
    public function contactSendAction(Request $request)
    {
    //get params

    dump('contactSendAction');

    $form = $request->request->get('contact');

    $phone = '';
    $name = $form['name'];
    if(isset($form['last_name'])){
        $name .= ' '. $form['last_name'];
    }
    if(isset($form['phone'])) {
        $phone = ' Phone : ' . $form['phone'];
    }


    $mail = $form['mail'];
    $subject = $form['action'];
    $message = $form['message'];



    if($mail == '' or $subject == '' or $message == ''){
        $this->get('session')->getFlashBag()->add(
            'error',
            ''
        );
        return $this->redirect($this->generateUrl('contact'));
    }

    $this->get('session')->getFlashBag()->add(
        'success',
        ''
    );

    $array['nameContact'] = $name;
    $array['mailContact'] = $mail;
    $array['messageContact'] = $message;
    $array['phone'] = $phone;

    $this->get('SendMail')->mailContact($message, $mail, $subject, $name);

    $this->get('SendMail')->SendTemplateValidContact($this->get('MailingTemplateManager')->getMailingTemplateByName('message'), $mail, '', $array);


    return $this->redirect($this->generateUrl('contact'));
    }


    /**
     * @Route("/team", name="team", methods={"GET"})
     */
    public function teamAction()
    {

    //        , Users $users, UsersRepository $usersrepo

    //        $users = $usersrepo->findAll();
    //        var_dump($users);
    //        die;
    //        $userInfos = $repository->findAll();
    //        $userAddress = $repository->findAll();

        return $this->render('front/team/team.html.twig');
//        return $this->render('front/Site/' . $this->getParameter("name_repo") . '/views/Team/team.html.twig');

    //        return $this->render('front/Site/' . $this->getParameter("name_repo") . '/views/Team/team.html.twig', [
    //            'users' => $users
    //        ]);

    }



    /**
     * @Route("/graph", name="graph")
     */
    public function graph()
    {
        return $this->render('main/graph/graph.html.twig');
    }

    /**
     * @Route("/graph1", name="graph1")
     */
    public function graph1()
    {
        return $this->render('main/graph/graph1.html.twig');
    }

    /**
     * @Route("/graph2", name="graph2")
     */
    public function graph2()
    {
        return $this->render('main/graph/graph2.html.twig');
    }

    /**
     * @Route("/graph3", name="graph3")
     */
    public function graph3()
    {
        return $this->render('main/graph/graph3.html.twig');
    }

    /**
     * @Route("/portfolio", name="portfolio")
     */
    public function portfolio()
    {
        $portfolioDenis = "https://www.denis-chanet.fr/";

        return $this->render('main/portfolio/index.html.twig', [
            'controller_name' => 'PortfolioController',
            'portfolioDenis' => $portfolioDenis
        ]);
    }

    /**
     * @Route("/forum", name="forum_index")
     */
    public function forum()
    {
        return $this->render('main/forum/index.html.twig');
    }



    /**
     * @Route("/auth/calendar", name="index_calendar")
     */
    public function calendar(CalendarRepository $calendar)
    {
        $events = $calendar->findAll();

//        dd($events);
        $rdvs = [];

        foreach($events as $event)
        {
            // $rdvs[] pour faire un ARRAY PUSH
            $rdvs[] = [
                'id' => $event->getId(),
                'start' => $event->getStart()->format('Y-m-d H:i:s'),
                'end' => $event->getEnd()->format('Y-m-d H:i:s'),
                'title' => $event->getTitle(),
                'allDay' => $event->getAllDay(),
                'description' => $event->getDescription(),
                'backgroundColor' => $event->getBackgroundColor(),
                'borderColor' => $event->getBorderColor(),
                'textColor' => $event->getTextColor(),
            ];
        }

        $data = json_encode($rdvs);

//        return $this->render('admin/calendar/index.html.twig', compact('data'));

        return $this->render('main/calendar/index.html.twig', [
            'data' => $data,
        ]);
//        return $this->render('main/calendar/index.html.twig');

    }


































}
