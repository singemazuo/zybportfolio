<?php
/**
 * Created by PhpStorm.
 * User: singemazuo
 * Date: 2019-02-21
 * Time: 10:21
 */

class User extends CI_Controller
{
    function index(){
        if($this->session->userdata('is_logged_in')){
            redirect('admin/user/create');
        }else{
            $this->load->view('admin/login');
        }
    }

    function management(){
        if($this->session->userdata('is_logged_in')){
            $this->load->template_admin('admin/user/create_user',array('title' => 'Create User', 'account' => $this->session->userdata('user_name')));
        }else{
            $this->load->view('admin/login');
        }
    }

    function view_create_user(){
        if($this->session->userdata('is_logged_in')){
            $this->load->template_admin('admin/user/create_user',array('title' => 'Create User', 'account' => $this->session->userdata('user_name')));
        }else{
            $this->load->view('admin/login');
        }
    }

    function encrypt_password($password){
        return md5($password);
    }

    function verify_account(){
        $this->load->model('User_model','user');

        $user_name = $this->input->post('user_name');
        $password = $this->input->post('password');
        $is_valid = $this->user->verify($user_name, $password);

        if($is_valid)
        {
            $data = array(
                'user_name' => $user_name,
                'is_logged_in' => true
            );
            $this->session->set_userdata($data);
            redirect('admin/management');
        }
        else // incorrect username or password
        {
            $data['message_error'] = TRUE;
            $this->load->view('admin/login', $data);
        }
    }

    function logout(){

    }
}