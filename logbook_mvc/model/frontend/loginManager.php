<?php

require_once("model/manager.php");

class LoginManager extends Manager
{


    public function checkPassOk($pass, $login)
    {

            $db = $this->dbConnect();
            $user_ok = false;
            // CHECK IF PASSWORD AND LOGIN ARE OK
            $req = $db->prepare('SELECT pass FROM members WHERE pseudo= :pseudo');
            $req->execute(array('pseudo'=> $login));
            $result = $req->fetch();
            $password_correct = password_verify($pass, $result['pass']);

                if($password_correct){
                    $_SESSION['login'] = $login;
                    $user_ok = true;
                }else{
                    throw new Exception("Le login ou le mot de passe ne correspondent pas");
                }

            return $user_ok;    
    }


    public function eraseData()
    {
        $_SESSION = array();
        session_destroy();
        
    }


    public function checkAdmin($id_group)
    {
        //CHECK IF ID_GROUP USER = admin (captain)
        if($id_group == 'captain'){
            $admin = true;
        } else {
            $admin = false;
        }

        return $admin;
    }

     public function checkWriter($id_group)
    {
        //CHECK IF ID_GROUP USER = admin (captain) or Writer
        if($id_group == 'captain' OR $id_group == 'writer'){
            $writer = true;
        } else {
            $writer = false;
        }

        return $writer;
    }

    
    public function checkUserOk()
    {
        $db = $this->dbConnect();
        $loginManager = new LoginManager();

        if(isset($_POST['connect'])) {

            $login = strip_tags($_POST['login']);
            $pass= $_POST['password'];

            $user_ok = $loginManager->checkPassOk($pass,$login);

            if($user_ok)
            {
                $_SESSION['login'] = $login;
                $_SESSION['connected'] = true;
            }
             return $user_ok;
        }

    }


//END CLASS loginManager
}
