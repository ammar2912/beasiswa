<?php
class E_Controller extends CI_Controller{


  /**

  * @author Fendrik Nurul Jadid <fendrik1311@gmail.com>

  * @since v.1.0

  **/


  public function __construct()
  {
      parent::__construct();
      //Codeigniter : Write Less Do More
      $menu_utama = $this->Core->get_menu();
      // die(var_dump($menu_utama));
      // echo "<pre>";
      // print_r($menu_utama);
      // echo "</pre>";
      // die();
      $akses = false;
			$link = strtolower($this->uri->segment(1));
      $lin2 = strtolower($this->uri->segment(2));
      // if ($lin2!='') {
      //   $link.="/".$lin2;
      // }
			$roles = json_decode($_SESSION['roles']);
      // die($roles);
			$data = $this->db->where_in("idmenu",$roles)->get("menu")->result();
      // die(var_dump($roles));
			foreach ($data as $value) {
				if (strtolower($value->role)==$link) {
					$akses = true;
				}
			}
			if ($link=='' || $link==null || empty($link)) {
				$akses=true;
			}
			// die(var_dump($link));
			if (!$akses) {
				redirect(base_url()."Permission/denied");
			}
  }

}
?>
