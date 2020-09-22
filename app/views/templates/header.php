<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Halaman <?php echo $data['judul']; ?></title>

	<!-- <link rel="stylesheet" href="<?php echo BASEURL; ?>/css/bootstrap.css"> -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
	<div class="container">
		  <a class="navbar-brand" href="<?php echo BASEURL; ?>">File Encryption</a>
		  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
		    <span class="navbar-toggler-icon"></span>
		  </button>
		  <ul class="navbar-nav ml-auto">
			<div class="collapse navbar-collapse" id="navbarNavAltMarkup">
				<div class="navbar-nav">
				<?php menu() ?>
				</div>
			</div>
		  </ul>
	 </div>
</nav>

<?php 

function menu()
{
	if(isset($_SESSION['email'])):
		echo '<a class="nav-item nav-link" href="'. URL . 'encryption">Encrypt</a>';
		
		//echo '<a class="nav-item nav-link" href="'. URL . 'listfile">List File</a>';

		echo '<a class="nav-item nav-link" href="'. URL . 'decryption">Decrypt</a>';
		echo '<a class="btn btn-danger" href="'. URL . 'encryption/logout">Logout</a>';
	else:
		echo '<a class="nav-item nav-link" href="'. URL . 'login">Login</a>';
		echo '<a class="nav-item nav-link" href="'. URL . 'register">Register</a>';
	endif;
}
