<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModelIuran extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }


  public function get_data_edit($id){
    return $this->db->get_where("iuran",array("idiuran"=>$id));
  }


  function get_tagihan($npp){

    // $coba = 38250.00*((7*0.5)/100);
    // die($coba);
    // $a = 260/7;
    // $b = $a/6;
    // echo $a."<br>";
    // echo $b;
    // die();

    $data_iuran = $this->db
    ->join("pembina","idpembina=pembina")
    ->get_where("iuran",array("npp"=>$npp))->row();
    if (empty($data_iuran)) {
      die();
    }

    $blth_posting = date("Y-m-d",strtotime($data_iuran->blth_posting));
    $hari_ini = date("Y-m-d");
    $awal = new DateTime($blth_posting);
    $sekarang = new DateTime();

    $lama = $sekarang->diff($awal);
    $lama = $lama->m;
    $umur = $lama-2;
    // var_dump($lama);
    $tk_aktif = $data_iuran->tk_aktif;
    $iuran_terakhir = $data_iuran->nilai_posting;
    $rate = $data_iuran->rate;
    $t2018 = $iuran_terakhir/$tk_aktif;
    $prog = $data_iuran->prog;
    if ($prog=="2P") {
      $t2019 = 2175925*($rate+0.3)/100;
      $t2020 = 2361111*($rate+0.3)/100;
    }else{
      if ($prog=="3P") {
        $t2019 = 2171000*(6+$rate)/100;
        $t2020 = 2355770*(6+$rate)/100;
      }else{
        $t2019 = 2171000*(9+$rate)/100;
        $t2020 = 2355770*(6+$rate)/100;
      }
    }
    // $denda =  2361111*(0.24+0.3)/100;





    $thn_ini = date("Y");
    $response = array();
    for ($i=1; $i <= $lama ; $i++) {
      $tgl_baru = date("Y-m-d",strtotime("+".$i." month",strtotime($blth_posting)));
      $thn = date("Y",strtotime($tgl_baru));
      $thn_sekarang = date("Y");
      if ($thn==$thn_sekarang) {
        $jml_iuran = $iuran_terakhir;
        // echo $t2020;
        // die();
      }else{
        if ($thn == "2018") {
          $jml_iuran = $t2018 * $tk_aktif;
        }elseif ($thn=="2019") {
          $jml_iuran = $t2019 * $tk_aktif;
        }else{
          $jml_iuran = $t2020 * $tk_aktif;
        }
      }
      $denda = $jml_iuran*($umur*0.5)/100;
      // $denda =  38250.0000*(7*0.5)/100;
      // echo $denda;
      // die();
      $data_tagihan = array(
        'bulan'=> date("M-Y",strtotime($tgl_baru)),
        'iuran' => $jml_iuran,
        'umur' => $umur,
        'denda' => $denda,
        'tunggakan' => $denda+$jml_iuran,
      );
      array_push($response,$data_tagihan);
      if ($umur > 0) {
        $umur--;
      }
      // echo round($denda,6)."<br>";
      // $data = $t2020;
      // die($data);
    }
    // echo "<pre>";
    // print_r($response);
    // echo "</pre>";
    // die();
    $bank = $this->db->get("bank")->result();
    return array('data'=>$data_iuran,'bank'=>$bank,'tagihan'=>$response);
  }


}
