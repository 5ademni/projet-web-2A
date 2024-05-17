<?php
//de preference def classe , constructeur et setter et getter seulement ici 
class formation
{
    private ?int $id_formation = null;
    private ?string $titre_formation = null;
    private ?int $duretotale_formation = null;
    private ?string $description_formation = null;
    private ?float $prix_formation = null;
    private ?int $ids = null;
    private ?string $image = null;


    public function __construct($id_formation = null, $titre_formation, $duretotale_formation, $description_formation, $prix_formation,$ids,$image)
    {
        $this->id_formation = $id_formation;
        $this->titre_formation = $titre_formation;
        $this->duretotale_formation = $duretotale_formation;
        $this->description_formation = $description_formation;
        $this->prix_formation = $prix_formation;
        $this->ids = $ids;
        $this->image = $image;


    }

    /**
     * Get the value of id_formation
     */
    public function getId_formation()
    {
        return $this->id_formation;
    }

    /**
     * Get the value of titre_formation
     */
    public function getTitre_formation()
    {
        return $this->titre_formation;
    }

    /**
     * Set the value of titre_formation
     *
     * @return  self
     */
    public function setTitre_formation($titre_formation)
    {
        $this->titre_formation = $titre_formation;

        return $this;
    }

    /**
     * Get the value of duretotale_formation
     */
    public function getDuretotale_formation()
    {
        return $this->duretotale_formation;
    }

    /**
     * Set the value of duretotale_formation
     *
     * @return  self
     */
    public function setDuretotale_formation($duretotale_formation)
    {
        $this->duretotale_formation = $duretotale_formation;

        return $this;
    }

    /**
     * Get the value of description_formation
     */
    public function getDescription_formation()
    {
        return $this->description_formation;
    }

    /**
     * Set the value of description_formation
     *
     * @return  self
     */
    public function setDescription_formation($description_formation)
    {
        $this->description_formation = $description_formation;

        return $this;
    }

    

    /**
     * Get the value of prix_formation
     */
    public function getPrix_formation()
    {
        return $this->prix_formation;
    }

    /**
     * Set the value of prix_formation
     *
     * @return  self
     */
    public function setPrix_formation($prix_formation)
    {
        $this->prix_formation = $prix_formation;

        return $this;
    }
    /**
     * Get the value of image
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set the value of image
     *
     * @return  self
     */
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }
    public function getIds()
    {
        return $this->ids;
    }

    public function setIds($ids)
    {
        $this->ids = $ids;
        return $this;
    }
    public function getspecialite()
    {
        return $this->specialite;
    }

    public function setspecialite($specialite)
    {
        $this->specialite = $specialite;
        return $this;
    }


}
