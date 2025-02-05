<?php

namespace App\Controllers;

use App\Models\Patient;
use App\Models\Medecin;
use App\Models\RendezVous;

class DashboardController extends BaseController
{
    public function index()
    {
        $totalPatients = Patient::count();
        $totalMedecins = Medecin::count();
        $totalRendezVous = RendezVous::count();
        $rendezVousAujourdhui = RendezVous::getByDate(date('Y-m-d'));

        $this->render('dashboard/index', [
            'totalPatients' => $totalPatients,
            'totalMedecins' => $totalMedecins,
            'totalRendezVous' => $totalRendezVous,
            'rendezVousAujourdhui' => $rendezVousAujourdhui
        ]);
    }
}

