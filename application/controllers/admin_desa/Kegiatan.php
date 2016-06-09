<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* 
*/
class Kegiatan extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();

		$this->load->library(['ion_auth', 'grocery_CRUD']);

		// sorry, you can not access this page unless you're an admin or admin-desa
        if (!$this->ion_auth->in_group(['admin', 'admin-desa'])) {
            redirect(site_url());
        }
	}

	public function index()
	{
		$crud = new grocery_CRUD();
 
		// Seriously! This is all the code you need!
		$crud->set_table('kegiatan');
		$crud->set_subject('Kegiatan');
		 
		$output = $crud->render();

		$data = array(
            'page_title' => 'Data Kegiatan',
            'grocery' => $output
        );

        $this->template->load('admin_desa/template', 'admin_desa/kegiatan', $data);
	}
}	