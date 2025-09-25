<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class UsersModel extends Model {
    protected $table = 'students';
    protected $primary_key = 'id';

    public function __construct()
    {
        parent::__construct();
    }

    public function count_all()
    {
        return $this->db->table($this->table)->count();
    }

    public function get_paginated($limit, $offset)
    {
        return $this->db->table($this->table)
                        ->limit($limit, $offset)
                        ->get()
                        ->fetchAll(PDO::FETCH_ASSOC);   // <-- FIXED
    }
}
