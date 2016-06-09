<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* 
*/
class Wisata extends CI_Controller
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
		$crud->set_table('wisata');
		$crud->set_subject('Wisata');
		$crud->set_field_upload('foto', 'assets/uploads/files');
		 
		$output = $crud->render();

		$data = array(
            'page_title' => 'Admin Desa',
            'grocery' => $output
        );

        $this->template->load('admin_desa/template', 'admin_desa/wisata', $data);
	}
}	