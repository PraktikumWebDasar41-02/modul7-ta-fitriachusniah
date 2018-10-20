<!DOCTYPE html>
<html>
<head>
	<title>Tampil Data
	</title>
</head>
<body>
	<center>
		<br><br><br>
		<h3>TABEL MAHASISWA</h3>

</body>
</html>
<?php
include "koneksi.php";
echo "<table style='border: solid thin #666'>";
      echo "<tr><td colspan='4'><a href='2_input.php'>INPUT DATA</a></td>
                <td colspan='5'>
          <form action='1_tampil.php' method='post'>
            <select name='kategori' style='margin-left:200px'>
              <option value='#'>==PILIH KATEGORI===</option>
              <option value='NIM'>NIM</option>
              <option value='Nama'>Nama</option>
              <option value='Prodi'>Prodi</option>
            </scelect>
            <input type='text' name='cari_nama' placeholder='Cari Berdasarkan Kategori'>
            <input type='submit' name='cari' value='Cari'>
          </form>
        </td>
      </tr><tr></tr>";
      
      echo "<th>NIM</th>
      		<th>Nama</th>
      		<th>Tgl Lahir</th>
      		<th>Jenis Kel</th>
      		<th>Prodi</th>
      		<th>Fakultas</th>
      		<th>Asal</th>
      		<th>Motto</th>
      		<th>Aksi</th>

      ";

if(isset($_POST['cari'])){
  $kategori = $_POST['kategori'];
	$cari = $_POST['cari_nama'];
	 $sql = "SELECT * FROM mahasiswa WHERE NIM LIKE '%$cari%' OR Nama LIKE '%$cari%' OR Prodi LIKE '%$cari%' ";
	  

}else{
	 $sql = "SELECT * FROM mahasiswa";

	}
	   $result = $con->query($sql);

	      if ($result->num_rows > 0) {
      
      
        while($row = $result->fetch_assoc()) {

        echo "<tr >";
       	echo "<td style='border: solid thin #666'>".$row['NIM']."</td>";
    		echo "<td style='border: solid thin #666'>".$row['Nama']."</td>";
    		echo "<td style='border: solid thin #666'>".$row['Tgl_Lahir']."</td>";
    		echo "<td style='border: solid thin #666'>".$row['Jk']."</td>";
    		echo "<td style='border: solid thin #666'>".$row['Prodi']."</td>";
    		echo "<td style='border: solid thin #666'>".$row['Fakultas']."</td>";
    		echo "<td style='border: solid thin #666'>".$row['Asal']."</td>";
    		echo "<td style='border: solid thin #666'>".$row['Motto']."</td>";
            	 echo "<td style='border: solid thin #666'><a href='3_edit.php?id=".$row['NIM']."'>Edit</a> | <a href='4_delete.php?id=".$row['NIM']."'>Delete</a></td>";
        echo "</tr>";   
        }
        echo "</table>";
    } else {
        echo "0 results";
    }
    $con->close();

?>
</center>