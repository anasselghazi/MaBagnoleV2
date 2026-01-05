<?php




class Theme {
    private $id;
    private $nom;
    private $description;

    public function __construct($id, $nom, $description) {
        $this->id = $id;
        $this->nom = $nom;
        $this->description = $description;
    }

    public function getId() {
        return $this->id;
    }
    public function getNom() {
        return $this->nom;
    }
    public function getDescription() {
        return $this->description;
    }

    public function setId($id) {
        $this->id = $id;
    }
    public function setNom($nom) {
        $this->nom = $nom;
    }
    public function setDescription($description) {
        $this->description = $description;
    }
}




?>