<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class About extends CI_Controller {
    public function index(){
        header("Access-Control-Allow-Origin: *");
        $this->load->template('about_page');
    }
}