<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModelPegawai extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  function get_data()
  {
    $this->db->where("status_pegawai","1");
    return $this->db->get("pegawai");
  }

  public function get_data_edit($nik)
  {
    return $this->db->get_where('pegawai', array('nik' => $nik))->row_array();
  }

  public function get_hitung($nik)
  {
    return $this->db->get_where('pegawai', array('nik' => $nik));
  }

  public function get_jabatan_pegawai($jabatan)
  {
    $this->db->where_in("jabatan_sekarang", $jabatan);
    return $this->db->get("pegawai");
  }

  function get_all_pendidikan($nik)
  {
    return $this->db->get_where('riwayat_pendidikan', array('pegawai_nik' => $nik));
  }
  function get_all_jabatan($nik)
  {
    return $this->db->get_where('riwayat_jabatan', array('pegawai_nik' => $nik));
  }

  public function get_jabatan_aparatur($idjabatan, $jk)
  {
    $this->db->where("unsur", $idjabatan);
    $this->db->where("aktif", 1);
    $this->db->where("jk", $jk);
    return $this->db->get("pegawai");
  }

  function enrollDosen($nip)
  {
    $result = json_decode(Bridge("kepegawaian/pegawai",array(
      "nip" => $nip,
      "informations"      => false,
      "with_informations" => false,
    )));
    if (sizeof($result) > 0) {
      $dbDosen = $this->db->get_where("responden",array("username"=>$nip))->row_array();
      if ($dbDosen <= 0) {
        $responden = array(
          'nik'             => $nip,
          'nama'            => $result[0]->nama_lengkap,
          'create_on'       => date("Y-m-d"),
          'status_pegawai'  => "1",
          'aktif'           => "1",
          'username'        => $nip,
          'password'        => password_hash($nip, PASSWORD_DEFAULT,array("cost"=>10))
        );
        $this->db->insert("responden",$responden);

        $data_user = array(
          'Nama'            => $nip,
          'Jabatan'         => "Dosen",
          'password'        => password_hash($nip, PASSWORD_DEFAULT,array("cost"=>10)),
          'roles'           => "Home, Penelitian, Pengabdian, LaporanAkhirPenelitian, LaporanAkhirPengabdian, LaporanKemajuanPenelitian, LaporanKemajuanPengabdian",
          'create_on'       => date("Y-m-d H:i:s"),
          'pegawai_NIK'     => $nip
        );
        $this->db->insert("user", $data_user);
      }
      $response = array(
        'username'  => $nip,
        'password'  => $nip,
        'status'    => 200,
        'pesan'     => "Berhasil"
      );
    }else {
      $response = array(
        'status'    => 404,
        'pesan'     => "Data Tidak Ditemukan"
      );
    }
    return $response;
  }


}
