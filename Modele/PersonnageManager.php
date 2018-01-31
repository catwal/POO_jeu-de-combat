<?php

class PersonnageManager {

    /**
     *
     * @var PDO
     */
    protected $pdo;

    public function getPdo() {
        return $this->pdo;
    }

    public function setPdo($pdo) {
        $this->pdo = $pdo;
        return $this;
    }

    //le manager a besoin du pdo et du construct pour instancier et initialiser les attributs
    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function persoExist(Personnage $perso) {
        $sql = 'SELECT id, nom FROM personnage WHERE nom = ?';
        $result = $this->pdo->prepare($sql);
        $result->bindValue(1, $perso->getNom());
        $result->execute();
        return $result->fetch();
    }

    public function insertPerso(Personnage $perso) {
        $sql = 'INSERT INTO personnage VALUES(null, ?, ?, ?)';
        $result = $this->pdo->prepare($sql);
        $result->bindValue(1, $perso->getNom());
        $result->bindValue(2, $perso->getDegats());
        $result->bindValue(3, $perso->getImage());
        $result->execute();
        return $perso->setID($this->pdo->lastInsertId());
    }

    public function getListe() {
        $sql = 'SELECT * FROM personnage ORDER BY nom';
        $result = $this->pdo->query($sql);
        $result->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, Personnage::class);
        return $result->fetchAll();
    }

    public function getPersoById($id) {
        $sql = 'SELECT * FROM personnage WHERE id = ?';
        $result = $this->pdo->prepare($sql);
        $result->execute([$id]);
        $result->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, Personnage::class);
        return $result->fetch();
    }

    public function getAllOpposants(Personnage $perso) {
        $sql = 'SELECT * FROM personnage WHERE id != ? ORDER BY nom';
        $result = $this->pdo->prepare($sql);
        $result->bindValue(1, $perso->getId());
        $result->execute();
        $result->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, Personnage::class);
        return $result->fetchAll();
    }

    //action d'update
    public function update(Personnage $perso) {
        $sql = 'UPDATE personnage SET degats = ? WHERE id = ?';
        $result = $this->pdo->prepare($sql);
        $result->bindValue(1, $perso->getDegats());
        $result->bindValue(2, $perso->getId());
        $result->execute();
    }

    public function delete(Personnage $perso) {
        $sql = 'DELETE FROM personnage WHERE id = ?';
        $result = $this->pdo->prepare($sql);
        $result->bindValue(1, $perso->getId());
        $result->execute();
    }

}
