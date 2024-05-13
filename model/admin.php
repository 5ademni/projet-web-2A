<?php
class admin{
    private ?int $id = null;
    private ?string $nom = null;
    private ?string $email = null;
    private ?string $adresse = null;
    private ?int $numtel = null;
    private ?string $mdp = null;
    function __construct(string $nom,string $email,string $adresse,int $numtel,string $mdp)
    {
        
        $this->nom=$nom;
        $this->email=$email;
        $this->adresse=$adresse;
        $this->numtel=$numtel;
        $this->mdp=$mdp;
    }
    function getId(): int{
        return $this->id;
    }
    function getNom(): string{
        return $this->nom;
    }
   
    function getEmail(): string{
        return $this->email;
    }

    function getAdresse(): string{
        return $this->adresse;
    }

    function getNumtel(): string{
        return $this->numtel;
    }
   
    function getMdp(): string{
        return $this->mdp;
    }
    
    function setNom(string $nom): void{
        $this->nom=$nom;
    }
    
    function setEmail(string $email): void{
        $this->email=$email;
    }

    function setNumtel(string $numtel): void{
        $this->numtel=$numtel;
    }
 
   
}
?>