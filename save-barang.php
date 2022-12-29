<?php
include("koneksi/koneksi.php");

$mode=$_GET['mode'];
	
if($mode=="edit")
{
	$id=$_POST['id'];
	$nama=$_POST['nama'];
	$satuan=$_POST['satuan'];
	$jumlah=$_POST['jumlah'];
	$id_satuan = mysqli_query($con, "SELECT `id_satuan` FROM `satuan` WHERE `nama_satuan` = '$satuan'");
	$simpan=mysqli_query($con,"update barang set nama_barang='$nama', satuan='$id_satuan', stok='$jumlah' where id_barang='$id'");
	if(!($simpan))
	{
		echo '<script>alert(\'Update data gagal.\')
			setTimeout(\'location.href="barang.php"\' ,0);</script>';
			exit;
	}
	else
	{
		echo '<script>alert(\'Update data berhasil.\')
			setTimeout(\'location.href="barang.php"\' ,0);</script>';
			exit;
	}
}
else if($mode=="add")
{
	$nama=$_POST['nama'];
	$satuan=$_POST['satuan'];
	$jumlah=$_POST['jumlah'];
	$id_satuan = mysqli_query($con, "SELECT `id_satuan` FROM `satuan` WHERE `nama_satuan` = '$satuan'");
	$id_satuan2 = strval($id_satuan);
	echo "id ".$id_satuan2;
	$cek=mysqli_query($con,"SELECT nama_barang,satuan FROM barang INNER JOIN satuan ON 
		barang.`satuan`=satuan.`id_satuan` WHERE `nama_satuan` = '$satuan' AND nama_barang = '$nama'");
	$ada=mysqli_num_rows($cek);
	if($ada>0)
	{
		echo '<script>alert(\'Item barang sudah ada, silahkan masukkan item yang lain\')
			setTimeout(\'location.href="barang.php"\' ,0);</script>';
			exit;
	}
	
	$simpan=mysqli_query($con,"insert into barang values ('','$nama','$id_satuan','$jumlah')");
	if(!($simpan))
	{
		echo '<script>alert(\'Item baru gagal disimpan.\')
			setTimeout(\'location.href="barang.php"\' ,0);</script>';
			exit;
	}
	else
	{
		echo '<script>alert(\'Item baru berhasil disimpan.\')
			setTimeout(\'location.href="barang.php"\' ,0);</script>';
			exit;
	}
}
else if($mode=="delete")
{
	$id=$_GET['id'];
	$simpan=mysqli_query($con,"delete from barang where id_barang='$id'");
	if(!($simpan))
	{
		echo '<script>alert(\'Item gagal dihapus.\')
			setTimeout(\'location.href="barang.php"\' ,0);</script>';
			exit;
	}
	else
	{
		echo '<script>alert(\'Item berhasil dihapus.\')
			setTimeout(\'location.href="barang.php"\' ,0);</script>';
			exit;
	}
}

?>
