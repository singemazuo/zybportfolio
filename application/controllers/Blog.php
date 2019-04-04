<?php
/**
 * Created by PhpStorm.
 * User: singemazuo
 * Date: 2019-03-28
 * Time: 09:44
 */

class Blog extends CI_Controller
{
    function __construct(){
        parent::__construct();

        $this->load->model('blog_model');
    }

    function index(){
        if($this->session->userdata('is_logged_in')){
            redirect('admin/blog');
        }else{
            $this->load->view('admin/login');
        }
    }

    function management(){
        if($this->session->userdata('is_logged_in')){
            $this->load->template_admin('admin/blog/view_blog',array('title' => 'Create Blog', 'account' => $this->session->userdata('user_name')));
        }else{
            $this->load->view('admin/login');
        }
    }

    function view_create_blog(){
        if($this->session->userdata('is_logged_in')){
            $this->load->template_admin('admin/blog/create_blog',array('title' => 'Create Blog', 'account' => $this->session->userdata('user_name')));
        }else{
            $this->load->view('admin/login');
        }
    }

    function view_all_blogs(){
        if($this->session->userdata('is_logged_in')){
            $blogs = $this->blog_model->retrieve_blogs();
            $this->load->template_admin('admin/blog/view_blog',array('title' => 'Create User', 'account' => $this->session->userdata('user_name'), 'blogs' => $blogs));
        }else{
            $this->load->view('admin/login');
        }
    }

    function get_blog_by_id(){
        $blog = $this->blog_model->retrieve_blog($_POST['id']);

        header('Content-Type: application/json');
        echo json_encode($blog);
    }

    function get_all_blogs(){
        $blogs = $this->blog_model->retrieve_blogs();

        header('Content-Type: application/json');
        echo json_encode($blogs);
    }

    function create_blog(){
        if($this->session->userdata('is_logged_in')){
            if (empty($_POST['title']) || empty($_POST['content']) || empty($_FILES['img'])){
                header('Content-Type: application/json');
                echo json_encode(array('error' => 'Missed parameters'));
            }else{
                $result = $this->do_upload('img');
                if(empty($result->error)){
                    $this->blog_model->insert_blog($_POST['title'],$_POST['content'],$result['data']);

                    redirect('admin');
                }else{
                    header('Content-Type: application/json');
                    echo json_encode(array('error' => 'Creation failed'));
                }
            }
        }else{
            $this->load->view('admin/login');
        }
    }

    function modify_blog(){
        if($this->session->userdata('is_logged_in')){
            if (!isset($_POST['title']) || !isset($_POST['content']) || empty($_FILES['img']) || !isset($_POST['id']) || !isset($_POST['date'])){
                header('Content-Type: application/json');
                echo json_encode(array('error' => 'Missed parameters'));
            }else{
                $result = $this->do_upload('img');
                if(empty($result->error)){
                    $affected_rows = $this->blog_model->update_blog($_POST['title'],$_POST['content'],$result['data'],$_POST['date'],$_POST['id']);
                    redirect('admin');
                }else{
                    header('Content-Type: application/json');
                    echo json_encode(array('error' => 'Update failed'));
                }
            }
        }else{
            $this->load->view('admin/login');
        }
    }

    function delete_blogs(){
        if($this->session->userdata('is_logged_in')){
            if (!isset($_POST['ids'])){
                header('Content-Type: application/json');
                echo json_encode(array('error' => 'Missed parameters'));
            }else{
                $affeced_rows = $this->blog_model->delete_blogs($_POST['ids']);

                header('Content-Type: application/json');
                echo json_encode($affeced_rows);
            }
        }else{
            $this->load->view('admin/login');
        }
    }

    private function do_upload($name){
        $config['upload_path']          = './uploads/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 0;
        $config['max_width']            = 9999999;
        $config['max_height']           = 9999999;
        $config['file_name']            = uniqid();

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload($name))
        {
            return array('error' => $this->upload->display_errors());
        }
        return array('data' => $this->upload->data());
    }
}