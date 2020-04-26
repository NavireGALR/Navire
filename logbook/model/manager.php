<?php

require_once('model/frontend/postManager.php');
require_once('model/frontend/loginManager.php');
require_once('model/frontend/membersManager.php');
require_once('model/frontend/viewManager.php');
require_once('model/backend/fileManager.php');
require_once('model/backend/reCaptcha.php');

require_once('controller/controller.php');

class Manager
{

	protected function dbConnect() 
    {
        $db = new PDO('mysql:host=localhost;dbname=logbook;port=3308;charset=utf8', 'root', '');
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $db;
    }

    public function countVisit()
    {
        $db = $this->dbConnect();
        $ip_exist = false;
        $ip_visitor = $_SERVER['REMOTE_ADDR'];

        //CHECK IF IP ON DB AND COUNT ID
        $req = $db->query('SELECT ip FROM visitors');
        while($result = $req->fetch()){

            if($ip_visitor == $result['ip']){
                $ip_exist = true;
            }
  
        }
        
        if(!$ip_exist){
       
            $insert = $db->prepare('INSERT INTO visitors (ip) VALUES(:ip)');
            $insert->execute(array('ip'=>$ip_visitor));
            $insert->closeCursor();
        }

        $req->closeCursor();

        $count = $db->query('SELECT COUNT(id) AS nb_view FROM visitors');
        $result = $count->fetch();
        $nb_view = $result['nb_view'];
        $count->closeCursor();

        return $nb_view;
 
    }

}
