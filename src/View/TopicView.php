<?php

namespace App\View;

use App\Model\Message;
use Cda0521Framework\Html\AbstractView;

/**
 * Vue permettant d'afficher la page du sujet
 */
class TopicView extends AbstractView
{
    /**
     * Tableau d'objets de classe Message correspondants au topic fourni par le client
     */
    protected array $messages;
    
    /**
     * Crée une vue utilisant l'ensemble des objets Message correspondants au topic fourni par le client 
     *
     * @param array[Message] $messages
     */
    public function __construct($messages)
    {
        parent::__construct('Sujet');
        $this->messages = $messages;
    }

    /**
     * Génére le corps de la page HTML
     *
     * @see AbstractView::renderBody()
     * @return void
     */
    protected function renderBody(): void
    {
        $messages = $this->messages;
        // Affiche le contenu de la balise body
        include './templates/topic.php';
    }
}
