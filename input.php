<!DOCTYPE html>
<html>
<head>
	<title>Regis</title>
	<style type="">
		table{
			font-family: verdana, helvetica, perpetua, sans-serif;
			font-style: 12px;
		}
		input{
			font-family: verdana, helvetica, perpetua, sans-serif;
			font-style: 12px;
			height:20px;
		}
	</style>
</head>
<body bgcolor="#f7a5d5">
 	<br><br><br>
	<center>
		<h2><b>Registrasi Mahasiswa</b></h2>
	<form action="" method="POST">
		<table>
			<tr>
				<td><b>NIM</b></td>
				<td> : </td>
				<td><input type="text" name="nim" required=""></td>
			</tr>
			<tr>
				<td><b>Nama</b></td>
				<td> : </td>
				<td><input type="text" name="nama" required=""></td>
			</tr>
			<tr>
				<td><b>Email</b></td>
				<td> : </td>
				<td><input type="email" name="email" value="@gmail.com" required=""></td>
			</tr>
			<tr>
				<td><b>Jenis Kelamin</b></td>
				<td> : </td>
				<td><input type="radio" name="jeniskelamin" value="Laki-Laki" required="">Laki-Laki<br></td>
				<td><input type="radio" name="jeniskelamin" value="Perempuan">Perempuan<br></td>
			</tr>
			<tr>
				<td><b>Tanggal Lahir</b></td>
				<td> : </td>
				<td><input type="date" name="tanggal_lahir"></td>
			</tr>
			<tr>
				<td><b>Program Studi</b></td>
				<td> : </td>
				<td><select name="prodi" required="">
    				<option value="Sistem Informasi">Sistem Informasi</option>
    				<option value="Teknologi Komputer">Teknologi Komputer</option>
    				<option value="Teknik Informatika">Teknik Informatika</option>
    				<option value="Rekayasa Perangkat Lunak Aplikasi">Rekayasa Perangkat Lunak Aplikasi</option>
    				<option value="Manajemen Pemasaran">Manajemen Pemasaran</option>
    				<option value="Manajemen Informatika">Manajemen Informatika</option>
    				<option value="Perhotelan">Perhotelan</option>
    				<option value="Teknologi Telekomunikasi">Teknologi Telekomunikasi</option>
    				<option value="Sistem Informasi Akuntansi">Sistem Informasi Akuntansi</option>
    				<option value="Teknik Industri">Teknik Industri</option>
    				<option value="Teknik Telekomunikasi">Teknik Telekomunikasi</option>	
				</select></td>
			</tr>
			<tr>
				<td><b>Fakultas</b></td>
				<td> :</td>
				<td><select name="fakultas" required="">
    				<option value="FTE">Fakultas Teknik Elektro</option>
    				<option value="FIT">Fakultas Ilmu Terapan</option>
    				<option value="FEB">Fakultas Ekonomi Bisnis</option>
    				<option value="FIK">Fakultas Industri Kreatif</option>
    				<option value="FRI">Fakultas Rekayasa Industri</option>
    			</select></td>
    		</tr>
			<tr>
				<td colspan="3"><br><center><input type="submit" name="submit"></center> </td>
			</tr>
		</table>
	</form>
</center>
</body>
</html>

<?php
	$konek = mysqli_connect('localhost','root','','d_modul5');
	session_start();
	if(isset($_POST['submit'])){
		$nim=$_POST['nim'];
		$nama=$_POST['nama'];
		$email=$_POST['email'];
		$jeniskelamin=$_POST['jeniskelamin'];
		$tanggal_lahir=$_POST['tanggal_lahir'];
		$prodi=$_POST['prodi'];
		$fakultas=$_POST['fakultas'];

		$error=array();
		if(strlen($_POST['nim']) != 15){
			$error['nim']=="Harus 10";
		} if(strlen($_POST['nama']) <= 25){
			$error['nama']=="Harus 25";
		} if(empty($email)){
			$error['email']=="Email harus diisi";
		}if(empty($tanggal_lahir)){
			$error['tanggal_lahir']=="Tanggal lahir harus diisi";
		}if(empty($jeniskelamin)){
			$error['jeniskelamin']=="Jenis Kelamin harus diisi";
		}if(empty($prodi)){
			$error['studi']=="Program Studi harus diisi";
		}if(empty($fakultas)){
			$error['fakultas']=="fakultas harus diisi";
		}

	$query=mysqli_query($konek,"INSERT INTO t_jurnal1 VALUES ($nim,'$nama','$email','$jeniskelamin','$tanggal_lahir','$prodi','$fakultas')");
	if($query){
		header('Location:output.php');
	}
}
	
?>

	