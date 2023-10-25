<?php
$menu_utama = $this->Core->get_menu();
$role = $this->Core->get_role();

// die(var_dump($role));
$get_surat = $this->db->get_where('tb_surat', array('status' => 0 ))->num_rows();
$get_prestasi_m = $this->db->get_where('tb_prestasi_mahasiswa', array('status' => 0, 'jenis_user'=> 1 ))->num_rows();
$get_prestasi_o = $this->db->get_where('tb_prestasi_mahasiswa', array('status' => 0, 'jenis_user'=> 2 ))->num_rows();

$get_proker = $this->db->get_where('tb_proker', array('status' => 0 ))->num_rows();
$get_kegiatan = $this->db->get_where('tb_kegiatan_ormawa', array('status_kegiatan' => 0 ))->num_rows();
$get_kegiatan_mhs = $this->db->get_where('tb_kegiatan_mahasiswa', array('status_kegiatan' => 0 ))->num_rows();
$get_lpj = $this->db->get_where('tb_lpj', array('status' => 0 ))->num_rows();

$get_kegiatan_ormawa = 0;
if($this->session->userdata('jenis_user') == 'ormawa'){
$this->db->where('status_revisi !=',0);
$get_kegiatan_ormawa = $this->db->get_where('tb_kegiatan_ormawa', array('id_ormawa' => $this->session->userdata('id') ))->num_rows();
}

$get_total = $get_surat + $get_prestasi_m + $get_prestasi_o + $get_proker + $get_kegiatan + $get_lpj + $get_kegiatan_mhs ;
$get_total_ormawa = $get_kegiatan_ormawa;
?>
<?php foreach ($menu_utama as $mymenu): ?>
  <?php if (in_array($mymenu['id'],$role)): ?>
    <li class="nav-small-cap"><b> &nbsp;&nbsp;&nbsp;&nbsp;<?php echo $mymenu['nama']?> </b></li>
    <?php foreach ($mymenu['menu'] as $menu): ?>
        <?php if (in_array($menu['id'],$role)): ?>
          <?php if (!empty($menu['sub'])) {?>
            <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><?php if ($menu['icon']!=null): ?>
              <i class="<?php echo $menu['icon']?>"></i>
            <?php endif; ?><span class="hide-menu" style="font-size:13px !important"><?php echo $menu['nama']?> <?php if($menu['nama'] == 'Approval' && $get_total != 0){?>
              <b style="border-radius:100%;background-color:red;color:white;padding-left:5px;padding-right:5px;font-size:13px;text-align:center"><?=$get_total;?></b><?php }else if($menu['nama'] == 'Kegiatan' && $get_total_ormawa != 0){?>
              <b style="border-radius:100%;background-color:red;color:white;padding-left:5px;padding-right:5px;font-size:13px;text-align:center"><?=$get_total_ormawa;?></b><?php } ?> </span></a>
            <ul aria-expanded="false" class="collapse">
              <?php foreach ($menu['sub'] as $sub_menu): ?>
                <?php if (in_array($sub_menu['id'],$role)): ?>
                  <li>
                    <a  style="font-size:13px !important" href="<?php echo base_url().$sub_menu['url']?>"><?php echo $sub_menu['nama']?>
                      <?php
                      if($sub_menu['nama'] == 'Approve Surat' && $get_surat != 0){
                      ?>
                      <b style="border-radius:100%;background-color:red;color:white;padding-left:5px;padding-right:5px;padding-top:3px;padding-bottom:3px;padding-left:5px;padding-right:5px;font-size:11px;text-align:center"><?=$get_surat;?></b>
                      <?php
                    }elseif ($sub_menu['nama'] == 'Approve Prestasi Mahasiswa' && $get_prestasi_m != 0) {
                      ?>
                      <b style="border-radius:100%;background-color:red;color:white;padding-left:5px;padding-right:5px;padding-top:3px;padding-bottom:3px;padding-left:5px;padding-right:5px;font-size:11px;text-align:center"><?=$get_prestasi_m;?></b>
                      <?php
                    }elseif ($sub_menu['nama'] == 'Approve Prestasi Ormawa' && $get_prestasi_o != 0) {
                      ?>
                      <b style="border-radius:100%;background-color:red;color:white;padding-left:5px;padding-right:5px;padding-top:3px;padding-bottom:3px;padding-left:5px;padding-right:5px;font-size:11px;text-align:center"><?=$get_prestasi_o;?></b>
                      <?php
                    }elseif ($sub_menu['nama'] == 'Approve Proker' && $get_proker != 0) {
                      ?>
                      <b style="border-radius:100%;background-color:red;color:white;padding-left:5px;padding-right:5px;padding-top:3px;padding-bottom:3px;padding-left:5px;padding-right:5px;font-size:11px;text-align:center"><?=$get_proker;?></b>
                      <?php
                    }elseif ($sub_menu['nama'] == 'Approve Kegiatan' && $get_kegiatan != 0) {
                      ?>
                      <b style="border-radius:100%;background-color:red;color:white;padding-left:5px;padding-right:5px;padding-top:3px;padding-bottom:3px;padding-left:5px;padding-right:5px;font-size:11px;text-align:center"><?=$get_kegiatan;?></b>
                      <?php
                    }elseif ($sub_menu['nama'] == 'Approve LPJ' && $get_lpj != 0) {
                      ?>
                      <b style="border-radius:100%;background-color:red;color:white;padding-left:5px;padding-right:5px;padding-top:3px;padding-bottom:3px;padding-left:5px;padding-right:5px;font-size:11px;text-align:center"><?=$get_lpj;?></b>
                      <?php
                    }elseif ($sub_menu['nama'] == 'Data Kegiatan' && $get_kegiatan_ormawa != 0) {
                      ?>
                      <b style="border-radius:100%;background-color:red;color:white;padding-left:5px;padding-right:5px;padding-top:3px;padding-bottom:3px;padding-left:5px;padding-right:5px;font-size:11px;text-align:center"><?=$get_kegiatan_ormawa;?></b>
                      <?php
                    }elseif ($sub_menu['nama'] == 'Approve Kegiatan Mahasiswa' && $get_kegiatan_mhs != 0) {
                      ?>
                      <b style="border-radius:100%;background-color:red;color:white;padding-left:5px;padding-right:5px;padding-top:3px;padding-bottom:3px;padding-left:5px;padding-right:5px;font-size:11px;text-align:center"><?=$get_kegiatan_mhs;?></b>
                      <?php
                    }
                      ?>
                    </a>
                  </li>
                <?php endif; ?>
              <?php endforeach; ?>
            </ul>
          </li>
          <?php
          }
          else{?>
            <li> <a class="waves-effect waves-dark" href="<?php echo base_url().$menu['url']?>"><?php if ($menu['icon']!=null): ?>
              <i class="<?php echo $menu['icon']?>"></i>
            <?php endif; ?><span style="font-size:13px !important" class="hide-menu" ><?php echo $menu['nama']?></span></a>
          </li>
          <?php
          }
          ?>
        <?php endif; ?>


    <?php endforeach; ?>
  <?php endif; ?>

<?php endforeach; ?>
