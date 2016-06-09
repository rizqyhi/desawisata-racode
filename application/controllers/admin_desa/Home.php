<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Home extends CI_Controller
{
            
    function __construct()
    {
        parent::__construct();
        $this->load->library(['ion_auth', 'form_validation']);
        $this->load->helper('auth_helper');

        $this->load->model('Jurusan_model');

        // sorry, you can not access this page unless you're an admin or admin-desa
        if (!$this->ion_auth->in_group(['admin', 'admin-desa'])) {
            redirect(site_url());
        }
    }

    public function index()
    {
        $data = array(
            'page_title' => 'Admin Desa',
        );

        $this->template->load('admin_desa/template', 'admin_desa/home', $data);
    }

}