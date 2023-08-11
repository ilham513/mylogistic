<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pengiriman Add</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@1,700&family=Open+Sans&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<!-- MDB -->
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
    <?php include_once('component/sidebar.php'); ?>

    <?php include_once('component/navbar.php'); ?>	
  </header>
  <!--Main Navigation-->

  <!--Main layout-->
  <main style="margin-top: 58px">
    <div class="container pt-4">

	 <!-- Section: Main chart -->
		  <section class="mb-4">
			<div class="card">
			  <div class="card-header py-3">
				<h5 class="mb-0"><strong>Tambah Pengiriman</strong></h5>
			  </div>
			  <div class="card-body">
				<form action="<?=site_url('pengiriman/add_go')?>" method="post">
				  <!-- input -->
				  <div class="form-outline mb-4">
					<select name="id_gudang" class="form-select" aria-label="Default select example">
					  <option selected disabled>Pilih Lokasi Gudang...</option>
					  <?php foreach($array_gudang as $gudang): ?>
					  <option value="<?=$gudang->id_gudang?>"><?=$gudang->lokasi_gudang?></option>
					  <?php endforeach; ?>
					</select>					
				  </div>

				  <!-- input -->
				  <div class="form-outline mb-4">
					<select name="id_kurir" class="form-select" aria-label="Default select example">
					  <option selected disabled>Pilih Nama Kurir...</option>
					  <?php foreach($array_kurir as $kurir): ?>
					  <option value="<?=$kurir->id_kurir?>"><?=$kurir->nama_kurir?></option>
					  <?php endforeach; ?>
					</select>					
				  </div>

				  <!-- input -->
				  <div class="form-outline mb-4">
					<select name="id_pelanggan" class="form-select" aria-label="Default select example">
					  <option selected disabled>Pilih Nama Pengirim...</option>
					  <?php foreach($array_pelanggan as $pelanggan): ?>
					  <option value="<?=$pelanggan->id_pelanggan?>"><?=$pelanggan->nama_pelanggan?></option>
					  <?php endforeach; ?>
					</select>					
				  </div>

				  <!-- input -->
				  <div class="form-outline mb-4">
					<input name="nama_penerima"  type="text" id="form6Example3" placeholder="Nama Penerima" class="form-control" />
				  </div>

				  <!-- input -->
				  <div class="form-outline mb-4">
					<input name="alamat_penerima"  type="text" id="form6Example3" placeholder="Alamat Penerima" class="form-control" />
				  </div>

				  <!-- input -->
				  <div class="form-outline mb-4">
					<select name="id_barang" class="form-select" aria-label="Default select example">
					  <option selected disabled>Pilih Nama Barang...</option>
					  <?php foreach($array_barang as $barang): ?>
					  <option value="<?=$barang->id_barang?>"><?=$barang->nama_barang?></option>
					  <?php endforeach; ?>
					</select>					
				  </div>

				  <!-- input -->
				  <div class="form-outline mb-4">
					<input name="jumlah" type="number" id="form6Example3" placeholder="Jumlah" class="form-control" />
				  </div>

				  <!-- input -->
				  <div class="form-outline mb-4">
					<input name="berat" type="number" id="form6Example3" placeholder="Berat (Minimal 11KG)" min="11" max="100" class="form-control" />
				  </div>

				  <!-- input -->
				  <div class="form-outline mb-4">
					<input name="harga" type="number" id="form6Example3" placeholder="Harga" class="form-control" />
				  </div>

				  <!-- Submit button -->
				  <button type="submit" class="btn btn-success btn-block mb-4">Kirim</button>
				</form>				
				
			  </div>
			</div>
		  </section>
	  <!-- Section: Main chart -->
	
    </div>
  </main>
  <!--Main layout-->

  <!-- MDB -->
  <script type="text/javascript" src="<?=base_url()?>js/mdb.min.js"></script>
  <!-- Custom scripts -->
  <script type="text/javascript" src="<?=base_url()?>js/admin.js"></script>
  
 	<script>  
		menyalakan_sidenav('pengiriman');
	</script>
 
</body>

</html>