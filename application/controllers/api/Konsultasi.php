<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Konsultasi extends CI_Controller {

	function __construct() {
		parent :: __construct();
		$this->load->model('model_konsultasi');
	}

	public function index()
	{
		$data['error'] = false;
		$data['message'] = 'Berhasil mendapatkan data konsultasi';
		$data['semuakonsultasi'] = $this->model_konsultasi->getdata();
        echo json_encode($data, JSON_HEX_QUOT | JSON_HEX_TAG);
	}

    public function filter()
    {
        $id = $this->uri->segment(4);
        if ($this->model_konsultasi->countdataby('user', $id) == 0) {
            $data["error"] = true;
            $data["message"] = "Belum menambahkan konsultasi";
        } else {
            $data['error'] = false;
            $data['message'] = 'Berhasil mendapatkan data konsultasi';
            $data['semuakonsultasi'] = $this->model_konsultasi->filterdataby('user',$id);
        }
        echo json_encode($data, JSON_HEX_QUOT | JSON_HEX_TAG);
    }

    public function detail()
    {
        $id = $this->uri->segment(4);
        if ($this->model_konsultasi->countdataby('id_konsultasi', $id) == 0) {
            $data["error"] = true;
            $data["message"] = "Belum menambahkan konsultasi";
        } else {
            $data['error'] = false;
            $data['message'] = 'Berhasil mendapatkan data konsultasi';
            $data['konsultasi'] = $this->model_konsultasi->selectdataby('id_konsultasi',$id);
        }
        echo json_encode($data, JSON_HEX_QUOT | JSON_HEX_TAG);
    }
    
}
