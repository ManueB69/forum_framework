<?php

namespace App\View;

use App\Model\Topic;
use App\Model\Message;
use Cda0521Framework\Html\AbstractView;

/**
 * Vue permettant d'afficher la page du sujet
 */
class EditTopicView extends AbstractView
{
    /**
     * Objet topic à modifier
     */
    protected Topic $topic;
    
    /**
     * Crée une vue utilisant le topic à modifier 
     *
     * @param Topic $topic
     */
    public function __construct($topic)
    {
        parent::__construct('Modification du sujet');
        $this->topic = $topic;
    }

    /**
     * Génére le corps de la page HTML
     *
     * @see AbstractView::renderBody()
     * @return void
     */
    protected function renderBody(): void
    {
        $topic = $this->topic;
        // Affiche le contenu de la balise body
        include './templates/editTopic.php';
    }
}
