<?php

require_once("model/manager.php");

class PostManager extends Manager
{

	public function displayListPost()
	{
		$db = $this->dbConnect();

		$posts = $db->query('SELECT *, DATE_FORMAT(date_post, \'%d/%m/%Y à %Hh%imin%ss\') AS date_post_fr FROM posts ORDER BY id DESC');

		return $posts;

	}

	public function displayPost($id)
	{
		$db = $this->dbConnect();

		$req = $db->prepare('SELECT *, DATE_FORMAT(date_post, \'%d/%m/%Y à %Hh%imin%ss\') AS date_post_fr FROM posts WHERE id= :id');
		$req->execute(array('id'=> $id));
		$post = $req->fetch();

		return $post;

	}

	public function displayComments($id)
	{
		$db = $this->dbConnect();

		$comments = $db->prepare('SELECT *, DATE_FORMAT(date_comments, \'%d/%m/%Y à %Hh%imin%ss\') AS date_comment_fr FROM comments_table WHERE id_post= :id');
		$comments->execute(array('id'=> $id));

		return $comments;

	}

	public function addCommentToDb($id)
	{
		$db = $this->dbConnect();
		$com_added=false;
        $pseudo = $_SESSION['login'];
        $comment = nl2br(strip_tags($_POST['comment']));
           
            $insert = $db->prepare('INSERT INTO comments_table (pseudo, id_post, comments, date_comments) 
                            VALUES(:pseudo, :id_post, :comment, NOW())');
            $insert->execute(array(
                            'id_post'=> $id,
                            'pseudo'=> $pseudo,
                            'comment'=> $comment
                        ));

            $insert->closeCursor();
            $com_added=true;

        return $com_added;

	}

// END CLASS
}