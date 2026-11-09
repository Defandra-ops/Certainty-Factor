<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Konsultasi extends CI_Controller {

	function __construct() {
		parent :: __construct();

		if ($this->session->userdata('role') == "user") {
			$this->load->model('model_konsultasi');
		} else {
			$this->session->set_flashdata('pesan', 'Anda Belum Login');
			redirect(site_url('home/login'));
			exit;
		}
	}

	public function index()
	{
		$data['tabelkonsultasi'] = $this->model_konsultasi->getdata();
		$data['content'] = 'view_konsultasi';
		$data['title'] = 'Konsultasi';
		$this->load->view('user/template_user', $data);
	}

	public function cetak()
	{
		$data['tabelkonsultasi'] = $this->model_konsultasi->getdata();
		$data['content'] = 'view_cetak_konsultasi';
		$data['title'] = 'Konsultasi';
		$this->load->view('user/template_cetak', $data);
	}
}
