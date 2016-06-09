<?php

function current_user() {
	$CI = get_instance();
	$CI->load->library('ion_auth');
	
	return $CI->ion_auth->user()->row();
}