<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends CI_Controller {
    public function index(){
        header("Access-Control-Allow-Origin: *");
        $this->load->template('contact_page');
    }
}