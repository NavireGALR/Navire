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

}
