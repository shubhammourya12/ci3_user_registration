
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

    public function __construct() {

        parent::__construct();

        $this->load->database();
        $this->load->model('User_model');
        $this->load->helper(array('url','form'));
    }


    // USER LIST
  
public function index() {

    // SEARCH VALUE
    $search = $this->input->get('search');

    // PAGINATION CONFIG
    $config['base_url'] = base_url('index.php/users/index');

    $config['per_page'] = 5;

    $config['uri_segment'] = 4;

    // TOTAL ROWS
    $config['total_rows'] = $this->User_model->getUserCount($search);

    // INITIALIZE PAGINATION
    $this->pagination->initialize($config);

    // CURRENT PAGE
    $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;

    // GET USERS
    $data['users'] = $this->User_model->getUsersPagination(
        $config['per_page'],
        $page,
        $search
    );

    // PAGINATION LINKS
    $data['links'] = $this->pagination->create_links();

    // SEARCH VALUE
    $data['search'] = $search;

    // LOAD VIEW
    $this->load->view('users/list', $data);
}




    // CREATE FORM
    public function create() {

        $this->load->view('users/create');
    }


    // STORE USER
    public function store() {


    // IMAGE CONFIG
    $config['upload_path']   = './uploads/';
    $config['allowed_types'] = 'jpg|jpeg|png';
    $config['max_size']      = 2048;

    $this->load->library('upload', $config);

    $image = '';

    // IMAGE UPLOAD
    if(!empty($_FILES['profile_image']['name'])) {

        if($this->upload->do_upload('profile_image')) {

            $uploadData = $this->upload->data();

            $image = $uploadData['file_name'];
        }
    }

    // INSERT DATA
    $data = array(

        'name'  => $this->input->post('name'),
        'email' => $this->input->post('email'),
        'phone' => $this->input->post('phone'),
        'password' => md5($this->input->post('password')),
        'city'  => $this->input->post('city'),
        'profile_image' => $image
    );

    $this->User_model->insertUser($data);

    redirect('index.php/users');
}




    // EDIT USERSSS
    public function edit($id) {

        $data['user'] = $this->User_model->getUserById($id);

        $this->load->view('users/edit', $data);
    }


    // UPDATE USER
    public function update($id) {

        $data = array(

            'name'  => $this->input->post('name'),
            'email' => $this->input->post('email'),
            'phone' => $this->input->post('phone'),
            'city'  => $this->input->post('city')

        );

        $this->User_model->updateUser($id, $data);

        redirect('index.php/users');
    }
/*--------comment-------*/

    // DELETE USER
    public function delete($id) {

        $this->User_model->deleteUser($id);

        redirect('index.php/users');
    }

}
