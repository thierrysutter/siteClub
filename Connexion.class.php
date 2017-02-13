<?php
class Connexion
{
  protected $pdo, $serveur, $utilisateur, $motDePasse, $dataBase;
  
  public function __construct($serveur, $utilisateur, $motDePasse, $dataBase)
  {
    $this->serveur = $serveur;
    $this->utilisateur = $utilisateur;
    $this->motDePasse = $motDePasse;
    $this->dataBase = $dataBase;
    
    $this->connexionBDD();
  }
  
  protected function connexionBDD()
  {
    $this->pdo = new PDO('mysql:host='.$this->serveur.';dbname='.$this->dataBase, $this->utilisateur, $this->motDePasse);
    $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // On émet une alerte à chaque fois qu'une requête a échoué.
    $this->pdo->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, true);
  }
  
  public function __sleep()
  {
    return array('serveur', 'utilisateur', 'motDePasse', 'dataBase');
  }
  
  public function __wakeup()
  {
    $this->connexionBDD();
  }
  
  public function getPDO() {
  	return $this->pdo;
  }
}
?>