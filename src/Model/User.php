<?php

namespace App\Model;

use Cda0521Framework\Database\AbstractModel;
use Cda0521Framework\Database\Sql\Table;
use Cda0521Framework\Database\Sql\Column;
use Cda0521Framework\Database\Sql\SqlDatabaseHandler;

/**
 * Représente un compte utilisateur
 */
#[Table('user')]
class User extends AbstractModel
{  
    /**
     * Identifiant en base de données
     * @var integer|null
     */
    protected ?int $id;
    /**
     * Nom d'utilisateur
     * @var string
     */
    #[Column('user_name')]
    protected string $username;
    /**
     * Mot de passe
     * @var string
     */
    #[Column('user_pwd')]
    protected string $pwd;
    
    /**
     * Crée un nouveau compte
     *
     * @param integer|null $id Identifiant en base de données
     * @param string $username Nom d'utilisateur
     * @param string $pwd Mot de passe
     */
    public function __construct(
        ?int $id = null,
        string $username='',
        string $pwd=''
    )
    {
        $this->id=$id;
        $this->username=$username;
        $this->pwd=$pwd;
    }

    /**
     * Get identifiant en base de données
     *
     * @return int|null
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get identifiant en base de données
     *
     * @return string
     */ 
    public function getUserName()
    {
        return $this->username;
    }
    
    /**
     * Get identifiant en base de données
     *
     * @return string
     */ 
    public function getPwd()
    {
        return $this->pwd;
    }


    
    
}


?>