<?php

class CoreModel{
    protected $db;
    public function __construct() {
        $this->db = new Database();
    }
    public function __destruct()
    {
        unset($this->db);
    }

}