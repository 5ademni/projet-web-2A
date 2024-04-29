<?php
class projet{
    private ?int $id = null;
    private ?string $nompr = null;
    private ?string $email = null;
    private ?int $time = null;
    private ?string $domaine = null;
    private ?string $description = null;
  
    function __construct(string $nompr,string $email,int $time,string $domaine,string $description)
    {
        
        $this->nompr=$nompr;
        $this->email=$email;
        $this->time=$time;
        $this->domaine=$domaine;
        $this->description=$description;
      
    }
    function getId(): int{
        return $this->id;
    }
    function getNomPr(): string{
        return $this->nompr;
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
    function getDescription(): string{
        return $this->description;
    }
 
    function setNomPr(string $nompr): void{
        $this->nompr=$nompr;
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
    function setDescription(string $description): void{
        $this->description=$description;
    }
   
}
?>