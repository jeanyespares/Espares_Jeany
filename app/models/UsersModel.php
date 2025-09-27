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
     * Return all records (signature matches Model::all)
     * @param bool $with_deleted
     * @return array
     */
    public function all($with_deleted = false)
    {
        return $this->db->table($this->table)->get_all();
    }

    // convenience alias if some code calls get_all()
    public function get_all()
    {
        return $this->all();
    }

    public function find($id, $with_deleted = false)
    {
        return $this->db->table($this->table)
                        ->where($this->primary_key, $id)
                        ->get_row();
    }

    public function insert($data)
    {
        return $this->db->table($this->table)->insert($data);
    }

    public function update($id, $data)
    {
        return $this->db->table($this->table)
                        ->where($this->primary_key, $id)
                        ->update($data);
    }

    public function delete($id)
    {
        return $this->db->table($this->table)
                        ->where($this->primary_key, $id)
                        ->delete();
    }
}
