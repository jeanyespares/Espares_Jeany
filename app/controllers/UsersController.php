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
            site_url() . '?q=' . urlencode($q)
        );

        $data['page'] = $this->pagination->paginate();

        $this->call->view('users/index', $data);
    }

    // Create user
    public function create()
    {
        if($this->io->method() == 'post'){
            $data = [
                'fname'=> $this->io->post('fname'),
                'lname'=> $this->io->post('lname'),
                'email'=> $this->io->post('email')
            ];
            if($this->UsersModel->insert($data)) {
                redirect();
            } else {
                echo 'Error';
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
                redirect();
            } else {
                redirect();
            }
        }
        $this->call->view('/users/update', $data);
    }

    // Hard delete
    public function delete($id)
    {
        if($this->UsersModel->delete($id)) {
            redirect();
        } else {
            echo 'Error';
        }
    }

    // Soft delete
    public function soft_delete($id)
    {
        if($this->UsersModel->soft_delete($id)) {
            redirect();
        } else {
            echo 'Error';
        }
    }

    // Restore list with pagination
    public function restore()
    {
        $page = 1;
        if ($this->io->get('page')) {
            $page = (int) $this->io->get('page');
        }

        $q = '';
        if ($this->io->get('q')) {
            $q = trim($this->io->get('q'));
        }

        $records_per_page = 5;

        $all = $this->UsersModel->restore_page($q, $records_per_page, $page);
        $data['users'] = $all['records'];
        $total_rows = $all['total_rows'];

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
            site_url('user/restore?q=' . urlencode($q))
        );
        
        $data['page'] = $this->pagination->paginate();

        $this->call->view('restore', $data);
    }

    // Restore user
    public function retrieve($id)
    {
        if($this->UsersModel->restore($id)) {
            redirect();
        } else {
            echo 'Error';
        }
    }
}
