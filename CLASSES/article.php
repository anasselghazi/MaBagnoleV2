

<?php
class Article {
    private $id;
    private $titre;
    private $contenu;
    private $statut;
    private $image;
    private $video;
    private $dateCreation;
    private $idClient;
    private $idTheme;

    public function __construct($id, $titre, $contenu, $statut, $image, $video, $dateCreation, $idClient, $idTheme) {
        $this->id = $id;
        $this->titre = $titre;
        $this->contenu = $contenu;
        $this->statut = $statut;
        $this->image = $image;
        $this->video = $video;
        $this->dateCreation = $dateCreation;
        $this->idClient = $idClient;
        $this->idTheme = $idTheme;
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
    public function getStatut() {
        return $this->statut;
    }
    public function getImage() {
        return $this->image;
    }
    public function getVideo() {
        return $this->video;
    }
    public function getDateCreation() {
        return $this->dateCreation;
    }
    public function getIdClient() {
        return $this->idClient;
    }
    public function getIdTheme() {
        return $this->idTheme;
    }

    // Setters
    public function setId($id) {
        $this->id = $id;
    }
    public function setTitre($titre) {
        $this->titre = $titre;
    }
    public function setContenu($contenu) {
        $this->contenu = $contenu;
    }
    public function setStatut($statut) {
        $this->statut = $statut;
    }
    public function setImage($image) {
        $this->image = $image;
    }
    public function setVideo($video) {
        $this->video = $video;
    }
    public function setDateCreation($dateCreation) {
        $this->dateCreation = $dateCreation;
    }
    public function setIdClient($idClient) {
        $this->idClient = $idClient;
    }
    public function setIdTheme($idTheme) {
        $this->idTheme = $idTheme;
    }
}

?>