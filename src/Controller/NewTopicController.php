<?php

namespace App\Controller;

use Exception;
use App\Model\User;
use App\Model\Topic;
use App\Model\Message;
use Cda0521Framework\Http\RedirectResponse;
use Cda0521Framework\Interfaces\HttpResponse;
use Cda0521Framework\Interfaces\ControllerInterface;


/**
 * Contrôleur permettant d'afficher la page d'accueil
 */
class NewTopicController implements ControllerInterface
{
    /**
     * Utilisateur connecté
     */
    protected User $user;
    
    /**
     * Crée un nouveau contrôleur
     *
     * @param integer $id_user Identifiant en base de données du sujet à passer à la vue
     */
    public function __construct(int $id_user)
    {
        $user = User::findById($id_user);
        // Si l'utilisateur n'existe pas, renvoie à la page 404
        if (is_null($user)) {
            throw new NotFoundException('User #' . $id_user . ' does not exist.');
        }
        
        $this->user = $user;
    }
    
    /**
     * Examine la requête HTTP et prépare une réponse HTTP adaptée
     *
     * @see ControllerInterface::invoke()
     * @return HttpResponse
     */
    public function invoke(): HttpResponse
    {   
        // Vérifie les infos du client
        if (!isset($_POST['title'])) {
            throw new Exception('Title is empty : could not create it.');
        }
        $title=$_POST['title'];
        if(strlen($title)>100 || strlen($title)<5 ) {
            throw new Exception('Title must have minimum 5 and maximum 100 entities : could not create it.');
        }
        if (!isset($_POST['mess_text'])) {
            throw new Exception('Message is empty : could not create it.');
        }
        $text=$_POST['mess_text'];
        if(strlen($text)>3000 || strlen($text) <5 ) {
            throw new Exception('Message must have minimum 5 and maximum 100 entities : could not create it.');
        }
        
        // Crée un nouveau sujet à partir des infos du client
        $topic = new Topic(null, $title, date('Y-m-d H:i:s'));        
        $topic->save();
        
        // Crée un nouveau message à partir des infos du client
        $message = new Message(null, $text, date('Y-m-d H:i:s'), $this->user->getId(), $topic->getId()); 
        $message->save();
                
        // Redirige vers la page d'accueil
        return new RedirectResponse('/');
    }       
}
