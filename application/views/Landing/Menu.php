<style media="screen">
.third-level-menu
{
  position: absolute;
  top: 0;
  left: -300px;
  width: 300px;
  list-style: none;
  padding: 0;
  margin: 0;
  display: none;
  z-index: 100;
  box-shadow: 0px 0px 15px 4px rgb(0 0 0 / 10%);
}

.third-level-menu > li
{
  height: 30px;
  background: #fff;
}
.third-level-menu > li:hover { background: #688efe; }

.second-level-menu
{
  position: absolute;
  box-shadow: 0px 0px 15px rgb(0 0 0 / 10%);
  background: #fff;
  top: 35px;
  width: 300px;
  list-style: none;
  padding: 0;
  margin: 0;
  display: none;
}

.second-level-menu > li
{
  position: relative;
  background: #fff;
}
.second-level-menu > li:hover {
  background: #21D4FD;
}

.top-level-menu
{
  /* list-style: none;
  padding: 0;
  margin: 0; */
}

.top-level-menu > li
{
  position: relative;
  /* float: left;
  height: 30px;
  width: 150px;
  background: #999999; */
}

.top-level-menu li:hover > ul
{
  /* On hover, display the next level's menu */
  display: inline;
}
</style>
<?php $url = $this->uri->segment(1); ?>
<nav class="main-nav">
    <!-- ***** Logo Start ***** -->
    <a href="#" class="logo" style="margin-top: 8px;">
        <img src="<?php echo base_url() ?>desain/logo_polije.png" width="70" alt="KEMAHASISWAAN POLIJE"/>
    </a>
    <!-- ***** Logo End ***** -->
    <!-- ***** Menu Start ***** -->
    <ul class="nav top-level-menu">
        <li><a href="<?php echo base_url() ?>" class="<?php if ($url == ""): ?>active<?php endif; ?>">HOME</a></li>
        <li><a href="#">PROFIL KEMAHASISWAAN <i class="fa fa-chevron-down"></i></a>
          <ul class="second-level-menu">
            <li><a href="<?php echo base_url() ?>Home/tentang" class="<?php if ($this->uri->segment(2) == 'tentang'){echo 'active';}  ?>">Profil Kemahasiswaan</a></li>
            <li><a href="<?php echo base_url() ?>Home/organisasi" class="<?php if ($this->uri->segment(2) == 'organisasi'){echo 'active';}  ?>">Struktur Organisasi</a></li>
            <li><a href="<?php echo base_url() ?>LayananKemahasiswaan" class="<?php if ($this->uri->segment(2) == 'LayananKemahasiswaan'){echo 'active';}  ?>">Layanan Kemahasiswaan</a></li>
            <li><a href="<?php echo base_url() ?>Gallery" class="<?php if ($this->uri->segment(1) == 'Gallery'){echo 'active';}  ?>">Program Kegiatan</a></li>
          </ul>
        </li>
        <li><a href="#">INFORMASI & PENGUMUMAN <i class="fa fa-chevron-down"></i></a>
          <ul class="second-level-menu">
            <li><a href="<?php echo base_url() ?>Pengumuman" class="<?php if ($url == "Pengumuman"): ?>active<?php endif; ?>">INFORMASI & PENGUMUMAN</a></li>
            <li><a href="<?php echo base_url() ?>OrmawaData" class="<?php if ($url == "OrmawaData"): ?>active<?php endif; ?>">ORMAWA</a></li>
            <li><a href="<?php echo base_url() ?>Prestasi" class="<?php if ($url == "Prestasi"): ?>active<?php endif; ?>">PRESTASI</a></li>
            <li><a href="<?php echo base_url() ?>Beasiswa" class="<?php if ($url == "Beasiswa"): ?>active<?php endif; ?>">BEASISWA</a></li>
          </ul>
        </li>
        <li><a href="#">SIM ORMAWA <i class="fa fa-chevron-down"></i></a>
          <ul class="second-level-menu">
            <li><a href="<?php echo base_url() ?>ormawa/Login/Kemahasiswaan">Kemahasiswaan / Pimpinan</a></li>
            <li><a href="<?php echo base_url() ?>ormawa/Login">ORMAWA / Mahasiswa</a></li>
          </ul>
        </li>
        <li><a href="<?php echo base_url() ?>KontakHubung" class="<?php if ($url == "KontakHubung"): ?>active<?php endif; ?>">KONTAK HUBUNG</a></li>
        
        <!-- <li><a href="https://layanan-p3m.polije.ac.id/">LAYANAN P3M</a></li> -->
        <!-- <li><a href="<?php echo base_url('Home/admin') ?>">MONITORING P3M</a></li> -->
        <!-- <li><a href="#map">Hubungi Kami</a></li>
        <li><a href="<?php echo base_url() ?>index.php/login">Admin</a></li> -->
    </ul>
    <a class='menu-trigger'>
        <span>Menu</span>
    </a>
    <!-- ***** Menu End ***** -->
</nav>
