<?php

namespace App\Models;

use App\Core\Database;

class RendezVous
{
    private $id;
    private $patientId;
    private $medecinId;
    private $dateHeure;
    private $motif;
    private $statut;

    public function __construct($id, $patientId, $medecinId, $dateHeure, $motif, $statut)
    {
        $this->id = $id;
        $this->patientId = $patientId;
        $this->medecinId = $medecinId;
        $this->dateHeure = $dateHeure;
        $this->motif = $motif;
        $this->statut = $statut;
    }

    // Getters et setters...

    // Méthodes similaires à celles de la classe Patient pour getAll, getById, save, delete...

    public static function getByPatient($patientId): array
    {
        $db = App::getInstance()->getDatabase();
        $stmt = $db->query("SELECT * FROM rendez_vous WHERE patient_id = ?", [$patientId]);
        return $stmt->fetchAll(\PDO::FETCH_CLASS, self::class);
    }

    public static function getByMedecin($medecinId): array
    {
        $db = App::getInstance()->getDatabase();
        $stmt = $db->query("SELECT * FROM rendez_vous WHERE medecin_id = ?", [$medecinId]);
        return $stmt->fetchAll(\PDO::FETCH_CLASS, self::class);
    }
}

