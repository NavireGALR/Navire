<?php

require_once("model/manager.php");

class LoginManager extends Manager
{

    public function checkPassOk($pass, $login)
    {

            $db = $this->dbConnect();
            // CHECK IF PASSWORD AND LOGIN ARE OK
            $req = $db->prepare('SELECT pass FROM members WHERE pseudo= :pseudo');
            $req->execute(array('pseudo'=> $login));
            $result = $req->fetch();
            $password_correct = password_verify($pass, $result['pass']);

                if($password_correct){
                    $_SESSION['login'] = $login;
                    $user_ok = true;
                }else{
                    echo 'Le login ou le mot de passe ne correspondent pas !';
                    $user_ok = false;
                }

            return $user_ok;    
    }


    public function eraseData()
    {
        $_SESSION = array();
        session_destroy();
        setcookie('known', '', time() - 3600);
        unset($_COOKIE['known']);
    }

    public function checkIp()
    {
        $db = $this->dbConnect();
        $ip_visitor = $_SERVER['REMOTE_ADDR'];

        //CHECK IF IP ON DB
        $req = $db->query('SELECT ip, pseudo FROM members');
        while($result = $req->fetch()){

            if( $ip_visitor === $result['ip']){
                $_SESSION['login'] = $result['pseudo'];
                $user_ok = true;
            }else{
                $user_ok = false;
            }
        }

        $req->closeCursor();
        return $user_ok;
    }


    public function checkUserOk()
    {
        $db = $this->dbConnect();
        $loginManager = new LoginManager();

        if(isset($_POST['connect'])) 
        {
            $login = strip_tags($_POST['login']);
            $pass= $_POST['password'];

            $user_ok = $loginManager->checkPassOk($pass,$login);

            if($user_ok)
            {
                $_SESSION['login'] = $login;
                $_SESSION['connected'] = true;
            }
           
            //ADD COOKIES IF "REMEMBER" CHECKED
            if(isset($_POST['remember']) AND $user_ok){

                setcookie('known', 'known', time() + 365*24*3600, null, null, false, true);

            }

            return $user_ok;
        }   

    }


//END CLASS loginManager
}
