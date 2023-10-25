<div class="row p-t-20">
  <!-- <div class="aler alert-info" role="alert">
      <h2>Jika pengajuan surat anda sebelumnya masih berlaku, silahkan download kembali file sebelumnya</h2>
  </div> -->
  <div class="alert alert-info ml-2" role="alert">
      <div class="d-flex">
          <span class="svg-icon svg-icon-2hx svg-icon-primary">
              <i class="fas fa-info"></i>
          </span>
          <span class="ml-1">Jika pengajuan surat anda sebelumnya masih berlaku, silahkan download kembali file sebelumnya di History Surat!!!</span>
      </div>
  </div>
  <!-- <b style="color:red;margin-left:8px">Nb : </b><br><br> -->
    <div class="col-md-12 col-xl-6">
        <div class="form-group animated flipIn">
            <label for="exampleInputuname">Jenis Surat</label>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1"><i class="ti-calendar"></i></span>
                </div>
                <select name="jenis_surat" id="cek" class="form-control select2 col-md-12" required>
                    <option value=""> Pilih Jenis Surat </option>
                    <?php foreach ($surat as $value) : ?>
                        <option value="<?= $value->id; ?>"> <?= $value->jenis_surat; ?> </option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
    </div>
    <div class="col-md-12 col-xl-12">
        <div class="form-group animated flipIn">
            <label for="exampleInputuname">Subjek</label>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1"><i class="ti-calendar"></i></span>
                </div>
                <input type="text" name="id_user" hidden="1" class="form-control" value="<?= $this->session->userdata('id'); ?>" require>
                <input type="text" name="subjek" class="form-control" value="" required>
            </div>
        </div>
    </div>
    <div class="col-md-12 col-xl-12" id="formsurat">

        <!-- form beasiswa -->
        <div id="form-beasiswa" style="display:none">
            <p><b>Biodata diri :</b></p>
            <div class="row" id="form-beasiswa">
                <div class="col-md-6">
                    <label for="nama">Nama</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1"><i class="ti-calendar"></i></span>
                        </div>
                        <input type="text" name="nama" id="nama" class="form-control" value="<?= $user['nama'] ?>" readonly>
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="nim">NIM</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1"><i class="ti-calendar"></i></span>
                        </div>
                        <input type="text" name="nim" id="nim" class="form-control" value="<?= $user['nim'] ?>" readonly>
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="jurusan">Jurusan</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1"><i class="ti-calendar"></i></span>
                        </div>
                        <input type="text" name="jurusan" id="jurusan" class="form-control" value="<?= $user['jurusan'] ?>" readonly>
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="prodi">Program Studi</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1"><i class="ti-calendar"></i></span>
                        </div>
                        <input type="text" name="prodi" id="prodi" class="form-control" value="<?= $user['prodi'] ?>" readonly>
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="semester">Semester</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1"><i class="ti-calendar"></i></span>
                        </div>
                        <input type="text" name="semester" id="semester" class="form-control" placeholder="Semester sekarang (IV)">
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="ips">Indeks Prestasi Semester</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1"><i class="ti-calendar"></i></span>
                        </div>
                        <input type="text" name="ips" id="ips" class="form-control" placeholder="Nilai semester terakhir (3.72)">
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="jenis_kelamin">Jenis Kelamin</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1"><i class="ti-calendar"></i></span>
                        </div>
                        <select name="jenis_kelamin" id="jenis_kelamin" class="form-control select2 col-md-12">
                            <option value=""> Pilih Jenis Kelamin </option>
                            <option value="1">Laki - Laki</option>
                            <option value="2">Perempuan</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="tempat_lahir">Tempat Lahir</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1"><i class="ti-calendar"></i></span>
                        </div>
                        <input type="text" name="tempat_lahir" id="tempat_lahir" class="form-control" placeholder="Tempat lahir">
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="tanggal_lahir">Tanggal Lahir</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1"><i class="ti-calendar"></i></span>
                        </div>
                        <input type="date" name="tanggal_lahir" id="tanggal_lahir" class="form-control" placeholder="Tanggal lahir">
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="nama_ayah">Nama Ayah</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1"><i class="ti-calendar"></i></span>
                        </div>
                        <input type="text" name="nama_ayah" id="nama_ayah" class="form-control" placeholder="Nama ayah">
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="nama_ibu">Nama Ibu</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1"><i class="ti-calendar"></i></span>
                        </div>
                        <input type="text" name="nama_ibu" id="nama_ibu" class="form-control" placeholder="Nama ibu">
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="pekerjaan_ayah">Pekerjaan Ayah</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1"><i class="ti-calendar"></i></span>
                        </div>
                        <input type="text" name="pekerjaan_ayah" id="pekerjaan_ayah" class="form-control" placeholder="Pekerjaan ayah">
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="pekerjaan_ibu">Pekerjaan Ibu</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1"><i class="ti-calendar"></i></span>
                        </div>
                        <input type="text" name="pekerjaan_ibu" id="pekerjaan_ibu" class="form-control" placeholder="Pekerjaan ibu">
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="penghasilan_ayah">Penghasilan Ayah</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1"><i class="ti-calendar"></i></span>
                        </div>
                        <input type="number" name="penghasilan_ayah" id="penghasilan_ayah" class="form-control" placeholder="Diisi tanpa ada (.)">
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="penghasilan_ibu">Penghasilan Ibu</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1"><i class="ti-calendar"></i></span>
                        </div>
                        <input type="number" name="penghasilan_ibu" id="penghasilan_ibu" class="form-control" placeholder="Diisi tanpa ada (.)">
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="status_ayah">Status Ayah</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1"><i class="ti-calendar"></i></span>
                        </div>
                        <select name="status_ayah" id="status_ayah" class="form-control select2 col-md-12">
                            <option value=""> Pilih Status Ayah </option>
                            <option value="1">Hidup</option>
                            <option value="2">Meninggal</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="staus_ibu">Status Ibu</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1"><i class="ti-calendar"></i></span>
                        </div>
                        <select name="status_ibu" id="status_ibu" class="form-control select2 col-md-12">
                            <option value=""> Pilih Status Ibu </option>
                            <option value="1">Hidup</option>
                            <option value="2">Meninggal</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-4 tanggungan_anak">
                    <label for="tanggungan_anak">tanggunan Anak yang Sekolah</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1"><i class="ti-calendar"></i></span>
                        </div>
                        <input type="number" name="tanggungan_anak" id="tanggungan_anak" value="0" class="form-control" placeholder="Tanggungan anak yang sekolah">
                    </div>
                </div>
            </div>
        </div>

        <div id="syarat"></div>
    </div>



