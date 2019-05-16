<?php 
error_reporting(0);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Login</title>   
	<!--Bootsrap -->
	<link rel="stylesheet" href="<?php echo constant('URL') ?>public/bootstrap/css/bootstrap.min.css">
    
    <!--Fontawesome -->
	<link rel="stylesheet" href="<?php echo constant('URL') ?>public/fontawesome/css/all.css">

	<!--Custom styles-->
	<link rel="stylesheet" type="text/css" href="<?php echo constant('URL') ?>public/css/login.css">
</head>
<body>
<div class="container">
	<div class="d-flex justify-content-center h-100">
		<div class="card">
			<div class="card-header">
				<h3>Iniciar Sesión</h3>
			</div>
			<div class="card-body">
				<div align="center" style="color:pink"><?php echo $this->mensaje; ?></div>
				<form method="POST" action="<?php echo constant('URL') ?>login/ingresar">
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-user"></i></span>
						</div>
						<input type="text" name="usuario" id="usuario" class="form-control" placeholder="usuario">
						
					</div>
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-key"></i></span>
						</div>
						<input type="password" name="password" id="password" class="form-control" placeholder="contraseña">
					</div>
					<div class="form-group">
						<input type="submit" value="Ingresar" class="btn float-right login_btn">
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
</body>
</html>