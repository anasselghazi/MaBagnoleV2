 <?php
class Client {
    private $id;
    private $nom;
    private $email;
    private $motDePasseHash;
    private $role;

    public function __construct($id, $nom, $email, $motDePasseHash, $role) {
        $this->id = $id;
        $this->nom = $nom;
        $this->email = $email;
        $this->motDePasseHash = $motDePasseHash;
        $this->role = $role;
    }

    // Getters
    public function getId() {
        return $this->id;
    }
    public function getNom() {
        return $this->nom;
    }
    public function getEmail() {
        return $this->email;
    }
    public function getMotDePasseHash() {
        return $this->motDePasseHash;
    }
    public function getRole() {
        return $this->role;
    }

    // Setters
    public function setId($id) {
        $this->id = $id;
    }
    public function setNom($nom) {
        $this->nom = $nom;
    }
    public function setEmail($email) {
        $this->email = $email;
    }
    public function setMotDePasseHash($motDePasseHash) {
        $this->motDePasseHash = $motDePasseHash;
    }
    public function setRole($role) {
        $this->role = $role;
    }
}