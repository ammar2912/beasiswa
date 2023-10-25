<div class="row p-t-20">
  <div class="col-md-12 col-xl-4">
    <div class="form-group animated flipIn">
      <label for="exampleInputuname">NPP</label>
      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text" id="basic-addon1"><i class="ti-calendar"></i></span>
        </div>
        <input type="text" name="npp" id="npp" class="form-control" placeholder="file" value="<?php echo @$iuran['npp']; ?>" readonly required>
      </div>

    </div>
  </div>
  <div class="col-md-12 col-xl-4">
    <div class="form-group animated flipIn">
      <label for="exampleInputuname">DIV</label>
      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text" id="basic-addon1"><i class="ti-calendar"></i></span>
        </div>
        <input type="text" name="div" id="div" class="form-control" placeholder="DIV" value="<?php echo @$iuran['div']; ?>" required>
      </div>

    </div>
  </div>
  <div class="col-md-12 col-xl-4">
    <div class="form-group animated flipIn">
      <label for="exampleInputuname">Pemberi Kerja / Badan Usaha</label>
      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text" id="basic-addon1"><i class="ti-calendar"></i></span>
        </div>
        <input type="text" name="badan_usaha" id="badan_usaha" class="form-control" placeholder="Bdan Usaha" value="<?php echo @$iuran['badan_usaha']; ?>" required>
      </div>

    </div>
  </div>
  <div class="col-md-12 col-xl-4">
    <div class="form-group animated flipIn">
      <label for="exampleInputuname">Pembina</label>
      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text" id="basic-addon1"><i class="ti-calendar"></i></span>
        </div>
        <select name="pembina" class="form-control myselect2">
        <?php foreach ($pembina as $value): ?>
            <option <?php if ($value->idpembina==$iuran['pembina']): ?>
              selected
            <?php endif; ?> value="<?php echo $value->idpembina?>"><?php echo $value->nama_pembina?></option>
        <?php endforeach; ?>
        </select>
        <!-- <input type="text" name="pembina" id="pembina" class="form-control" placeholder="file" value="<?php echo @$iuran['nama_obat']; ?>" required> -->
      </div>

    </div>
  </div>
  <div class="col-md-12 col-xl-4">
    <div class="form-group animated flipIn">
      <label for="exampleInputuname">Keps Awal</label>
      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text" id="basic-addon1"><i class="ti-calendar"></i></span>
        </div>
        <input type="date" name="keps_awal" id="keps_awal" class="form-control" placeholder="file" value="<?php echo @$iuran['keps_awal']; ?>" required>
      </div>

    </div>
  </div>
  <div class="col-md-12 col-xl-4">
    <div class="form-group animated flipIn">
      <label for="exampleInputuname">Keps JP</label>
      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text" id="basic-addon1"><i class="ti-calendar"></i></span>
        </div>
        <input type="text" name="keps_jp" id="keps_jp" class="form-control" placeholder="file" value="<?php echo @$iuran['keps_jp']; ?>" required>
      </div>

    </div>
  </div>
  <div class="col-md-12 col-xl-4">
    <div class="form-group animated flipIn">
      <label for="exampleInputuname">BLTH NA</label>
      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text" id="basic-addon1"><i class="ti-calendar"></i></span>
        </div>
        <input type="text" name="blth_na" id="blth_na" class="form-control" placeholder="file" value="<?php echo @$iuran['blth_na']; ?>" required>
      </div>

    </div>
  </div>
  <div class="col-md-12 col-xl-4">
    <div class="form-group animated flipIn">
      <label for="exampleInputuname">Skala</label>
      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text" id="basic-addon1"><i class="ti-calendar"></i></span>
        </div>
        <input type="text" name="skala" id="skala" class="form-control" placeholder="file" value="<?php echo @$iuran['skala']; ?>" required>
      </div>

    </div>
  </div>
  <div class="col-md-12 col-xl-4">
    <div class="form-group animated flipIn">
      <label for="exampleInputuname">Prog</label>
      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text" id="basic-addon1"><i class="ti-calendar"></i></span>
        </div>
        <input type="text" name="prog" id="prog" class="form-control" placeholder="file" value="<?php echo @$iuran['prog']; ?>" required>
      </div>

    </div>
  </div>
  <div class="col-md-12 col-xl-4">
    <div class="form-group animated flipIn">
      <label for="exampleInputuname">Rate</label>
      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text" id="basic-addon1"><i class="ti-calendar"></i></span>
        </div>
        <input type="text" name="rate" id="rate" class="form-control" placeholder="file" value="<?php echo @$iuran['rate']; ?>" required>
      </div>

    </div>
  </div>
  <div class="col-md-12 col-xl-4">
    <div class="form-group animated flipIn">
      <label for="exampleInputuname">Penambahan</label>
      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text" id="basic-addon1"><i class="ti-calendar"></i></span>
        </div>
        <input type="text" name="penambahan" id="penambahan" class="form-control" placeholder="file" value="<?php echo @$iuran['penambahan']; ?>" required>
      </div>

    </div>
  </div>
  <div class="col-md-12 col-xl-4">
    <div class="form-group animated flipIn">
      <label for="exampleInputuname">Pengurangan</label>
      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text" id="basic-addon1"><i class="ti-calendar"></i></span>
        </div>
        <input type="text" name="pengurangan" id="pengurangan" class="form-control" placeholder="file" value="<?php echo @$iuran['pengurangan']; ?>" required>
      </div>

    </div>
  </div>
  <div class="col-md-12 col-xl-4">
    <div class="form-group animated flipIn">
      <label for="exampleInputuname">TK Aktif</label>
      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text" id="basic-addon1"><i class="ti-calendar"></i></span>
        </div>
        <input type="text" name="tk_aktif" id="tk_aktif" class="form-control" placeholder="file" value="<?php echo @$iuran['tk_aktif']; ?>" required>
      </div>

    </div>
  </div>
  <div class="col-md-12 col-xl-4">
    <div class="form-group animated flipIn">
      <label for="exampleInputuname">TK NA</label>
      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text" id="basic-addon1"><i class="ti-calendar"></i></span>
        </div>
        <input type="text" name="tk_na" id="tk_na" class="form-control" placeholder="file" value="<?php echo @$iuran['tk_na']; ?>" required>
      </div>

    </div>
  </div>
  <div class="col-md-12 col-xl-4">
    <div class="form-group animated flipIn">
      <label for="exampleInputuname">TOTAL TK</label>
      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text" id="basic-addon1"><i class="ti-calendar"></i></span>
        </div>
        <input type="text" name="total_tk" id="total_tk" class="form-control" placeholder="file" value="<?php echo @$iuran['total_tk']; ?>" required>
      </div>

    </div>
  </div>

  <div class="col-md-12 col-xl-4">
    <div class="form-group animated flipIn">
      <label for="exampleInputuname">Total Iuran Berjalan</label>
      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text" id="basic-addon1"><i class="ti-calendar"></i></span>
        </div>
        <input type="text" name="total_iuran_berjalan" id="total_iuran_berjalan" class="form-control" placeholder="file" value="<?php echo @$iuran['total_iuran_berjalan']; ?>" required>
      </div>

    </div>
  </div>
  <div class="col-md-12 col-xl-4">
    <div class="form-group animated flipIn">
      <label for="exampleInputuname">Blth Dutk</label>
      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text" id="basic-addon1"><i class="ti-calendar"></i></span>
        </div>
        <input type="date" name="blth_dutk" id="blth_dutk" class="form-control" placeholder="file" value="<?php echo @$iuran['blth_dutk']; ?>" required>
      </div>

    </div>
  </div>
  <div class="col-md-12 col-xl-4">
    <div class="form-group animated flipIn">
      <label for="exampleInputuname">Blth Posting</label>
      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text" id="basic-addon1"><i class="ti-calendar"></i></span>
        </div>
        <input type="date" name="blth_posting" id="blth_posting" class="form-control" placeholder="file" value="<?php echo @$iuran['blth_posting']; ?>" required>
      </div>

    </div>
  </div>
  <div class="col-md-12 col-xl-4">
    <div class="form-group animated flipIn">
      <label for="exampleInputuname">Nilai Posting</label>
      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text" id="basic-addon1"><i class="ti-calendar"></i></span>
        </div>
        <input type="text" name="nilai_posting" id="nilai_posting" class="form-control" placeholder="file" value="<?php echo @$iuran['nilai_posting']; ?>" required>
      </div>

    </div>
  </div>
  <div class="col-md-12 col-xl-4">
    <div class="form-group animated flipIn">
      <label for="exampleInputuname">Sipp Prs</label>
      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text" id="basic-addon1"><i class="ti-calendar"></i></span>
        </div>
        <input type="text" name="sipp_prs" id="sipp_prs" class="form-control" placeholder="file" value="<?php echo @$iuran['sipp_prs']; ?>" required>
      </div>

    </div>
  </div>
  <div class="col-md-12 col-xl-4"></div>
</div>
