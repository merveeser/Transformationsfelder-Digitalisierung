<?php

	session_start();
	include("connection.php");
	if($_SESSION['email'] != ""){
		
		$query =  "SELECT * FROM `user` WHERE `Email` = '".$_SESSION["email"]."'";
		
		if($resultat = mysqli_query($link,$query)){
			$row = mysqli_fetch_array($resultat);

?>
<!doctype html>
<html lang="de">
    <head>
		<title>Profil</title>
		<meta charset="utf-8">
    	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700' rel='stylesheet' type='text/css'>

		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<link rel="stylesheet" href="css/style.css">
		<link rel="stylesheet" href="style.css">
    
              <!-- Optionales JavaScript -->
        <!-- jQuery, dann Popper.js, dann Bootstrap JS -->
        <script src="js/jquery-3.3.1.slim.min.js" charset="utf-8"></script>
        <script src="js/rater.js" charset="utf-8"></script>
        <script src="js/popper.js"></script>
        <script src="js/bootstrap.min.js"></script>
		<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    	<div class="container">
	    		<a class="navbar-brand" href="index.html"><img src="img/logo2.png" alt="logo"/></a>
	    		<form action="#" class="searchform order-sm-start order-lg-last"></form>
	      		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        		<span class="fa fa-bars"></span> Menu
	      		</button>
	      		<div class="collapse navbar-collapse" id="ftco-nav">
	        		<ul class="navbar-nav m-auto">
                		<li class="nav-item"><a href="index.php" class="nav-link"><img src="img/home.png" alt="" style="height: 26px;width: 26px;"> Startseite</a></li>
						<li class="nav-item"><a href="Bienenwissen.php" class="nav-link"><img src="img/bee.png" alt="" style="height: 26px;width: 26px;"> Bienenwissen</a></li>
	        			<li class="nav-item"><a href="Pflanzenkatalog.php" class="nav-link"><img src="img/plant.png" alt="" style="height: 26px;width: 26px;"> Pflanzenkatalog</a></li>
	        			<li class="nav-item "><a href="merkliste.php" class="nav-link"><img src="img/bookmark.png" alt="" style="height: 26px;width: 26px;"> Merkliste</a></li>
						<li class="nav-item"><a href="Aussatkalender.php" class="nav-link"><img src="img/planner.png" alt="" style="height: 26px;width: 26px;"> Aussaatkalender</a></li>
						<li class="nav-item active dropdown ">
						<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="profil.php" role="button" aria-haspopup="true" aria-expanded="false"><img src="img/profil.png" alt="" style="height: 26px;width: 26px;">Profil</a>
							<div class="dropdown-menu">
							<a class="dropdown-item" href="login.php" style="min-width: inherit; display: inline-block;"><img src="img/logout.png" alt="" style="height: 20px;width: 20px;"> Abmelden</a></li>
							</div>
	        		</ul>
	      		</div>
			</div>
		</nav>
		
	</head>
	<body>

	
		<div class="container">
				<form action="updateProfil.php">
					<button type="submit" class="btn btn-secondary btn-sm float-right d-"><i class="fa fa-pencil"></i> Bearbeiten</button>
				</form>
				<div class="text-center mt-5">
					<img src="img/profilbild.jpg"  class="rounded" style="width: 150px; height: 170px; object-fit: cover; margin-left:100px" alt="...">
				</div>
				
				<div class="card-body border-bottom">
					<h4 class="card-title text-center"><?php print_r($row[2]);?>  <?php print_r($row[3]); ?></h4>
				</div>
		</div>


		<div class="container">
			<div class="media text-muted pt-3">
				<span class="fa-stack fa-lg">
					<i class="fa fa-circle fa-stack-2x"></i>
					<i class="fa fa-user fa-stack-1x fa-inverse"></i>
				</span> 
				<p class="media-body pb-3 mb-0 small lh-125 border-gray">
					<strong class="d-block text-gray-dark">Benutzername</strong>
					<?php print_r($row[1]); ?>
				</p>
			</div>
		
			<div class="media text-muted pt-3">
				<span class="fa-stack fa-lg">
					<i class="fa fa-circle fa-stack-2x"></i>
					<i class="fa fa-envelope fa-stack-1x fa-inverse"></i>
				</span> 
				<p class="media-body pb-3 mb-0 small lh-125 border-gray">
					<strong class="d-block text-gray-dark">E-Mail</strong>
					<?php print_r($row[5]); ?>
				</p>
			</div>
			<div class="media text-muted pt-3 mb-3">
				<span class="fa-stack fa-lg">
					<i class="fa fa-circle fa-stack-2x"></i>
					<i class="fa fa-lock fa-stack-1x fa-inverse"></i>
				</span> 
				<p class="media-body pb-3 mb-0 small lh-125 border-gray">
					<strong class="d-block text-gray-dark">Passwort</strong>
					<?php echo($row[4] [0]); ?> ***
				</p>
			</div>
		</div>
<?php
				}else{
			echo "<p class='alert alert-danger' role='alert'>Fehler</p>";
			
		}
	}
		?>
	
		


    </body>
	<?php include ("footer.php"); ?>
</html>