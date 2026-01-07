<?php
namespace App\Blog;

class Commentaire {
    private $id;
    private $id_client;
    private $id_article;
    private $contenu;
    private $date_commentaire;
    private $soft_deleted;

    public function __construct($id = null, $id_client = null, $id_article = null, $contenu = '', $date_commentaire = null, $soft_deleted = false) {
        $this->id = $id;
        $this->id_client = $id_client;
        $this->id_article = $id_article;
        $this->contenu = $contenu;
        $this->date_commentaire = $date_commentaire;
        $this->soft_deleted = $soft_deleted;
    }

    // Getters
    public function getId() {
         return $this->id; 
        }
    public function getContenu() {
         return $this->contenu; 
        }
    public function getSupprime() {
         return $this->soft_deleted; 
        }
    //Setters
    public function setId($id){
        $this->id=$id;
    }
    public function setContenu($contenu){
        $this->contenu=$contenu;
    }
    public function setsupprime($soft_deleted){
        $this->soft_deleted=$soft_deleted;
    }
    public static function listerParArticle($id_article) {
        $db = new Database();
        $pdo = $db->getPdo();
        
        $sql = "SELECT c.*, cl.nom as client_nom 
                FROM commentaires c 
                INNER JOIN clients cl ON c.id_client = cl.id 
                WHERE c.id_article = ? AND c.soft_deleted = 0 
                ORDER BY c.date_commentaire DESC";
                
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$id_article]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function ajouter($id_client, $id_article, $contenu) {
        $db = new Database();
        $pdo = $db->getPdo();
        
        $sql = "INSERT INTO commentaires (id_client, id_article, contenu) VALUES (?, ?, ?)";
        $stmt = $pdo->prepare($sql);
        return $stmt->execute([$id_client, $id_article, $contenu]);
    }
    
}  
?>
