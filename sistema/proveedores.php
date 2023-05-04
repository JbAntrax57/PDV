<?php 
if (!empty($_POST)) {
	$alert='';
	if (empty($_POST['razon_social']) || empty($_POST['direccion_prov']) || empty($_POST['telefono_prov'])
		|| empty($_POST['correo_prov']) || empty($_POST['paginaweb_prov']) || empty($_POST['codigopostal_prov'])
		|| empty($_POST['diaentrega_prov']) || empty($_POST['callescol_prov'])) {
		$alert='<p class="msg_error">Todos los campos son obligatorios</p>';
	}else{
		include "../conexion.php";
		$razon_social = $_POST['razon_social'];
			$direccion_prov = $_POST['direccion_prov'];
			$telefono_prov = $_POST['telefono_prov'];
			$correo_prov = $_POST['correo_prov'];
			$paginaweb_prov = $_POST['paginaweb_prov'];
			$codigopostal_prov = $_POST['codigopostal_prov'];
			$diaentrega_prov = $_POST['diaentrega_prov'];
			$callescol_prov = $_POST['callescol_prov'];

			/*$query = mysqli_query($conection, "SELECT * FROM proveedores WHERE correoelectronico = '$correo_prov'");
			$result = mysqli_fetch_array($query);
			if($result > 0){
				$alert='<p class="msg_error">El correo ya existe</p>';
			}else{*/
			$query_insert = mysqli_query($conection, "INSERT INTO proveedores (razonsocialprov, direccionprov,
				telefono, correoelectronico, paginaweb, codigopostal, diaentrega, callescolindantes)
				VALUES ('$razon_social', '$direccion_prov', '$telefono_prov', '$correo_prov', '$paginaweb_prov',
				'$codigopostal_prov', '$diaentrega_prov', '$callescol_prov')");	
			if($query_insert){
					$alert='<p class="msg_save">Proveedor agregado exitosamente</p>';
				}else{
					$alert='<p class="msg_error">Error al agregar el proveedor</p>';
				}
			//}
	}
}

 ?>
	
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
<?php include "includes/scripts.php";
 ?>
	<title>Sistema Ventas</title>
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
	<?php include "includes/heater.php";
 ?>
	<section id="container">
		<h1>Bienvenido al sistema</h1>
	
    <div class="form_register">
            <h1>Registro proveedores</h1>
            <hr>
            <div class="alert"><?php echo isset($alert ) ? $alert : '';?></div>
            <form action="" method="post">
                <label for="razon_social">Razón Social</label>
                <input type="text" name="razon_social" id="razon_social" placeholder="Razón social">
                <label for="direccion_prov">Direccion Proveedor</label>
                <input type="text" name="direccion_prov" id="direccion_prov" placeholder="Domicilio proveedor">
                <label for="telefono_prov">Telefono Proveedor</label>
                <input type="number" name="telefono_prov" id="telefono_prov" placeholder="Telefono proveedor">
                <label for="correo_prov">Correo Electrónico</label>
                <input type="email" name="correo_prov" id="correo_prov" placeholder="Correo proveedor">
                <label for="paginaweb_prov">Pagina web</label>
                <input type="text" name="paginaweb_prov" id="paginaweb_prov" placeholder="Pagina web del proveedor">
                <label for="codigopostal_prov">Codigo postal</label>
                <input type="number" name="codigopostal_prov" id="codigopostal_prov" placeholder="Codigo postal">
                <label for="diaentrega_prov">Día de entrega</label>
                <input type="text" name="diaentrega_prov" id="diaentrega_prov" placeholder="Dia de entrega">
                <label for="callescol_prov">Calles colindantes</label>
                <input type="text" name="callescol_prov" id="callescol_prov" placeholder="Calles colindantes">
                <input type="submit" value="crear proveedor" class="btn_proveedor">
            </form>
        </div>
	</section>
	<?php include "includes/footer.php";?>
</body>
</html>