<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Resume extends CI_Controller {
    public function index(){
        header("Access-Control-Allow-Origin: *");
        $this->load->template('resume_page');
    }
}