<?php
// TODO
namespace App\View;

use App\Model\Topic;
use App\Model\Message;
use Cda0521Framework\Html\AbstractView;

/**
 * Vue permettant de supprimer un sujet et ses messages
 */
class DeleteTopicView extends AbstractView
{
    /**
     * objet Topic à supprimer
     */
    protected Topic $topic;
        /**
     * Tableau d'objets de classe Message correspondants au topic fourni par le client
     */
    protected array $messages;
    
    /**
     * Crée une vue utilisant le topic fourni par le client et l'ensemble des objets Message correspondants  
     *
     * @param Topic $topic objet Topic à supprimer
     * @param array[Message] $messages objets messages correspondants au topic
     */
    public function __construct(Topic $topic, array $messages)
    {
        parent::__construct('Suppression');
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
        // Récupère le titre du sujet à supprimer
        $topic_title = $this->topic->getTitle();
        
        // Supprime tous les messages associés au sujet
        foreach($this->messages as $message) {
            $message->delete();
        }
        
        // Supprime le sujet
        $this->topic->delete();
        

        // Affiche le contenu de la balise body
        include './templates/deleteTopic.php';
    }
}
