<?php

namespace App\View;

use App\Model\User;
use App\Model\Message;
use Cda0521Framework\Html\AbstractView;

/**
 * Vue permettant d'afficher la page du sujet
 */
class UserView extends AbstractView
{
    /**
     * Objet user à modifier
     */
    protected User $user;
    
    /**
     * Crée une vue utilisant le user à modifier 
     *
     * @param User $user
     */
    public function __construct($user)
    {
        parent::__construct('Modification du compte');
        $this->user = $user;
    }

    /**
     * Génére le corps de la page HTML
     *
     * @see AbstractView::renderBody()
     * @return void
     */
    protected function renderBody(): void
    {
        $user = $this->user;
        // Affiche le contenu de la balise body
        include './templates/editUser.php';
    }
}
