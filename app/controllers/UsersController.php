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
        $this->call->helper('url'); // FIX: Load URL helper for reliable base_url()
    }
    
    // List users with pagination + search
    public function index()
    {
        // Current page
        $page = 1;
        if ($this->io->get('page')) {
            $page = (int) $this->io->get('page');
        }

        // Search query
        $q = '';
        if ($this->io->get('q')) {
            $q = trim($this->io->get('q'));
        }

        $records_per_page = 5; 

        // Fetch records
        $all = $this->UsersModel->page($q, $records_per_page, $page);
        
        // FIX: Extract data correctly for table and pagination
        $data['users'] = $all['records']; 
        $total_rows = $all['total_rows']; 

        // Pagination setup
        $this->pagination->set_options([
            'first_link'     => '⏮ First',
            'last_link'      => 'Last ⏭',
            'next_link'      => 'Next →',
            'prev_link'      => '← Prev',
            'page_delimiter' => '&page='
        ]);
        
        $this->pagination->set_theme('default');
        
        $this->pagination->initialize(
            $total_rows,
            $records_per_page,
            $page,
            base_url('index.php/users') . '?q=' . urlencode($q) // FINAL URL FIX
        );

        $data['links'] = $this->pagination->paginate();

        $this->call->view('users/index', $data);
    }

    // Create user
    public function create()
    {
        if($this->io->method() == 'post'){
            // FIX: Correct field names matching create.php input names
            $data = [
                'fname'=> $this->io->post('first_name'), 
                'lname'=> $this->io->post('last_name'), 
                'email'=> $this->io->post('email')
            ];
            if($this->UsersModel->insert($data)) {
                redirect(base_url('users/index.php')); // FINAL URL FIX
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
                redirect(base_url('users/index.php')); // FINAL URL FIX
            } else {
                redirect(base_url('users/index.php')); // FINAL URL FIX
            }
        }
        $this->call->view('users/update', $data);
    }

    // Hard delete
    public function delete($id)
    {
        if($this->UsersModel->delete($id)) {
            redirect(base_url('users/index.php')); // FINAL URL FIX
        } else {
            echo 'Error deleting user.';
        }
    }
}