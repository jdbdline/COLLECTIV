<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
        $this->load->view('includes/header');
        $this->load->view('user/add_user');
        $this->load->view('includes/footer');
    }


    public function add_user(){

	    $user = array(
	        'first_name' => trim($this->input->post('first_name')),
	        'surname'    => trim($this->input->post('surname')),
	        'email'      => trim($this->input->post('email')),
	        'username'   => trim($this->input->post('username')),
	        'password'   => trim($this->input->post('password'))
        );

        $this->load->library("My_User",$user);

        $this->load->model("user_model");

        $id = trim($this->input->post('id'));

        if($id > 0){
            $this->user_model->update_user($id,$user);
        }else{
            $this->user_model->insert_user($this->my_user->get_details());
        }




    }
    public function delete_user(){

	    $response = array();
	    $response['status'] = 'ok';

        $id = trim($this->input->post('id'));
        $this->load->model("user_model");
        $this->user_model->delete_user($id);
    }

    public function load_edit_user(){

	    $response = array();
	    $response['status'] = 'ok';

        $user = array(
            'id' => trim($this->input->post('id')),
        );

        $this->load->library("My_User",$user);

        $data['user']= $this->my_user->get_details();

        $data['modal_title'] = 'Edit User #'.$user['id'];

        $data['is_modal'] = true;

        $this->load->view('includes/modal_header',$data);

        $this->load->view('user/add_user',$data);

        $this->load->view('includes/modal_footer');


    }

    public function list_users(){
        $this->load->model("user_model");

        $data['users'] = $this->user_model->list_users();

      

        $this->load->view('includes/header');
        $this->load->view('user/list_users',$data);
        $this->load->view('includes/footer');
    }

    public function refresh_list_users(){
        $this->load->model("user_model");

        $data['users'] = $this->user_model->list_users();

        $this->load->view('user/list_users',$data);
    }


}
