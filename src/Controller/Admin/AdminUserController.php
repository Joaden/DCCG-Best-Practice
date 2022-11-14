<?php

/**
 * Created by PhpStorm.
 * User: chane
 * Date: 18/12/2021
 * Time: 00:51
 */


namespace App\Controller\Admin;

use App\Entity\User;
use App\Form\Type\ChangePasswordType;
use App\Form\UserType;
use App\Repository\UserRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Contracts\Cache\CacheInterface;
use Symfony\Contracts\Cache\ItemInterface;
use App\Security\EmailVerifier;
use App\Security\UsersAuthenticator;
use Psr\Log\LoggerInterface;
use Doctrine\Persistence\ManagerRegistry;


/**
 * Controller used to manage current user.
 *
 * @Route("/admin/user")
 * @IsGranted("ROLE_ADMIN")
 *
 */
class AdminUserController extends AbstractController
{
    
    private $emailVerifier;

    public function __construct(EmailVerifier $emailVerifier, ManagerRegistry $doctrine)
    {
        $this->emailVerifier = $emailVerifier;
        $this->doctrine = $doctrine;
    }


   /**
    * @Route("/", methods="GET", name="admin_index")
    * @Route("/", methods="GET", name="admin_user_index")
    */
    public function index(UserRepository $user, CacheInterface $cache)
    {
//        $users = $user->findAll(['Membre' => $this->getUser()]);
        $users = $cache->get('list-users', function(ItemInterface $items) use($user)
        {
            $items->expiresAfter(3600);
            return $user->findAll(['Membre' => $this->getUser()]);
        });
        return $this->render('admin/user/index.html.twig', ['users' => $users]);

    }

    /**
     * Finds and displays a User entity.
     *
     * @Route("/{id<\d+>}", methods="GET", name="admin_user_show")
     */
    public function show(User $user): Response
    {
        // This security check can also be performed
        // using an annotation: @IsGranted("show", subject="post", message="Posts can only be shown to their authors.")
//        $this->denyAccessUnlessGranted(PostVoter::SHOW, $user, 'Posts can only be shown to their authors.');

        return $this->render('admin/user/show.html.twig', [
            'user' => $user,
        ]);
    }


/**
 * Displays a form to edit an existing User entity.
 *
 * @Route("/{id<\d+>}/edit", methods="GET|POST", name="admin_user_edit")
 * @IsGranted("edit", subject="user", message="User can only be edited by their authors.")
 */
public function edit(Request $request, User $user): Response
    {
        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            // On récupère les images transmises
            $images = $form->get('avatar')->getData();

            // On traite les img dans une boucle
            foreach($images as $image){
                // On génère un nouveau nom de fichier (guessExtension get le .jpg/png etc..)
                $fichier = md5(uniqid()) . 'user.' . $image->guessExtension();

                // On copie le fichier dans le dossier uploads
                try {
                    $image->move(
                        $this->getParameter('images_directory'),
                        $fichier
                    );
                } catch (FileException $e) {
                    // ... handle exception if something happens during file upload
                }
                // On stock l'image dans la base de donnée(son nom)
                //                // instead of its contents
                $user->setAvatar($fichier);
                // On stock l'image dans la base de donnée(Images)
//                $img = new Images();
//                $img->setName($fichier);
//                $annonce->addImagesAnnonce($img);
            }
            $this->doctrine->getManager()->flush();

            $this->addFlash('success', 'post.updated_successfully');

            return $this->redirectToRoute('admin_user_edit', ['id' => $user->getId()]);
        }

        return $this->render('admin/user/edit.html.twig', [
            'user' => $user,
            'form' => $form->createView(),
        ]);
    }

    /**
     * Deletes a User entity.
     *
     * @Route("/{id}/delete", methods="POST", name="admin_user_delete")
     * @IsGranted("delete", subject="user")
     */
    public function delete(Request $request, User $user): Response
    {
        if (!$this->isCsrfTokenValid('delete', $request->request->get('token'))) {
            return $this->redirectToRoute('admin_user_index');
        }

        // Delete the tags associated with this blog post. This is done automatically
        // by Doctrine, except for SQLite (the database used in this application)
        // because foreign key support is not enabled by default in SQLite
        $user->getTags()->clear();

        $em = $this->doctrine->getManager();
        $em->remove($user);
        $em->flush();

        $this->addFlash('success', 'user.deleted_successfully');

        return $this->redirectToRoute('admin_user_index');
    }


/**
 * Allowed user
 *
 * @Route("/{id<\d+>}/", methods="GET|POST", name="admin_user_allowed")
 */
public function allowed(Request $request): Response
    {
        $message = "Error inconnue";
        $success = false;
        $html = false;

        $user = $this->doctrine->getRepository(User::class)->find($request->get('data'));

        $this->doctrine->getManager()->flush();

        $this->addFlash('success', 'post.updated_successfully');

        return new JsonResponse(['message' => $message, 'success' => $success, 'html' => $html, 'id' => $user->getId()]);

    }






















}
