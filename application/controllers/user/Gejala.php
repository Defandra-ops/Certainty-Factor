<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gejala extends CI_Controller {

	function __construct() {
		parent :: __construct();

		if ($this->session->userdata('role') == "user") {
			$this->load->model('model_gejala');
			$this->load->model('model_pengetahuan');
		} else {
			$this->session->set_flashdata('pesan', 'Anda Belum Login');
			redirect(site_url('home/login'));
			exit;
		}
	}

	public function index()
	{
		$data['tabelgejala'] = $this->model_gejala->getdata();
		$data['content'] = 'view_gejala';
		$data['title'] = 'Gejala';
		$this->load->view('admin/template_user', $data);
	}
	
}