</div>

<script>
    $('document').ready(function() {

        $('#cek').change(function() {

          function numberOnly(){
            $('#ips').on("input", function(evt) {
                var self = $(this);
                self.val(self.val().replace(/[^0-9\.]/g, ''));
                if ((evt.which != 46 || self.val().indexOf('.') != -1) && (evt.which < 48 || evt.which > 57)) {
                    evt.preventDefault();
                }
            });
          }

          function inputRequire(){
              $('#nama').attr('required', 1);
              $('#nim').attr('required', 1);
              $('#prodi').attr('required', 1);
              $('#jurusan').attr('required', 1);
              $('#semester').attr('required', 1);
              $('#ips').attr('required', 1);
              $('#jenis_kelamin').attr('required', 1);
              $('#tempat_lahir').attr('required', 1);
              $('#tanggal_lahir').attr('required', 1);
              $('#nama_ayah').attr('required', 1);
              $('#nama_ibu').attr('required', 1);
              $('#status_ayah').attr('required', 1);
              $('#status_ibu').attr('required', 1);
              $('#tanggungan_anak').attr('required', 1);
          }

            var id = $(this).val();
            if (id == '') {
                $('#formsurat').css('display', 'none');
            } else {
                $('#formsurat').css('display', 'block');
                $.ajax({
                    type: "post",
                    url: "<?= site_url(''); ?>PengajuanSurat/cek_syarat",
                    data: "id=" + id,
                    dataType: "json",
                    success: function(response) {
                        $('#syarat').empty();
                        // console.log(response);

                        // form-beasiswa
                        if (response.id == 1) {
                            $('#form-beasiswa').css('display', 'block');
                            $('.tanggungan_anak').addClass('d-none');
                            numberOnly();
                            inputRequire();

                        } else if (response.id == 2) {
                            $('#form-beasiswa').css('display', 'block');
                            $('.tanggungan_anak').removeClass('d-none');
                            numberOnly();
                            inputRequire();
                        } else {
                           $('#form-beasiswa').css('display', 'none');
                        }
                        // form syarat
                        let syarat = response.syarat;
                        let arr_kalimat = syarat.split(",");
                        // console.log(arr_kalimat);
                        let jenis = new Array();
                        $('<p><b>Persyaratan :</b></p>').appendTo('#syarat');
                        $.each(arr_kalimat, function(index, value) {
                            $('<label>' + value + '</label>').appendTo('#syarat');
                            $('<input>').attr({
                                type: 'file',
                                class: 'form-control',
                                name: 'syarat[]',
                                required: "1"
                            }).appendTo('#syarat');
                            jenis.push(value);
                        });
                        $('<input>').attr({
                            type: 'text',
                            class: 'form-control',
                            name: 'jenis_syarat',
                            id: 'jenis_syarat',
                            required: '1',
                            hidden: '1',
                            value: jenis.join(",")
                        }).appendTo('#syarat');

                    }
                });
            }
        });
    });
</script>
