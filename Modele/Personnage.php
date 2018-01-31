<?php

class Personnage {

//def des attributs
    private $id;
    private $nom;
    private $degats;
    private $image;
    private $erreur = [];

    //constantes
    const IMG = 'image/';
    const FRAPPER = 1;
    const TUER = 2;

//getter
    public function getId() {
        return $this->id;
    }

    public function getNom() {
        return $this->nom;
    }

    public function getDegats() {
        return $this->degats;
    }

    public function getErreur() {
        return $this->erreur;
    }

    public function getImage() {
        return $this->image;
    }

//Setter
    public function setId($id) {
        $this->id = $id;
        return $this;
    }

    public function setNom($nom) {
        if ($nom == '')
            $this->erreur[] = 'nom invalide';
        else
            $this->nom = $nom;
        return $this;
    }

    public function setDegats($degats) {
        $this->degat = $degats;
        return $this;
    }

    public function setErreur($erreur) {
        $this->erreur = $erreur;
        return $this;
    }

    public function setImage($image) {
        $this->image = $image;
        return $this;
    }

    /* constructeur
     * besoin de zero pour degats car peut etre null
     * l'hydratation se fait se fait après la definition de l'attribut dans le constructeur par que sinon reinitialisation a cause 
     * de l'init
     */

    public function __construct(array $data = []) {
        $this->degats = 0;
        $this->image = 'img.jpg';
        $this->hydratation($data);
    }

////// Logique métier    
//   fonction d'hydratation
    protected function hydratation(array $data = []) {
        foreach ($data as $key => $value) {
            $setter = 'set' . ucfirst($key);
            if (method_exists($this, $setter))
                $this->$setter($value);
        }
    }

    //action de frapper
    public function frapper(Personnage $paf) {
        return $paf->recevoirDegats();
    }

    //action de recevoir des dégats
    public function recevoirDegats() {
        $this->degats += 25;
        if ($this->degats >= 100) {
            return self::TUER;
        } else {
            return self::FRAPPER;
        }
    }

}
