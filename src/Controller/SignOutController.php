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
class SignOutController implements ControllerInterface
{
    /**
     * Examine la requête HTTP et prépare une réponse HTTP adaptée
     *
     * @see ControllerInterface::invoke()
     * @return HttpResponse
     */
    public function invoke(): HttpResponse
    {
        unset($_SESSION['id_user']);
        return new RedirectResponse('/signin');
    }
}
