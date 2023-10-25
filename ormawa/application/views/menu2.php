<li class="nav-small-cap">--- MAIN CONTENT</li>
<li <?php if ($this->uri->segment(1) == '' || $this->uri->segment(1) == 'Home'): ?>
  class="active"
<?php endif; ?>>
  <a class="waves-effect waves-dark" href="<?php echo base_url()?>">
    <i class="icon-speedometer"></i>
    <span class="hide-menu">Dashboard</span></a>
</li>
  <li <?php if ($this->uri->segment(1) == 'Fitur'): ?>
    class="active"
  <?php else: ?>
    class="utama" data-intro='Akses Semua Fitur Utama' data-step="10" 
  <?php endif; ?>>
    <a class="waves-effect waves-dark" href="<?php echo base_url()?>Fitur">
      <i class="ti ti-layout-grid2-alt"></i>
      <span class="hide-menu">Fitur</span></a>
  </li>
