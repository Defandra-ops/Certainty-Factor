<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengetahuan extends CI_Controller {

	function __construct() {
		parent :: __construct();

		if ($this->session->userdata('role') == "admin") {
			$this->load->model('model_penyakit');
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
		$data['tabelpengetahuan'] = $this->model_pengetahuan->getdata();
		$data['tabelpenyakit'] = $this->model_penyakit->getdata();
		$data['tabelgejala'] = $this->model_gejala->getdata();
		$data['content'] = 'view_pengetahuan';
		$data['title'] = 'Pengetahuan';
		$this->load->view('admin/template_admin', $data);
	}
	
	public function add()
	{
		$data['content'] = 'view_add_pengetahuan';
		$data['tabelpenyakit'] = $this->model_penyakit->getdata();
		$data['tabelgejala'] = $this->model_gejala->getdata();
		$data['title'] = 'Add Pengetahuan';
		$this->load->view('admin/template_admin', $data);
	}

	public function save()
	{
		$data = array(
			'id_penyakit'=>$this->input->post('id_penyakit'),
			'id_gejala'=>$this->input->post('id_gejala'),
			'mb'=>$this->input->post('mb'),
			'md'=>$this->input->post('md'),
			);
		$this->model_pengetahuan->insertdata($data);
		
		redirect(site_url('admin/pengetahuan'));
	}

	public function delete()
	{
		$id = $this->uri->segment(4);
		$this->model_pengetahuan->deletedata($id);
		
		redirect(site_url('admin/pengetahuan'));
	}
	
	public function edit() 
	{
		$id = $this->uri->segment(4);
		$data['rowpengetahuan'] = $this->model_pengetahuan->selectdata($id);
		$data['tabelpenyakit'] = $this->model_penyakit->getdata();
		$data['tabelgejala'] = $this->model_gejala->getdata();
		$data['content'] = 'view_edit_pengetahuan';
		$data['title'] = 'Edit Pengetahuan';
		$this->load->view('admin/template_admin', $data);
	}
	
	public function update()
	{
		$id = $this->uri->segment(4);
		$data = array(
			'id_penyakit'=>$this->input->post('id_penyakit'),
			'id_gejala'=>$this->input->post('id_gejala'),
			'mb'=>$this->input->post('mb'),
			'md'=>$this->input->post('md'),
			);
		$this->model_pengetahuan->updatedata($data, $id);
		
		redirect(site_url('admin/pengetahuan'));	
	}
}
