<?php

namespace App\Controllers;

use App\Models\Medecin;

class MedecinController extends BaseController
{
    public function index()
    {
        $medecins = Medecin::getAll();
        $this->render('medecins/index', ['medecins' => $medecins]);
    }

    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $medecin = new Medecin(
                null,
                $_POST['nom'],
                $_POST['prenom'],
                $_POST['specialite'],
                $_POST['email'],
                $_POST['telephone']
            );
            if ($medecin->save()) {
                $this->redirect('/medecins');
            }
        }
        $this->render('medecins/create');
    }

    public function edit($id)
    {
        $medecin = Medecin::getById($id);
        if (!$medecin) {
            $this->notFound();
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $medecin->setNom($_POST['nom']);
            $medecin->setPrenom($_POST['prenom']);
            $medecin->setSpecialite($_POST['specialite']);
            $medecin->setEmail($_POST['email']);
            $medecin->setTelephone($_POST['telephone']);
            if ($medecin->save()) {
                $this->redirect('/medecins');
            }
        }

        $this->render('medecins/edit', ['medecin' => $medecin]);
    }

    public function delete($id)
    {
        $medecin = Medecin::getById($id);
        if ($medecin && $medecin->delete()) {
            $this->redirect('/medecins');
        }
        $this->notFound();
    }
}

