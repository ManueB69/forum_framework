<?php

namespace App\Controller;

use Exception;
use App\Model\User;
use App\View\UserView;
use App\View\NewUserView;
use Cda0521Framework\Html\AbstractView;
use Cda0521Framework\Http\RedirectResponse;
use Cda0521Framework\Interfaces\HttpResponse;
use Cda0521Framework\Exception\NotFoundException;
use Cda0521Framework\Interfaces\ControllerInterface;

/**
 * Contrôleur permettant d'afficher la page de gestion de compte
 */
class NewUserController implements ControllerInterface
{   
    /**
     * Examine la requête HTTP et prépare une réponse HTTP adaptée
     *
     * @see ControllerInterface::invoke()
     * @return HttpResponse
     */
    public function invoke(): HttpResponse
    {
        // Vérifie la validité du nom d'utilisateur
        $username=$_POST['username'];
        if(empty($username)) {
            throw new Exception ('Username is empty : could not create user');
        }
        if(strlen($username)<3 || strlen($username)>50) {
            throw new Exception ('Username must have min 3 and maximum 50 characters : could not create user');
        }
        $user = User::findWhere('user_name',$username);
        if(!empty($user)){
            throw new Exception ('Username "' . $username .'" already exists : could not create user');
        }
        
        // Vérifie la validité du mot de passe
        $pwd=$_POST['pwd'];
        if(!isset($pwd)) {
            throw new Exception ('Password is empty : could not create user');
        }
        if(strlen($pwd)<3 || strlen($pwd)>50 ) {
            throw new Exception ('Password not valide : it must have minimum 3 and maximum 50 characters');
        }
        $containsNumber = false;
        $containsCapital = false;
        $containsSpecial = false;
        for($i=0;$i<strlen($pwd);$i++) {
            if(ctype_digit($pwd[$i])) {
                $containsNumber = true;
            }
            if(ctype_upper($pwd[$i])) {
                $containsCapital = true;
            }
        }
        $regex=preg_match('/[^a-zA-Z\d]/', $pwd);
        if($regex) {
            $containsSpecial = true;
        }
        if($containsNumber === false || $containsCapital === false || $containsSpecial === false) {
            throw new Exception ('Password not valide : it must have at least 1 number, 1 capital and 1 special character');
        }
        if($pwd !== $_POST['pwd_confirm']) {
            throw new Exception ('Password confirmation does not match password : could not create user');
        }
        
        // Si aucune erreur détectée, création du user (BDD et objet) et connexion
        $user=new User (null, $username, $pwd);
        $user->save();
        $_SESSION['id_user']=$user->getId();
        return new RedirectResponse('/');
    }
}
