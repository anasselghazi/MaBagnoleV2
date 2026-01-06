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
    public function getId() { return $this->id; }
    public function getContenu() { return $this->contenu; }
    public function estSupprime() { return $this->soft_deleted; }

    // Méthode statique demandée
    public static function listerParArticle($pdo, $idArticle) {
        $sql = "SELECT * FROM commentaires WHERE id_article = ? AND soft_deleted = FALSE ORDER BY date_commentaire ASC";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$idArticle]);
        $commentaires = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $commentaires[] = new Commentaire($row['id'], $row['id_client'], $row['id_article'], $row['contenu'], $row['date_commentaire'], $row['soft_deleted']);
        }
        return $commentaires;
    }
}
?>
