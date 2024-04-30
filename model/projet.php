<?php
class projet{
    private ?int $id = null;
    private ?string $nom_projet = null;
    private ?string $nom_realisateur = null;
    private ?string $niveau_etudes = null;
    private ?string $email = null;
    private ?int $time = null;
    private ?string $domaine = null;
    private ?int $budget = null;
    private ?string $description = null;    
  
    function __construct(string $nom_projet,string $nom_realisateur,string $niveau_etudes,string $email,int $time,string $domaine,int $budget,string $description)
    {
        
        $this->nom_projet=$nom_projet;
        $this->nom_realisateur=$nom_realisateur;
        $this->niveau_etudes=$niveau_etudes;
        $this->email=$email;
        $this->time=$time;
        $this->domaine=$domaine;
        $this->budget=$budget;
        $this->description=$description;
      
    }
    function getId(): int{
        return $this->id;
    }
    function getNomProjet(): string{
        return $this->nom_projet;
    }
    function getNomRealisateur(): string{
        return $this->nom_realisateur;
    }
    function getNiveauEtudes(): string{
        return $this->niveau_etudes;
    }
   
    function getEmail(): string{
        return $this->email;
    }
    
    function getTime(): string{
        return $this->time;
    }
    function getDomaine(): string{
        return $this->domaine;
    }

    function getBudget(): string{
        return $this->budget;
    }
    function getDescription(): string{
        return $this->description;
    }
 
    function setNomPrjet(string $nom_projet): void{
        $this->nompr=$nompr;
    }
    function setNomRealisateur(string $nom_realisateur): void{
        $this->nom_realisateur=$nom_realisateur;
    }
    function setNiveauEtudes(string $niveau_etudes): void{
        $this->niveau_etudes=$niveau_etudes;
    }
    
    function setEmail(string $email): void{
        $this->email=$email;
    }
    function setTime(string $time): void{
        $this->time=$time;
    }
    function setDomaine(string $domaine): void{
        $this->domaine=$domaine;
    }
    function setBudget(string $budget): void{
        $this->budget=$budget;
    }
    function setDescription(string $description): void{
        $this->description=$description;
    }
   
}
?>