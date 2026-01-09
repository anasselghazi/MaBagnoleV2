<?php
namespace App\Blog;

class Article {
    private $id;
    private $id_client;
    private $id_theme;
    private $titre;
    private $contenu;
    private $tags;
    private $date_publication;
    private $statut;

    public function __construct($id = null, $id_client = null, $id_theme = null, $titre = '', $contenu = '', $tags = '', $date_publication = null, $statut = 'soumis') {
        $this->id = $id;
        $this->id_client = $id_client;
        $this->id_theme = $id_theme;
        $this->titre = $titre;
        $this->contenu = $contenu;
        $this->tags = $tags;
        $this->date_publication = $date_publication;
        $this->statut = $statut;
    }

    // Getters
    public function getId() {
         return $this->id; 
        }
    public function getTitre() {
         return $this->titre; 
        }
    public function getContenu() {
         return $this->contenu; 
        }
    public function getTag() {
        return $this->tag;
        }
    public function getDate() {
        return $this->date_publication;
        }
    public function getStatut() {
         return $this->statut; 
        }
        // Setters
    public function setId($id){
        $this->id=$id;
    }
    public function setTitre($titre){
        $this->titre=$titre;
    }
    public function setContenu($contenu){
        $this->contenu=$contenu;
    }
    public function setTag($tags){
        $this->tags=$tags;
    }
    public function setDate($date_publication){
        $this->date_publication=$date_publication;
    }
    public function setStatut($statut){
        $this->statut=$statut;
    }
     

    // Méthodes
     public static function listerParTheme($id_theme) {
        $db = new \Database();
        $pdo = $db->getPdo();
        
        $sql = "SELECT a.*, t.titre as theme_nom 
                FROM articles a 
                INNER JOIN themes t ON a.id_theme = t.id 
                WHERE a.id_theme = ? AND a.statut = 'approuve'
                ORDER BY a.date_publication DESC";
                
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$id_theme]);
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
    public static function trouverParId($id) {
        $db = new \Database();
        $pdo = $db->getPdo();
        
        $sql = "SELECT a.*, t.titre as theme_nom 
                FROM articles a 
                JOIN themes t ON a.id_theme = t.id 
                WHERE a.id = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }


 
    public static function rechercherParTitre($motCle) {
        $db = new \Database();
        $pdo = $db->getPdo();

     $sql = "SELECT a.*, t.titre as theme_nom 
            FROM articles a 
            LEFT JOIN themes t ON a.id_theme = t.id 
            WHERE a.titre LIKE ? AND a.statut = 'approuve'
            ORDER BY a.date_publication DESC";

    $stmt = $pdo->prepare($sql);
    $stmt->execute(["%$motCle%"]);
    
    return $stmt->fetchAll(\PDO::FETCH_ASSOC);
}
    public static function listerTout() {
    $db = new \database();
    $pdo=$db->getPdo();

    $sql = "SELECT a .*,t.titre as theme_nom 
    FROM articles a 
    LEFT JOIN themes t ON a.id_theme = t.id
    WHERE a.statut='approuve'
    ORDER BY a.date_publication DESC";
    
    $stmt = $pdo->prepare($sql);
    $stmt ->execute();
    return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
}
?>
