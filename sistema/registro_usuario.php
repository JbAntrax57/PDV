<?php 
include "../conexion.php";
if (!empty($_POST)) {
	$alert='';
	if (empty($_POST['id_usuario']) || empty($_POST['emailrecup']) || empty($_POST['nomusuario']) || empty($_POST['contrasena']) || empty($_POST['nivelacceso'])) {
		$alert='<p class="msg_error"> Todos los campos son obligatorios.</p>';
	}else{
		

		$idUser = $_POST['id_usuario'];
		$email = $_POST['emailrecup'];
		$user = $_POST['nomusuario'];
		$clave = $_POST['contrasena'];
		$nivel = $_POST['nivelacceso'];

		$query = mysqli_query($conection,"SELECT * FROM usuarios WHERE nomusuario = '$user' OR emailrecup = '$email'");
		$result = mysqli_fetch_array($query);

		if ($result > 0) {
			$alert= '<p class"msg_error">El correo o el usuario ya existe.</p>';
		}else{
			$query_insert = mysqli_query($conection,"INSERT INTO usuarios(id_usuario,emailrecup,nomusuario,contrasena,nivelacceso) VALUES ('$idUser','$email','$user','$contrasena','$nivelacceso')");
			if ($query_insert) {
				$alert= '<p class="msg_save"> Usuario creado correctamente.</p>';
			}else{
				$alert= '<p class="msg_error"> Error al crear el Usuario.</p>';
			}
		}

		

	}



} 
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
<?php include"includes/scripts.php"; ?>
	<title>Registro Usuarios</title>
	<style>
	.form_register{
	width: 450px;
	margin: auto;
}
.form_register h1{
	color: #3c93b0;
}
hr{
	border: 0;
	background: #CCC;
	height: 1px;
	margin: 1px 0;
	display: block;
}
form{
	background: #FFF;
	margin: auto;
	padding: 2px 2px;
	border: 1px solid #d1d1d1;
}
label{
	display: block;
	font-size: 12pt;
	font-family: 'GothamBook';
	margin: 15px auto 5px auto;
}
input,select{
	display: block;
	width: 100%;
	font-size: 11pt;
	padding: 5px;
	border: 1px solid #85929e;
	border-radius: 5px;
}
.btn_save{
	font-size: 12pt;
	background: #12a4c6;
	padding: 10px;
	color: #FFF;
	letter-spacing: 1px;
	border: 0;
	cursor: pointer;
	margin: 15px auto;
}
.alert{
	width: 100%;
	background: #66e07d66;
	border-radius: 6px;
	margin: 20px auto;
}
.msg_error{
	color: #e65656;
}
.msg_save{
	color: #126e00;
}
.alert p{
	padding: 10px;
}
	</style>
</head>
<body>
	<?php include "includes/heater.php"; ?>
	<section id="container">
		
		<div class="alert">
			<h1>Registro Usuario</h1>
			<hr>
			<div class="alert"> <?php echo isset ($alert) ? $alert : ''; ?></div>

			<form action="" method="post">
				<label for="nombre">Nombre</label>
				<input type="text" name="nombre" id="nombre" placeholder="Nombre Completo">

				<label for="correo">Correo Electronico</label>
				<input type="email" name="correo" id="correo" placeholder="Correo Electronico">

				<label for="usuario">Usuario</label>
				<input type="text" name="usuario" id="usuario" placeholder="Usuario">

				<label for="clave">Clave</label>
				<input type="password" name="clave" id="clave" placeholder="Clave de Acceso">

				<label for="rol">Tipo Usuario</label>
				<select name="rol" id="rol"><option value="1">Administrador</option>
				<option value="2">Supervisor</option>
				<option value="3">Vendedor</option>
			</select>
				<input type="submit" value="Crear usuario" class="btn_save">
			</form>
		</div>
	</section>
	<?php include "includes/footer.php"; ?>
</body>
</html>