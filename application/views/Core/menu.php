
<?php
$this->load->model('ModelRole');
$roles_Roles = array();
if (@$_SESSION['jabatan'] == "dosen") {
  $this->db->where("idjabatan","dosen");
  $user_Roles = $this->db->get("jabatan")->row_array()["j_roles"];
  $roles_Roles = explode(', ', $user_Roles);
}else {
  $user_Roles = $this->db->get_where('user',array('id_user' => @$_SESSION['id_login'], ))->row_array();
  $roles_Roles = explode(', ', $user_Roles['roles']);
}

foreach ($roles_Roles as $value) {
  $Menu_Roles[$value] = true;
  $this->db->reset_query();
  $this->db->select('group_roles_idgroup_roles');
  $this->db->group_by('group_roles_idgroup_roles');
  $Group_Roles = $this->db->get_where('roles',array('roles' => $value, ))->result();
  foreach ($Group_Roles as $value) {
    $Menu_Group[$value->group_roles_idgroup_roles] = true;
  }
}
?>

<!-- <?php if (@$Menu_Group['Repo']): ?>
    <li class="nav-small-cap">--- Data Repository</li>
    <?php if (@$Menu_Roles['Folder']): ?>
      <li <?php if ($this->uri->segment(1) == 'Folder'): ?>
        class="active"
      <?php endif; ?>>
          <a href="<?php echo base_url().'Folder'; ?>">
              <i class="fas fa-user"></i>
              <span class="hide-menu">Folder</span></a>
      </li>
    <?php endif; ?>
<?php endif; ?> -->
<li <?php if ($this->uri->segment(1) == ''): ?>
  class="active"
<?php endif; ?>>
    <a href="<?php echo base_url().'Home/admin'; ?>">
        <i class="fa fa-home"></i>
        <span class="hide-menu">Home</span></a>
</li>

<?php if (@$Menu_Group['DataProfil']): ?>
    <li class="nav-small-cap">--- DataProfil</li>

    <?php if (@$Menu_Roles['Carousel']): ?>
      <li <?php if ($this->uri->segment(1) == 'Carousel'): ?>
        class="active"
      <?php endif; ?>>
          <a href="<?php echo base_url().'Carousel'; ?>">
              <i class="far fa-images"></i>
              <span class="hide-menu">Header Carousel</span></a>
          <!-- <span class="inbox-num">3</span> -->
      </li>
    <?php endif; ?>

    <?php if (@$Menu_Roles['Profil']): ?>
    <li>
      <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
        <i class="fas fa-user-alt"></i>
        <span class="hide-menu">Profil </span></a>
      <ul aria-expanded="false" class="collapse">
        <li <?php if ($this->uri->segment(2) == 'edit_tentang'): ?>
          class="active"
        <?php endif; ?>>
            <a href="<?php echo base_url().'Profil/edit_tentang'; ?>">
                Tentang Kemahasiswaan Polije</a>
        </li>
        <li <?php if ($this->uri->segment(2) == 'edit_organisasi'): ?>
          class="active"
        <?php endif; ?>>
            <a href="<?php echo base_url().'Profil/edit_organisasi'; ?>">
                Struktur Organisasi</a>
        </li>
        <li <?php if ($this->uri->segment(2) == 'LayananKemahasiswaan'): ?>
          class="active"
        <?php endif; ?>>
            <a href="<?php echo base_url().'LayananKemahasiswaan/LayananKemahasiswaan'; ?>">
                Layanan Kemahasiswaan</a>
        </li>
      </ul>
    </li>
    <?php endif; ?>

    <?php if (@$Menu_Roles['Gallery']): ?>
      <li <?php if ($this->uri->segment(1) == 'Gallery'): ?>
        class="active"
      <?php endif; ?>>
          <a href="<?php echo base_url().'Gallery/gallery'; ?>">
              <i class="far fa-images"></i>
              <span class="hide-menu">Program Kegiatan</span></a>
          <!-- <span class="inbox-num">3</span> -->
      </li>
    <?php endif; ?>
    <?php if (@$Menu_Roles['Pengumuman']): ?>
      <li <?php if ($this->uri->segment(1) == 'Pengumuman'): ?>
        class="active"
      <?php endif; ?>>
          <a href="<?php echo base_url().'Pengumuman/Pengumuman'; ?>">
              <i class="fas fa-info"></i>
              <span class="hide-menu">Informasi & Pengumuman</span></a>
          <!-- <span class="inbox-num">3</span> -->
      </li>
    <?php endif; ?>
    <?php if (@$Menu_Roles['OrmawaData']): ?>
      <li <?php if ($this->uri->segment(1) == 'OrmawaData'): ?>
        class="active"
      <?php endif; ?>>
          <a href="<?php echo base_url().'OrmawaData/OrmawaData'; ?>">
              <i class="fas fa-tasks"></i>
              <span class="hide-menu">Ormawa</span></a>
          <!-- <span class="inbox-num">3</span> -->
      </li>
    <?php endif; ?>
    <?php if (@$Menu_Roles['Beasiswa']): ?>
      <li <?php if ($this->uri->segment(1) == 'Beasiswa'): ?>
        class="active"
      <?php endif; ?>>
          <a href="<?php echo base_url().'Beasiswa/Beasiswa'; ?>">
              <i class="fas fa-user-graduate"></i>
              <span class="hide-menu">Beasiswa</span></a>
          <!-- <span class="inbox-num">3</span> -->
      </li>
    <?php endif; ?>

    <?php if (@$Menu_Roles['Prestasi']): ?>
      <li <?php if ($this->uri->segment(1) == 'Prestasi'): ?>
        class="active"
      <?php endif; ?>>
          <a href="<?php echo base_url().'Prestasi/Prestasi'; ?>">
              <i class="fas fa-trophy"></i>
              <span class="hide-menu">Prestasi</span></a>
          <!-- <span class="inbox-num">3</span> -->
      </li>
    <?php endif; ?>
    <?php if (@$Menu_Roles['KontakHubung']): ?>
      <li <?php if ($this->uri->segment(1) == 'KontakHubung'): ?>
        class="active"
      <?php endif; ?>>
          <a href="<?php echo base_url().'KontakHubung/KontakHubung'; ?>">
              <i class="fas fa-phone-square"></i>
              <span class="hide-menu">Kontak Hubung</span></a>
          <!-- <span class="inbox-num">3</span> -->
      </li>
    <?php endif; ?>
    <!-- <?php if (@$Menu_Roles['Panduan']): ?>
      <li <?php if ($this->uri->segment(1) == 'Panduan'): ?>
        class="active"
      <?php endif; ?>>
          <a href="<?php echo base_url().'Panduan/Panduan'; ?>">
              <i class="fas fa-question"></i>
              <span class="hide-menu">Panduan</span></a>
          <span class="inbox-num">3</span>
      </li>
    <?php endif; ?> -->
    <!-- <?php if (@$Menu_Roles['KomiteEtik']): ?>
      <li <?php if ($this->uri->segment(1) == 'KomiteEtik'): ?>
        class="active"
      <?php endif; ?>>
          <a href="<?php echo base_url().'KomiteEtik/KomiteEtik'; ?>">
              <i class="fas fa-hands-helping"></i>
              <span class="hide-menu">Komite Etik</span></a>
          <span class="inbox-num">3</span>
      </li>
    <?php endif; ?>
    <?php if (@$Menu_Roles['Youtube']): ?>
      <li <?php if ($this->uri->segment(1) == 'Youtube'): ?>
        class="active"
      <?php endif; ?>>
          <a href="<?php echo base_url().'Youtube/Youtube'; ?>">
              <i class="fab fa-youtube"></i>
              <span class="hide-menu">Link Youtube</span></a>
          <span class="inbox-num">3</span>
      </li>
    <?php endif; ?> -->
