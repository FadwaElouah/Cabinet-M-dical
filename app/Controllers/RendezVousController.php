<?php

namespace App\Controllers;

use App\Models\RendezVous;
use App\Models\Patient;
use App\Models\Medecin;

class RendezVousController extends BaseController
{
    public function index()
    {
        $rendezVous = RendezVous::getAll();
        $this->render('rendez-vous/index', ['rendezVous' => $rendezVous]);
    }

    public function create()
    {
        $patients = Patient::getAll();
        $medecins = Medecin::getAll();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $rendezVous = new RendezVous(
                null,
                $_POST['patient_id'],
                $_POST['medecin_id'],
                $_POST['date_heure'],
                $_POST['motif'],
                'Planifié'
            );
            if ($rendezVous->save()) {
                $this->redirect('/rendez-vous');
            }
        }

        $this->render('rendez-vous/create', [
            'patients' => $patients,
            'medecins' => $medecins
        ]);
    }

    public function edit($id)
    {
        $rendezVous = RendezVous::getById($id);
        if (!$rendezVous) {
            $this->notFound();
        }

        $patients = Patient::getAll();
        $medecins = Medecin::getAll();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $rendezVous->setPatientId($_POST['patient_id']);
            $rendezVous->setMedecinId($_POST['medecin_id']);
            $rendezVous->setDateHeure($_POST['date_heure']);
            $rendezVous->setMotif($_POST['motif']);
            $rendezVous->setStatut($_POST['statut']);
            if ($rendezVous->save()) {
                $this->redirect('/rendez-vous');
            }
        }

        $this->render('rendez-vous/edit', [
            'rendezVous' => $rendezVous,
            'patients' => $patients,
            'medecins' => $medecins
        ]);
    }

    public function delete($id)
    {
        $rendezVous = RendezVous::getById($id);
        if ($rendezVous && $rendezVous->delete()) {
            $this->redirect('/rendez-vous');
        }
        $this->notFound();
    }
}

