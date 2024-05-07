<?php
class postulation {
    private ?string $participer = null;
    private ?string $nom_societe = null;
    private ?string $disponibile_horaire = null;
    private ?string $details = null;
    private ?int $id_post = null;
    private ?int $id_p = null;
    private ?string $status = null;

    function __construct(string $participer,string $nom_societe, string $disponibile_horaire, string $details, int $id_p,string $status=null) {
        $this->participer = $participer;
        $this->nom_societe = $nom_societe;
        $this->disponibile_horaire = $disponibile_horaire;
        $this->details = $details;
        $this->id_p = $id_p;
        $this->status = $status;
    }
  
    
   
    public function getIdPost(): ?int {
        return $this->id_post;
    }
    
    function getParticiper(): string {
        return $this->participer;
    }

    function getNomSociete(): string {
        return $this->nom_societe;
    }
    
    function getDisponibileHoraire(): string {
        return $this->disponibile_horaire;
    }
   
    function getDetails(): string {
        return $this->details;
    }
    function getIdP(): string {
        return $this->id_p;
    }
    function getStatus(): string {
        return $this->status;
    }
 
    function setParticiper(string $participer): void {
        $this->participer = $participer;
    }
    
    function setNomSociete(string $nom_societe): void {
        $this->nom_societe = $nom_societe;
    }
    
    function setDisponibileHoraire(string $disponibile_horaire): void {
        $this->disponibile_horaire = $disponibile_horaire;
    }
    
    function setDetails(string $details): void {
        $this->details = $details;
    }
    function setIdPost(int $id_post): void {
        $this->id_post = $id_post;
    }
    function setIdP(int $id_p): void {
        $this->id_p = $id_p;
    }
    function setStatus(int $status): void {
        $this->status = $status;
    }
}
?>
