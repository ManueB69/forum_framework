<?php

namespace App\Model;

use Cda0521Framework\Database\AbstractModel;
use Cda0521Framework\Database\Sql\Table;
use Cda0521Framework\Database\Sql\Column;
use Cda0521Framework\Database\Sql\SqlDatabaseHandler;

#[Table('topic')]
class Topic extends AbstractModel
{  
    /**
     * Identifiant en base de données
     * @var integer|null
     */
    protected ?int $id;
    /**
     * Titre du sujet
     * @var string
     */
    #[Column('topic_title')]
    protected string $title;
    /**
     * Date de création du sujet
    * @var \Datetime
     */
    #[Column('topic_date')]
    protected ?\Datetime $date;
    
    /**
     * Crée un nouveau sujet
     *
     * @param integer|null $id Identifiant en base de données
     * @param string $title Titre du sujet
     * @param string|null $date Date de création du sujet
     */
    public function __construct(
        ?int $id = null,
        string $title = '',
        ?string $date = null
    )
    {
        $this->id = $id;
        $this->title = $title;
        
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
     * Get Titre du sujet
     *
     * @return  string
     */ 
    public function getTitle() : string
    {
        return $this->title;
    }
    
        /**
     * Set Titre du sujet
     *
     * @return  string
     */ 
    public function setTitle(string $title)
    {
        $this->title = $title;
        return $this;
    }
    
    /**
     * Get date de création du sujet
     *
     * @return  \Datetime
     */ 
    public function getDate()
    {
        return $this->date;
    }

}

?>