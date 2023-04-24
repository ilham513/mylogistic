<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Kurir View</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@1,700&family=Open+Sans&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<!-- MDB -->
	<link rel="stylesheet" href="css/mdb.min.css" />
	<!-- Custom styles -->
	<link rel="stylesheet" href="css/admin.css" />
	
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
				<h5 class="mb-0"><strong>Kurir</strong></h5>
			  </div>
			  <div class="card-body">
				<div class="d-grid gap-2 mb-3 d-md-flex justify-content-md-end">
				  <button class="btn btn-success fw-bold" type="button">Tambah Kurir</button>
				</div>
				
				<table class="table align-middle mb-0 bg-white">
				  <thead class="bg-light">
					<tr>
					  <th>ID</th>
					  <th>Nama</th>
					  <th>Merk Kendaraan</th>
					  <th>No Telpon</th>
					  <th>Actions</th>
					</tr>
				  </thead>
				  <tbody>
					<tr>
					  <td>Awaiting</td>
					  <td>Awaiting</td>
					  <td>Awaiting</td>
					  <td>Senior</td>
					  <td>
						<span class="fw-bold me-2 text-primary">EDIT</span>
						<span class="fw-bold text-danger">HAPUS</span>
					  </td>
					</tr>
					<tr>
					  <td>Awaiting</td>
					  <td>Awaiting</td>
					  <td>Awaiting</td>
					  <td>Senior</td>
					  <td>
						<span class="fw-bold me-2 text-primary">EDIT</span>
						<span class="fw-bold text-danger">HAPUS</span>
					  </td>
					</tr>
					<tr>
					  <td>Awaiting</td>
					  <td>Awaiting</td>
					  <td>Awaiting</td>
					  <td>Senior</td>
					  <td>
						<span class="fw-bold me-2 text-primary">EDIT</span>
						<span class="fw-bold text-danger">HAPUS</span>
					  </td>
					</tr>
					<tr>
					  <td>Awaiting</td>
					  <td>Awaiting</td>
					  <td>Awaiting</td>
					  <td>Senior</td>
					  <td>
						<span class="fw-bold me-2 text-primary">EDIT</span>
						<span class="fw-bold text-danger">HAPUS</span>
					  </td>
					</tr>
				  </tbody>
				</table>	
				
				
			  </div>
			</div>
		  </section>
	  <!-- Section: Main chart -->
	
    </div>
  </main>
  <!--Main layout-->

  <!-- MDB -->
  <script type="text/javascript" src="js/mdb.min.js"></script>
  <!-- Custom scripts -->
  <script type="text/javascript" src="js/admin.js"></script>
</body>

</html>