<?php endif; ?>


<?php if (@$Menu_Group['karyawan']): ?>
    <li class="nav-small-cap">--- RULES USER ACCESS</li>
<?php endif; ?>


<?php if (@$Menu_Roles['Pegawai']): ?>
  <li <?php if ($this->uri->segment(1) == 'Pegawai'): ?>
    class="active"
  <?php endif; ?>>
      <a href="<?php echo base_url().'Pegawai'; ?>">
          <i class="fas fa-user"></i>
          <span class="hide-menu">Pegawai</span></a>
      <!-- <span class="inbox-num">3</span> -->
  </li>
<?php endif; ?>
<?php if (@$Menu_Roles['Jabatan']): ?>
  <li <?php if ($this->uri->segment(1) == 'Jabatan'): ?>
    class="active"
  <?php endif; ?>>
      <a href="<?php echo base_url().'Jabatan'; ?>">
          <i class="fas fa-award"></i>
          <span class="hide-menu">Jabatan</span></a>
      <!-- <span class="inbox-num">3</span> -->
  </li>
<?php endif; ?>
<?php if (@$Menu_Roles['User']): ?>
  <li <?php if ($this->uri->segment(1) == 'User'): ?>
    class="active"
  <?php endif; ?>>
      <a href="<?php echo base_url().'User'; ?>">
          <i class="fa fa-user"></i>
          <span class="hide-menu">User</span></a>
      <!-- <span class="inbox-num">3</span> -->
  </li>
<?php endif; ?>

<?php if (@$Menu_Roles['Roles'] | @$Menu_Roles['GroupRole']): ?>
<li>
  <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
    <i class="fa fa-h-square"></i>
    <span class="hide-menu">Access </span></a>
  <ul aria-expanded="false" class="collapse">
    <?php if (@$Menu_Roles['Roles']): ?>
      <li <?php if ($this->uri->segment(1) == 'Roles'): ?>
        class="active"
      <?php endif; ?>>
          <a href="<?php echo base_url().'Roles'; ?>">
              Roles</a>
          <!-- <span class="inbox-num">3</span> -->
      </li>
    <?php endif; ?>
    <?php if (@$Menu_Roles['GroupRole']): ?>
      <li <?php if ($this->uri->segment(1) == 'GroupRole'): ?>
        class="active"
      <?php endif; ?>>
          <a href="<?php echo base_url().'GroupRole'; ?>">
              Group Roles</a>
          <!-- <span class="inbox-num">3</span> -->
      </li>
    <?php endif; ?>
  </ul>
</li>
<?php endif; ?>
