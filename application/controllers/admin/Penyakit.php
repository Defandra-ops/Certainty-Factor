<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penyakit extends CI_Controller {

	function __construct() {
		parent :: __construct();

		if ($this->session->userdata('role') == "admin") {
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
		$this->load->view('admin/template_admin', $data);
	}
	
	public function add()
	{
		$data['content'] = 'view_add_penyakit';
		$data['title'] = 'Add Penyakit';
		$this->load->view('admin/template_admin', $data);
	}

	public function save()
	{
		$data = array(
			'nama_penyakit'=>$this->input->post('nama_penyakit'),
			'deskripsi'=>$this->input->post('deskripsi'),
			'solusi'=>$this->input->post('solusi'),
			);
		$this->model_penyakit->insertdata($data);
		
		redirect(site_url('admin/penyakit'));
	}

	public function delete()
	{
		$id = $this->uri->segment(4);
		$this->model_penyakit->deletedata($id);
		$this->model_pengetahuan->deletedatapenyakit($id);
		
		redirect(site_url('admin/penyakit'));
	}
	
	public function edit() 
	{
		$id = $this->uri->segment(4);
		$data['rowpenyakit'] = $this->model_penyakit->selectdata($id);
		$data['content'] = 'view_edit_penyakit';
		$data['title'] = 'Edit Penyakit';
		$this->load->view('admin/template_admin', $data);
	}
	
	public function update()
	{
		$id = $this->uri->segment(4);
		$data = array(
			'nama_penyakit'=>$this->input->post('nama_penyakit'),
			'deskripsi'=>$this->input->post('deskripsi'),
			'solusi'=>$this->input->post('solusi'),
			);
		$this->model_penyakit->updatedata($data, $id);
		
		redirect(site_url('admin/penyakit'));	
	}
}
