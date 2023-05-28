<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Lacak <?=$nama?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@1,700&family=Open+Sans&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	
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
	  color: white;
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


<nav class="navbar navbar-expand-lg navbar-light bg-light px-2">
  <div class="container-fluid">
    <a class="navbar-brand " href="#"><?=$nama?></a>
    <button
      class="navbar-toggler"
      type="button"
      data-mdb-toggle="collapse"
      data-mdb-target="#navbarText"
      aria-controls="navbarText"
      aria-expanded="false"
      aria-label="Toggle navigation"
    >
      <i class="fas fa-bars"></i>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="<?=site_url()?>">Beranda</a>
        </li>
      </ul>
      <span class="navbar-text">
        <a href="<?=site_url('login')?>">Admin</a>
      </span>
    </div>
  </div>
</nav>


	<div class="container px-5">
	 <!-- Section: Main chart -->
		  <section class="mb-4 mt-5">
			<div class="card">
			  <div class="card-header text-dark py-3">
				<h5 class="mb-0"><strong>Lacak Resi</strong></h5>
			  </div>
			  <div class="card-body">				
				<table class="table align-middle mb-0 bg-white">
				  <thead class="bg-light">
					<tr>
					  <th>No Resi</th>
					  <th>Nama Pengirim</th>
					  <th>Nama Penerima</th>
					  <th>Alamat</th>
					  <th>Lokasi Terakhir</th>
					  <th>Tanggal diperbarui</th>
					  <th>Status</th>
					</tr>
				  </thead>
				  <tbody>
				  <?php foreach($array_pengiriman as $pengiriman): ?>
					<tr>
					  <td>JKT0000000<?=$pengiriman->id_pengiriman?></td>
					  <td><?=$pengiriman->nama_pelanggan?></td>
					  <td><?=$pengiriman->nama_penerima?></td>
					  <td><?=$pengiriman->alamat_penerima?></td>
					  <td><?=$pengiriman->lokasi_gudang?></td>
					  <td><?=$pengiriman->tanggal?></td>
					  <td><?=$pengiriman->status?></td>
					</tr>
				  <?php endforeach; ?>
				  </tbody>
				</table>	
				
				
			  </div>
			</div>
		  </section>
	  <!-- Section: Main chart -->
	
	</div>
	
	
  </body>
</html>