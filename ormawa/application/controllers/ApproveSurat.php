<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ApproveSurat extends E_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model("ModelApproveSurat");
    }

    function index()
    {
        $approvesurat = $this->ModelApproveSurat->get_data()->result();

        $data = array(
            'body' => 'ApproveSurat/list',
            'approvesurat' => $approvesurat
        );
        $this->load->view('index', $data);
    }

    function detail_lampiran()
    {
        $id = $this->input->post('id');

        $lampiran = $this->db->get_where('tb_lampiran_surat', array('id_surat' => $id))->result();
        // $syarat_surat = array('ktp','kk','sktm','khs','daful');
        foreach ($lampiran as $value) {
            echo '<b style="text-align:center" >File ' . $value->jenis_syarat . '</b> : ';
            echo '<a style="text-align:center" href="file/' . $value->lampiran . '" target="_blank"> <button class="btn btn-primary btn-sm">Lihat File</button></a><br><br>';
        }
    }

    function detail_mahasiswa()
    {

        $id = $this->input->post('id');

        $json = $this->ModelApproveSurat->get_data_detail($id)->row_array();
        echo json_encode($json);
    }

    function approvesurat()
    {
        $id = $this->input->post('id_surat');
        $nama_file = '';

        if ($_FILES['file_surat']['name']) {
            // File upload configuration
            $uploadPath = 'file/';
            $config['upload_path'] = $uploadPath;
            $config['allowed_types'] = 'pdf|PDF';
            $config['encrypt_name'] = TRUE;

            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            if ($this->upload->do_upload('file_surat')) {
                $fileData = $this->upload->data();
                $nama_file = $fileData['file_name'];
            } else {
                $this->session->set_flashdata("notif", $this->Notif->gagal("Gagal Input File Surat, File tidak sesuai ketentuan"));
                redirect(base_url() . "ApproveSurat");
            }
        }

        $approvesurat = array(
            'status' => 1,
            'file_surat' => $nama_file
        );
        // var_dump($approvesurat);
        // die;
        $this->db->where("id", $id);
        if ($this->db->update("tb_surat", $approvesurat)) {
            $this->session->set_flashdata("notif", $this->Notif->berhasil("Berhasil Approve Surat"));
            redirect(base_url() . "ApproveSurat");
        } else {
            $this->session->set_flashdata("notif", $this->Notif->gagal("Gagal Approve Surat"));
            redirect(base_url() . "ApproveSurat");
        }
    }
}
