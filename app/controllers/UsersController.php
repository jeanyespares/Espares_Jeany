<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

/**
 * Controller: UsersController
 */
class UsersController extends Controller {
    
    public function __construct()
    {
        parent::__construct();
        $this->call->model('UsersModel');      // load model
        $this->call->library('pagination');    // load pagination library
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
            base_url('index.php/users') . '?q=' . urlencode($q) // Using base_url('index.php/...')
        );

        $data['links'] = $this->pagination->paginate();

        $this->call->view('users/index', $data);
    }

    // Create user
    public function create()
    {
        if($this->io->method() == 'post'){
            // BUG FIX: Tumutugma na ang 'fname' at 'lname' sa 'first_name' at 'last_name' ng form.
            $data = [
                'fname'=> $this->io->post('first_name'), 
                'lname'=> $this->io->post('last_name'), 
                'email'=> $this->io->post('email')
            ];
            if($this->UsersModel->insert($data)) {
                redirect('users'); // FIX: Redirect sa user list pagkatapos
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
                redirect('users'); // FIX: Redirect sa user list
            } else {
                redirect('users');
            }
        }
        $this->call->view('users/update', $data);
    }

    // Hard delete
    public function delete($id)
    {
        if($this->UsersModel->delete($id)) {
            redirect('users'); // FIX: Redirect sa user list
        } else {
            echo 'Error deleting user.';
        }
    }

    // Soft delete at Restore functions ay inalis (omitted) para mag-focus sa main issue
}