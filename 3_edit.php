<?php
	include "koneksi.php";
	$nim = $_GET['id'];
	$sql = mysqli_query($con,"SELECT * FROM mahasiswa WHERE NIM = '$nim'");
	$preview = mysqli_fetch_row($sql);
?>
<html>
<head>
	<title>UPDATE Data
	</title>
</head>
<body>
	<form method="post">
		<table>
			<tr>
				<td>NIM</td><td>:</td>
				<td><input type="text" name="nim" value="<?php echo $preview['0'] ?>" readonly="readonly" style="background-color: #666"></td>
			</tr>
			<tr>
				<td>Nama</td><td>:</td>
				<td><input type="text" name="nama" value="<?php echo $preview['1'] ?>"></td>
			</tr>
			<tr>
				<td>Tgl Lahir</td><td>:</td>
				<td><input type="date" name="tgl" value="<?php echo $preview['2'] ?>"></td>
			</tr>
			<tr>
				<td>Jenis Kelamin</td><td>:</td>
				<td>
					<input type="radio" name="jk" value="L" <?php echo ($preview['3']=='L')?'checked':'' ?>>L
					<input type="radio" name="jk" value="P" <?php echo ($preview['3']=='P')?'checked':'' ?>>P
				</td>
			</tr>
			<tr>
				<td>Prodi</td><td>:</td>
				<td>
					<select name="prodi">
						<option value="D3 Teknik Telekomunikasi"  value="D3 Teknik Telekomunikasi" <?php echo ($preview['4']=='D3 Teknik Telekomunikasi')?'selected':'' ?>>D3 Teknik Telekomunikasi</option>
						<option value="D3 Teknik Informatika" value="D3 Teknik Informatika" <?php echo ($preview['4']=='D3 Teknik Informatika')?'selected':'' ?>>D3 Teknik Informatika</option>
						<option value="D3 Manajemen Informatika" value="D3 Manajemen Informatika" <?php echo ($preview['4']=='D3 Manajemen Informatika')?'selected':'' ?>>D3 Manajemen Informatika</option>
						<option value="D3 Perhotelan" value="D3 Perhotelan" <?php echo ($preview['4']=='D3 Perhotelan')?'selected':'' ?>>D3 Perhotelan</option>
						<option value="D4 Sistem Multimedia" value="D3 Sistem Multimedia" <?php echo ($preview['4']=='D3 Sistem Multimedia')?'selected':'' ?>>D4 Sistem Multimedia</option>

					</select>
				</td>
			</tr>
			<tr>
				<td>Fakultas</td><td>:</td>
				<td>
					<select name="fakultas">
					
						<option value="Fakultas Teknik Elektro" value="Fakultas Teknik Elektro" <?php echo ($preview['5']=='Fakultas Teknik Elektro')?'selected':'' ?>>Fakultas Teknik Elektro</option>
						<option value="Fakultas Teknik Informatika" value="Fakultas Teknik Informatika" <?php echo ($preview['5']=='Fakultas Teknik Informatika')?'selected':'' ?>>Fakultas Teknik Informatika</option>
						<option value="Fakultas Rekayasa Industri" value="Fakultas Rekayasa Industri" <?php echo ($preview['5']=='Fakultas Rekayasa Industri')?'selected':'' ?>>Fakultas Rekayasa Industri</option>
						<option value="Fakultas Industri Kreatif" value="Fakultas Industri Kreatif" <?php echo ($preview['5']=='Fakultas Industri Kreatif')?'selected':'' ?>>Fakultas Industri Kreatif</option>
						<option value="Fakultas Komunikasi Bisnis value="Fakultas Komunikasi Bisnis" <?php echo ($preview['5']=='Fakultas Komunikasi Bisnis')?'selected':'' ?>">Fakultas Komunikasi Bisnis</option>
						<option value="Fakultas Ilmu Terapan" value="Fakultas Ilmu Terapan" <?php echo ($preview['5']=='Fakultas Ilmu Terapan')?'selected':'' ?>>Fakultas Ilmu Terapan</option>
					</select>
				</td>
			</tr>
			<tr>
				<td>Asal</td><td>:</td>
				<td><input type="text" name="asal" value="<?php echo $preview['6'] ?>"></td>
			</tr>
			<tr>
				<td>Motto</td><td>:</td>
				<td><textarea name="motto"><?php echo $preview['7'] ?></textarea></td>
			</tr>
			<tr>
				<td colspan="3">
					<input type="submit" name="submit" value="UPDATE">
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
				$query= "UPDATE `mahasiswa` 
							SET `Nama`= '$nama',`Tgl_Lahir`='$tgl',`Jk`='$jk',`Prodi`='$prodi',`Fakultas`='$fakultas',`Asal`='$asal',`Motto`='$motto' 
							WHERE NIM = '$nim' ";
			
			$hasil = mysqli_query($con,$query);
			if($hasil){
				header("Location:1_tampil.php");
			}else{
				echo "data gagal diupdate";
			}
	}else{
		echo "data gagal diupdate";
	}
	
}
?>

