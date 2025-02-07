<?php

namespace App\Models;

use App\Core\Database;
use App\Core\App; // Assuming App class exists and provides getDatabase() method

class Patient
{
    private $id;
    private $nom;
    private $prenom;
    private $dateNaissance;
    private $email;
    private $telephone;

    public function __construct($id = null, $nom = null, $prenom = null, $dateNaissance = null, $email = null, $telephone = null)
    {
        $this->id = $id;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->dateNaissance = $dateNaissance;
        $this->email = $email;
        $this->telephone = $telephone;
    }

    public function getId() { return $this->id; }
    public function getNom() { return $this->nom; }
    public function getPrenom() { return $this->prenom; }
    public function getDateNaissance() { return $this->dateNaissance; }
    public function getEmail() { return $this->email; }
    public function getTelephone() { return $this->telephone; }

    public function setId($id) { $this->id = $id; }
    public function setNom($nom) { $this->nom = $nom; }
    public function setPrenom($prenom) { $this->prenom = $prenom; }
    public function setDateNaissance($dateNaissance) { $this->dateNaissance = $dateNaissance; }
    public function setEmail($email) { $this->email = $email; }
    public function setTelephone($telephone) { $this->telephone = $telephone; }


    public static function getAll(): array
    {
        $db = App::getInstance()->getDatabase();
        $stmt = $db->query("SELECT * FROM users WHERE role = 'Patient'");
        return $stmt->fetchAll(\PDO::FETCH_CLASS, self::class);
    }

    public static function getById($id): ?self
    {
        $db = App::getInstance()->getDatabase();
        $stmt = $db->query("SELECT * FROM patients WHERE id = ?", [$id]);
        $result = $stmt->fetchObject(self::class);
        return $result ?: null;
    }

    public function save(): bool
    {
        $db = App::getInstance()->getDatabase();
        if ($this->id) {
            // Update
            return $db->query("UPDATE patients SET nom = ?, prenom = ?, date_naissance = ?, email = ?, telephone = ? WHERE id = ?",
                [$this->nom, $this->prenom, $this->dateNaissance, $this->email, $this->telephone, $this->id]
            );
        } else {
            // Insert
            return $db->query("INSERT INTO patients (nom, prenom, date_naissance, email, telephone) VALUES (?, ?, ?, ?, ?)",
                [$this->nom, $this->prenom, $this->dateNaissance, $this->email, $this->telephone]
            );
        }
    }

    public function delete(): bool
    {
        $db = App::getInstance()->getDatabase();
        return $db->query("DELETE FROM patients WHERE id = ?", [$this->id]);
    }
}

