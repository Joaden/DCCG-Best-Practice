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
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\File\UploadedFile;


/**
 * Controller used to manage current user.
 *
 * @Route("/admin/user")
 * @IsGranted("ROLE_ADMIN")
 *
 */
class AdminUserController extends AbstractController
{
   /**
    * @Route("/", methods="GET", name="admin_index")
    * @Route("/", methods="GET", name="admin_user_index")
    */
    public function index(UserRepository $user)
    {
        $users = $user->findAll(['Membre' => $this->getUser()]);
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
//        $this->denyAccessUnlessGranted(PostVoter::SHOW, $post, 'Posts can only be shown to their authors.');

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

            // On r??cup??re les images transmises
            $images = $form->get('avatar')->getData();

            // On traite les img dans une boucle
            foreach($images as $image){
                // On g??n??re un nouveau nom de fichier (guessExtension get le .jpg/png etc..)
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
                // On stock l'image dans la base de donn??e(son nom)
                //                // instead of its contents
                $user->setAvatar($fichier);
                // On stock l'image dans la base de donn??e(Images)
//                $img = new Images();
//                $img->setName($fichier);
//                $annonce->addImagesAnnonce($img);
            }
            $this->getDoctrine()->getManager()->flush();

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

        $em = $this->getDoctrine()->getManager();
        $em->remove($user);
        $em->flush();

        $this->addFlash('success', 'user.deleted_successfully');

        return $this->redirectToRoute('admin_user_index');
    }























}
