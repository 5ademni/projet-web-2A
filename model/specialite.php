<?php
class Specialite
{
    private ?int $ids = null;
    private ?string $noms= null;
    private ?string $descrips = null;

    public function __construct($id = null, $noms, $descrips)
    {
        $this->ids = $id;
        $this->noms = $noms;
        $this->descrips = $descrips;
    }

    public function getIDC()
    {
        return $this->ids;
    }

    public function getNomC()
    {
        return $this->noms;
    }

    public function setNomC($noms)
    {
        $this->noms = $noms;
        return $this;
    }

    public function getDescriptionC()
    {
        return $this->descrips;
    }

    public function setDescriptionC($descrips)
    {
        $this->descrips= $descrips;
        return $this;
    }
}
?>