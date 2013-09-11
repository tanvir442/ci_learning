<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Download extends CI_Controller {
	
	public function index(){
		$this->load->view('download');
	}
	
	public function download_data(){
		$this->load->library('session');
		$this->load->helper('download');
		
		$data = file_get_contents($this->session->userdata('file_url'));
		$name = $this->session->userdata('file_name');
		
		force_download($name, $data); 
	}
	
	public function set_download_data(){		
		$data = array('status' => NULL);
		
		$this->load->library('session');
		
		$this->session->unset_userdata('file_name');
		$this->session->unset_userdata('file_url');
		
		$this->session->set_userdata('file_name', $this->input->post('file_name'));
		$this->session->set_userdata('file_url', $this->input->post('file_url'));
		
		if($this->session->userdata('file_name') && $this->session->userdata('file_url')){
			$data['status'] = TRUE;
		}
		echo json_encode($data);
	}
}