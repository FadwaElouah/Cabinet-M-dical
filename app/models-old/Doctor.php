<?php
require_once 'User.php';

class Doctor extends User {
    private $specialization;

    public function manageAppointement($action, $appointmentId, $data = []) {
        switch($action) {
            case 'create':
                $sql = "INSERT INTO appointments (patient_id, doctor_id, date_time) VALUES (?, ?, ?)";
                return $this->db->query($sql, [$data['patient_id'], $_SESSION['user_id'], $data['date_time']]);
            
            case 'update':
                $sql = "UPDATE appointments SET date_time = ? WHERE id = ? AND doctor_id = ?";
                return $this->db->query($sql, [$data['date_time'], $appointmentId, $_SESSION['user_id']]);
            
            case 'delete':
                $sql = "DELETE FROM appointments WHERE id = ? AND doctor_id = ?";
                return $this->db->query($sql, [$appointmentId, $_SESSION['user_id']]);
        }
    }

    public function viewDashboardInfo() {
        $sql = "SELECT a.*, p.username as patient_name 
                FROM appointments a 
                JOIN users p ON a.patient_id = p.id 
                WHERE a.doctor_id = ? 
                ORDER BY a.date_time";
        return $this->db->query($sql, [$_SESSION['user_id']])->fetchAll();
    }
}

