<?php

namespace App\Controller;

use App\Model\Topic;
use App\Model\Message;
use App\View\TopicView;
use App\View\EditTopicView;
use App\View\DeleteTopicView;
use Cda0521Framework\Html\AbstractView;
use Cda0521Framework\Exception\NotFoundException;
use Cda0521Framework\Interfaces\ControllerInterface;

/**
 * Contrôleur permettant d'afficher la page d'accueil
 */
class TopicController implements ControllerInterface
{
    /**
     * Identifiant en base de données du topic à passer à la vue
     * @var int
     */
    private Topic $topic;
    /**
     * L'ensemble des messages à passer à la vue
     * @var array[Message]
     */
    private array $messages;
    
    /**
     * Crée un nouveau contrôleur
     *
     * @param integer $id_topic Identifiant en base de données du sujet à passer à la vue
     */
    public function __construct(int $id_topic)
    {
        // Récupère le sujet demandé par le client
        $topic = Topic::findById($id_topic);

        // Si le sujet n'existe pas, renvoie à la page 404
        if (is_null($topic)) {
            throw new NotFoundException('Topic #' . $id_topic . ' does not exist.');
        }
        
        $this->topic = $topic;
        
        $messages = Message::findWhere('id_topic',$id_topic);
        $this->messages=$messages;
    }
    
    /**
     * Examine la requête HTTP et prépare une réponse HTTP adaptée
     *
     * @see ControllerInterface::invoke()
     * @return AbstractView
     */
    public function invoke(): AbstractView
    {      
        if(isset($_POST['delete_topic'])) {
            return new DeleteTopicView($this->topic, $this->messages);
        } elseif (isset($_POST['edit_topic'])) {
            return new EditTopicView($this->topic);
        } else {
            return  new TopicView($this->messages);
        }
        
        

    }
}
