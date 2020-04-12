<?php

class Manager
{

	protected function dbConnect() 
    {
        $db = new PDO('mysql:host=localhost;dbname=logbook;port=3308;charset=utf8', 'root', '');
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $db;
    }

    public function HashPass($pass, $confirm_pass)
    {
    	if($pass == $confirm_pass) {
                $pass_hash = password_hash($pass, PASSWORD_DEFAULT);
        }else {
            throw new Exception('Les mots de passes ne correspondent pas');
        }

    	return $pass_hash;
    }


}
