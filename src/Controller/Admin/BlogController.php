<?php

/*
 * Created by PhpStorm.
 * User: chane
 * Date: 18/12/2021
 * Time: 00:51
 */

namespace App\Controller\Admin;

use App\Entity\Post;
use App\Form\PostType;
use App\Repository\PostRepository;
use App\Security\PostVoter;
use Psr\Log\LoggerInterface;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Controller used to manage blog contents in the backend.
 *
 * Please note that the application backend is developed manually for learning
 * purposes. However, in your real Symfony application you should use any of the
 * existing bundles that let you generate ready-to-use backends without effort.
 *
 * See http://knpbundles.com/keyword/admin
 *
 * @Route("/admin/post")
 * @IsGranted("ROLE_ADMIN")
 */
class BlogController extends AbstractController
{
//    private $logger;
//
//    public function __construct(LoggerInterface $dbLogger)
//    {
//        $this->logger = $logger;
//
//    }

    /**
     * Lists all Post entities.
     *
     * This controller responds to two different routes with the same URL:
     *   * 'admin_post_index' is the route with a name that follows the same
     *     structure as the rest of the controllers of this class.
     *   * 'admin_index' is a nice shortcut to the backend homepage. This allows
     *     to create simpler links in the templates. Moreover, in the future we
     *     could move this annotation to any other controller while maintaining
     *     the route name and therefore, without breaking any existing link.
     *
     * @Route("/", methods="GET", name="admin_index")
     * @Route("/", methods="GET", name="admin_post_index")
     */
    public function index(PostRepository $posts): Response
    {
        $authorPosts = $posts->findBy(['author' => $this->getUser()], ['publishedAt' => 'DESC']);

        return $this->render('admin/blog/index.html.twig', ['posts' => $authorPosts]);
    }

    /**
     * Creates a new Post entity.
     *
     * @Route("/new", methods="GET|POST", name="admin_post_new")
     *
     * NOTE: the Method annotation is optional, but it's a recommended practice
     * to constraint the HTTP methods each controller responds to (by default
     * it responds to all methods).
     */
    public function new(Request $request, LoggerInterface $dbLogger): Response
    {
        $post = new Post();
        $post->setAuthor($this->getUser());

        // See https://symfony.com/doc/current/form/multiple_buttons.html
        $form = $this->createForm(PostType::class, $post)
            ->add('saveAndCreateNew', SubmitType::class);

        $form->handleRequest($request);

        // the isSubmitted() method is completely optional because the other
        // isValid() method already checks whether the form is submitted.
        // However, we explicitly add it to improve code readability.
        // See https://symfony.com/doc/current/forms.html#processing-forms
//        Using Validator Service
//        use Symfony\Component\Validator\Validator\ValidatorInterface;
//        $errors = $validator->validate($author);
//
//        if (count($errors) > 0) {
//            /*
//             * Uses a __toString method on the $errors variable which is a
//             * ConstraintViolationList object. This gives us a nice string
//             * for debugging.
//             */
//            $errorsString = (string) $errors;
//
//            return new Response($errorsString);
//        }
//////////// Second Validation
//        use Symfony\Component\Validator\Validation;
//        $validator = Validation::createValidator();
//        $violations = $validator->validate($article, [
//            new Length(['min' => 10]),
//            new NotBlank(),
//        ]);
//
//        if (0 !== count($violations)) {
//            // Affiche les erreurs
//            foreach ($violations as $violation) {
//                echo $violation->getMessage().'<br>';
//            }
//        }

        if ($form->isSubmitted() && $form->isValid()) {

            // On récupère l'image transmise
            $images = $form->get('image')->getData();

            // On traite les img dans une boucle
            if ($images) {
                foreach($images as $image){
                    // On génère un nouveau nom de fichier (guessExtension get le .jpg/png etc..)
//                    $filename = bin2hex(random_bytes(6)).'.'.$image->guessExtension();
                    $fichier = md5(uniqid()) . 'post.' . $image->guessExtension();

                    // On copie le fichier dans le dossier uploads
                    // Move the file to the directory where brochures are stored
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
                    $post->setImage($fichier);
                }
            }

            if ($this->getUser() != null)
            {
                $userlogged = $this->getUser()->getFullName();
                $dbLogger->info('Create post by '.$userlogged);
            } else {
                $dbLogger->error('create post by a UNKNOW');

            }

            $em = $this->getDoctrine()->getManager();
            $em->persist($post);
            $em->flush();

            // Flash messages are used to notify the user about the result of the
            // actions. They are deleted automatically from the session as soon
            // as they are accessed.
            // See https://symfony.com/doc/current/controller.html#flash-messages
            $this->addFlash('success', 'post.created_successfully');

            if ($form->get('saveAndCreateNew')->isClicked()) {
                return $this->redirectToRoute('admin_post_new');
            }

            return $this->redirectToRoute('admin_post_index');
        }

        return $this->render('admin/blog/new.html.twig', [
            'post' => $post,
            'form' => $form->createView(),
        ]);
    }

