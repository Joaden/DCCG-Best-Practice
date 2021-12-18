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

        return $this->render('admin/blog/show.html.twig', [
            'user' => $user,
        ]);
    }
























}
