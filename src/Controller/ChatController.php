<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


/**
 * Class ChatController
 * @package App\Controller
 * @Route("user")
 */
class ChatController extends AbstractController
{
    /**
     * @Route("/chat", name="chat")
     */
    public function index(): Response
    {
        return $this->render('main/chat/index.html.twig', [
            'controller_name' => 'ChatController',
        ]);
    }


    /**
     * @Route("/chat1", name="chat1")
     */
    public function chat()
    {
        // Si e submit est fait
        if(isset($_POST['formconnexion']))
        {
            $emailConnect = htmlspecialchars($_POST['email']);
            $password = htmlspecialchars($_POST['mdp']);
            $passwordHashed = password_hash($password, PASSWORD_DEFAULT);
            $captchaConnect = htmlspecialchars($_POST['captcha']);

            $passwordConnect = password_verify($password, $passwordHashed);

            if(!empty($_POST['email']) AND !empty($_POST['mdp']) AND !empty($_POST['captcha']))
            {

                if($_POST['captcha']=="10")
                {
                    // Requete pour vérifier si les identifiants correspondent et existent
                    $reqUser = $bdd->prepare("SELECT * FROM users WHERE email = :email ");
                    $reqUser->execute(array('email' => $_POST['email']));
                    $result = $reqUser->fetch();
                    if ($result && password_verify($_POST['mdp'], $result['password']))
                    {
                        // Si les verif passent bien on pourra utiliser ces variables de session pour avoir les info du user connecté
                        $_SESSION['id'] = $result['id'];
                        $_SESSION['pseudo'] = $result['pseudo'];
                        $_SESSION['email'] = $result['email'];
                        // echo "id = ".$result['id']."<br>";
                        // echo "name = ".$result['name']."<br>";
                        // echo "pseudo = ".$result['pseudo']."<br>";
                        // echo "email = ".$result['email']."<br>";
                        // echo "Valide = ".$result['is_verified']."<br>";
                        // die();
                        header("Location: profil.php?id=".$_SESSION['id']);
                    }

                    // $reqUser = $bdd->prepare("SELECT * FROM users WHERE email = ? AND password = ?");
                    // $reqUser->execute(array($emailConnect, $passwordConnect));
                    // $userExist = $reqUser->rowCount();
                    // if($userExist == 1)
                    // {
                    //     $userInfo = $reqUser->fetch();
                    //     $_SESSION['id'] = $userInfo['id'];
                    //     $_SESSION['pseudo'] = $userInfo['pseudo'];
                    //     $_SESSION['email'] = $userInfo['email'];
                    //     header("Location: profil.php?id".$_SESSION['id']);

                    // }
                    else
                    {
                        $erreur = "Identifiants invalides";
                    }
                }
                else
                {
                    // erreur captcha
                    $erreur = "Veuillez renseigner la bonne réponse";
                }

            }
            else{
                // $erreurs = 1;
                $erreur = "Tous les champs doivent être complétés";
            }
        }


        return $this->render('main/chat/index.html.twig');
    }

    /**
     * @Route("/chat/salon-open", name="chatAction")
     */
    public function chatAction()
    {
        return $this->render('main/chat/chat.html.twig');
    }


}
