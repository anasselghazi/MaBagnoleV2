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

    // Getters essentiels
    public function getId() { return $this->id; }
    public function getTitre() { return $this->titre; }
    public function getContenu() { return $this->contenu; }
    public function getStatut() { return $this->statut; }

    // Méthodes statiques demandées
    public static function listerParTheme($pdo, $idTheme) {
        $sql = "SELECT * FROM articles WHERE id_theme = ? AND statut = 'approuve' ORDER BY date_publication DESC";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$idTheme]);
        $articles = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $articles[] = new Article($row['id'], $row['id_client'], $row['id_theme'], $row['titre'], $row['contenu'], $row['tags'], $row['date_publication'], $row['statut']);
        }
        return $articles;
    }

    public static function trouverParId($pdo, $id) {
        $sql = "SELECT * FROM articles WHERE id = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$id]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row ? new Article($row['id'], $row['id_client'], $row['id_theme'], $row['titre'], $row['contenu'], $row['tags'], $row['date_publication'], $row['statut']) : null;
    }
}
?>