    /**
     * Finds and displays a Post entity.
     *
     * @Route("/{id<\d+>}", methods="GET", name="admin_post_show")
     */
    public function show(Post $post, LoggerInterface $dbLogger): Response
    {
        // This security check can also be performed
        // using an annotation: @IsGranted("show", subject="post", message="Posts can only be shown to their authors.")
        $this->denyAccessUnlessGranted(PostVoter::SHOW, $post, 'Posts can only be shown to their authors.');

        return $this->render('admin/blog/show.html.twig', [
            'post' => $post,
        ]);
    }

    /**
     * Displays a form to edit an existing Post entity.
     *
     * @Route("/{id<\d+>}/edit", methods="GET|POST", name="admin_post_edit")
     * @IsGranted("edit", subject="post", message="Posts can only be edited by their authors.")
     */
    public function edit(Request $request, Post $post, LoggerInterface $dbLogger): Response
    {
        $form = $this->createForm(PostType::class, $post);
        $form->handleRequest($request);
        //  A tester
//        if ($this->getUser() !== $article->getAuthor() || !$this->isGranted('ROLE_ADMIN')) {
//            throw $this->createAccessDeniedException();
//        }

        if ($form->isSubmitted() && $form->isValid()) {

            // On récupère les images transmises
            $images = $form->get('image')->getData();

            // On traite les img dans une boucle
            foreach($images as $image){
                // On génère un nouveau nom de fichier (guessExtension get le .jpg/png etc..)
                $fichier = md5(uniqid()) . 'post.' . $image->guessExtension();

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
                $post->setImage($fichier);
                // On stock l'image dans la base de donnée(Images)
//                $img = new Images();
//                $img->setName($fichier);
//                $annonce->addImagesAnnonce($img);
            }
            $this->getDoctrine()->getManager()->flush();


            if ($this->getUser() != null)
            {
                $userlogged = $this->getUser()->getFullName();
                $postID = $request->get('post')->getId();

                $dbLogger->info('Edit post id:'.$postID.' by '.$userlogged);
            } else {
                $dbLogger->error('Edit post id:'.$postID.' by an UNKNOW');

            }

            $this->addFlash('success', 'post.updated_successfully');

            return $this->redirectToRoute('admin_post_edit', ['id' => $post->getId()]);
        }

        return $this->render('admin/blog/edit.html.twig', [
            'post' => $post,
            'form' => $form->createView(),
        ]);
    }

    /**
     * Deletes a Post entity.
     *
     * @Route("/{id}/delete", methods="POST", name="admin_post_delete")
     * @IsGranted("delete", subject="post")
     */
    public function delete(Request $request, Post $post, LoggerInterface $dbLogger): Response
    {
        if (!$this->isCsrfTokenValid('delete', $request->request->get('token'))) {
            return $this->redirectToRoute('admin_post_index');
        }

        // Delete the tags associated with this blog post. This is done automatically
        // by Doctrine, except for SQLite (the database used in this application)
        // because foreign key support is not enabled by default in SQLite
        $post->getTags()->clear();

        if ($this->getUser() != null)
        {
            $userlogged = $this->getUser()->getFullName();
            $postID = $request->get('post')->getId();

            $dbLogger->info('Delete post id:'.$postID.' by '.$userlogged);
        } else {
            $dbLogger->error('Delete post id:'.$postID.' by an UNKNOW');

        }

        $em = $this->getDoctrine()->getManager();
        $em->remove($post);
        $em->flush();

        $this->addFlash('success', 'post.deleted_successfully');

        return $this->redirectToRoute('admin_post_index');
    }
}
