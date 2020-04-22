<?php

require_once("model/manager.php");

class AdminManager extends Manager
{
	public function updateIdGroupMember($id_member, $new_id_group)
	{
		$db = $this->dbConnect();

		$req = $db->prepare('UPDATE members SET id_group= :new_id_group WHERE id= :id');
        $req->execute(array('new_id_group' => $new_id_group,
	        				'id'=>$id_member));
        return true;
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
