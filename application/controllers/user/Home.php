<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	function __construct() {
		parent :: __construct();

		if ($this->session->userdata('role') == "user") {
		} else {
			$this->session->set_flashdata('pesan', 'Anda Belum Login');
			redirect(site_url('home/login'));
			exit;
		}
	}

	public function index()
	{
		$this->load->model('model_gejala');
		$this->load->model('model_penyakit');
		$this->load->model('model_pengetahuan');
		$data['gejalacount'] = $this->model_gejala->countdata();
		$data['penyakitcount'] = $this->model_penyakit->countdata();
		$data['pengetahuancount'] = $this->model_pengetahuan->countdata();
		$data['content'] = 'view_admin';
		$data['title'] = 'user';
		$this->load->view('user/template_user', $data);
	}

	public function cekusername() 
	{
		$this->load->model('model_login');
		$row = $this->model_login->cek_username($this->input->post('username'));
		if ($row) 
		{
			
		}
		else
		{
			
		}
		
	}

	public function ganti_password()
	{
		$data['content'] = 'view_ganti_password';
		$data['title'] = 'Ganti Password';
		$this->load->view('admin/template_user', $data);
	}
	
	public function update_password()
	{
		$username = $this->session->userdata('userlogin');
		$this->load->model('model_login');
		$rowlogin = $this->model_login->cek($username, $this->input->post('lama'));
		if ($rowlogin) 
		{
			if ($this->input->post('baru') == $this->input->post('konfirmasi')) {
				$data = array(
					'password'=>$this->input->post('baru')
					);
				$this->load->model('model_login');
				$this->model_login->updatedata($data, $username);
				
				$this->session->set_flashdata('success', 'Password Berhasil Diubah');
				redirect(site_url('user/home/ganti_password'));	
			} else {
				$this->session->set_flashdata('failed', 'Password Baru Tidak Sama Dengan Konfirmasi');
				redirect(site_url('user/home/ganti_password'));		
			}
		}
		else
		{
			$this->session->set_flashdata('failed', 'Password Lama Salah');
			redirect(site_url('user/home/ganti_password'));
		}

		
	}

	public function user()
	{
		$this->load->model('model_login');
		$data['tabellogin'] = $this->model_login->selectdataby('role !=','karyawan');
		$data['content'] = 'view_user';
		$data['title'] = 'User';
		$this->load->view('admin/template_user', $data);
	}

	public function add_user()
	{
		$data['content'] = 'view_add_user';
		$data['title'] = 'Add User';
		$this->load->view('user/template_user', $data);
	}
	
	public function edit_user() 
	{
		$id = urldecode($this->uri->segment(4));
		$this->load->model('model_login');
		$data['rowlogin'] = $this->model_login->selectdata($id);
		$data['content'] = 'view_edit_user';
		$data['title'] = 'Edit User';
		$this->load->view('user/template_user', $data);
	}

	public function save()
	{
		$data = array(
			'nama'=>$this->input->post('nama'),
			'username'=>$this->input->post('username'),
			'password'=>$this->input->post('password'),
			'role'=>$this->input->post('role')
			);
		$this->load->model('model_login');
		$this->model_login->insertdata($data);
		
		redirect(site_url('user/home/user'));
	}

	public function update()
	{
		$id = $this->uri->segment(4);
		$data = array(
			'nama'=>$this->input->post('nama'),
			'username'=>$this->input->post('username'),
			'password'=>$this->input->post('password'),
			'role'=>$this->input->post('role')
			);
		$this->load->model('model_login');
		$this->model_login->updatedata($data, $id);
		
		redirect(site_url('user/home/user'));
	}

	public function delete()
	{
		$id = urldecode($this->uri->segment(4));
		$this->load->model('model_login');
		$this->model_login->deletedata($id);
		
		redirect(site_url('user/home/user'));
	}
}
