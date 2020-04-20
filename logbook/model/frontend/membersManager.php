<?php

require_once("model/manager.php");

class MemberManager extends Manager
{

    public function checkPseudoExistInDb($pseudo)
    {
        $db = $this->dbConnect();
        $pseudo_exist = false;

        $req = $db->query('SELECT pseudo FROM members');
        while($result = $req->fetch())
        {
            if($pseudo == $result['pseudo']){
                $pseudo_exist = true;
            }
        }
        
        $req->closeCursor();
        return $pseudo_exist;    
    }

	public function getInfoMembers($info, $pseudo)
    {
        $db = $this->dbConnect();
        $pseudo_exist = $this->checkPseudoExistInDb($pseudo);

        if($pseudo_exist){

            if($info == 'id_group'){

                $req = $db->prepare('SELECT m.id_group AS id_group, t.team_name AS group_name
                                     FROM members AS m
                                     INNER JOIN team AS t
                                     ON m.id_group = t.id
                                     WHERE m.pseudo= :pseudo
                                    ');
                $req->execute(array('pseudo'=>$pseudo));
                $result = $req->fetch();

                return $result['group_name'];

            }else{

                $sqlInfo = 'SELECT '. $info .' FROM members WHERE pseudo="'.$pseudo.'"';
                $req = $db->prepare($sqlInfo);
                $req->execute();
                $result = $req->fetch();

                return $result[$info];
            }
        
            $req->closeCursor();
        } else {
            throw new Exception('Ce pseudo n\'existe pas !');
        }

        
    //END GETINFOMEMBER 
    }


    public function updateMember($id_member)
    {
        $db = $this->dbConnect();
        $update_ok = false; 
        $loginManager = new LoginManager();

        if(isset($_POST['pseudo_update']) AND strlen($_POST['new_pseudo']) >= 1)
        {

        	$new_pseudo = strip_tags($_POST['new_pseudo']);

            $pseudo_exist = $this->checkPseudoExistInDb($new_pseudo);
            if($pseudo_exist){
                throw new Exception("Ce pseudo existe déjà !"); 
            }else{

            	$req = $db->prepare('UPDATE members SET pseudo= :newpseudo WHERE id= :id');
    	        $req->execute(array('newpseudo' => $new_pseudo,
    	        					'id'=>$id_member));
                $req->closeCursor();
    			$_SESSION['login'] = $new_pseudo;
    	        $update_ok = true; 

            }

        } 
        if (isset($_POST['pass_update']) AND strlen($_POST['new_pass1']) >= 1) {

        	$actual_pass = $_POST['actual_pass'];
        	$login = $_SESSION['login'];
			$pass_ok = $loginManager->checkPassOk($actual_pass,$login);

        	$pass = $_POST['new_pass1'];
            $confirm_pass = $_POST['new_pass2'];
            $new_pass = $this->HashPass($pass, $confirm_pass);

            if($pass_ok){
            	$req = $db->prepare('UPDATE members SET pass= :newpass WHERE id= :id');
		        $req->execute(array('newpass' => $new_pass,
		        					'id'=>$id_member));  
                $req->closeCursor();
		        $update_ok = true; 

            } else {
            	throw new Exception('Votre mot de passe est incorrect !');
            }
        }

        if(isset($_POST['add_info']))
        {
            if(isset($_POST['city']) AND strlen($_POST['city']) >= 1)
            {
                $city = strip_tags($_POST['city']);
                $req = $db->prepare('UPDATE members SET city=:city WHERE id= :id');
                $req->execute(array('city' => $city, 'id' => $id_member));
                $update_ok = true;
                $req->closeCursor();

            } 
            if(isset($_POST['company']) AND strlen($_POST['company']) >= 1)
            {
                $company = strip_tags($_POST['company']);
                $req = $db->prepare('UPDATE members SET company=:company WHERE id= :id');
                $req->execute(array('company' => $company, 'id' => $id_member));
                $update_ok = true;
                $req->closeCursor();

            }
            if(isset($_POST['currentPosition']) AND strlen($_POST['currentPosition']) >= 1 )
            {
                $currentPosition = strip_tags($_POST['currentPosition']);
                $req = $db->prepare('UPDATE members SET current_position= :currentPosition WHERE id= :id');
                $req->execute(array('currentPosition' => $currentPosition,'id' => $id_member));
                $update_ok = true;
                $req->closeCursor();

            }

        }
 
        return $update_ok;

    //END updateMember
    }

    
    public function insertMembersDb()
    {
            $db = $this->dbConnect();
            $signin_ok = false; 
            $manager = new Manager();
            $fileManager = new FileManager();
            $memberManager = new MemberManager();

            // CHECK IF FORM COMPLETED
            if(isset($_POST['signin'])) 
            {

                //FORMAT TO FRENCH : DATE OF THE DAY
                setlocale(LC_TIME, "fr_FR", "French");
                $date = date('Y-m-d'); 
                $date_jour = strftime("%A %d %B %G", strtotime($date));


                //CHECK PSEUDO TAKEN
                $pseudo_signIn = strip_tags($_POST['pseudo']);
                $pseudo_taken = $this->checkPseudoExistInDb($pseudo_signIn);
                if($pseudo_taken)
                {
                    $_SESSION['alert'] = "Ce pseudo existe déjà !";
                }
                

                //CHECK IF THE FORM IS SWEETLY COMPLETED AND HASH PASSWORD
                $pass = $_POST['password'];
                $confirm_pass = $_POST['confirm_password'];
                $pass_hash= $manager->HashPass($pass, $confirm_pass);


                //STRIP HTML TAGS AND CHECK IF MAIL OK AND MAIL TAKEN
                $mail = strip_tags($_POST['mail']);
                $mail_taken = false;
                $regex_mail='#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#';

                if (preg_match($regex_mail, $mail)) {

                    $mail_ok = true;

                        $req = $db->query('SELECT mail FROM members');
                        while($result = $req->fetch())
                        {
                            if($mail === $result['mail']){
                                $mail_taken=true;
                                $_SESSION['alert'] = "Ce mail existe déjà !";
                            } 
                        }
                        $req->closeCursor();

                } else {
                    $mail_ok = false;
                    $_SESSION['alert'] = "L'adresse mail n'est pas valide !";
                }

                //CHECK IF CITY/COMPANY/CURRENTPOSITION EXIST AND STRIP TAGS
                if(isset($_POST['city'])){
                    $city=strip_tags($_POST['city']);
                }else{
                    $city='N/C';
                }

                if(isset($_POST['company'])){
                    $company=strip_tags($_POST['company']);
                }else{
                    $company='N/C';
                }

                if(isset($_POST['currentPosition'])){
                    $currentPosition=strip_tags($_POST['currentPosition']);
                }else{
                    $currentPosition='N/C';
                }

                //CHECK EVERITHING IS OK BEFORE INSERT TO DB
                if(!$pseudo_taken AND !$mail_taken AND $mail_ok)
                {
                    
                    $insert = $db->prepare('INSERT INTO members (pseudo, pass, mail, date_crea, id_group, ip, city, company, current_position) 
                                VALUES(:pseudo, :pass, :mail, :date_jour, :id_group, :ip, :city, :company, :current_position)');
                    $insert->execute(array(
                        'pseudo'=> $pseudo_signIn,
                        'pass'=> $pass_hash,
                        'mail'=> $mail,
                        'date_jour' => $date_jour,
                        'id_group' => 2,
                        'ip' => $_SERVER['REMOTE_ADDR'],
                        'city' => $city,
                        'company' => $company,
                        'current_position' => $currentPosition
                    ));

                    $insert->closeCursor();  
                    $_SESSION['connected'] = true;
                    $_SESSION['login'] = $pseudo_signIn;
                    $_SESSION['id'] = $memberManager->getInfoMembers('id', $_SESSION['login']);
                    $fileManager->addAvatar();
                    $signin_ok = true;    
                }

                return $signin_ok;
            }

        //END FONCTION insertMembersDb()
        }


//END MEMBERMANAGER
}