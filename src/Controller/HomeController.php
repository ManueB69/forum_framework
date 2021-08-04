<?php

namespace App\Controller;

use App\Model\Topic;
use App\View\HomeView;
use Cda0521Framework\Html\AbstractView;
use Cda0521Framework\Interfaces\HttpResponse;
use Cda0521Framework\Interfaces\ControllerInterface;

/**
 * Contrôleur permettant d'afficher la page d'accueil
 */
class HomeController implements ControllerInterface
{
    /**
     * Examine la requête HTTP et prépare une réponse HTTP adaptée
     *
     * @see ControllerInterface::invoke()
     * @return HttpResponse
     */
    public function invoke(): HttpResponse
    {
        // Récupère l'ensemble des topics dans la base de données
        $topics = Topic::findAll();
        return new HomeView($topics);
    }
}
