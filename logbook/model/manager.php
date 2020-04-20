<?php

class Manager
{

	protected function dbConnect() 
    {
        $db = new PDO('mysql:host=logbookeqfbast.mysql.db;dbname=logbookeqfbast;charset=utf8', 'logbookeqfbast', 'SQLwretcn2navire');
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

    public function countVisit()
    {
        $db = $this->dbConnect();
        $unknow_user = true;
        $ip_visitor = $_SERVER['REMOTE_ADDR'];

        //CHECK IF IP ON DB AND COUNT ID
        $req = $db->query('SELECT COUNT(id) AS nb_view, ip FROM visitors');
        while($result = $req->fetch()){

            if( $ip_visitor == $result['ip']){
                $unknow_user = false;
            }

            $nb_view = $result['nb_view'];
        }
        
        if($unknow_user){
            $nb_view += 1;
       
            $insert = $db->prepare('INSERT INTO visitors (ip) VALUES(:ip)');
            $insert->execute(array('ip'=>$ip_visitor));
            $insert->closeCursor();
        }

        $req->closeCursor();
        return $nb_view;
    }


}
