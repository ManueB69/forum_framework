<?php

namespace App\Controller;

use App\Model\User;
use App\Model\Topic;
use App\Model\Message;
use App\View\TopicView;
use App\View\EditTopicView;
use App\View\DeleteTopicView;
use Cda0521Framework\Html\AbstractView;
use Cda0521Framework\Http\RedirectResponse;
use Cda0521Framework\Interfaces\HttpResponse;
use Cda0521Framework\Exception\NotFoundException;
use Cda0521Framework\Interfaces\ControllerInterface;

/**
 * Contrôleur permettant d'afficher la page d'accueil
 */
class TopicController implements ControllerInterface
{
    /**
     * Objet User utilisateur connecté
     * @var int
     */
    private User $user;
    /**
     * Objet Topic à passer à la vue
     * @var int
     */
    private Topic $topic;
        /**
     * Action à réaliser avec le topic
     * @var string
     */
    private string $action;
    /**
     * L'ensemble des messages à passer à la vue
     * @var array[Message]
     */
    private array $messages;
    
    /**
     * Crée un nouveau contrôleur
     *
     * @param integer $id_user Identifiant en base de données de l'utilisateur connecté
     * @param integer $id_topic Identifiant en base de données du sujet à passer à la vue
     */
    public function __construct(int $id_user, int $id_topic, string $action)
    {
        // Récupère l'utilisateur
        $user = User::findById($id_user);
        // Si l'utilisateur' n'existe pas, renvoie à la page 404
        if (is_null($user)) {
            throw new NotFoundException('User #' . $id_user . ' does not exist.');
        }        
        $this->user = $user;
                
        // Récupère le sujet demandé par le client
        $topic = Topic::findById($id_topic);
        // Si le sujet n'existe pas, renvoie à la page 404
        if (is_null($topic)) {
            throw new NotFoundException('Topic #' . $id_topic . ' does not exist.');
        }       
        $this->topic = $topic;
        
        $this->action = $action;
        
        $messages = Message::findWhere('id_topic',$id_topic);
        $this->messages=$messages;
    }
    
    /**
     * Examine la requête HTTP et prépare une réponse HTTP adaptée
     *
     * @see ControllerInterface::invoke()
     * @return HttpResponse
     */
    public function invoke(): HttpResponse
    {   
        $user=$this->user;
        $topic=$this->topic;
        $messages=$this->messages;
        
        switch($this->action) {
            case 'delete':
                // Récupère le titre du sujet à supprimer
                $topic_title = $this->topic->getTitle();
                
                // Supprime tous les messages associés au sujet
                foreach($this->messages as $message) {
                    $message->delete();
                }
                // Supprime le sujet
                $this->topic->delete();
                
                // Redirige vers la page d'accueil
                return new RedirectResponse('/');

            case 'edit':
                return new EditTopicView($topic);
            case 'show':
                if(isset($_POST['title'])) {
                    $topic->setTitle($_POST['title']);
                    $topic->save();
                }
                if(isset($_POST['mess_text'])) {
                    $message=new Message (null, $_POST['mess_text'], null, $user->getId(), $topic->getId());
                    $message->save();
                    $messages = Message::findWhere('id_topic',$topic->getId());
                }
                return  new TopicView($topic, $messages);
        }       

    }
}
