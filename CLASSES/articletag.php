
<?php


class ArticleTag {
    private $idArticle;
    private $idTag;

    public function __construct($idArticle, $idTag) {
        $this->idArticle = $idArticle;
        $this->idTag = $idTag;
    }

    // Getters
    public function getIdArticle() {
        return $this->idArticle;
    }

    public function getIdTag() {
        return $this->idTag;
    }

    // Setters
    public function setIdArticle($idArticle) {
        $this->idArticle = $idArticle;
    }

    public function setIdTag($idTag) {
        $this->idTag = $idTag;
    }
}


?>