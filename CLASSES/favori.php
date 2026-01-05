<?php
class Favori {
    private $id;
    private $idClient;
    private $idArticle;
    private $dateAjout;

    public function __construct($id, $idClient, $idArticle, $dateAjout) {
        $this->id = $id;
        $this->idClient = $idClient;
        $this->idArticle = $idArticle;
        $this->dateAjout = $dateAjout;
    }

    // Getters
    public function getId() {
        return $this->id;
    }

    public function getIdClient() {
        return $this->idClient;
    }

    public function getIdArticle() {
        return $this->idArticle;
    }

    public function getDateAjout() {
        return $this->dateAjout;
    }

    // Setters
    public function setId($id) {
        $this->id = $id;
    }

    public function setIdClient($idClient) {
        $this->idClient = $idClient;
    }

    public function setIdArticle($idArticle) {
        $this->idArticle = $idArticle;
    }

    public function setDateAjout($dateAjout) {
        $this->dateAjout = $dateAjout;
    }
}