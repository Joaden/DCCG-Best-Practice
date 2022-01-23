<?php

namespace App\Controller;

use App\Form\ContactType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Mailer\Mailer;
use Symfony\Component\Mime\Email;
use Symfony\Component\Routing\Annotation\Route;

class ContactController extends AbstractController
{
    /**
     * @Route("/contact-form", name="contact_form")
     */
    public function index(Request $request)
    {
        $form = $this->createForm(ContactType::class);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $contact = $form->getData();

            // ici on envoi le mail
//            $message = (new \Mailer_message('Nouveau Contact'))
            $email = (new Email())
                // expéditeur
                ->from($contact['email'])
                // destinataire
                ->to('test42@gmail.com')
                ->cc('dao.cnt@outlook.fr')
                //->bcc('exemple@mail.com')
                //->replyTo('test42@gmail.com')
                ->priority(Email::PRIORITY_HIGH)
                ->subject('I love Me')
                // If you want use text mail only
                ->text('Lorem ipsum...')
                // Raw html
                ->html('<h1>Lorem ipsum</h1> <p>...</p>')
            ;
//            dd($contact);

        }
        return $this->render('contact/index.html.twig', [
            'contactForm' => $form->createView(),
        ]);
    }










}
