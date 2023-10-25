<div class="row">
    <div class="col-lg-12">
        <div class="row">
            <!-- column -->
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Jumlah Prestasi Dimiliki</h5>
                        <div class="d-flex m-t-30 m-b-20 no-block align-items-center">
                            <span class="display-5 text-info"><i class="icon-trophy"></i></span>
                            <a href="<?=base_url('HistoryPrestasiOrmawa');?>" class="link display-5 ml-auto"><?=$prestasi;?> <small style="font-size:15px"> Prestasi </small></a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- column -->
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Jumlah Proker Dimiliki</h5>
                        <div class="d-flex m-t-30 m-b-20 no-block align-items-center">
                            <span class="display-5 text-purple"><i class="icon-book-open"></i></span>
                            <a href="<?=base_url('DataProker');?>" class="link display-5 ml-auto"><?=$proker;?> <small style="font-size:15px"> Proker </small></a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- column -->
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Jumlah Kegiatan Dimiliki</h5>
                        <div class="d-flex m-t-30 m-b-20 no-block align-items-center">
                            <span class="display-5 text-primary"><i class="icon-notebook"></i></span>
                            <a href="<?=base_url('DataKegiatan');?>" class="link display-5 ml-auto"><?=$kegiatan;?> <small style="font-size:15px"> Kegiatan </small></a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
