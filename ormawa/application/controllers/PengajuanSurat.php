<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PengajuanSurat extends E_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model("ModelJenisSurat");
        $this->load->model("ModelMahasiswa");
    }

    function index()
    {
        $jenissurat = $this->db->get_where('tb_jenis_surat', array('status' => 1))->result();
        $user =  $this->ModelMahasiswa->get_data_login($this->session->userdata('id'))->row_array();
        $data = array(
            'surat' => $jenissurat,
            'user' => $user,
            'body' => 'PengajuanSurat/input',
            'form' => 'PengajuanSurat/form',
        );
        $this->load->view('index', $data);
    }

    function cek_syarat()
    {
        $id =  $this->input->post("id");
        $jenissurat = $this->ModelJenisSurat->get_data_edit($id);

        echo json_encode($jenissurat);
        // var_dump($jenissurat);
    }

    function insert()
    {
        $id_user = $this->input->post("id_user");
        $jenis_surat = $this->input->post("jenis_surat");
        $subjek = $this->input->post("subjek");
        $jenis_syarat = $this->input->post("jenis_syarat");

        // post dari inputan form-beasiswa
        $nama = $this->input->post("nama");
        $nim = $this->input->post("nim");
        $jurusan = $this->input->post("jurusan");
        $prodi = $this->input->post("prodi");
        $semester = $this->input->post("semester");
        $ips = $this->input->post("ips");
        $jenis_kelamin = $this->input->post("jenis_kelamin");
        $tempat_lahir = $this->input->post("tempat_lahir");
        $tanggal_lahir = $this->input->post("tanggal_lahir");
        $nama_ayah = $this->input->post("nama_ayah");
        $nama_ibu = $this->input->post("nama_ibu");
        $pekerjaan_ayah = $this->input->post("pekerjaan_ayah");
        $pekerjaan_ibu = $this->input->post("pekerjaan_ibu");
        $penghasilan_ayah = $this->input->post("penghasilan_ayah");
        $penghasilan_ibu = $this->input->post("penghasilan_ibu");
        $status_ayah = $this->input->post("status_ayah");
        $status_ibu = $this->input->post("status_ibu");
        $tanggungan_anak = $this->input->post("tanggungan_anak");

        $jumlah = explode(",", $jenis_syarat);
        $date = date('Y-m-d H:i:s');

        $jumlah_berhasil = '';
        $data_lampiran = [];


        $count1 = count($_FILES['syarat']['name']);

        for ($i = 0; $i < $count1; $i++) {
            $syarat_surat = $jumlah[$i];
            $nama_file = '';
            $_FILES['file']['name']     = $_FILES['syarat']['name'][$i];
            $_FILES['file']['type']     = $_FILES['syarat']['type'][$i];
            $_FILES['file']['tmp_name'] = $_FILES['syarat']['tmp_name'][$i];
            $_FILES['file']['error']     = $_FILES['syarat']['error'][$i];
            $_FILES['file']['size']     = $_FILES['syarat']['size'][$i];

            // File upload configuration
            $uploadPath = 'file/';
            $config['upload_path'] = $uploadPath;
            $config['allowed_types'] = 'pdf|docx|doc|PDF|DOC|DOCX|jpg|png|jpeg|JPG|JPEG|PNG';
            $config['encrypt_name'] = TRUE;

            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            if ($this->upload->do_upload('file')) {

                $fileData = $this->upload->data();
                $nama_file = $fileData['file_name'];

                array_push($data_lampiran, $nama_file);
                $jumlah_berhasil += 1;
            } else {
                $this->session->set_flashdata("notif", $this->Notif->gagal("Gagal Mengajukan Surat, File Lampiran Gagal diupload !"));
                redirect(base_url() . "PengajuanSurat");
            }
        }

        if ($jumlah_berhasil == $count1) {

            // insert berdasarkan surat
            $data = array('id_user' => $id_user, 'jenis_surat' => $jenis_surat, 'subjek' => $subjek, 'date' => $date);
            $surat = $this->db->insert('tb_surat', $data);

            $cek_id = $this->db->get_where('tb_data_beasiswa', array('id_mahasiswa' => $id_user))->row_array();


            if ($cek_id) {
              if ($jenis_surat == 1 || $jenis_surat == 2) {
                $data = [
                    'nama' => $nama,
                    'nim' => $nim,
                    'prodi' => $prodi,
                    'jurusan' => $jurusan,
                    'semester' => $semester,
                    'ips' => $ips,
                    'jenis_kelamin' => $jenis_kelamin,
                    'tempat_lahir' => $tempat_lahir,
                    'tanggal_lahir' => $tanggal_lahir,
                    'nama_ayah' => $nama_ayah,
                    'nama_ibu' => $nama_ibu,
                    'pekerjaan_ayah' => $pekerjaan_ayah,
                    'pekerjaan_ibu' => $pekerjaan_ibu,
                    'penghasilan_ayah' => $penghasilan_ayah,
                    'penghasilan_ibu' => $penghasilan_ibu,
                    'status_ayah' => $status_ayah,
                    'status_ibu' => $status_ibu,
                    'tanggungan_anak' => $tanggungan_anak
                ];

                $this->db->where('id_mahasiswa', $id_user);
                $this->db->update('tb_data_beasiswa', $data);
              } else {
                $data = [
                    'nama' => $nama,
                    'nim' => $nim,
                    'prodi' => $prodi,
                    'jurusan' => $jurusan,
                    'semester' => $semester
                ];

                $this->db->where('id_mahasiswa', $id_user);
                $this->db->update('tb_data_beasiswa', $data);
              }

            } else {
              // insert ke beasiswa
              $dataBeasiswa = [
                  'id_mahasiswa' => $id_user,
                  'nama' => $nama,
                  'nim' => $nim,
                  'prodi' => $prodi,
                  'jurusan' => $jurusan,
                  'semester' => $semester,
                  'ips' => $ips,
                  'jenis_kelamin' => $jenis_kelamin,
                  'tempat_lahir' => $tempat_lahir,
                  'tanggal_lahir' => $tanggal_lahir,
                  'nama_ayah' => $nama_ayah,
                  'nama_ibu' => $nama_ibu,
                  'pekerjaan_ayah' => $pekerjaan_ayah,
                  'pekerjaan_ibu' => $pekerjaan_ibu,
                  'penghasilan_ayah' => $penghasilan_ayah,
                  'penghasilan_ibu' => $penghasilan_ibu,
                  'status_ayah' => $status_ayah,
                  'status_ibu' => $status_ibu,
                  'tanggungan_anak' => $tanggungan_anak
              ];

              $this->db->insert('tb_data_beasiswa', $dataBeasiswa);
            }

            // var_dump($beasiswa);
            // die;

            $get_id = $this->db->get_where('tb_surat', array('date' => $date))->row();
            $id_surat =  $get_id->id;

            for ($i = 0; $i < $count1; $i++) {

                $syarat = $jumlah[$i];
                $lampiran = $data_lampiran[$i];

                $datas  = array(
                    'jenis_syarat' => $syarat,
                    'id_surat' => $id_surat,
                    'lampiran' =>  $lampiran,
                );

                $this->db->insert('tb_lampiran_surat', $datas);
            }

            $this->session->set_flashdata("notif", $this->Notif->berhasil("Berhasil Mengajukan Surat"));
            redirect(base_url() . "HistorySurat");
        } else {
            $this->session->set_flashdata("notif", $this->Notif->gagal("Gagal Mengajukan Surat"));
            redirect(base_url() . "HistorySurat");
        }
    }

}
