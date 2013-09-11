<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Captcha extends CI_Controller {

	public function index(){
		$captcha = $this->set_up_captcha();
		$data['image'] = $captcha['image'];
		$this->session->set_userdata('captcha', $captcha['word']);
		$this->load->view('captcha', $data);
	}
	
	public function validate_captcha(){
		$data = array('captcha' => NULL, 'status' => NULL);
		
		$this->load->library('form_validation');
		$this->form_validation->set_rules('captcha','Captcha','required');
		
		if($this->form_validation->run() === FALSE){
			$data['captcha'] = strip_tags(form_error('captcha'));
			$data['status'] = FALSE;
		}
		else if($this->input->post('captcha') !== $this->session->userdata('captcha')){
			$data['captcha'] = "Sorry! Try again...";
			$data['status'] = FALSE;
		}
		else{
			$data['status'] = TRUE;
		}
		echo json_encode($data);
	}
	
	public function set_up_captcha(){
		$this->load->helper('captcha');
		$key = $this->generate_random_keyword();
		$vals = array(
			'word'	=> $key,
			'img_path'     => './assets/captcha/',
			'img_url'     => base_url() . '/assets/captcha/',
			'img_width'     => '150',
			'img_height' => '35',
			'border' => 0, 
			'font_path'  => './assets/fonts/verdana.ttf',
			'expiration' => 3600
		);
		$captcha = create_captcha($vals);
		return $captcha;
	}
	
	public function generate_captcha(){
		$captcha = $this->set_up_captcha();
		$this->session->unset_userdata('captcha');
		$this->session->set_userdata('captcha', $captcha['word']);
		$data['image'] = $captcha['image'];
		//echo json_encode($data);
		echo $data['image'];
	}
	
	public function generate_random_keyword(){
		$chars = array(
			'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 
			'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p',
			'q', 'r', 's', 't', 'u', 'v', 'w', 'x',
			'y', 'z'
		);
		$symbols = array('$', '&', '+', '<', '>', '?', '!');
		
		$key = '';
		$temp = array();
		for($i=1; $i<7; $i++){
			$item = array();
			$item[] = $chars[rand(0,25)];
			$item[] = rand(0,9);
			$item[] = strtoupper($chars[rand(0,25)]);
			$item[] = $symbols[rand(0,6)];
			$temp[] = $item[rand(0,3)];
		}
		shuffle($temp);
		foreach($temp as $t){
			$key = $key . $t;
		}
		return $key;
	}
}

/* End of file captcha.php */
/* Location: ./application/controllers/captcha.php */