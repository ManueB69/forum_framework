<?php

namespace App\Controller;

use Exception;
use App\Model\User;
use App\View\SignInView;
use Cda0521Framework\Http\RedirectResponse;
use Cda0521Framework\Interfaces\HttpResponse;
use Cda0521Framework\Interfaces\ControllerInterface;



/**
 * Contrôleur permettant d'afficher la page d'accueil
 */
class SignInController implements ControllerInterface
{
    /**
     * Examine la requête HTTP et prépare une réponse HTTP adaptée
     *
     * @see ControllerInterface::invoke()
     * @return HttpResponse
     */
    public function invoke(): HttpResponse
    {
        // Si l'utilisateur n'a pas encore essayé de se connecter, affiche la page "se connecter"
        if(!isset($_POST['username'])) { 
            return new SignInView();
        }
        
        // Récupère l'objet User correspondant au username fourni par le client
        $user = User::findWhere('user_name', $_POST['username']);
         //S'il n'y a pas de compte avec ce nom, renvoie une erreur
        if(is_null($user)) {
            throw new Exception('User does not exist');
        }
        // Si le mot de passe fourni par le client correspond pas à celui du user,
        // enregistre l'objet user dans la variable globale SESSION et redirige à l'acceuil
        if($_POST['pwd'] === $user[0]->getPwd()) {
            $_SESSION['user']=$user;
            return new RedirectResponse('/');
        // sinon renvoie une erreur
        } else {
            throw new Exception('Password does not match username');
        }

    }
}
