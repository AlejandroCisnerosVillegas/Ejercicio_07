<?php
	include("conexion.php");
	$nombre = $_POST["usuario"];
	$pass   = $_POST["pass"];
	if(isset($_POST["btningresar"]))
	{
		$query = mysqli_query($conn,"SELECT * FROM poject_08_login WHERE usuario = '$nombre' AND password='$pass'");
		$nr = mysqli_num_rows($query);
		if($nr==1)
		{
			echo "<script> alert('Bienvenido $nombre'); window.location='principal.html' </script>";
		}else
		{
			echo "<script> alert('Usuario no existe'); window.location='index.html' </script>";
		}
	}
	if(isset($_POST["btnregistrar"]))
	{
		$sqlgrabar = "INSERT INTO poject_08_login(usuario,password) values ('$nombre','$pass')";
		if(mysqli_query($conn,$sqlgrabar))
		{
			echo "<script> alert('Usuario registrado con exito: $nombre'); window.location='index.html' </script>";
		}else 
		{
			echo "Error: ".$sqlgrabar."<br>".mysql_error($conn);
		}
	}
?>