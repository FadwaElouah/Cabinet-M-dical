<?php
class PatientController extends Controller
{
    public function index()
    {
        $patientModel = $this->model('Patient');
        $patients = $patientModel->getAllPatients();
        $this->view('patients/index', ['patients' => $patients]);
    }

    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->validateCSRF();

            $nom = $this->sanitizeInput($_POST['nom']);
            $prenom = $this->sanitizeInput($_POST['prenom']);
            $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
            $telephone = $this->sanitizeInput($_POST['telephone']);

            $errors = $this->validatePatientData($nom, $prenom, $email, $telephone);

            if (empty($errors)) {
                $patientModel = $this->model('Patient');
                if ($patientModel->addPatient($nom, $prenom, $email, $telephone)) {
                    header('Location: /patients');
                    exit;
                } else {
                    $errors[] = 'Erreur lors de l\'ajout du patient';
                }
            }

            if (!empty($errors)) {
                $this->view('patients/create', [
                    'errors' => $errors,
                    'nom' => $nom,
                    'prenom' => $prenom,
                    'email' => $email,
                    'telephone' => $telephone,
                    'csrf_token' => $_SESSION['csrf_token']
                ]);
                return;
            }
        } else {
            $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
            $this->view('patients/create', ['csrf_token' => $_SESSION['csrf_token']]);
        }
    }

    private function validatePatientData($nom, $prenom, $email, $telephone)
    {
        $errors = [];

        if (empty($nom) || !preg_match("/^[A-Za-z\s]+$/", $nom)) {
            $errors[] = "Le nom est invalide";
        }

        if (empty($prenom) || !preg_match("/^[A-Za-z\s]+$/", $prenom)) {
            $errors[] = "Le prénom est invalide";
        }

        if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors[] = "L'adresse email est invalide";
        }

        if (empty($telephone) || !preg_match("/^[0-9]{10}$/", $telephone)) {
            $errors[] = "Le numéro de téléphone est invalide";
        }

        return $errors;
    }

    // Autres méthodes CRUD...
}

