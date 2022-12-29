<?php
include("koneksi/koneksi.php");

date_default_timezone_set('Asia/Jakarta');
$tanggal= mktime(date("m"),date("d"),date("Y"));
$tgl = date("Y-m-d",$tanggal);

//$tgl=date("Y-m-d");

$alur=$_POST['jenis'];
$nama=$_POST['nama'];
$jumlah=$_POST['jumlah'];
$ket=$_POST['ket'];

$caribrg=mysqli_query($con,"select id_barang from barang where nama_barang='$nama'");
$ketemu=mysqli_num_rows($caribrg);

if($ketemu>0)
{
	$data=mysqli_fetch_array($caribrg);
	$id=$data['id_barang'];
}
else
{
	echo '<script>alert(\'Item tidak tersedia, silahkan input items terlebih dahulu di master barang\')
			setTimeout(\'location.href="barang.php"\' ,0);</script>';
			exit;
}

if($alur=="Masuk")
{
	if(!(is_numeric($jumlah)))
	{
		echo '<script>alert(\'Jumlah harus angka numerik.\')
			setTimeout(\'location.href="transaksi1.php"\' ,0);</script>';
			exit;
	}
	
	$simpan=mysqli_query($con,"insert into transaksi values ('','$tgl','$alur','$id','$jumlah','$ket')");
	if(!($simpan))
	{
		echo '<script>alert(\'Transaksi gagal diproses.\')
			setTimeout(\'location.href="transaksi1.php"\' ,0);</script>';
			exit;
	}
	
	$qrbrg=mysqli_query($con,"select id_barang,nama_barang,stok from barang where id_barang='$id'");
	$dtbrg=mysqli_fetch_array($qrbrg);
	$stokbaru=$dtbrg['stok']+$jumlah;
	
	$update=mysqli_query($con,"update barang set stok='$stokbaru' where id_barang='$id'");
	if($update)
	{
		echo '<script>alert(\'Transaksi berhasil, stok '.$dtbrg['nama_barang'].' kini telah bertambah.\')
			setTimeout(\'location.href="transaksi1.php"\' ,0);</script>';
			
	}
	else
	{
		echo '<script>alert(\'Update stok gagal!\')
			setTimeout(\'location.href="transaksi1.php"\' ,0);</script>';
			exit;
	}
}

else if($alur=="Keluar")
{
	if(!(is_numeric($jumlah)))
	{
		echo '<script>alert(\'Jumlah harus angka numerik.\')
			setTimeout(\'location.href="transaksi2.php"\' ,0);</script>';
			exit;
	}
	
	$qrbrg=mysqli_query($con,"select id_barang,nama_barang,stok from barang where id_barang='$id'");
	$dtbrg=mysqli_fetch_array($qrbrg);
	$stokbaru=$dtbrg['stok']-$jumlah;
	
	if($jumlah>$dtbrg['stok'])
	{
		echo '<script>alert(\'Stok tidak mencukupi.\')
			setTimeout(\'location.href="transaksi2.php"\' ,0);</script>';
			exit;
	}
	
	$simpan=mysqli_query($con,"insert into transaksi values ('','$tgl','$alur','$id','$jumlah','$ket')");
	if(!($simpan))
	{
		echo '<script>alert(\'Transaksi gagal diproses.\')
			setTimeout(\'location.href="transaksi2.php"\' ,0);</script>';
			exit;
	}
	
	$qrbrg=mysqli_query($con,"select id_barang,nama_barang,stok from barang where id_barang='$id'");
	$dtbrg=mysqli_fetch_array($qrbrg);
	$stokbaru=$dtbrg['stok']-$jumlah;
	
	$update=mysqli_query($con,"update barang set stok='$stokbaru' where id_barang='$id'");
	if($update)
	{
		echo '<script>alert(\'Transaksi berhasil, stok '.$dtbrg['nama_barang'].' kini telah berkurang.\')
			setTimeout(\'location.href="transaksi2.php"\' ,0);</script>';
			
	}
	else
	{
		echo '<script>alert(\'Update stok gagal!\')
			setTimeout(\'location.href="transaksi2.php"\' ,0);</script>';
			exit;
	}
}

?>
