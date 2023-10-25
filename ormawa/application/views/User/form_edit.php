<div class="row p-t-20">

    <div class="col-md-12 col-xl-4">
      <div class="form-group animated flipIn">
        <label for="exampleInputuname">Pegawai</label>

        <select class="form-control myselect2" name="nopeg" required>
          <option value="">Pilih Pegawai</option>
          <?php foreach ($pegawai as $value): ?>
            <option value="<?php echo $value->idpegawai?>" <?php echo $value->idpegawai==$user['pegawai_idpegawai']?'selected':''?>><?php echo $value->nama;?></option>
          <?php endforeach; ?>
        </select>
      </div>
    </div>
  <div class="col-md-12 col-xl-4">
    <div class="form-group animated flipIn">
      <label for="exampleInputuname">Username</label>
      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text" id="basic-addon1"><i class="ti-calendar"></i></span>
        </div>
        <input type="text" name="username" class="form-control" value="<?php echo $user['username']?>">
      </div>
    </div>
  </div>
  <div class="col-md-12 col-xl-4">
    <div class="form-group animated flipIn">
      <label for="exampleInputuname">Password</label>
      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text" id="basic-addon1"><i class="ti-calendar"></i></span>
        </div>
        <input type="password" name="password" class="form-control" value="">
      </div>
    </div>
  </div>
  <div class="col-md-12 col-xl-6">
    <div class="form-group animated flipIn">
      <label for="exampleInputuname">Hak Akses</label>
      <select multiple class="optgroup" name="roles[]">
        <?php foreach ($role as $kat): ?>
          <?php foreach ($kat['menu'] as $menu): ?>
            <?php if (empty($menu['sub'])): ?>
              <optgroup label="<?php echo strtolower($kat['nama'])?>">
                <option value="<?php echo $menu['id']?>"
                  <?php
                    for ($i=0; $i < count($role_user) ; $i++) {
                      echo $role_user[$i]==$menu['id']?"selected":'';
                    }
                  ?>

                  ><?php echo strtolower($menu['nama'])?></option>
              </optgroup>
              <?php else: ?>
              <?php foreach ($menu['sub'] as $sub): ?>
                <optgroup label="<?php echo strtolower($menu['nama'])?>">
                  <option value="<?php echo $sub['id']?>"
                    <?php
                      for ($i=0; $i < count($role_user) ; $i++) {
                        echo $role_user[$i]==$sub['id']?"selected":'';
                      }
                    ?>
                    ><?php echo strtolower($sub['nama'])?></option>
                </optgroup>

              <?php endforeach; ?>
            <?php endif; ?>
          <?php endforeach; ?>
        <?php endforeach; ?>

      </select>
    </div>
  </div>


</div>
