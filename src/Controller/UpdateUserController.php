<?php

namespace App\Controller;

use Exception;
use App\Model\User;
use App\View\UserView;
use Cda0521Framework\Html\AbstractView;
use Cda0521Framework\Http\RedirectResponse;
use Cda0521Framework\Interfaces\HttpResponse;
use Cda0521Framework\Exception\NotFoundException;
use Cda0521Framework\Interfaces\ControllerInterface;

/**
 * Contrôleur permettant d'afficher la page de gestion de compte
 */
class UpdateUserController implements ControllerInterface
{   
    /**
     * Examine la requête HTTP et prépare une réponse HTTP adaptée
     *
     * @see ControllerInterface::invoke()
     * @return HttpResponse
     */
    public function invoke(): HttpResponse
    {
        $user=User::findById($_SESSION['id_user']);
        //TODO vérif données reçues valides et conformes à BDD + gestion erreurs si ça n'est pas le cas
        $user->setUserName($_POST['username']);
        $user->setPwd($_POST['pwd_new']);
        $user->save();
        return new RedirectResponse('/');
    }
}
