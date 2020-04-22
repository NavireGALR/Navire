<?php

require_once("model/manager.php");

class PostManager extends Manager
{

	public function getNbPages()
	{
		$db = $this->dbConnect();
		$limit = 3;

		$req = $db->query('SELECT COUNT(id) AS nb_posts FROM posts ');
		$total = $req->fetch();

		$nbposts = $total['nb_posts'];
		$nbPages = ceil($nbposts / $limit);

		$req->closeCursor();

		return $nbPages;
	}



	public function displayListPost($page)
	{
		$db = $this->dbConnect();
		$limit = 3;
		$start = ($page-1)*$limit;

		$posts = $db->prepare('SELECT *, DATE_FORMAT(date_post, \'%d/%m/%Y à %Hh%imin\') AS date_post_fr FROM posts ORDER BY id  DESC LIMIT :start,:nb_post');
		$posts->bindParam(':start', $start, PDO::PARAM_INT);
		$posts->bindParam(':nb_post', $limit, PDO::PARAM_INT);
		$posts->execute();

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

		$comments = $db->prepare('SELECT *, DATE_FORMAT(date_comments, \'%d/%m/%Y à %Hh%imin%ss\') AS date_comment_fr FROM comments_table WHERE id_post= :id ORDER BY id DESC');
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

	public function addPostToDb()
	{
		$db = $this->dbConnect();
        $pseudo = $_SESSION['login'];
        $content = nl2br(strip_tags($_POST['content_post']));
        $title = strip_tags($_POST['title']);
           
        $insert = $db->prepare('INSERT INTO posts (title, author, content, date_post) 
                                VALUES(:title, :author, :content, NOW())');
        $insert->execute(array(
                        'title'=> $title,
                        'author'=> $pseudo,
                        'content'=> $content 
                    ));

        $insert->closeCursor();
    	$post_added=true;

        return $post_added;

	}

	/*public function updatePostToDb($id)
	{
		$db = $this->dbConnect();
        $id_post = $id;
        $content = nl2br(strip_tags($_POST['content_post_modif']));
        $title = strip_tags($_POST['title_modif']);
           
        $insert = $db->prepare('UPDATE posts SET title=:title, content=:content WHERE id=:id');
        $insert->execute(array(
                        'title'=> $title,
                        'content'=> $content, 
                        'id' => $id_post
                    ));

        $insert->closeCursor();
    	$post_modified=true;

        return $post_modified;

	}*/


// END CLASS
}