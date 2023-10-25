      <div class="row">
          <div class="col-lg-12">
              <div class="row">
                  <div class="col-md-6">
                      <div class="card">
                          <div class="card-body">
                              <h5 class="card-title">Jumlah Surat Diajukan</h5>
                              <div class="d-flex m-t-30 m-b-20 no-block align-items-center">
                                  <span class="display-5 text-info"><i class="icon-envelope-open"></i></span>
                                  <a href="<?=base_url('HistorySurat');?>" class="link display-5 ml-auto"><?=$surat;?> <small style="font-size:15px"> Surat </small></a>
                              </div>
                          </div>
                      </div>
                  </div>
                  <div class="col-md-6">
                      <div class="card">
                          <div class="card-body">
                              <h5 class="card-title">Jumlah Prestasi Dimiliki</h5>
                              <div class="d-flex m-t-30 m-b-20 no-block align-items-center">
                                  <span class="display-5 text-purple"><i class="icon-trophy"></i></span>
                                  <a href="<?=base_url('HistoryPrestasi');?>" class="link display-5 ml-auto"><?=$prestasi;?> <small style="font-size:15px"> Prestasi </small></a>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
