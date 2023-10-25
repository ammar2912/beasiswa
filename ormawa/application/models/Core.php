<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Core extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }
  public function tgl_terbilang($tanggal){
    $nama_hari = array(
      'Sun' => "Minggu",
      'Mon' => "Senin",
      'Tue' => "Selasa",
      'Wed' => "Rabu",
      'Thu' => "Kamis",
      'Fri' => "Jum'at",
      'Sat' => "Sabtu"
    );
    $nama_bulan = array(
      1 => "Januari",
      2 => "Februari",
      3 => "Maret",
      4 => "April",
      5 => "Mei",
      6 => "Juni",
      7 => "Juli",
      8 => "Agustus",
      9 => "September",
      10 => "Oktober",
      11 => "November",
      12 => "Desember",
    );
    $hari = date("D",strtotime($tanggal));
    $tgl = (int)date("d",strtotime($tanggal));
    $bulan = date("m",strtotime($tanggal));
    $tahun = date("Y",strtotime($tanggal));
    return "hari ini ".ucwords($nama_hari[$hari])." tanggal ".ucwords($this->terbilang($tgl))." bulan ".ucfirst($nama_bulan[$bulan])." tahun ".ucwords($this->terbilang($tahun));

  }

  function nama_bulan($bulan){
    $nama_bulan = array(
      1 => "Januari",
      2 => "Februari",
      3 => "Maret",
      4 => "April",
      5 => "Mei",
      6 => "Juni",
      7 => "Juli",
      8 => "Agustus",
      9 => "September",
      10 => "Oktober",
      11 => "November",
      12 => "Desember",
    );
    return $nama_bulan[$bulan];
  }

  function terbilang($numb){

    $huruf = array("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
    if($numb < 12)
      return "" . $huruf[$numb];
    elseif ($numb < 20)
      return $this->terbilang($numb - 10) . " belas ";
    elseif ($numb < 100)
      return $this->terbilang($numb / 10) . " puluh " . $this->terbilang($numb % 10);
    elseif ($numb < 200)
      return "seratus " . $this->terbilang($numb - 100);
    elseif ($numb < 1000)
      return $this->terbilang($numb / 100) . " ratus " . $this->terbilang($numb % 100);
    elseif ($numb < 2000)
      return "seribu " . $this->terbilang($numb - 1000);
    elseif ($numb < 1000000)
      return $this->terbilang($numb / 1000) . " ribu " . $this->terbilang($numb % 1000);
    elseif ($numb < 1000000000)
      return $this->terbilang($numb / 1000000) . " juta " . $this->terbilang($numb % 1000000);
    elseif ($numb >= 1000000000)
      return false;
    }

  public function tiga_digit($no){
    return str_pad($no,3,"0",STR_PAD_LEFT);
  }

  public function dua_digit($no){
    return str_pad($no,2,"0",STR_PAD_LEFT);
  }
  public function lima_digit($no){
    return str_pad($no,5,"0",STR_PAD_LEFT);
  }

  public function nomor($tabel){
    $get_data = $this->db->select_max("noRM")
    ->get($tabel)->row_array();
    if($get_data){
      $kode = substr($get_data['noRM'],-3);
      $kode = (int) $kode;
      $kode = $kode+1;
      $kode_RM = str_pad($kode,3,"0",STR_PAD_LEFT);
    }else{
      $kode_RM = "001";
    }
    $kode_RM = substr(date("Y"),-2).date("md").$kode_RM;
    return $kode_RM;
  }

  public function get_saldo($norek){
      $data = $this->db
      ->order_by("idtabungan_nasabah","DESC")
      ->get_where("tabungan_nasabah",array("norek_tabungan"=>$norek))->row_array();
      if (empty($data)) {
        return 0;
      }else{
        return $data['saldo'];
      }
  }

  public function jenis_rek($norek){
      $norek = explode(".",$norek);
      $data = $this->db->get_where("jtab",array("notab"=>$norek[0]))->row_array();
      // die(var_dump($norek));
      return $data;
  }

  function get_role(){
    $role = json_decode($this->session->userdata("roles"));
    $menu = $this->db->where_in("idmenu",$role)->get("menu")->result();
    $response = array();
    foreach ($menu as $value) {
      array_push($response,$value->idmenu);
      array_push($response,$value->parent);
      if ($value->sub==1) {
        $parent = $this->db->where("idmenu",$value->parent)->get("menu")->row_array();
        array_push($response,$parent['parent']);
      }
    }
    return $response;
  }


  function get_menu(){
    $kategori = $this->db->get_where("menu",array("categories"=>1))->result();
    $response = array();
    // die(var_dump($kategori));
    $no_kat = 0;
    foreach ($kategori as $kat) {
      $res_kategori = array(
        'id' => $kat->idmenu,
        'nama' => $kat->nama_menu,
        'menu' => array()
      );
      $menu = $this->db
      ->order_by("urutan")
      ->get_where("menu",array("parent"=>$kat->idmenu))->result();
      if (empty($menu)) {
        continue;
      }
      array_push($response,$res_kategori);
      $no_menu = 0;
      foreach ($menu as $mymenu) {
        $res_menu = array(
          'id' => $mymenu->idmenu,
          'nama' => $mymenu->nama_menu,
          'icon' => $mymenu->icon,
          'url' => $mymenu->url,
          'sub' => array(),
        );
        array_push($response[$no_kat]['menu'],$res_menu);
        $sub_menu = $this->db
        ->order_by("urutan")
        ->get_where("menu",array("parent"=>$mymenu->idmenu))->result();
        foreach ($sub_menu as $sub) {
          $res_sub = array(
            'id' => $sub->idmenu,
            'nama' => $sub->nama_menu,
            'url' => $sub->url,
            'icon' => $sub->icon,
          );
          array_push($response[$no_kat]['menu'][$no_menu]['sub'],$res_sub);
        }
        $no_menu++;
      }
      $no_kat++;
    }
    return $response;
  }

  function get_dokumentasi($nokun){
    return $this->db->get_where("foto_pemeriksaan",array("kunjungan_no_urutkunjungan"=>$nokun))->result();
  }
  function get_numdokumentasi($nokun){
    return $this->db->get_where("foto_pemeriksaan",array("kunjungan_no_urutkunjungan"=>$nokun))->num_rows();
  }
  function generate_kode($panjang){
      $karakter = "asdfghjklqwertyuipzxcvbnm1234567890ZXCVBNMASDFGHJKLQWERTYUIOP";
      $kode = "";
      for($i=0;$i<$panjang;$i++){
        $pos= rand(0,strlen($karakter)-1);
        $kode .= $karakter($pos);
      }
      return $kode;
    }
  public function get_kadaluarsa()
  {
    $date = date("Y-m-d");
    $batas = date("Y-m-d",strtotime("+30 days"));
    return $this->db
    ->select("(IFNULL(jumlah,0)-IFNULL(jumlah_terjual,0)) as jumlah,tanggal_expired")
    ->get_where("detail_pembelian_obat",array("DATE(tanggal_expired) >="=>$date,"DATE(tanggal_expired) <="=>$batas,'jumlah !='=>0))
    ->num_rows();
  }
  public function get_jatuh_tempo(){
    $sekarang = date("Y-m-d");
    $j_tempo = date("Y-m-d",strtotime("+7 days"));
    // die(var_dump($j_tempo));
    return $this->db
    ->join('hutang','hutang.pembelian_obat_no_nota=pembelian_obat.no_nota')
    ->get_where("pembelian_obat",array("tanggal_jatuh_tempo <="=>$j_tempo,'status !='=>"Lunas"))
    ->num_rows();
  }
  public function get_kunjungan($poli){
    return $this->db
    ->get_where("kunjungan",array("tupel_kode_tupel"=>$poli,'tgl'=>date("Y-m-d"),'sudah'=>0))
    ->num_rows();
  }
  public function get_kunjungan_lab(){
    return $this->db
    ->get_where("labkunjungan",array('DATE(jam)'=>date("Y-m-d"),'status'=>1))
    ->num_rows();
  }
  public function hit_data($tgl){
    $this->db->distinct();
    $this->db->group_by("no_urutkunjungan");
    $this->db->join('pasien', 'pasien.noRM = kunjungan.pasien_noRM');
    $this->db->join('tujuan_pelayanan', 'tujuan_pelayanan.kode_tupel = kunjungan.tupel_kode_tupel');
    $this->db->join('rujukan_internal','kunjungan.no_urutkunjungan=rujukan_internal.kunjungan_no_urutkunjungan');
    return $this->db->get_where('kunjungan',array('sudah <='=>5,'tujuan_poli'=>'RANAP','acc_ranap'=>0))->num_rows();
  }
  function get_billing()
  {
    $date = date("Y-m-d");
    $this->db->select("count(*) as total");
    $query = $this->db->get_where("kunjungan",array("tgl"=>$date,"billing"=>NULL))->row_array() ;
    return $query['total'];
  }

  function combine_harga($harga)
  {
    $jml_bayar = "";
    $ex_jml_bayar = explode(",", $harga);
    for ($i=0; $i < count($ex_jml_bayar); $i++) {
      $jml_bayar = $jml_bayar."".$ex_jml_bayar[$i];
    }
    return $jml_bayar;
  }

  function Fungsi_JS_Hapus()
    {
        return "<script type=\"text/javascript\">
        $('document').ready(function() {
            $(\"#alert\").show();
            $(\"#modal\").hide();

            $(\".id_checkbox\").on('click', function (e) {
                $(\"#jumlah_pilih\").html($(\"input.id_checkbox:checked\").length);
                if ($(\"input.id_checkbox:checked\").length == 0) {
                    $(\"#alert\").show();
                    $(\"#modal\").hide();
                } else {
                    $(\"#alert\").hide();
                    $(\"#modal\").show();
                }
            });
        });
        </script>";
    }

    public function Hapus_aktif()
    {
      return "
    <div class=\"modal fade\" id=\"Hapus_aktif\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"smallmodalLabel\" aria-hidden=\"true\">
      <div class=\"modal-dialog modal-sm\" role=\"document\">
        <div class=\"modal-content\">
          <div class=\"modal-header\">
            <h5 class=\"modal-title\" id=\"smallmodalLabel\">Hapus Data</h5>
            <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\">
            <span aria-hidden=\"true\">&times;</span>
          </button>
          </div>
          <div class=\"modal-body\">
            <p>
              Apakah Anda Yakin Untuk Menghapus Data
            </p>
          </div>
          <div class=\"modal-footer\">
            <button type=\"button\" class=\"btn btn-secondary\" data-dismiss=\"modal\">Cancel</button>
            <button type=\"submit\" class=\"btn btn-danger\">Hapus</button>
          </div>
        </div>
      </div>
    </div>";
    }

    public function Hapus_disable()
    {
      return "
    <div class=\"modal fade\" id=\"Hapus_disable\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"smallmodalLabel\" aria-hidden=\"true\">
      <div class=\"modal-dialog modal-sm\" role=\"document\">
        <div class=\"modal-content\">
          <div class=\"modal-header\">
            <h5 class=\"modal-title\" id=\"smallmodalLabel\">Hapus Data</h5>
            <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\">
            <span aria-hidden=\"true\">&times;</span>
          </button>
          </div>
          <div class=\"modal-body\">
            <p>
              Pilih Data Terlebih Dahulu !!!!
            </p>
          </div>
          <div class=\"modal-footer\">
            <button type=\"button\" class=\"btn btn-secondary\" data-dismiss=\"modal\">Cancel</button>
          </div>
        </div>
      </div>
    </div>";
    }

  public function alert_succcess($isi)
  {
    return "<div class=\"sufee-alert alert with-close alert-success alert-dismissible \">
      <span class=\"badge badge-pill badge-success\">Success</span> $isi
      <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
      <span aria-hidden=\"true\">&times;</span>
    </button>";
  }

  public function alert_danger($isi)
  {
    return "<div class=\"sufee-alert alert with-close alert-danger alert-dismissible \">
      <span class=\"badge badge-pill badge-danger\">Peringatan</span> $isi
      <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
      <span aria-hidden=\"true\">&times;</span>
    </button>";
  }

  public function modal($name, $judul, $isi)
  {
    return "<button type=\"button\" class=\"btn btn-secondary mb-1\" data-toggle=\"modal\" data-target=\"#$name\">
    $name
  </button>
  <div class=\"modal fade\" id=\"$name\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"smallmodalLabel\" aria-hidden=\"true\">
    <div class=\"modal-dialog modal-sm\" role=\"document\">
      <div class=\"modal-content\">
        <div class=\"modal-header\">
          <h5 class=\"modal-title\" id=\"smallmodalLabel\">$judul</h5>
          <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\">
          <span aria-hidden=\"true\">&times;</span>
        </button>
        </div>
        <div class=\"modal-body\">
          <p>
            $isi
          </p>
        </div>
        <div class=\"modal-footer\">
          <button type=\"button\" class=\"btn btn-secondary\" data-dismiss=\"modal\">Cancel</button>
          <button type=\"button\" class=\"btn btn-primary\">Confirm</button>
        </div>
      </div>
    </div>
  </div>";
  }

  public function Kembali()
  {
    return "<button type=\"button\" class=\"btn btn-outline-secondary btn-sm\" onclick=\"window.history.back()\"><i class=\"fas fa-reply\"></i> Kembali</button>";
  }

  public function btn_input()
  {
    return "<div class=\"card-footer\" style='    display: -ms-flexbox;
    display: flex;
    -ms-flex-wrap: wrap;
    /* flex-wrap: wrap; */'>
    <div class=\"col col-sm-12 com-md-12\">
    <button type=\"button\" class=\"btn btn-outline-secondary btn-sm pull-left\" onclick=\"window.history.back()\"><i class=\"fa fa-reply\"></i> Kembali</button>

        <button type=\"submit\" id=\"simpan_data\" class=\"btn btn-primary simpan btn-sm pull-right\">SIMPAN</button>
    </div>
    </div>";
  }

  public function btn_input_foto()
  {
    return "<div class=\"card-footer\" style='    display: -ms-flexbox;
    display: flex;
    -ms-flex-wrap: wrap;
    /* flex-wrap: wrap; */'>
    <div class=\"col col-sm-12 com-md-12\">
        <button type=\"submit\" id=\"simpan_data\" class=\"btn btn-primary simpan btn-sm pull-right\">SIMPAN FOTO</button>
    </div>
    </div>";
  }

  public function save_riwayat(){}

  public function notif_success($text)
  {
    return "

    ";
  }
  public function umur($tgl_lahir='')
  {
    if ($tgl_lahir==null) {
      return;
    }
    // Tanggal Lahir
 $birthday = $tgl_lahir;

 // Convert Ke Date Time
 $biday = new DateTime($birthday);
 $today = new DateTime();

 $diff = $today->diff($biday);

 // Display
 return $diff->y ." Tahun";
  }

}
