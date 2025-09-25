<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class UsersModel extends Model {
    protected $table = 'students';
    protected $primary_key = 'id';

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Bilangin lahat ng records sa table
     * @return int
     */
    public function count_all()
    {
        return $this->db->table($this->table)->count();
    }

    /**
     * Kunin lang ang data depende sa LIMIT/OFFSET galing pagination
     * @param string $limit_clause - hal. "LIMIT 5 OFFSET 0"
     * @return array
     */
    public function get_paginated($limit_clause)
    {
        $sql = "SELECT * FROM {$this->table} {$limit_clause}";
        return $this->db->raw($sql)->fetchAll(PDO::FETCH_ASSOC);
    }
    
    /**
     * Hanapin ang record gamit ang primary key
     * @param int $id
     * @param bool $with_deleted
     * @return object
     */
    public function find($id, $with_deleted = false)
    {
        return $this->db->table($this->table)->where($this->primary_key, $id)->get_row();
    }
}