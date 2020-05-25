<?php
class Perso
{
  private $_id;
  private $_name;
  private $_strength;
  private $_life;
  private $_level;
  private $_xp;

  const SELF_HIT=1;
  const PERSO_HIT=2;
  const PERSO_DEADED=3;

  public function hit(Perso $perso)
  {
    if($this->getId() == $perso->getId()){
      return self::SELF_HIT;
    }else{
      return $perso->getHit($this);
    }

  }

  public function getHit(Perso $perso)
  {
    if($this->getLife() <= $perso->getStrength()){
      $perso->setXp($perso->getXp() + 100);
      return self::PERSO_DEADED;
    }else{
      $this->setLife($this->getLife()-$perso->getStrength());
      $perso->setXp($perso->getXp() + 25);
      return self::PERSO_HIT;
    }
  }

  public function up()
  {
      $this->_xp = 0;
      $this->_level+=1;
      $this->_strength*=1.8;
      $this->_life*=1.5;
  }


  // Hydrate 

  public function hydrate(array $result)
  {
    foreach ($result as $key => $value)
    {

      $method = 'set'.ucfirst($key);

      if (method_exists($this, $method)){ $this->$method($value); }

    }
  }

  // Construct

  public function __construct(array $result){ $this->hydrate($result); }

  // Getters

  public function getId() { return $this->_id; }

  public function getName() { return $this->_name; }

  public function getStrength() { return $this->_strength; }

  public function getLife() { return $this->_life; }

  public function getLevel() { return $this->_level; }

  public function getXp() { return $this->_xp; }

  // Setters 

  public function setId($_id) { $this->_id = $_id; }

  public function setName($_name) 
  { 
    if(!empty($_name))
    {
       $this->_name = $_name;
       return true;
    } 
    else{ return false;}
  }

  public function setStrength($_strength) { $this->_strength = $_strength; }

  public function setLife($_life) { $this->_life = $_life; }

  public function setLevel($_level) { $this->_level = $_level; }

  public function setXp($_xp) 
  { 
    $this->_xp = $_xp;

    if($this->_xp >= 100){
      $this->up();
    }
     
  }
}