<?php
require_once 'User.php';

class Patient extends User {
    private $medicalHistory;

    public function bookAppointement($doctorId, $dateTime) {
        $sql = "INSERT INTO appointments (patient_id, doctor_id, date_time) VALUES (?, ?, ?)";
        return $this->db->query($sql, [$_SESSION['user_id'], $doctorId, $dateTime]);
    }

    public function viewAppointementHistory() {
        $sql = "SELECT a.*, d.username as doctor_name 
                FROM appointments a 
                JOIN users d ON a.doctor_id = d.id 
                WHERE a.patient_id = ?";
        return $this->db->query($sql, [$_SESSION['user_id']])->fetchAll();
    }
}

