<?php
require_once 'User.php';

class Administrator extends User {
    public function manageUsers($action, $userId = null, $userData = []) {
        switch($action) {
            case 'create':
                return $this->register(
                    $userData['username'],
                    $userData['email'],
                    $userData['password']
                );
            
            case 'update':
                $sql = "UPDATE users SET username = ?, email = ? WHERE id = ?";
                return $this->db->query($sql, [
                    $userData['username'],
                    $userData['email'],
                    $userId
                ]);
            
            case 'delete':
                $sql = "DELETE FROM users WHERE id = ?";
                return $this->db->query($sql, [$userId]);
            
            case 'list':
                $sql = "SELECT id, username, email, user_type FROM users";
                return $this->db->query($sql)->fetchAll();
        }
    }

    public function viewDashboard() {
        $stats = [];
        
        // Total des patients
        $sql = "SELECT COUNT(*) as total FROM users WHERE user_type = 'patient'";
        $stats['total_patients'] = $this->db->query($sql)->fetch()['total'];
        
        // Total des médecins
        $sql = "SELECT COUNT(*) as total FROM users WHERE user_type = 'doctor'";
        $stats['total_doctors'] = $this->db->query($sql)->fetch()['total'];
        
        // Total des rendez-vous
        $sql = "SELECT COUNT(*) as total FROM appointments";
        $stats['total_appointments'] = $this->db->query($sql)->fetch()['total'];
        
        return $stats;
    }
}

