<?php

namespace App\View;

use App\Model\Topic;
use App\Model\Message;
use Cda0521Framework\Html\AbstractView;

/**
 * Vue permettant d'afficher la page du sujet
 */
class TopicView extends AbstractView
{
    /**
     * objet Topic à afficher
     */
    protected Topic $topic;
    /**
     * Tableau d'objets de classe Message correspondants au topic
     */
    protected array $messages;
    
    /**
     * Crée une vue utilisant l'ensemble des objets Message correspondants au topic fourni par le client 
     *
     * @param array[Message] $messages
     */
    public function __construct($topic,$messages)
    {
        parent::__construct('Sujet');
        $this->topic = $topic;
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
        $topic = $this->topic;
        $messages = $this->messages;
        $user=$this->messages[0]->getUser();
        $topicUser = $user[0]->getUserName();
        // Affiche le contenu de la balise body
        include './templates/topic.php';
    }
}
