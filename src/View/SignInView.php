<?php

namespace App\View;

use App\Model\User;
use Cda0521Framework\Html\AbstractView;

/**
 * Vue permettant d'afficher la page du sujet
 */
class SignInView extends AbstractView
{
    public function __construct() {
        parent::__construct('Se connecter');
    }
    /**
     * Génére le corps de la page HTML
     *
     * @see AbstractView::renderBody()
     * @return void
     */
    protected function renderBody(): void
    {
        // Affiche le contenu de la balise body
        include './templates/signIn.php';
    }
}
