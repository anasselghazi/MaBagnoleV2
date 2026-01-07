<?php
class Client {
    private $id_client;
    private $nom;
    private $email;
    private $mot_passe_hash;
    private $role;

    public function __construct($id=null, $nom=null, $email=null, $motpassehash=null,$role='client') {
        $this->id_client = $id;
        $this->nom = $nom;
        $this->email = $email;
        $this->mot_passe_hash = $motpassehash;
        $this->role=$role;
    }


    // Getters & Setters
    public function getId() 
    {
         return $this->id_client; 
    }
    public function getNom() 
    {
         return $this->nom; 
    }
    public function getEmail() 
    {
         return $this->email; 
    }
    public function getMotDePasseHash() 
    {
         return $this->mot_passe_hash; 
    }
    public function getRole()
    {
        return $this->role;
    }

    public function setId($id)
    {
         $this->id_client = $id; 
    }
    public function setNom($nom) 
    {
         $this->nom = $nom; 
    }
    
    public function setEmail($email) 
    {
         $this->email = $email; 
    }
    
    public function setMotDePasseHash($motpassehash) 
    {
         $this->mot_passe_hash = $motpassehash; 
    }
    public function setRole($role)
    {
        $this->role=$role;
    }

    public static function trouverParEmail($email) {
    $db = new database();
    $pdo = $db->getPdo();
    
 
    $stmt = $pdo->prepare("SELECT * FROM clients WHERE email = :email LIMIT 1");
    $stmt->execute([':email' => trim($email)]);
    $result = $stmt->fetch(PDO::FETCH_OBJ);

    if ($result) {
        return new Client(
            $result['id_client'], 
            $result['nom'], 
            $result['email'], 
            $result['mot_passe_hash'], 
            $result['role']     
        );
    }
    return null;
}


    public function verifierMotDePasse($password) {
        return password_verify($password, $this->mot_passe_hash);
    }


}

 ?>
  


 







