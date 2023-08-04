<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pengiriman View</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@1,700&family=Open+Sans&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<!-- MDB -->
	<link rel="stylesheet" href="<?=base_url()?>css/mdb.min.css" />
	<!-- Custom styles -->
	<link rel="stylesheet" href="<?=base_url()?>css/admin.css" />
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	
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
				<h5 class="mb-0"><strong>Pengiriman</strong></h5>
			  </div>
			  <div class="card-body">
				<div class="d-grid gap-2 mb-3 d-md-flex justify-content-md-between">
				  <!-- Button trigger modal -->
					<button type="button" class="btn btn-primary btn-sm" data-mdb-toggle="modal" data-mdb-target="#exampleModal">
					  <small>Pilih tanggal</small>
					</button>
					
					<a href="<?=site_url('pengiriman/add')?>"><button class="btn btn-success fw-bold" type="button">Tambah Pengiriman</button></a>
				</div>
				
				<table class="table align-middle mb-0 bg-white">
				  <thead class="bg-light">
					<tr>
					  <th>No Resi</th>
					  <th>Nama Pengirim <i class="fa-solid fa-sort"></i></th>
					  <th>Nama Penerima</th>
					  <th>Alamat</th>
					  <th>Lokasi Terakhir <i class="fa-solid fa-sort"></i></th>
					  <th>Status <i class="fa-solid fa-sort"></i></th>
					  <th>Keterangan <i class="fa-solid fa-sort"></i></th>
					  <th>Tanggal pengiriman <i class="fa-solid fa-sort"></i></th>
					  <th>Tanggal diperbarui <i class="fa-solid fa-sort"></i></th>
					  <th>Actions</th>
					</tr>
				  </thead>
				  <tbody>
				<form action="<?=site_url('laporan/bulk_pdf')?>" method="post">
						  <?php foreach($array_pengiriman as $pengiriman): ?>

							  <td data-mdb-toggle="modal" data-mdb-target="#exampleModal<?=$pengiriman->id_pengiriman?>"><a href="#">JKT00<?=$pengiriman->id_pengiriman?></a></td>
							  <td><?=$pengiriman->nama_pelanggan?></td>
							  <td><?=$pengiriman->nama_penerima?></td>
							  <td><?=$pengiriman->alamat_penerima?></td>
							  <td><?=$pengiriman->lokasi_gudang?></td>
							  <td><?=$pengiriman->nama_status?></td>
							  <td><?=$pengiriman->keterangan?></td>
							  <td><?=$pengiriman->tanggal_pengiriman?></td>
							  <td><?=$pengiriman->tanggal?></td>
							  <td>
								<a href="<?=site_url('pengiriman/edit/'.$pengiriman->id_pengiriman)?>"><span class="fw-bold me-2 text-primary"><i class="fa-solid fa-pen-to-square"></i></span></a>
								<a href="<?=site_url('pengiriman/hapus/'.$pengiriman->id_pengiriman)?>"><span class="fw-bold me-2 text-danger"><i class="fa-solid fa-trash"></i></span></a>
								<a href="<?=site_url('laporan/pdf/'.$pengiriman->id_pengiriman)?>"><span class="fw-bold text-secondary"><i class="fa-solid fa-print"></i></span></a>
							  </td>
							</tr>
						  <?php endforeach; ?>
				  </tbody>
				</table>

				</form>
				
			  </div>
			</div>
		  </section>
	  <!-- Section: Main chart -->
	  
		  
	<?php foreach($array_pengiriman as $pengiriman): ?>
	<!-- Modal -->
	<div class="modal fade" id="exampleModal<?=$pengiriman->id_pengiriman?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog">
		<div class="modal-content">
		  <div class="modal-header">
			<h5 class="modal-title" id="exampleModalLabel">Detail JKT00<?=$pengiriman->id_pengiriman?></h5>
			<button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
		  </div>
		  <div class="modal-body">				
				<table class="table align-middle mb-0 bg-white">
				  <tbody>
				  <tr>
					  <td>Barang</td>
					  <td>: <?=($pengiriman->nama_barang)?></td>
					</tr>
					<tr>
					  <td>Harga</td>
					  <td>: Rp <?=number_format($pengiriman->harga)?></td>
					</tr>
					<tr>
					  <td>Jumlah</td>
					  <td>: <?=$pengiriman->jumlah?></td>
					</tr>
					<tr>
					  <td>Berat</td>
					  <td>: <?=$pengiriman->berat?> KG</td>
					</tr>
					<tr class="fw-bold bg-light">
					  <td>Total</td>
					  <td>: Rp <?=number_format($pengiriman->harga * $pengiriman->berat)?></td>
					</tr>
				  </tbody>
				</table>	
		  </div>
		  <div class="modal-footer">
			<button type="button" class="btn btn-danger" data-mdb-dismiss="modal">Close</button>
		  </div>
		</div>
	  </div>
	</div>
	<?php endforeach; ?>
	
    </div>
  </main>
  <!--Main layout-->

  <!-- MDB -->
  <script type="text/javascript" src="<?=base_url()?>js/mdb.min.js"></script>
  <!-- Custom scripts -->
  <script type="text/javascript" src="<?=base_url()?>js/admin.js"></script>


	<!-- Modal -->
	<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog">
		<form action="<?=site_url('pengiriman/interval')?>" method="get">
			<div class="modal-content">
			  <div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Tentukan tanggal...</h5>
				<button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
			  </div>
			  <div class="modal-body">
				<label for="form7Example1">Tanggal Awal</label>
				<div class="form-outline mb-3">
				  <input name="tanggal_awal" type="date" id="form7Example1" class="form-control" />
				</div>		  

				<label class="form-label" for="form7Example1">Tanggal Akhir</label>
				<div class="form-outline mb-3">
				  <input name="tanggal_akhir" type="date" id="form7Example1" class="form-control" />
				</div>		  
			  
			  </div>
			  <div class="modal-footer">
				<button type="submit" class="btn btn-primary">Kirim</button>
			  </div>
		  </form>
		</div>
	  </div>
	</div>

  
    
	<script>  
		menyalakan_sidenav('<?=$sidebar?>');
				
		$('th').click(function(){
			var table = $(this).parents('table').eq(0)
			var rows = table.find('tr:gt(0)').toArray().sort(comparer($(this).index()))
			this.asc = !this.asc
			if (!this.asc){rows = rows.reverse()}
			for (var i = 0; i < rows.length; i++){table.append(rows[i])}
		})
		function comparer(index) {
			return function(a, b) {
				var valA = getCellValue(a, index), valB = getCellValue(b, index)
				return $.isNumeric(valA) && $.isNumeric(valB) ? valA - valB : valA.toString().localeCompare(valB)
			}
		}
		function getCellValue(row, index){ return $(row).children('td').eq(index).text() }		
	</script>
 
</body>

</html>