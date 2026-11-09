<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gejala extends CI_Controller {

	function __construct() {
		parent :: __construct();

		if ($this->session->userdata('role') == "admin") {
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
		$this->load->view('admin/template_admin', $data);
	}
	
	public function add()
	{
		$data['content'] = 'view_add_gejala';
		$data['title'] = 'Add Gejala';
		$this->load->view('admin/template_admin', $data);
	}

	public function save()
	{
		$data = array(
			'nama_gejala'=>$this->input->post('nama_gejala'),
			);
		$this->model_gejala->insertdata($data);
		
		redirect(site_url('admin/gejala'));
	}

	public function delete()
	{
		$id = $this->uri->segment(4);
		$this->model_gejala->deletedata($id);
		$this->model_pengetahuan->deletedatagejala($id);
		
		redirect(site_url('admin/gejala'));
	}
	
	public function edit() 
	{
		$id = $this->uri->segment(4);
		$data['rowgejala'] = $this->model_gejala->selectdata($id);
		$data['content'] = 'view_edit_gejala';
		$data['title'] = 'Edit Gejala';
		$this->load->view('admin/template_admin', $data);
	}
	
	public function update()
	{
		$id = $this->uri->segment(4);
		$data = array(
			'nama_gejala'=>$this->input->post('nama_gejala'),
			);
		$this->model_gejala->updatedata($data, $id);
		
		redirect(site_url('admin/gejala'));	
	}
}
