<?php

namespace App\Controller;

use Exception;
use App\Model\Topic;
use App\Model\Message;
use Cda0521Framework\Http\RedirectResponse;
use Cda0521Framework\Interfaces\HttpResponse;
use Cda0521Framework\Exception\NotFoundException;
use Cda0521Framework\Interfaces\ControllerInterface;



/**
 * Contrôleur permettant d'afficher la page d'accueil
 */
class UpdateTopicController implements ControllerInterface
{
    /**
     * Objet Topic à passer à la vue
     * @var Topic
     */
    private Topic $topic;
    
    /**
     * Crée un nouveau contrôleur
     *
     * @param integer $id_topic Identifiant en base de données du sujet à passer à la vue
     */
    public function __construct(int $id_topic) {
        
        // Récupère le sujet demandé par le client
        $topic = Topic::findById($id_topic);
        // Si le sujet n'existe pas, renvoie à la page 404
        if (is_null($topic)) {
            throw new NotFoundException('Topic #' . $id_topic . ' does not exist.');
        }       
        $this->topic = $topic;
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
        if((isset($_POST['title']) && isset($_POST['mess_text'])) || (!isset($_POST['title']) && !isset($_POST['mess_text']))) {
            throw new Exception('Invalid data sent : could not update.');
        }
        
        // Si on a reçu un titre de sujet valide, met à jour ce sujet (BDD et objet)
        if(isset($_POST['title']) && !isset($_POST['mess_text'])) {
            if(strlen($_POST['title'])>100 || strlen($_POST['title'])<5 ) {
                throw new Exception('Title must have minimum 5 and maximum 100 entities : could not create it.');
            }
            $topic = $this->topic;
            $topic->setTitle($_POST['title']);
            $topic->save();
        }
        
        // Si on a reçu un message valide, crée ce message (BDD et objet)
        if (!isset($_POST['title']) && isset($_POST['mess_text'])) {            
            if(strlen($_POST['mess_text'])>3000 || strlen($_POST['mess_text']) <5 ) {
                throw new Exception('Message must have minimum 5 and maximum 100 entities : could not create it.');
            }
            
            // Récupère l'id de l'utilisateur connecté et la propriété topic
            $id_user= $_SESSION['id_user'];
            $topic = $this->topic;
            // Crée un nouveau message à partir des infos du client
            $message = new Message(null, $_POST['mess_text'], date('Y-m-d H:i:s'), $id_user, $topic->getId()); 
            $message->save();
        }
   
        // Redirige vers la page du sujet
        return new RedirectResponse('/'.$topic->getId().'/show');
    }       
}
