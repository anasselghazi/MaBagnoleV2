<?php

class Commentaire {
    private $id;
    private $idArticle;
    private $idClient;
    private $contenu;
    private $dateCreation;

    public function __construct($id, $idArticle, $idClient, $contenu, $dateCreation) {
        $this->id = $id;
        $this->idArticle = $idArticle;
        $this->idClient = $idClient;
        $this->contenu = $contenu;
        $this->dateCreation = $dateCreation;
    }

    public function getId() {
        return $this->id;
    }
    public function getIdArticle() {
        return $this->idArticle;
    }
    public function getIdClient() {
        return $this->idClient;
    }
    public function getContenu() {
        return $this->contenu;
    }
    public function getDateCreation() {
        return $this->dateCreation;
    }

    public function setId($id) {
        $this->id = $id;
    }
    public function setIdArticle($idArticle) {
        $this->idArticle = $idArticle;
    }
    public function setIdClient($idClient) {
        $this->idClient = $idClient;
    }
    public function setContenu($contenu) {
        $this->contenu = $contenu;
    }
    public function setDateCreation($dateCreation) {
        $this->dateCreation = $dateCreation;
    }
}
?>