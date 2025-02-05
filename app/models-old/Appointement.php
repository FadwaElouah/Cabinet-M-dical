<?php
class Appointment {
    private $id;
    private $dateTime;
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function create($patientId, $doctorId, $dateTime) {
        $sql = "INSERT INTO appointments (patient_id, doctor_id, date_time) VALUES (?, ?, ?)";
        return $this->db->query($sql, [$patientId, $doctorId, $dateTime]);
    }

    public function update($id, $dateTime) {
        $sql = "UPDATE appointments SET date_time = ? WHERE id = ?";
        return $this->db->query($sql, [$dateTime, $id]);
    }

    public function cancel($id) {
        $sql = "DELETE FROM appointments WHERE id = ?";
        return $this->db->query($sql, [$id]);
    }
}

