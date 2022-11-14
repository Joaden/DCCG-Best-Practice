<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\RegistrationFormType;
use App\Manager\UserManager;
use App\Security\EmailVerifier;
use App\Security\UsersAuthenticator;
use Psr\Log\LoggerInterface;
use Doctrine\Persistence\ManagerRegistry;

use App\Repository\UserRepository;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Address;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasher;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use SymfonyCasts\Bundle\VerifyEmail\Exception\VerifyEmailExceptionInterface;
use Symfony\Component\Security\Guard\GuardAuthenticatorHandler;

class RegistrationController extends AbstractController
{
    private $emailVerifier;

    public function __construct(EmailVerifier $emailVerifier, ManagerRegistry $doctrine)
    {
        $this->emailVerifier = $emailVerifier;
        $this->doctrine = $doctrine;
    }

    /**
     * @Route("/register", name="app_register")
     */
    public function register(Request $request, LoggerInterface $dbLogger, MailerInterface $mailer, UserPasswordHasherInterface $PasswordHasher, UserManager $userManager , UserPasswordEncoderInterface $passwordEncoder,  GuardAuthenticatorHandler $guardHandler): Response
    {
        $user = new User();
        $form = $this->createForm(RegistrationFormType::class, $user);
        $form->handleRequest($request);


        if ($form->isSubmitted() && $form->isValid()) {

            $entityManager = $this->doctrine->getManager();
            dump('before createNewUser');
           $password =  $user->setPassword(
            $passwordEncoder->encodePassword(
                $user,
                $form->get('plainPassword')->getData()));
        //    $user = $userManager->createNewUser($user, $form->get('plainPassword')->getData());

            dump('before Mail Admin');

         // get admin mails
            $mailAdmin = $entityManager->getRepository(User::class)->getAdminMails();
            dump('After Get Mail Admin');
//            dd($mailAdmin);
            //$mailAdmin = 'dao.cnt@outlook.fr';

            dump('FLUSH');
            $user->setRoles(['ROLE_USER']);
            $entityManager = $this->doctrine->getManager();
            $entityManager->persist($user);
            $entityManager->flush();
            $this->addFlash('success', 'Compte créé avec succès!');


            if(false === empty($mailAdmin))
            {

                dump($mailAdmin);

                // generate a signed url and email it to the user
                $this->emailVerifier->sendEmailConfirmation('app_verify_email', $user,
                // $email = (new TemplatedEmail())
                    (new TemplatedEmail())
                    ->from(new Address('no-reply-dao-cnt@outlook.fr', 'Blog Dao Cnt'))
                    ->to($user->getEmail())
                    ->subject('Veuillez confirmer votre email')
                    ->htmlTemplate('registration/confirmation_email.html.twig')

                );
                dump('mailer->send');

                //$mailer->send($email);

            }

                // if ($this->getUser() != null)
                // {
                //     $userlogged = $this->getUser()->getFullName();
                //     $postID = $request->get('post')->getId();
                //
                //     $dbLogger->info('Create User id:'.$postID.' by '.$userlogged);
                // } else {
                //     $dbLogger->error('Edit post id:'.$postID.' by an UNKNOW');
                //
                // }
            $this->addFlash('success', 'Un mail de confirmation vous a été envoyé, merci de valider votre compte');

            //$this->addFlash('warning', 'Compte doit être validé par email!');

            return $this->redirectToRoute('security_login');
        }

        return $this->render('registration/register.html.twig', [
            'registrationForm' => $form->createView(),
        ]);
    }


    /**
     * @Route("/verify/email", name="app_verify_email")
     */
    public function verifyUserEmail(Request $request, UserRepository $userRepository): Response
    {
        dump('function verifyUserEmail ');

        $id = $request->get('id');

        if (null === $id) {
            return $this->redirectToRoute('app_register');
        }

        $user = $userRepository->find($id);

        if (null === $user) {
            return $this->redirectToRoute('app_register');
        }
        dump('emailVerifier->handleEmailConfirmation');

        // validate email confirmation link, sets User::isVerified=true and persists
        try {
            $this->emailVerifier->handleEmailConfirmation($request, $user);
        } catch (VerifyEmailExceptionInterface $exception) {
            $this->addFlash('verify_email_error', $exception->getReason());

            return $this->redirectToRoute('app_register');
        }

        // @TODO Change the redirect on success and handle or remove the flash message in your templates
        $this->addFlash('success', 'Your email address has been verified.');

        return $this->redirectToRoute('app_register');
    }
}
