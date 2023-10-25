<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModelHome extends CI_Model{


  /**

  * @author Fendrik Nurul Jadid <fendrik1311@gmail.com>

  * @since v.1.0

  **/


  public function __construct()
  {
      parent::__construct();
      //Codeigniter : Write Less Do More
  }


  public function get_data_totalbarang(){
    $barang_masuk_hari_ini = $this->db
    ->select("SUM(jumlah) as jumlah_total")
    ->where("stok_awal !=",1)
    ->where("DATE(tanggal)",date("Y-m-d"))
    ->get("detail_barang_masuk")->row();
    $barang_keluar_hari_ini = $this->db
    ->select("SUM(jumlah) as jumlah_total")
    ->where("DATE(tanggal)",date("Y-m-d"))
    ->get("detail_barang_keluar")->row();
    $barang_masuk_bulan_ini = $this->db
    ->select("SUM(jumlah) as jumlah_total")
    ->where("stok_awal !=",1)
    ->where("MONTH(tanggal)",date("m"))
    ->where("YEAR(tanggal)",date("Y"))
    ->get("detail_barang_masuk")->row();
    $barang_keluar_bulan_ini = $this->db
    ->select("SUM(jumlah) as jumlah_total")
    ->where("MONTH(tanggal)",date("m"))
    ->where("YEAR(tanggal)",date("Y"))
    ->get("detail_barang_keluar")->row();

    $barang_masuk = $this->db
    ->select("SUM(jumlah) as jumlah_total")
    ->where("stok_awal !=",1)
    ->get("detail_barang_masuk")->row();
    $barang_keluar = $this->db
    ->select("SUM(jumlah) as jumlah_total")
    ->get("detail_barang_keluar")->row();
    $jumlah_barang = $this->db
    ->get("barang")->num_rows();
    $inventaris = $this->db
    ->select("SUM(jumlah) as jumlah_total")
    ->get("inventaris")->row();
    $distribusi = $this->db
    ->select("*,SUM(jumlah) as jumlah_total")
    ->join("unit","unit_idunit=idunit")
    ->group_by("idunit")
    ->join("detail_barang_keluar","barang_keluar_no_dokumen=no_dokumen")
    ->where("YEAR(tanggal_keluar)",date("Y"))
    ->get("barang_keluar")->result();
    $response = array();
    foreach ($distribusi as $value) {
      array_push($response,array(
        "unit" => $value->nama_unit,
        'jumlah' => $value->jumlah_total
      ));
    }

    return $data = array(
      'total' => $jumlah_barang,
      'masuk' => $barang_masuk->jumlah_total==NULL?0:$barang_masuk->jumlah_total,
      'keluar' => $barang_keluar->jumlah_total==NULL?0:$barang_keluar->jumlah_total,
      'inventaris' => $inventaris->jumlah_total==NULL?0:$inventaris->jumlah_total,
      'masuk_hari_ini' =>$barang_masuk_hari_ini->jumlah_total==NULL?0:$barang_masuk_hari_ini->jumlah_total,
      'keluar_hari_ini' =>$barang_keluar_hari_ini->jumlah_total==NULL?0:$barang_keluar_hari_ini->jumlah_total,
      'masuk_bulan_ini' =>$barang_masuk_bulan_ini->jumlah_total==NULL?0:$barang_masuk_bulan_ini->jumlah_total,
      'keluar_bulan_ini' =>$barang_keluar_bulan_ini->jumlah_total==NULL?0:$barang_keluar_bulan_ini->jumlah_total,
      'grafik' => json_encode($response)
    );
  }


  public function get_data_totalbarang_semua(){
    $barang_masuk_hari_ini = $this->db
    ->select("SUM(jumlah) as jumlah_total")
    ->where("stok_awal !=",1)
    ->where("DATE(tanggal)",date("Y-m-d"))
    ->get("detail_barang_masuk")->row();
    $barang_keluar_hari_ini = $this->db
    ->select("SUM(jumlah) as jumlah_total")
    ->where("DATE(tanggal)",date("Y-m-d"))
    ->get("detail_barang_keluar")->row();
    $barang_masuk_bulan_ini = $this->db
    ->select("SUM(jumlah) as jumlah_total")
    ->where("stok_awal !=",1)
    ->where("MONTH(tanggal)",date("m"))
    ->where("YEAR(tanggal)",date("Y"))
    ->get("detail_barang_masuk")->row();
    $barang_keluar_bulan_ini = $this->db
    ->select("SUM(jumlah) as jumlah_total")
    ->where("MONTH(tanggal)",date("m"))
    ->where("YEAR(tanggal)",date("Y"))
    ->get("detail_barang_keluar")->row();

    $barang_masuk = $this->db
    ->select("SUM(jumlah) as jumlah_total")
    ->where("stok_awal !=",1)
    ->get("detail_barang_masuk")->row();
    $barang_keluar = $this->db
    ->select("SUM(jumlah) as jumlah_total")
    ->get("detail_barang_keluar")->row();
    $jumlah_barang = $this->db
    ->get("barang")->num_rows();
    $inventaris = $this->db
    ->select("SUM(jumlah) as jumlah_total")
    ->get("inventaris")->row();
    $distribusi = $this->db
    ->select("*,SUM(jumlah) as jumlah_total")
    ->join("unit","unit_idunit=idunit")
    ->group_by("idunit")
    ->join("detail_barang_keluar","barang_keluar_no_dokumen=no_dokumen")
    ->where("YEAR(tanggal_keluar)",date("Y"))
    ->get("barang_keluar")->result();
    $response = array();
    foreach ($distribusi as $value) {
      array_push($response,array(
        "unit" => $value->nama_unit,
        'jumlah' => $value->jumlah_total
      ));
    }

    return $data = array(
      'total' => $jumlah_barang,
      'masuk' => $barang_masuk->jumlah_total==NULL?0:$barang_masuk->jumlah_total,
      'keluar' => $barang_keluar->jumlah_total==NULL?0:$barang_keluar->jumlah_total,
      'inventaris' => $inventaris->jumlah_total==NULL?0:$inventaris->jumlah_total,
      'masuk_hari_ini' =>$barang_masuk_hari_ini->jumlah_total==NULL?0:$barang_masuk_hari_ini->jumlah_total,
      'keluar_hari_ini' =>$barang_keluar_hari_ini->jumlah_total==NULL?0:$barang_keluar_hari_ini->jumlah_total,
      'masuk_bulan_ini' =>$barang_masuk_bulan_ini->jumlah_total==NULL?0:$barang_masuk_bulan_ini->jumlah_total,
      'keluar_bulan_ini' =>$barang_keluar_bulan_ini->jumlah_total==NULL?0:$barang_keluar_bulan_ini->jumlah_total,
      'grafik' => json_encode($response)
    );
  }

  public function get_data_totalbarang_inventaris(){
    $barang_masuk_hari_ini = $this->db
    ->select("SUM(jumlah) as jumlah_total")
    ->where("stok_awal !=",1)
    ->where("DATE(tanggal)",date("Y-m-d"))
    ->get("detail_inventaris_masuk")->row();
    $barang_keluar_hari_ini = $this->db
    ->select("SUM(jumlah) as jumlah_total")
    ->where("DATE(tanggal_input)",date("Y-m-d"))
    ->where("kode_input",NULL)
    ->get("inventaris")->row();
    $barang_masuk_bulan_ini = $this->db
    ->select("SUM(jumlah) as jumlah_total")
    ->where("stok_awal !=",1)
    ->where("MONTH(tanggal)",date("m"))
    ->where("YEAR(tanggal)",date("Y"))
    ->get("detail_inventaris_masuk")->row();
    $barang_keluar_bulan_ini = $this->db
    ->select("SUM(jumlah) as jumlah_total")
    ->where("MONTH(tanggal_input)",date("m"))
    ->where("YEAR(tanggal_input)",date("Y"))
    ->where("kode_input",NULL)
    ->get("inventaris")->row();

    $barang_masuk = $this->db
    ->select("SUM(jumlah) as jumlah_total")
    ->where("stok_awal !=",1)
    ->get("detail_barang_masuk")->row();
    $barang_keluar = $this->db
    ->select("SUM(jumlah) as jumlah_total")
    ->get("detail_barang_keluar")->row();
    $jumlah_barang = $this->db
    ->get("barang")->num_rows();
    $inventaris = $this->db
    ->select("SUM(jumlah) as jumlah_total")
    ->get("inventaris")->row();
    $distribusi = $this->db
    ->select("*,SUM(jumlah) as jumlah_total")
    ->join("inventaris","inventaris_keluar_no_dokumen=no_dokumen")
    ->join("unit","unit_idunit=idunit")
    ->group_by("idunit")
    ->where("YEAR(tanggal_keluar)",date("Y"))
    ->get("inventaris_keluar")->result();
    $response = array();
    foreach ($distribusi as $value) {
      array_push($response,array(
        "unit" => $value->nama_unit,
        'jumlah' => $value->jumlah_total
      ));
    }

    return $data = array(
      'total' => $jumlah_barang,
      'masuk' => $barang_masuk->jumlah_total==NULL?0:$barang_masuk->jumlah_total,
      'keluar' => $barang_keluar->jumlah_total==NULL?0:$barang_keluar->jumlah_total,
      'inventaris' => $inventaris->jumlah_total==NULL?0:$inventaris->jumlah_total,
      'masuk_hari_ini' =>$barang_masuk_hari_ini->jumlah_total==NULL?0:$barang_masuk_hari_ini->jumlah_total,
      'keluar_hari_ini' =>$barang_keluar_hari_ini->jumlah_total==NULL?0:$barang_keluar_hari_ini->jumlah_total,
      'masuk_bulan_ini' =>$barang_masuk_bulan_ini->jumlah_total==NULL?0:$barang_masuk_bulan_ini->jumlah_total,
      'keluar_bulan_ini' =>$barang_keluar_bulan_ini->jumlah_total==NULL?0:$barang_keluar_bulan_ini->jumlah_total,
      'grafik' => json_encode($response)
    );
  }

  public function get_data_totalbarang_cls(){
    $barang_masuk_hari_ini = $this->db
    ->select("SUM(jumlah) as jumlah_total")
    ->where("stok_awal !=",1)
    ->where("DATE(tanggal)",date("Y-m-d"))
    ->get("detail_cls_masuk")->row();
    $barang_keluar_hari_ini = $this->db
    ->select("SUM(jumlah) as jumlah_total")
    ->where("DATE(tanggal)",date("Y-m-d"))
    ->get("detail_cls_keluar")->row();
    $barang_masuk_bulan_ini = $this->db
    ->select("SUM(jumlah) as jumlah_total")
    ->where("stok_awal !=",1)
    ->where("MONTH(tanggal)",date("m"))
    ->where("YEAR(tanggal)",date("Y"))
    ->get("detail_cls_masuk")->row();
    $barang_keluar_bulan_ini = $this->db
    ->select("SUM(jumlah) as jumlah_total")
    ->where("MONTH(tanggal)",date("m"))
    ->where("YEAR(tanggal)",date("Y"))
    ->get("detail_cls_keluar")->row();

    $barang_masuk = $this->db
    ->select("SUM(jumlah) as jumlah_total")
    ->where("stok_awal !=",1)
    ->get("detail_barang_masuk")->row();
    $barang_keluar = $this->db
    ->select("SUM(jumlah) as jumlah_total")
    ->get("detail_barang_keluar")->row();
    $jumlah_barang = $this->db
    ->get("barang")->num_rows();
    $inventaris = $this->db
    ->select("SUM(jumlah) as jumlah_total")
    ->get("inventaris")->row();
    $distribusi = $this->db
    ->select("*,SUM(jumlah) as jumlah_total")
    ->join("unit","unit_idunit=idunit")
    ->group_by("idunit")
    ->join("detail_cls_keluar","cls_keluar_no_dokumen=no_dokumen")
    ->where("YEAR(tanggal_keluar)",date("Y"))
    ->get("cls_keluar")->result();
    $response = array();
    foreach ($distribusi as $value) {
      array_push($response,array(
        "unit" => $value->nama_unit,
        'jumlah' => $value->jumlah_total
      ));
    }

    return $data = array(
      'total' => $jumlah_barang,
      'masuk' => $barang_masuk->jumlah_total==NULL?0:$barang_masuk->jumlah_total,
      'keluar' => $barang_keluar->jumlah_total==NULL?0:$barang_keluar->jumlah_total,
      'inventaris' => $inventaris->jumlah_total==NULL?0:$inventaris->jumlah_total,
      'masuk_hari_ini' =>$barang_masuk_hari_ini->jumlah_total==NULL?0:$barang_masuk_hari_ini->jumlah_total,
      'keluar_hari_ini' =>$barang_keluar_hari_ini->jumlah_total==NULL?0:$barang_keluar_hari_ini->jumlah_total,
      'masuk_bulan_ini' =>$barang_masuk_bulan_ini->jumlah_total==NULL?0:$barang_masuk_bulan_ini->jumlah_total,
      'keluar_bulan_ini' =>$barang_keluar_bulan_ini->jumlah_total==NULL?0:$barang_keluar_bulan_ini->jumlah_total,
      'grafik' => json_encode($response)
    );
  }

  public function get_data_inventaris(){
    $barang_masuk_hari_ini = $this->db
    ->select("SUM(jumlah) as jumlah_total")
    ->where("stok_awal !=",1)
    ->where("DATE(tanggal)",date("Y-m-d"))
    ->get("detail_barang_masuk")->row();
    $barang_keluar_hari_ini = $this->db
    ->select("SUM(jumlah) as jumlah_total")
    ->where("DATE(tanggal)",date("Y-m-d"))
    ->get("detail_barang_keluar")->row();
    $barang_masuk_bulan_ini = $this->db
    ->select("SUM(jumlah) as jumlah_total")
    ->where("stok_awal !=",1)
    ->where("MONTH(tanggal)",date("m"))
    ->where("YEAR(tanggal)",date("Y"))
    ->get("detail_barang_masuk")->row();
    $barang_keluar_bulan_ini = $this->db
    ->select("SUM(jumlah) as jumlah_total")
    ->where("MONTH(tanggal)",date("m"))
    ->where("YEAR(tanggal)",date("Y"))
    ->get("detail_barang_keluar")->row();

    $barang_masuk = $this->db
    ->select("SUM(jumlah) as jumlah_total")
    ->where("stok_awal !=",1)
    ->get("detail_barang_masuk")->row();
    $barang_keluar = $this->db
    ->select("SUM(jumlah) as jumlah_total")
    ->get("detail_barang_keluar")->row();
    $jumlah_barang = $this->db
    ->get("barang")->num_rows();
    $inventaris = $this->db
    ->select("SUM(jumlah) as jumlah_total")
    ->get("inventaris")->row();
    $distribusi = $this->db
    ->select("*,SUM(jumlah) as jumlah_total")
    ->join("unit","unit_idunit=idunit")
    ->group_by("idunit")
    ->join("detail_barang_keluar","barang_keluar_no_dokumen=no_dokumen")
    ->where("YEAR(tanggal_keluar)",date("Y"))
    ->get("barang_keluar")->result();
    $response = array();
    foreach ($distribusi as $value) {
      array_push($response,array(
        "unit" => $value->nama_unit,
        'jumlah' => $value->jumlah_total
      ));
    }

    return $data = array(
      'total' => $jumlah_barang,
      'masuk' => $barang_masuk->jumlah_total==NULL?0:$barang_masuk->jumlah_total,
      'keluar' => $barang_keluar->jumlah_total==NULL?0:$barang_keluar->jumlah_total,
      'inventaris' => $inventaris->jumlah_total==NULL?0:$inventaris->jumlah_total,
      'masuk_hari_ini' =>$barang_masuk_hari_ini->jumlah_total==NULL?0:$barang_masuk_hari_ini->jumlah_total,
      'keluar_hari_ini' =>$barang_keluar_hari_ini->jumlah_total==NULL?0:$barang_keluar_hari_ini->jumlah_total,
      'masuk_bulan_ini' =>$barang_masuk_bulan_ini->jumlah_total==NULL?0:$barang_masuk_bulan_ini->jumlah_total,
      'keluar_bulan_ini' =>$barang_keluar_bulan_ini->jumlah_total==NULL?0:$barang_keluar_bulan_ini->jumlah_total,
      'grafik' => json_encode($response)
    );
  }







}
