<?php
	include"../conexion.php";
	if(!empty($_POST))
	{
		$idusuario = $_POST['idusuario'];	
		$query_delete = mysqli_query($conection,"DELETE FROM usuario WHERE idusuario = ");
		if($query_delete){
			header("location: lista_usuarios.php");			
		}else{
			echo"Error al eliminar";
		}	
	}
	if(empty($_REQUEST['id']))
	{
		header("location: lista_usuarios.php");
	}else{
		$idusuario = $_REQUEST['id'];
		$query = mysqli_query($conection,"SELECT u.nombre, u.usuario, r.rol FROM usuario u INNER JOIN rol r on u.rol = r.idrol WHERE u.idusuario = $idusuario ");
		$_result = mysqli_num_rows($query);
		if($_result > 0){
			while ($data = mysqli_fetch_array($query)){
				# code...
				$nombre = $data['nombre'];
				$usuario = $data['usuario'];
				$rol = $data['rol'];
				}								
			}else{
			header("location: lista_usuarios.php");
		}
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<?php include"includes/scripts.php";?>
	<title>Eliminar usuario</title>
</head>
<body>
	<?php include"includes/header.php";?>
	<section id="container">
		<div class="data_delete">
			<h2>¿Esta seguro de eliminar el siguiente registro?</h2>
			<p>Nombre: <span><?php echo $nombre; ?></span></p>
			<p>Usuario: <span><?php echo $usuario; ?></span></p>
			<p>Tipo Usuario: <span><?php echo $rol; ?></span></p>
			<form method="post" action="">
				<input type="hidden" name="idusuario" value="<?php echo $idusuario; ?>">
				<a href="lista_usuarios.php" class="btn_cancel">Cancelar</a>
				<input type="submit" value="Aceptar" class="btn_ok">
			</form>
		</div>
	</section>

	<?php include"includes/footer.php";?>

</body>
</html>