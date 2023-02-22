<?php
	$dir    = '../htdocs';
	$scanDir = scandir($dir,0);
	$files = array_diff($scanDir, array('.', '..','index.php','phpinfo.php','search.php'));
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title><?php echo 'XAMPP '.phpversion(); ?></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
  <style>
	.navbar a:link {
		color: #009; 
		text-decoration: none; 
		background: #212529 !important;
	}
	.navbar-brand {
        color: #ffffff !important;
    }

	.navbar .navbar-nav li.nav-item a.nav-link {
		padding: 15px !important;
	}

	.navbar .navbar-nav li.nav-item a.nav-link.active {
		background-color: #FF6020;
	}
  </style>
</head>
<body>

<nav class="navbar navbar-expand-sm bg-dark navbar-dark p-0">
  <div class="container">
	<a class="navbar-brand" href="http://localhost/"><?php echo 'XAMPP '.phpversion(); ?></a>

    <ul class="navbar-nav">
	  <li class="nav-item"><a class="nav-link active" href="http://localhost/"><span class="glyphicon glyphicon-user"></span> Home</a></li>
      <li class="nav-item"><a class="nav-link" href="http://localhost/phpinfo.php"> <span class="glyphicon glyphicon-user"></span> PHP Info</a></li>
      <li class="nav-item"><a class="nav-link" href="http://localhost/phpmyadmin" target="blank"> <span class="glyphicon glyphicon-user"></span> PhpMyAdmin</a></li>
    </ul>
  </div>
</nav>

<div class="container mt-5">
	<h3>Welcome to XAMPP <?php echo phpversion(); ?></h3>
	<p>Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs. The passage is attributed to an unknown typesetter in the 15th century who is thought to have scrambled parts of Cicero's De Finibus Bonorum et Malorum for use in a type specimen book. It usually begins</p>
</div>


<div class="container mt-5">
	<div class="card">
		<div class="card-header">
			<div class="row d-flex align-items-end">
				<div class="col-sm-8">
					<h5>ALL PROJECTS</h5>
				</div>
				<div class="col-sm-4 text-end">
					<form action="">
						<div class="input-group">
							<input type="text" class="form-control" id="Search" onKeyUP="searchme(this.value)">
							<label class="input-group-text" for="Search">Search</label>
						</div>
					</form>
				</div>
			</div>
		</div>
		<div class="card-body">
			<div class="row" id="src">
				
				<?php foreach($files as $file) : ?>
				<div class="col-sm-3 pb-4">
					<div class="card">
						<div class="card-header">
							<div class="row">
								<div class="col-sm-6"><h6 class="card-title text-uppercase"><?php echo $file; ?></h6></div>
								<div class="col-sm-6 text-end"><span class=""><?php echo date("d-m-Y", filemtime($file)) ;?></span> </div>
							</div>
						</div>
						<div class="card-body">
							<a href="<?php echo $file;?>" class="btn btn-primary btn-sm ">GO TO YOUR PROJECT</a>
						</div>
					</div>
				</div>
				<?php endforeach; ?>
			</div>
		</div>
	</div>
</div>


<script>
	function searchme(str) {
		if(str.length == -1) {
			document.getElementById('src').innerHTML = "ddd";
			return;
		} else {
			var xmlhttp = new XMLHttpRequest();
			xmlhttp.onreadystatechange = function() {
				if(xmlhttp.readyState == 4 && xmlhttp.status == 200) {
					document.getElementById('src').innerHTML = xmlhttp.responseText;
				}
			};

			xmlhttp.open("GET","search.php?a=" + str, true);
			xmlhttp.send();
		}
	}
</script>
</body>
</html>