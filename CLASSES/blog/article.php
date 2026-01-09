<?php
namespace App\Blog;

class Article {
    private $id;
    private $id_client;
    private $id_theme;
    private $titre;
    private $contenu;
    private $date_publication;
    private $statut;

    public function __construct() {
        
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

    public function setThemeId($themeid)
    {
        $this->id_theme=$themeid;
    }

    public function setClientId($client_id)
    {
        $this->id_client=$client_id;

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

    public function ajouter() {
    
    $sql = "INSERT INTO articles (id_client, id_theme, titre, contenu) 
            VALUES (:id_client, :id_theme, :titre, :contenu)";
    
    $db = new \database(); 
    $pdo = $db->getPdo();
    $stmt = $pdo->prepare($sql);

     $result = $stmt->execute([
        ':id_client' => $this->id_client,
        ':id_theme'  => $this->id_theme,
        ':titre'     => $this->titre,
        ':contenu'   => $this->contenu
     ]);

    return $result; 
}
}