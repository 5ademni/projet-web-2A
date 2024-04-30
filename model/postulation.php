<?php
class postulation {
    private ?string $participer = null;
    private ?string $disponibile_horaire = null;
    private ?string $details = null;
    private ?int $id_post = null;

    function __construct(string $participer, string $disponibile_horaire, string $details) {
        $this->participer = $participer;
        $this->disponibile_horaire = $disponibile_horaire;
        $this->details = $details;
    }
  
    
   
    public function getIdPost(): ?int {
        return $this->id_post;
    }
    
    function getParticiper(): string {
        return $this->participer;
    }
    
    function getDisponibileHoraire(): string {
        return $this->disponibile_horaire;
    }
   
    function getDetails(): string {
        return $this->details;
    }
 
    function setParticiper(string $participer): void {
        $this->participer = $participer;
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
}
?>
