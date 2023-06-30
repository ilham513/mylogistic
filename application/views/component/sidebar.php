<!-- Sidebar -->
    <nav id="sidebarMenu" class="collapse d-lg-block sidebar collapse bg-white">
      <div class="position-sticky">
        <div class="list-group list-group-flush mx-3 mt-4">
          <a href="<?=site_url('admin')?>" class="list-group-item list-group-item-action py-2 ripple" id="dashboard">
            <i class="fas fa-tachometer-alt fa-fw me-3"></i><span>Dashboard</span>
          </a>

          <a href="<?=site_url('pengiriman')?>" class="list-group-item list-group-item-action py-2 ripple" id="pengiriman">
            <i class="fas fa-truck fa-fw me-3"></i><span>Pengiriman</span>
          </a>

          <a href="<?=site_url('kurir')?>" class="list-group-item list-group-item-action py-2 ripple" id="kurir">
            <i class="fas fa-motorcycle fa-fw me-3"></i><span>Kurir </span>
          </a>

          <a href="<?=site_url('gudang')?>"" class="list-group-item list-group-item-action py-2 ripple" id="gudang"><i
              class="fas fa-box fa-fw me-3"></i><span>Gudang</span>
		  </a>

	  <!--untuk admin-->
	  <?php if($this->session->userdata('role') != 'gudang'): ?>
          <a href="<?=site_url('pelanggan')?>" class="list-group-item list-group-item-action py-2 ripple" id="pelanggan"><i
              class="fas fa-user fa-fw me-3"></i><span>Pelanggan</span>
		  </a>		  
          <a href="<?=site_url('laporan')?>" class="list-group-item list-group-item-action py-2 ripple" id="laporan">
            <i class="fas fa-newspaper fa-fw me-3"></i><span>Laporan</span>
          </a>
	  <?php endif; ?>

        </div>
      </div>
    </nav>
    <!-- Sidebar -->
