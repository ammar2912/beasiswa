<div class="col-md-3 animate-box" data-animate-effect="fadeInRight">
    <div>
        <div class="fh5co_heading fh5co_heading_border_bottom pt-3 py-2 mb-4">Kegiatan Terbaru</div>
    </div>
    <?php
      $this->db->order_by("idgallery","DESC");
      $this->db->limit(6);
      $kegiatanpopuler = $this->db->get("gallery")->result();
     ?>
     <?php foreach ($kegiatanpopuler as $value): ?>
       <div class="row pb-3">
         <div class="col-5 align-self-center">
           <img src="<?php echo base_url().$value->foto ?>" alt="img" class="fh5co_most_trading"/>
         </div>
         <div class="col-7 paddding">
           <div class="most_fh5co_treding_font"><a href="<?php echo base_url() ?>Gallery/detail/<?php echo $value->idgallery ?>"><?php echo $value->judul ?></a></div>
           <div class="most_fh5co_treding_font_123"> <?php echo $this->libcore->tgl($value->tanggal) ?></div>
         </div>
       </div>
     <?php endforeach; ?>


</div>
