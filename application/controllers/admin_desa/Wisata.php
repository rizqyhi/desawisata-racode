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

		$this->load->library('grocery_CRUD');
	}

	public function index()
	{
		$crud = new grocery_CRUD();
 
		// Seriously! This is all the code you need!
		$crud->set_table('wisata');
		$crud->set_subject('Wisata');
		 
		$output = $crud->render();

		$data = array(
            'page_title' => 'Admin Desa',
            'grocery' => $output
        );

        $this->template->load('admin_desa/template', 'admin_desa/wisata', $data);
	}
}