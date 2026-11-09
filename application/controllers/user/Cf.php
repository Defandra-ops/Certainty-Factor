<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cf extends CI_Controller {

	function __construct() {
		parent :: __construct();

		if ($this->session->userdata('role') == "user") {
			$this->load->model('model_pengetahuan');
			$this->load->model('model_penyakit');
			$this->load->model('model_gejala');
			$this->load->model('model_konsultasi');
		} else {
			$this->session->set_flashdata('pesan', 'Anda Belum Login');
			redirect(site_url('home/login'));
			exit;
		}
	}

	public function index()
	{		

		$data['tabelpengetahuan'] = $this->model_pengetahuan->getdata();
		$data['tabelpenyakit'] = $this->model_penyakit->getdata();
		$data['tabelgejala'] = $this->model_gejala->getdata();
		
		$data['content'] = 'view_cf2';
		$data['title'] = 'Analisa CF';
		$this->load->view('user/template_user', $data); 

	}	
	
	public function save()
	{
		$data = array(
			'user'=>$this->session->userdata('userlogin'),
			'gejala'=>$this->input->post('gejala'),
			'penyakit'=>$this->input->post('penyakit'),
			'nilaicf'=>$this->input->post('nilaicf'),
		);
		$this->model_konsultasi->insertdata($data);
		$data['message'] = 'Data tersimpan!';
		redirect(site_url('user/home'));
		 
	}

}
