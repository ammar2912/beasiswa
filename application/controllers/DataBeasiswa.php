<?php
class DataBeasiswa extends CI_Controller{

	function __construct(){
		parent::__construct();
		$this->load->model("ModelDetail");
	}

	function index(){
        $data['all_data'] = $this->ModelDetail->get_all();
        $this->load->view('Beasiswa/databeasiswa',$data);
	}

	function tambahbeasiswa(){
		$this->load->view('Beasiswa/tambahbeasiswa');
	}

	function insertbeasiswa(){
		$data = array(
            'namabeasiswa' => $this->input->post('nama'),
            'deskripsi' => $this->input->post('deskripsi'),
            'penyelenggara' => $this->input->post('penyelenggara'),
            'lamabeasiswa' => $this->input->post('lamabeasiswa'),
            'tanggalpendaftaran' => $this->input->post('tanggalpendaftaran'),
            'tanggalpenutupan' => $this->input->post('tanggalpenutupan'),
            'persyaratan' => $this->input->post('persyaratan')
        );

        $this->ModelDetail->insertBeasiswa($data); // Panggil method updateData pada model dengan parameter name dan data
        redirect('DataBeasiswa');
	}

	public function edit($id) {
        $data['edit_data'] = $this->ModelDetail->get_by_id($id);

        $this->load->view('Beasiswa/editbeasiswa', $data);
    }

	public function update() {
        $id = $this->input->post('id');

		$data = array(
            'namabeasiswa' => $this->input->post('nama'),
            'deskripsi' => $this->input->post('deskripsi'),
            'penyelenggara' => $this->input->post('penyelenggara'),
            'lamabeasiswa' => $this->input->post('lamabeasiswa'),
            'tanggalpendaftaran' => $this->input->post('tanggalpendaftaran'),
            'tanggalpenutupan' => $this->input->post('tanggalpenutupan'),
            'persyaratan' => $this->input->post('persyaratan')
        );

        $this->ModelDetail->updateBeasiswa($id, $data);
        redirect('DataBeasiswa');
    }
}