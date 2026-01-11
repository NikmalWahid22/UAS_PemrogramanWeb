<?php
class Database {
    protected $conn;

    public function __construct() {
        global $config;
        $this->conn = new mysqli(
            $config['host'],
            $config['user'],
            $config['pass'],
            $config['db']
        );
        if ($this->conn->connect_error) die("DB Error");
    }

    public function query($sql) {
        return $this->conn->query($sql);
    }

    public function fetch($sql) {
        return $this->query($sql)->fetch_assoc();
    }

    // ✅ TAMBAHAN
    public function escape($str) {
        return $this->conn->real_escape_string($str);
    }
}
