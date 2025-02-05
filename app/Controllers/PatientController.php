<?php

namespace App\Controllers;

use App\Models\Patient;

class PatientController extends BaseController
{
    public function index()
    {
        $patients = Patient::getAll();
        $this->render('patients/index', ['patients' => $patients]);
    }

    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Traiter le formulaire de création
            $patient = new Patient(null, $_POST['nom'], $_POST['prenom'], $_POST['date_naissance'], $_POST['email'], $_POST['telephone']);
            if ($patient->save()) {
                // Rediriger vers la liste des patients
                header('Location: /patients');
                exit;
            }
        }
        $this->render('patients/create');
    }

}


