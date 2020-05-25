<?php
class PersoManager extends Manager
{
  
  public function exists($info)
  {
    $db = $this->dbConnect();

    if (is_int($info)) // if parameters is INT then we want to check ID
    {
      $req = $db->query('SELECT COUNT(*) FROM perso WHERE id = :id');
      $req->execute([':id' => $info]);

      return (bool) $req->fetchColumn();
    }
    else // else parameters is name so, better check name ! 
    {
      $req = $db->prepare('SELECT COUNT(*) FROM perso WHERE name = :name');
      $req->execute([':name' => $info]);
    
      return (bool) $req->fetchColumn();
    }
      
  }

  public function add(Perso $perso)
  {
    $db = $this->dbConnect();

    $add = $db->prepare('INSERT INTO perso(name, strength, life, level, xp) VALUES(:name, :strength, :life, :level, :xp)');

    $add->bindValue(':name', $perso->getName());
    $add->bindValue(':strength', $perso->getStrength(), PDO::PARAM_INT);
    $add->bindValue(':life', $perso->getLife(), PDO::PARAM_INT);
    $add->bindValue(':level', $perso->getLevel(), PDO::PARAM_INT);
    $add->bindValue(':xp', $perso->getXp(), PDO::PARAM_INT);
    $add->execute();

    $perso->hydrate(['id'=> $db->lastInsertId()]);
    $add->closeCursor();
  }

  public function delete(Perso $perso)
  {
    $db = $this->dbConnect();

    $del = $db->prepare('DELETE FROM perso WHERE id= :id');
    $del->execute(array('id'=> $perso->getId()));
    $del->closeCursor();
  }

  public function get($info)
  {
    $db = $this->dbConnect();

    if(is_int($info)){
      $req = $db->prepare('SELECT * FROM perso WHERE id = :id ');
      $req->execute(array('id'=> $info));
      $result = $req->fetch(PDO::FETCH_ASSOC);
      $req->closeCursor();
    }else{
      $req = $db->prepare('SELECT * FROM perso WHERE name= :name');
      $req->execute(array('name'=> $info));
      $result = $req->fetch(PDO::FETCH_ASSOC);
      $req->closeCursor();
    }

    return new Perso($result);
  }

  public function getList()
  {
    $db = $this->dbConnect();
    $persos = [];
    
    $get = $db->query('SELECT * FROM perso ORDER BY id');

    while ($result = $get->fetch(PDO::FETCH_ASSOC))
    {
      $persos[] = new Perso($result);
    }

    $get->closeCursor();

    return $persos;
  }

  public function update(Perso $perso)
  {
    $db = $this->dbConnect();

    $update = $db->prepare('UPDATE perso SET strength = :strength, life = :life, level = :level, xp = :xp WHERE id = :id');

    $update->bindValue(':strength', $perso->getStrength(), PDO::PARAM_INT);
    $update->bindValue(':life', $perso->getLife(), PDO::PARAM_INT);
    $update->bindValue(':level', $perso->getLevel(), PDO::PARAM_INT);
    $update->bindValue(':xp', $perso->getXp(), PDO::PARAM_INT);
    $update->bindValue(':id', $perso->getId(), PDO::PARAM_INT);
    $update->execute();
    $update->closeCursor();
  }


}