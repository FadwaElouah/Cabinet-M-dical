<?php

namespace App\Models;

use App\Core\Database;

class Medecin
{
    private $id;
    private $nom;
    private $prenom;
    private $specialite;
    private $email;
    private $telephone;

    public function __construct($id, $nom, $prenom, $specialite, $email, $telephone)
    {
        $this->id = $id;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->specialite = $specialite;
        $this->email = $email;
        $this->telephone = $telephone;
    }

    // Getters et setters...

    // Méthodes similaires à celles de la classe Patient pour getAll, getById, save, delete...
}

