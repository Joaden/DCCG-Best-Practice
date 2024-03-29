<?php

namespace App\Controller;

use App\Manager\UserManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Component\Security\Http\Util\TargetPathTrait;

/**
 * Controller used to manage the application security.
 * See https://symfony.com/doc/current/security/form_login_setup.html.
 */
class SecurityController extends AbstractController
{
    use TargetPathTrait;

    /**
     * @Route("/login", name="security_login")
     */
    public function login(Request $request, UserManager $userManager, Security $security, AuthenticationUtils $helper): Response
    {
        // if user is already logged in, don't display the login page again
        if($security->isGranted('ROLE_MODERATOR')) {
            return $this->redirectToRoute('moderator_index');
        }

        if ($security->isGranted('ROLE_USER')) {

//            $user = $this->getUser();
//            $user = $userManager->saveDateLastLog($user->getUser());
//            $user->$userManager->saveDateLastLog($user);
            $this->addFlash('success', 'connexion successfully');

            return $this->redirectToRoute('blog_index');
        }

        // this statement solves an edge-case: if you change the locale in the login
        // page, after a successful login you are redirected to a page in the previous
        // locale. This code regenerates the referrer URL whenever the login page is
        // browsed, to ensure that its locale is always the current one.
        $this->saveTargetPath($request->getSession(), 'main', $this->generateUrl('admin_index'));

        return $this->render('security/login.html.twig', [
            // last username entered by the user (if any)
            'last_username' => $helper->getLastUsername(),
            // last authentication error (if any)
            'error' => $helper->getLastAuthenticationError(),
        ]);
    }

    /**
     * This is the route the user can use to logout.
     *
     * But, this will never be executed. Symfony will intercept this first
     * and handle the logout automatically. See logout in config/packages/security.yaml
     *
     * @Route("/logout", name="security_logout")
     */
    public function logout(): void
    {
        $this->addFlash('success', 'Vous êtes bien déconnecté merci de votre visite');
//
//        return $this->render('security/login.html.twig');
        throw new \Exception('This should never be reached!');
    }

    /**
     * @param Request $request
     * @return mixed
     * @Route("/dropsession", name="security_drop_session")
     */
    public function compteActionLogout( Request $request)
    {
        $maxIdleTime=60;
        $session = $request->getSession();

        if (time() - $session->getMetadataBag()->getLastUsed() > $maxIdleTime) {
            var_dump($maxIdleTime);
            dd($session->getMetadataBag()->getLastUsed());
            $session->invalidate();
            $session->clear();

//            dd($session->getMetadataBag()->getLastUsed());
            $this->addFlash('success', 'Vous êtes bien déconnecté merci de votre visite');

            return $this->redirectToRoute('security_login');
        }
        else {
            // le contenu de mon action
            var_dump("else");
            dd($session);
        }
    }






}
