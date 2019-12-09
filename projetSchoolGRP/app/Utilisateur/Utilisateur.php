<?php

 namespace App\Utilisateur;

class Utilisateur
{
    protected $id;
    protected $firstname;
    protected $lastname;
    protected $password;
    protected $status; // en anglais (pas de faute !)


    /**
     * __construct
     *
     * @param string $firstname est le prenom de l'utilisateur.
     * @param string $lastname est le nom de l'utilisateur.
     * @param string $password est le mot de passe de l'utilisateur.
     * @param string $password est le mot de statut de l'utilisateur.
     * @return void
     */
        public function __construct(array $donnees){
        $this->hydrate($donnees);
        }
    // public function __construct($firstname, $lastname, $password, $status)
    // {
    //     $this->firstname = $firstname;
    //     $this->lastname = $lastname;
    //     $this->password = $password;
    //     $this->status = $status; // élève, professeur ou directeur
    // }
    public function hydrate(array $donnees)
    {
        if (isset($donnees['id']))
        {
            $this->id = $donnees['id'];
        }
        
        if (isset($donnees['nom']))
        {
            $this->lastname = $donnees['nom'];
        }
        if (isset($donnees['prenom']))
        {
            $this->firstname = $donnees['prenom'];
        }
     
        if (isset($donnees['motDePasse']))
        {
            $this->password= $donnees['motDePasse'];
        }
        if (isset($donnees['statut']))
        {
            $this->status= $donnees['statut'];
        }
    }

    public function login()
    {
        // sort le login avec le pattern Nom de l'utilisateur_Première lettre du prénom
        // Pattern regex -> /^[^a-z0-9][a-z]+_[A-Z]{1}$/
        $firstname = $this->firstname;
        $lastname = $this->lastname;

        $this->login = trim(ucfirst($firstname) . '_' . substr($lastname, 0, 1));

        return $this->login;
    }

    /**
     * Get the value of first_name
     */
    public function getFirstname(): string
    {
        return $this->firstname;
    }

    /**
     * set le firstname -> nom
     *
     * @param string $firstname
     * @return self
     */
    public function setFirstname(string $firstname)
    {
        $this->firstname = $firstname;

        return $this;
    }

    /**
     * get le lastname -> prénom
     *
     * @return string
     */
    public function getLastname(): string
    {
        return $this->lastname;
    }

    /**
     * set le lastname -> prénom
     *
     * @param string $lastname
     * @return self
     */
    public function setLastname(string $lastname)
    {
        $this->lastname = $lastname;

        return $this;
    }

    /**
     * Get the value of password
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * Set the value of password
     *
     * @return  self
     */
    public function setPassword(string $password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get the value of status
     */
    public function getStatus(): string
    {
        return $this->status;
    }

    /**
     * Set the value of status
     *
     * @return  self
     */
    public function setStatus(int $status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }
}

// $user01 = new Utilisateur('Delaclasse', 'Roger', 'lkjhgf');

// echo $user01->login();
define('DB_HOST', 'localhost');
define('DB_NAME', 'college');
define('DB_USERNAME', 'eric');
define('DB_PASS', '2908');
try {
$connexion = new PDO('mysql:host='.DB_HOST.'; dbname='.DB_NAME.'; charset=utf8', DB_USERNAME, DB_PASS);
$connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
var_dump($e);
die('Error: '.$e->getMessage());
}

    $req = $connexion->query("SELECT * FROM user");

    while($donnees = $req->fetch(PDO::FETCH_ASSOC)){
        $id=$donnees['id'];
        ${'perso'.$id}= new Utilisateur($donnees);

        echo ${'perso'.$id}->getFirstname()." ";
        echo ${'perso'.$id}->getLastname()." ";
        echo ${'perso'.$id}->getPassword()."<br/>";

            }
