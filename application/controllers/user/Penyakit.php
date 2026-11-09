<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penyakit extends CI_Controller {

	function __construct() {
		parent :: __construct();

		if ($this->session->userdata('role') == "user") {
			$this->load->model('model_penyakit');
			$this->load->model('model_pengetahuan');
		} else {
			$this->session->set_flashdata('pesan', 'Anda Belum Login');
			redirect(site_url('home/login'));
			exit;
		}
	}

	public function index()
	{
		$data['tabelpenyakit'] = $this->model_penyakit->getdata();
		$data['content'] = 'view_penyakit';
		$data['title'] = 'Penyakit';
		$this->load->view('user/template_user', $data);
	}
}