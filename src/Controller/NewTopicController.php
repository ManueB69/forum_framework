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
            throw new Exception('Title must have minimum 5 and maximum 100 characters : could not create it.');
        }
        if (!isset($_POST['mess_text'])) {
            throw new Exception('Message is empty : could not create it.');
        }
        $text=$_POST['mess_text'];
        if(strlen($text)>3000 || strlen($text) <5 ) {
            throw new Exception('Message must have minimum 5 and maximum 100 characters : could not create it.');
        }
        
        // Crée un nouveau sujet à partir des infos du client
        $topic = new Topic(null, $title, date('Y-m-d H:i:s'));        
        $topic->save();
        
        // Récupère l'id de l'utilisateur connecté
        $id_user=$_SESSION['id_user'];
        
        // Crée un nouveau message à partir des infos du client
        $message = new Message(null, $text, date('Y-m-d H:i:s'), $id_user, $topic->getId()); 
        $message->save();
                
        // Redirige vers la page d'accueil
        return new RedirectResponse('/'.$topic->getId().'/show');
    }       
}
