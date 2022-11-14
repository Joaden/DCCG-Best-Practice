<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\RegistrationFormType;
use App\Manager\UserManager;
use App\Security\EmailVerifier;
use App\Security\UsersAuthenticator;
use Psr\Log\LoggerInterface;

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
use Doctrine\Persistence\ManagerRegistry;

class ChangePasswordController extends AbstractController
{
    private $emailVerifier;

    public function __construct(EmailVerifier $emailVerifier, ManagerRegistry $doctrine)
    {
        $this->emailVerifier = $emailVerifier;
        $this->doctrine = $doctrine;
    }

    /**
     * @Route("/change/password/{expire}", name="change_password")
     */
    public function index($expire = false, Request $request, LoggerInterface $dbLogger, MailerInterface $mailer, UserManager $userManager): Response
    {
        $form = $this->createForm(ChangePasswordFormType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $user = $this->getUser();

            if ($user != null && $user->getIsVerified() == true)
            {
                $entityManager = $this->doctrine->getManager();
                
                $user = $userManager->addNewPassword($user, $form->get('plainPassword')->getData());

                $mailAdmin = $entityManager->getRepository(User::class)->getAdminMails();

                $entityManager->flush();

                $userlogged = $user->getFullName();
                $dbLogger->info('Change password User id:'.$user->getId().' by '.$userlogged);

                if(false === empty($mailAdmin))
                {
                    // generate a signed url and email it to the user
                    $this->emailVerifier->sendEmailConfirmation('app_verify_email', $user,
                    // $email = (new TemplatedEmail())
                        (new TemplatedEmail())
                        ->from(new Address('no-reply-dao-cnt@outlook.fr', 'Blog Dao Cnt'))
                        ->to($user->getEmail())
                        ->subject('Votre mot de passe a bien été changé')
                        ->htmlTemplate('registration/confirmation_email.html.twig')
                    );
                    // $mailer->send($email);
                }
                $this->addFlash('success', 'Mot de passe changé avec succès');
            }
            return $this->redirectToRoute('security_login');
        }

        return $this->render('change_password/index.html.twig', [
            'form' => $form->createView(),
            'expire' => $expire,
        ]);
    }
}
