<!DOCTYPE html>
<html lang="en">
<div>
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/edp2.css'); ?>">
  <div class="page-container">
    <div class="login-login">
      <div class="login-sidebar">
        <span class="login-text"><span>Profil</span></span>
        <span class="login-text02"><span>Data Pribadi</span></span>
        <span class="login-text04"><span>Data Akademik</span></span>
        <span class="login-text06"><span>Data Keluarga</span></span>
        <span class="login-text08"><span>Data Rekening</span></span>
        <span class="login-text10"><span>Dokumen</span></span>
        <span class="login-text12"><span>Status Beasiswa</span></span>
        <span class="login-text14"><span>History</span></span>
        <span class="login-text16"><span>Logout</span></span>
        <img
          alt="tablerlistcheckI699"
          src="/tablerlistchecki699-5hmb.svg"
          class="login-tablerlistcheck"
        />
        <div class="login-mingcutefileline">
          <div class="login-group">
            <img alt="VectorI699" src class="login-vector" />
            <img
              alt="VectorI699"
              src="/vectori699-m5ec.svg"
              class="login-vector1"
            />
          </div>
        </div>
        <img
          alt="iconparkoutlinepeopleI699"
          src="/iconparkoutlinepeoplei699-xejk.svg"
          class="login-iconparkoutlinepeople"
        />
        <img
          alt="majesticonslogoutlineI699"
          src="/majesticonslogoutlinei699-4102.svg"
          class="login-majesticonslogoutline"
        />
        <img
          alt="gridiconsdropdownI699"
          src="/gridiconsdropdowni699-03oo.svg"
          class="login-gridiconsdropdown"
        />
      </div>
      <div class="login-data-pribadi">
        <span class="login-text18"><span>Informasi Pribadi</span></span>
        <div class="login-isi-data-diri">
        <form action="<?= site_url('UpdateController/updateData'); ?>" method="post">
          <div class="login-nik">
            <span class="login-text20"><span>NIK</span></span>
            <input type="text" name="nik" placeholder="masukkan NIK anda" />
          </div>
          <div class="login-nama">
            <span class="login-text22"><span>Nama</span></span>
            <input class="edit-data-pribadi-text28" type="text" name="nama" value="Zahra Aulia Maulidina" readonly>
          </div>
          <div class="login-jk">
            <span class="login-text26"><span>Jenis Kelamin</span></span>
            <select name="jekel">
				<option value="1">Laki-Laki</option>
				<option value="2">Perempuan</option>
			</select>
          </div>
          <div class="login-tl">
            <span class="login-text28"><span>Tempat Lahir</span></span>
            <input type="text" name="tempatLahir" placeholder="masukkan tempat lahir anda" />
          </div>
          <div class="login-ttl">
            <span class="login-text30"><span>Tanggal Lahir</span></span>
            <input type="date" name="tanggalLahir" />
          </div>
          <div class="login-alamat">
            <span class="login-text32"><span>Alamat</span></span>
            <textarea name="alamat" placeholder="masukkan alamat anda" required></textarea>
          </div>
          <div class="login-agama">
            <span class="login-text34"><span>Agama</span></span>
            <select name="agama">
				<option value="islam">Islam</option>
				<option value="kristen">Kristen</option>
				<option value="katolik">Katolik</option>
                <option value="hindu">Hindu</option>
                <option value="budha">Budha</option>
                <option value="konghucu">Konghucu</option>
			</select>
          </div>
          <div class="login-email">
            <span class="login-text36"><span>Email</span></span>
            <input type="email" name="email" placeholder="masukkan e-mail anda" required>
          </div>
        </div>
        <div class="login-frame44">
          <button type="submit" class="login-button">
            <span class="login-text40"><span>SIMPAN</span></span>
          </button>
        </div>
      </div>
      <div class="login-foto">
        <img alt="Rectangle126910" src class="login-rectangle12" />
        <button class="login-button1">
          <span class="login-text42"><span>PILIH FILE</span></span>
        </button>
      </div>
    </div>
  </div>
</div>
</form>
</html>