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
     * Get all records (no pagination)
     * @return array
     */
    public function all()
    {
        return $this->db->table($this->table)->get_all();
    }

    /**
     * Find a record by ID
     *
     * @param int $id
     * @param bool $with_deleted
     * @return object|null
     */
    public function find($id, $with_deleted = false)
    {
        return $this->db->table($this->table)
                        ->where($this->primary_key, $id)
                        ->get_row();
    }

    /**
     * Insert a new record
     *
     * @param array $data
     * @return bool|int Insert ID or false
     */
    public function insert($data)
    {
        return $this->db->table($this->table)->insert($data);
    }

    /**
     * Update existing record
     *
     * @param int $id
     * @param array $data
     * @return bool
     */
    public function update($id, $data)
    {
        return $this->db->table($this->table)
                        ->where($this->primary_key, $id)
                        ->update($data);
    }

    /**
     * Delete a record by ID
     *
     * @param int $id
     * @return bool
     */
    public function delete($id)
    {
        return $this->db->table($this->table)
                        ->where($this->primary_key, $id)
                        ->delete();
    }
}
