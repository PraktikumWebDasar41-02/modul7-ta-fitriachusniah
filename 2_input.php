<?php
	include "koneksi.php";
?>
<html>
<head>
	<title>INPUT Data
	</title>
</head>
<body>
	<form method="post">
		<table>
			<tr>
				<td>NIM</td><td>:</td>
				<td><input type="text" name="nim"></td>
			</tr>
			<tr>
				<td>Nama</td><td>:</td>
				<td><input type="text" name="nama"></td>
			</tr>
			<tr>
				<td>Tgl Lahir</td><td>:</td>
				<td><input type="date" name="tgl"></td>
			</tr>
			<tr>
				<td>Jenis Kelamin</td><td>:</td>
				<td><input type="radio" name="jk" value="L" checked="checked">L <input type="radio" name="jk" value="P">P </td>
			</tr>
			<tr>
				<td>Prodi</td><td>:</td>
				<td>
					<select name="prodi">
						<option value="D3 Teknik Telekomunikasi">D3 Teknik Telekomunikasi</option>
						<option value="D3 Teknik Informatika">D3 Teknik Informatika</option>
						<option value="D3 Manajemen Informatika">D3 Manajemen Informatika</option>
						<option value="D3 Perhotelan">D3 Perhotelan</option>
						<option value="D4 Sistem Multimedia">D4 Sistem Multimedia</option>

					</select>
				</td>
			</tr>
			<tr>
				<td>Fakultas</td><td>:</td>
				<td>
					<select name="fakultas">
					
						<option value="Fakultas Teknik Elektro">Fakultas Teknik Elektro</option>
						<option value="Fakultas Teknik Informatika">Fakultas Teknik Informatika</option>
						<option value="Fakultas Rekayasa Industri">Fakultas Rekayasa Industri</option>
						<option value="Fakultas Industri Kreatif">Fakultas Industri Kreatif</option>
						<option value="Fakultas Komunikasi Bisnis">Fakultas Komunikasi Bisnis</option>
						<option value="Fakultas Ilmu Terapan">Fakultas Ilmu Terapan</option>
					</select>
				</td>
			</tr>
			<tr>
				<td>Asal</td><td>:</td>
				<td><input type="text" name="asal"></td>
			</tr>
			<tr>
				<td>Motto</td><td>:</td>
				<td><textarea name="motto" ></textarea></td>
			</tr>
			<tr>
				<td colspan="3">
						<input type="submit" name="submit" value="INPUT">
				</td>
			</tr>
		</table>
	
		<a href="1_tampil.php">Back</a>
	</form>
</body>
</html>

<?php
if (isset($_POST['submit'])){
	$nim 		= $_POST['nim'];
	$len_nim	= strlen($nim);
	$nama 		= $_POST['nama'];
	$len_nama	= strlen($nama);
	$tgl 		= $_POST['tgl'];
	$tahun		= substr($tgl, 0,4);
	$jk			= $_POST['jk'];
	$prodi 		= $_POST['prodi'];
	$fakultas 	= $_POST['fakultas'];
	$asal 		= $_POST['asal'];
	$len_asal	= strlen($asal);
	$motto 		= $_POST['motto'];
	$len_motto	= strlen($motto);
	$cek = true;

	if(empty($nim)){
		echo "NIM Tidak Boleh KOSONG! <br>";
		$cek = false;
		//echo $tahun;
	}else{
		if($len_nim!=10){
			echo "NIM harus 10 Karakter! <br>";
			$cek = false;
		}else{
			if(!is_numeric($nim)){
				echo "NIM harus angka! <br>";
				$cek = false;
			}
		}
	}

	if(empty($nama)){
		echo "Nama Tidak Boleh KOSONG! <br>";
		$cek = false;
	}else{
		if($len_nama>35){
			echo "Nama maksimal 35 Karakter! <br>";
			$cek = false;
		}else{
			if(is_numeric($nama)){
				echo "Nama tidak boleh angka! <br>";
				$cek = false;
			}
		}
	}

	if(empty($asal)){
		echo "Kota Asal Tidak Boleh KOSONG! <br>";
		$cek = false;
	}else{
		if($len_asal>25){
			echo "Kota Asal maksimal 25 Kata! <br>";
			$cek = false;
		}else{
			if(is_numeric($asal)){
				echo "Asal tidak boleh angka! <br>";
				$cek = false;
			}
		}
	}

	if(empty($motto)){
		echo "Motto Tidak Boleh KOSONG! <br>";
		$cek = false;
	}else{
		if($len_motto<2){
			echo "Motto minimal 2 Kata! <br>";
			$cek = false;
		}else{
			if(is_numeric($motto)){
				echo "Motto tidak boleh angka! <br>";
				$cek = false;
			}
		}
	}

	if(empty($tgl)){
		echo "Tanggal Lahir Tidak Boleh KOSONG! <br>";
		$cek = false;
	}else{
		if($tahun>2003){
			echo "Tahun Kelahiran Harus di bawah tahun 2003 <br>";
			$cek = false;
		}
	}

	if($cek==true){
				$query= "INSERT INTO `mahasiswa`(`NIM`, `Nama`, `Tgl_Lahir`, `Jk`, `Prodi`, `Fakultas`, `Asal`, `Motto`) VALUES ('$nim','$nama','$tgl','$jk','$prodi','$fakultas','$asal','$motto')";
			
			$hasil = mysqli_query($con,$query);
			if($hasil){
				header("Location:1_tampil.php");
			}else{
				echo "data gagal diinput";
			}
	}else{
		echo "data gagal diinput";
	}
	
}
?>

