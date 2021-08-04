<?php

namespace App\Controller;

use App\Model\User;
use App\View\UserView;
use App\View\NewUserView;
use Cda0521Framework\Html\AbstractView;
use Cda0521Framework\Http\RedirectResponse;
use Cda0521Framework\Interfaces\HttpResponse;
use Cda0521Framework\Exception\NotFoundException;
use Cda0521Framework\Interfaces\ControllerInterface;

/**
 * Contrôleur permettant d'afficher la page de gestion de compte
 */
class NewUserController implements ControllerInterface
{   
    /**
     * Examine la requête HTTP et prépare une réponse HTTP adaptée
     *
     * @see ControllerInterface::invoke()
     * @return HttpResponse
     */
    public function invoke(): HttpResponse
    {
        //TODO vérif données reçues valides et conformes à BDD + gestion erreurs si ça n'est pas le cas
        $user=new User (null, $_POST['username'], $_POST['pwd']);
        $user->save();
        $_SESSION['id_user']=$user->getId();
        return new RedirectResponse('/');
    }
}
