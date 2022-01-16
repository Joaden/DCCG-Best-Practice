<?php

/*
 * Created by PhpStorm.
 * User: chane
 * Date: 18/12/2021
 * Time: 00:51
 */

namespace App\Controller;

use App\Form\Type\ChangePasswordType;
use App\Entity\User;
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
use Dompdf\Options;
use Dompdf\Dompdf;

/**
 * Controller used to manage current user.
 *
 * @Route("/profile")
 * @IsGranted("ROLE_USER")
 *
 */
class UserController extends AbstractController
{
    /**
     * @Route("/{id<\d+>}/edit", methods="GET|POST", name="user_edit")
     */
    public function edit(Request $request, User $user): Response
    {
//        $user = new User();
//        $user = $this->getUser();

        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            ///// ADD AVATAR
             // On récupère l'image transmise
            $avatars = $form->get('avatar')->getData();

            // On traite les img dans une boucle
            if ($avatars) {
                foreach($avatars as $avatar){
                    // On génère un nouveau nom de fichier (guessExtension get le .jpg/png etc..)
                    $fichier = md5(uniqid()) . 'avatar.' . $avatar->guessExtension();

                    // On copie le fichier dans le dossier uploads
                    // Move the file to the directory where brochures are stored
                    try {
                        $avatar->move(
                            $this->getParameter('images_directory'),
                            $fichier
                        );
                    } catch (FileException $e) {
                    // ... handle exception if something happens during file upload
                        echo $e->getMessage();
                    }
                    // On stock l'image dans la base de donnée(son nom)
                    // instead of its contents
                    $user->setAvatar($fichier);
                }
            }
            $this->getDoctrine()->getManager()->flush();
            $this->addFlash('success', 'user.updated_successfully');

            return $this->redirectToRoute('user_edit', ['id' => $user->getId()]);
        }

        return $this->render('user/edit.html.twig', [
            'user' => $user,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/change-password", methods="GET|POST", name="user_change_password")
     */
    public function changePassword(Request $request, UserPasswordHasherInterface $hasher): Response
    {
        $user = $this->getUser();

        $form = $this->createForm(ChangePasswordType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $user->setPassword($hasher->hashPassword($user, $form->get('newPassword')->getData()));

            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('security_logout');
        }

        return $this->render('user/change_password.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
