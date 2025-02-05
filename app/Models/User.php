<?php

namespace App\Models;

use App\Core\Database;

class User
{
    private $id;
    private $email;
    private $password;
    private $role;

    public function __construct($id, $email, $password, $role)
    {
        $this->id = $id;
        $this->email = $email;
        $this->password = $password;
        $this->role = $role;
    }

    // Getters et setters...

    public static function getByEmail($email)
    {
        $db = App::getInstance()->getDatabase();
        $stmt = $db->query("SELECT * FROM users WHERE email = ?", [$email]);
        return $stmt->fetchObject(self::class);
    }

    public static function getById($id)
    {
        $db = App::getInstance()->getDatabase();
        $stmt = $db->query("SELECT * FROM users WHERE id = ?", [$id]);
        return $stmt->fetchObject(self::class);
    }

    public function save()
    {
        $db = App::getInstance()->getDatabase();
        if ($this->id) {
            return $db->query("UPDATE users SET email = ?, password = ?, role = ? WHERE id = ?",
                [$this->email, $this->password, $this->role, $this->id]
            );
        } else {
            return $db->query("INSERT INTO users (email, password, role) VALUES (?, ?, ?)",
                [$this->email, $this->password, $this->role]
            );
        }
    }
}

