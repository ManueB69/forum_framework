<?php

namespace App\Controller;

use App\Model\User;
use App\View\UserView;
use App\View\NewUserView;
use Cda0521Framework\Html\AbstractView;
use Cda0521Framework\Interfaces\HttpResponse;
use Cda0521Framework\Exception\NotFoundException;
use Cda0521Framework\Interfaces\ControllerInterface;

/**
 * Contrôleur permettant d'afficher la page de gestion de compte
 */
class UserController implements ControllerInterface
{   
    /**
     * Examine la requête HTTP et prépare une réponse HTTP adaptée
     *
     * @see ControllerInterface::invoke()
     * @return HttpResponse
     */
    public function invoke(): HttpResponse
    {
        if(!isset($_SESSION['id_user'])) {
            return new NewUserView();
        }
        $user=User::findById($_SESSION['id_user']);
        return new UserView($user);
    }
}
