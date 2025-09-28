<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

/**
 * Controller: UsersController
 */
class UsersController extends Controller {
    
    public function __construct()
    {
        parent::__construct();
        $this->call->model('UsersModel');
        $this->call->library('pagination');
    }
    
    // List users with pagination + search
    public function index()
    {
        // ... (omitted pagination logic) ...

        $this->pagination->initialize(
            $total_rows,
            $records_per_page,
            $page,
            base_url('index.php/users') . '?q=' . urlencode($q) // CORRECTED URL
        );

        $data['links'] = $this->pagination->paginate();

        $this->call->view('users/index', $data);
    }

    // Create user
    public function create()
    {
        if($this->io->method() == 'post'){
            $data = [
                'fname'=> $this->io->post('first_name'), 
                'lname'=> $this->io->post('last_name'), 
                'email'=> $this->io->post('email')
            ];
            if($this->UsersModel->insert($data)) {
                redirect(base_url('index.php/users')); // FINAL FIX: Gamitin ang base_url sa redirect
            } else {
                echo 'Error inserting user.';
            }
        } else {
            $this->call->view('users/create');
        }
    }

    // Update user
    public function update($id)
    {
        $data['user'] = $this->UsersModel->find($id);
        if($this->io->method() == 'post'){
            $data = [
                'fname'=> $this->io->post('fname'),
                'lname'=> $this->io->post('lname'),
                'email'=> $this->io->post('email')
            ];
            if($this->UsersModel->update($id, $data)) {
                redirect(base_url('index.php/users')); // FINAL FIX
            } else {
                redirect(base_url('index.php/users')); // FINAL FIX
            }
        }
        $this->call->view('users/update', $data);
    }

    // Hard delete
    public function delete($id)
    {
        if($this->UsersModel->delete($id)) {
            redirect(base_url('index.php/users')); // FINAL FIX
        } else {
            echo 'Error deleting user.';
        }
    }
}