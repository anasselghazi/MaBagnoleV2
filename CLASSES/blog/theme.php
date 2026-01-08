<?php
namespace App\Blog;

class Theme {
    private $id;
    private $titre;
    private $description;
    private $actif;

    public function __construct($id = null, $titre = '', $description = '', $actif = true) {
        $this->id = $id;
        $this->titre = $titre;
        $this->description = $description;
        $this->actif = $actif;
    }

    // Getters
    public function getId() {
         return $this->id; 
        }
    public function getTitre() {
         return $this->titre; 
        }
    public function getDescription() {
         return $this->description; 
        }
    public function estActif() {
         return $this->actif; 
        }

    // Setters
    public function setId() {
        $this->id=$id;
    }
    public function setTitre($titre) {
         $this->titre = $titre; 
        }
    public function setDescription($description) {
         $this->description = $description; 
        }
    public function setActif($actif) {
         $this->actif = $actif; 
        }

    // Méthode 
     public static function listerTousActifs() {
        $db = new \Database();
        $pdo = $db->getPdo();
        
        $sql = "SELECT * FROM themes WHERE actif = 1 ORDER BY titre ASC";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
    
}

?>
