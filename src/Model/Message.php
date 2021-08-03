<?php

namespace App\Model;

use App\Model\User;
use Cda0521Framework\Database\AbstractModel;
use Cda0521Framework\Database\Sql\Table;
use Cda0521Framework\Database\Sql\Column;
use Cda0521Framework\Database\Sql\SqlDatabaseHandler;

#[Table('message')]
class Message extends AbstractModel
{  
    /**
     * Identifiant en base de données
     * @var integer|null
     */
    protected ?int $id;
    /**
     * Texte du message
     * @var string
     */
    #[Column('mess_text')]
    protected string $text;
    /**
     * Date de création du message
     * @var \Datetime
     */
    #[Column('mess_date')]
    protected ?\Datetime $date;
    /**
     * Identifiant en base de données de l'utilisateur
     * @var int
     */
    #[Column('id_user')]
    protected ?int $user;
        /**
     * Identifiant en base de données du sujet
     * @var int
     */
    #[Column('id_topic')]
    protected ?int $topic;
    
    /**
     * Crée un nouveau message
     *
     * @param integer|null $id Identifiant en base de données
     * @param string $text Texte du message
     * @param string|null $date Date de création du message
     * @param integer|null $user Identifiant en base de données de l'utilisateur
     * @param integer|null $topic Identifiant en base de données du sujet
     * @return void
     */
    public function __construct(
        ?int $id,
        string $text = '',
        ?string $date = null,
        ?int $user = null,
        ?int $topic = null
    )
    {
        $this->id = $id;
        $this->text = $text;
        $this->user = $user;
        $this->topic = $topic;
        
        if (is_null($date)) {
            $this->date = new \DateTime();
        } else {
            $this->date = new \DateTime($date);
        }

    }
    
    /**
     * Get identifiant en base de données
     *
     * @return  int|null
     */ 
    public function getId()
    {
        return $this->id;
    }
    
    /**
     * Get texte du message
     *
     * @return  string
     */ 
    public function getText()
    {
        return $this->text;
    }
    
    /**
     * Get date de création du message
     *
     * @return  \Datetime
     */ 
    public function getDate()
    {
        return $this->date;
    }
    
    /**
     * Get objet User de l'utilisateur
     *
     * @return User
     */ 
    public function getUser()
    {
        return User::findWhere('id',$this->user);
    }
    
    /**
     * Get identifiant en base de données du sujet
     *
     * @return Topic
     */ 
    public function getTopic()
    {
        return Topic::findWhere('id',$this->topic);
    }

}



?>