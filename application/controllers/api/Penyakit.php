<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penyakit extends CI_Controller {

	function __construct() {
		parent :: __construct();
		$this->load->model('model_penyakit');
	}

	public function index()
	{
		$data['error'] = false;
		$data['message'] = 'Berhasil mendapatkan data penyakit';
		$data['semuapenyakit'] = $this->model_penyakit->getdata();
        echo json_encode($data, JSON_HEX_QUOT | JSON_HEX_TAG);
	}

    public function detail()
    {
        $id = $this->uri->segment(4);
        if ($this->model_penyakit->countdataby('id_penyakit', $id) == 0) {
            $data["error"] = true;
            $data["message"] = "Belum menambahkan penyakit";
        } else {
            $data['error'] = false;
            $data['message'] = 'Berhasil mendapatkan data penyakit';
            $data['penyakit'] = $this->model_penyakit->selectdataby('id_penyakit',$id);
        }
        echo json_encode($data, JSON_HEX_QUOT | JSON_HEX_TAG);
    }
    
}
