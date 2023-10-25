 <?php
 defined('BASEPATH') OR exit('No direct script access allowed');

 class Home extends CI_Controller{

   public function __construct()
   {
     parent::__construct();
     //Codeigniter : Write Less Do More
     $this->load->model("ModelCarousel");
     $this->load->model("ModelGallery");
     // $this->load->model("ModelYoutube");
     $this->load->model("ModelProfil");
     $this->load->model("ModelOrmawaData");
     $this->load->model("ModelPrestasi");
     $this->load->model("ModelPengumuman");
   }

   function index()
   {
     $data = array(
       'pengumuman' => $this->ModelPengumuman->get_pengumuman_limit(3)->result(),
       'gallery'    => $this->ModelGallery->get_gallery_limit(3)->result(),
       'ormawa'     => $this->ModelOrmawaData->get_all()->result(),
       'prestasi'   => $this->ModelPrestasi->get_all()->result()
      );
     $this->load->view('Landing/Home', $data);
   }

   function tentang()
   {
     $data = array(
       'data'     => $this->ModelProfil->get_tentang()->row_array(),
       'terbaru'  => $this->ModelPengumuman->get_pengumuman_limit(6)->result(),
      );
     $this->load->view('Landing/Profil/tentang',$data);
   }
   function visimisi()
   {
     $data = array(
       'data'     => $this->ModelProfil->get_visimisi()->row_array(),
       'terbaru'  => $this->ModelPengumuman->get_pengumuman_limit(6)->result(),
      );
     $this->load->view('Landing/Profil/visimisi',$data);
   }
   function organisasi()
   {
     $data = array(
       'data'     => $this->ModelProfil->get_organisasi()->row_array(),
       'terbaru'  => $this->ModelPengumuman->get_pengumuman_limit(6)->result(),
      );
     $this->load->view('Landing/Profil/organisasi',$data);
   }

   function admin()
   {
     $data = array(
       'body' => "Home/home_utama",
      );
     $this->load->view('index',$data);
   }

 }
?>
