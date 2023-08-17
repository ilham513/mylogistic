<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@1,700&family=Open+Sans&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<!-- MDB -->
	<link rel="stylesheet" href="<?=base_url()?>css/mdb.min.css" />
	<!-- Custom styles -->
	<link rel="stylesheet" href="<?=base_url()?>css/admin.css" />
	
	<style>
	.center {
	  margin: auto;
	  margin-top:100px;
	  width: 60%;
	  padding: 10px;
	  font-size: 18px;
	}
	td{
	  padding: 2px 2px;
	}
	.nunito{
	  font-family: 'Nunito', sans-serif;
	}
	
	body {
	  background-color: #163a76;
	  font-family: 'Open Sans', sans-serif;
	  
	   background: rgb(22,58,118);
background: linear-gradient(94deg, rgba(22,58,118,1) 0%, rgba(34,92,187,1) 100%); 
	}
	
	h4{
	  font-size: 24px;
	}
	button{
	  padding: 3px 12px 3px 12px;
	}
	
	#myBtn {
	  display: none; /* Hidden by default */
	  position: fixed; /* Fixed/sticky position */
	  bottom: 20px; /* Place the button at the bottom of the page */
	  right: 30px; /* Place the button 30px from the right */
	  z-index: 99; /* Make sure it does not overlap */
	  border: none; /* Remove borders */
	  outline: none; /* Remove outline */
	  background-color: white; /* Set a background color */
	  color: #163a76; /* Text color */
	  cursor: pointer; /* Add a mouse pointer on hover */
	  padding: 8px; /* Some padding */
	  border-radius: 10px; /* Rounded corners */
	  font-size: 18px; /* Increase font size */
	}

	#myBtn:hover {
	  background-color: #555; /* Add a dark-grey background on hover */
	}

	</style>

  </head>

<body>
  <!--Main Navigation-->
  <header>
    <?php $this->load->view('component/sidebar.php');?>

    <?php $this->load->view('component/navbar.php');?>	
  </header>
  <!--Main Navigation-->

  <!--Main layout-->
  <main style="margin-top: 58px">
    <div class="container pt-4">
      <!--Section: Minimal statistics cards-->
      <section>
        <div class="row">
          <div class="col-xl-3 col-sm-6 col-12 mb-4">
            <div class="card">
              <div class="card-body">
                <div class="d-flex justify-content-between px-md-1">
                  <div>
                    <h3 class="text-danger"><?=$jumlah_pengiriman?></h3>
                    <p class="mb-0">Pengiriman</p>
                  </div>
                  <div class="align-self-center">
                    <i class="fas fa-truck text-danger fa-3x"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-3 col-sm-6 col-12 mb-4">
            <div class="card">
              <div class="card-body">
                <div class="d-flex justify-content-between px-md-1">
                  <div>
                    <h3 class="text-success"><?=$jumlah_kurir?></h3>
                    <p class="mb-0">Kurir</p>
                  </div>
                  <div class="align-self-center">
                    <i class="fas fa-motorcycle text-success fa-3x"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-3 col-sm-6 col-12 mb-4">
            <div class="card">
              <div class="card-body">
                <div class="d-flex justify-content-between px-md-1">
                  <div>
                    <h3 class="text-warning"><?=$jumlah_pelanggan?></h3>
                    <p class="mb-0">Pelanggan</p>
                  </div>
                  <div class="align-self-center">
                    <i class="fas fa-user text-warning fa-3x"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-3 col-sm-6 col-12 mb-4">
            <div class="card">
              <div class="card-body">
                <div class="d-flex justify-content-between px-md-1">
                  <div>
                    <h3 class="text-info"><?=$jumlah_gudang?></h3>
                    <p class="mb-0">Gudang</p>
                  </div>
                  <div class="align-self-center">
                    <i class="fas fa-box text-info fa-3x"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>

<div class="bg-white mb-4">
  <canvas id="myChart"></canvas>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
  const ctx = document.getElementById('myChart');

  new Chart(ctx, {
    type: 'bar',
    data: {
      labels: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'],
      datasets: [{
        label: '# Jumlah Pengiriman',
        data: [0,0,0,0,0,0,0,<?php foreach($grafik as $grafik){echo $grafik->count;} ?>,0,0,0,0],
        borderWidth: 1
      }]
    },
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
  });
</script>

		  
			<div class="alert alert-warning <?= $this->session->userdata('role') == 'gudang' ? 'd-none' : ''; ?> <?= $jumlah_konfirmasi < 1 ? 'd-none' : ''; ?>" role="alert">
				<a href="<?=site_url('status')?>">Ada <?=$jumlah_konfirmasi?> perubahan status yang perlu dikonfirmasi!</a>
			</div>
			<?php
			$tgl2 = new DateTime(date("Y-m-d"));
			
			foreach($array_pengiriman as $pengiriman): ?>
			<?php
				$tgl1 = new DateTime(date('Y-m-d', strtotime($pengiriman->tanggal_pengiriman))); 
				$jarak = $tgl2->diff($tgl1);			
			?>
			<div class="alert alert-danger <?=$jarak->d > 3 && $pengiriman->id_status <2 ? '' : 'd-none';?>" role="alert">
			  <?php
				echo 'Nomor Resi: JKT0000000'.$pengiriman->id_pengiriman.' sudah melebihi batas pengiriman, Harap hubungi kurir '.$pengiriman->nama_kurir.'!';	
			  ?>
			</div>
			<?php endforeach; 
			
			?>
        </div>
      </section>
      <!--Section: Minimal statistics cards-->
    </div>
  </main>
  <!--Main layout-->
  
  

  <!-- MDB -->
  <script type="text/javascript" src="<?=base_url()?>js/mdb.min.js"></script>
  <!-- Custom scripts -->
  <script type="text/javascript" src="<?=base_url()?>js/admin.js"></script>
  
  <script>  
	menyalakan_sidenav('<?=$sidebar?>');
  </script>
</body>

</html>